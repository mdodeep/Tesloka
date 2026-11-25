import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import { Room, RoomEvent, Track, VideoQuality } from 'livekit-client';

window.Pusher = Pusher;

/**
 * Buat koneksi WebSocket Laravel Echo ke server Laravel Reverb dengan fallback aman ke polling.
 *
 * @param {object} config Konfigurasi window.CBT_REALTIME dari Laravel
 * @param {object} callbacks Callback onStateChange('connected'|'connecting'|'disconnected'|'disabled')
 * @returns {Echo|null}
 */
window.createTeslokaEcho = function (config, callbacks = {}) {
    const notifyState = typeof callbacks.onStateChange === 'function' ? callbacks.onStateChange : () => {};

    if (!config || !config.enabled || !config.key) {
        notifyState('disabled');
        return null;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    try {
        notifyState('connecting');

        const echo = new Echo({
            broadcaster: 'reverb',
            key: config.key,
            wsHost: config.wsHost || window.location.hostname,
            wsPort: Number(config.wsPort || 8080),
            wssPort: Number(config.wssPort || 443),
            forceTLS: Boolean(config.forceTLS),
            enabledTransports: ['ws', 'wss'],
            authEndpoint: config.authEndpoint || '/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            },
        });

        const conn = echo.connector?.pusher?.connection;
        if (conn && typeof conn.bind === 'function') {
            conn.bind('connected', () => notifyState('connected'));
            conn.bind('connecting', () => notifyState('connecting'));
            conn.bind('unavailable', () => notifyState('disconnected'));
            conn.bind('failed', () => notifyState('disconnected'));
            conn.bind('disconnected', () => notifyState('disconnected'));
            conn.bind('error', () => notifyState('disconnected'));
        }

        return echo;
    } catch (err) {
        console.warn('Inisialisasi Laravel Echo gagal, menggunakan fallback HTTP polling:', err);
        notifyState('disconnected');
        return null;
    }
};

/**
 * Mesin WebRTC SFU Publisher untuk perangkat Peserta Ujian (publish-only, hemat bandwidth).
 */
window.TeslokaStudentLiveKit = {
    room: null,

    async connect({ url, token, stream, videoProfile = {}, onStateChange = () => {} }) {
        this.disconnect();

        if (!url || !token || !stream) {
            onStateChange('unavailable');
            return null;
        }

        const videoTrack = stream.getVideoTracks()[0];
        if (!videoTrack) {
            onStateChange('no_track');
            return null;
        }

        try {
            onStateChange('connecting');
            const room = new Room({
                adaptiveStream: true,
                dynacast: true,
            });

            room.on(RoomEvent.Disconnected, () => {
                onStateChange('disconnected');
            });
            room.on(RoomEvent.Reconnecting, () => {
                onStateChange('reconnecting');
            });
            room.on(RoomEvent.Reconnected, () => {
                onStateChange('streaming');
            });

            await room.connect(url, token);

            await room.localParticipant.publishTrack(videoTrack, {
                name: 'camera',
                source: Track.Source.Camera,
                simulcast: true,
                videoEncoding: {
                    maxBitrate: Number(videoProfile.max_bitrate || 250000),
                    maxFramerate: Number(videoProfile.frame_rate || 12),
                },
            });

            this.room = room;
            onStateChange('streaming');
            return room;
        } catch (err) {
            console.warn('Koneksi LiveKit peserta gagal, beralih ke mode snapshot:', err);
            onStateChange('failed');
            return null;
        }
    },

    disconnect() {
        if (this.room) {
            try {
                this.room.disconnect();
            } catch (e) {}
            this.room = null;
        }
    },
};

/**
 * Mesin WebRTC SFU Subscriber untuk Grid Kamera Pengawas (adaptif Low di Grid, High di Zoom Modal).
 */
window.TeslokaProctorLiveKit = {
    room: null,
    publicationsByStudentId: new Map(),
    tracksByStudentId: new Map(),

    parseStudentId(participant) {
        try {
            if (participant?.metadata) {
                const meta = JSON.parse(participant.metadata);
                if (meta && meta.student_id) {
                    return Number(meta.student_id);
                }
            }
        } catch (e) {}

        const match = String(participant?.identity || '').match(/^student-(\d+)/);
        return match ? Number(match[1]) : null;
    },

    async connect({
        url,
        token,
        onTrackAttached = () => {},
        onTrackDetached = () => {},
        onStateChange = () => {},
    }) {
        this.disconnect();

        if (!url || !token) {
            onStateChange('disabled');
            return null;
        }

        try {
            onStateChange('connecting');
            const room = new Room({
                adaptiveStream: true,
                dynacast: true,
            });

            room.on(RoomEvent.TrackSubscribed, (track, publication, participant) => {
                if (track.kind !== Track.Kind.Video) return;
                const studentId = this.parseStudentId(participant);
                if (!studentId) return;

                try {
                    if (typeof publication.setVideoQuality === 'function') {
                        publication.setVideoQuality(VideoQuality.LOW);
                    }
                } catch (e) {}

                this.publicationsByStudentId.set(studentId, publication);
                this.tracksByStudentId.set(studentId, track);
                onTrackAttached(studentId, track, publication);
            });

            room.on(RoomEvent.TrackUnsubscribed, (track, publication, participant) => {
                if (track.kind !== Track.Kind.Video) return;
                const studentId = this.parseStudentId(participant);
                if (!studentId) return;

                this.publicationsByStudentId.delete(studentId);
                this.tracksByStudentId.delete(studentId);
                onTrackDetached(studentId, track);
            });

            room.on(RoomEvent.ParticipantDisconnected, (participant) => {
                const studentId = this.parseStudentId(participant);
                if (!studentId) return;
                const track = this.tracksByStudentId.get(studentId);
                this.publicationsByStudentId.delete(studentId);
                this.tracksByStudentId.delete(studentId);
                onTrackDetached(studentId, track || null);
            });

            room.on(RoomEvent.Disconnected, () => onStateChange('disconnected'));
            room.on(RoomEvent.Reconnecting, () => onStateChange('reconnecting'));
            room.on(RoomEvent.Reconnected, () => onStateChange('connected'));

            await room.connect(url, token);
            this.room = room;
            onStateChange('connected');
            return room;
        } catch (err) {
            console.warn('Koneksi LiveKit pengawas gagal, fallback ke mode snapshot:', err);
            onStateChange('disconnected');
            return null;
        }
    },

    setStudentQuality(studentId, high = false) {
        const pub = this.publicationsByStudentId.get(Number(studentId));
        if (pub && typeof pub.setVideoQuality === 'function') {
            try {
                pub.setVideoQuality(high ? VideoQuality.HIGH : VideoQuality.LOW);
            } catch (e) {}
        }
    },

    getTrack(studentId) {
        return this.tracksByStudentId.get(Number(studentId)) || null;
    },

    disconnect() {
        this.publicationsByStudentId.clear();
        this.tracksByStudentId.clear();
        if (this.room) {
            try {
                this.room.disconnect();
            } catch (e) {}
            this.room = null;
        }
    },
};
