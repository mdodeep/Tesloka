@props([
    'remainingSeconds' => 3600,
    'serverNowIso' => null,
])

<div
    x-data="{
        timeLeft: {{ (int) $remainingSeconds }},
        formatTime() {
            let h = Math.floor(this.timeLeft / 3600);
            let m = Math.floor((this.timeLeft % 3600) / 60);
            let s = this.timeLeft % 60;
            return [
                h > 0 ? String(h).padStart(2, '0') : null,
                String(m).padStart(2, '0'),
                String(s).padStart(2, '0')
            ].filter(Boolean).join(':');
        },
        init() {
            let timer = setInterval(() => {
                if (this.timeLeft > 0) {
                    this.timeLeft--;
                } else {
                    clearInterval(timer);
                    window.dispatchEvent(new CustomEvent('cbt-timer-expired'));
                }
            }, 1000);
        }
    }"
    class="inline-flex items-center gap-2 px-3 py-1 rounded border font-mono font-semibold text-xs transition-all shadow-xs"
    :class="{
        'bg-card border-default-200 text-default-800': timeLeft > 600,
        'bg-warning/10 border-warning/30 text-warning animate-pulse': timeLeft <= 600 && timeLeft > 300,
        'bg-danger/10 border-danger/30 text-danger animate-pulse': timeLeft <= 300
    }"
>
    <i data-lucide="clock" class="size-3.5 shrink-0"></i>
    <span x-text="formatTime()">--:--</span>
</div>
