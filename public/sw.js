// TESLOKA CBT - Service Worker for Offline Resilience (FULL-FEATURE 70.3)
const CACHE_NAME = 'tesloka-cbt-v1';
const STATIC_ASSETS = [
    '/offline.html',
    '/assets/fonts/sora.ttf',
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(STATIC_ASSETS);
        }).then(() => self.skipWaiting())
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys.map((key) => {
                    if (key !== CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

self.addEventListener('fetch', (event) => {
    // Only handle GET requests
    if (event.request.method !== 'GET') {
        return;
    }

    // Do not intercept API or heartbeat requests
    const url = new URL(event.request.url);
    if (url.pathname.includes('/api/') || url.pathname.includes('/autosave') || url.pathname.includes('/heartbeat')) {
        return;
    }

    event.respondWith(
        fetch(event.request)
            .catch(() => {
                // If navigation request fails, serve offline.html
                if (event.request.mode === 'navigate') {
                    return caches.match('/offline.html');
                }
                return caches.match(event.request);
            })
    );
});

