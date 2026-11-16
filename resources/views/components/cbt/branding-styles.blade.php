@php
    $brandingPrimary = \App\Models\SystemSetting::get('branding.primary_color', '#2e33ff');
    $brandingSecondary = \App\Models\SystemSetting::get('branding.secondary_color', '#14213d');

    // Sanitasi dan normalisasi kode warna Hex
    $normalizeHex = function ($color, $default) {
        $color = trim((string) $color);
        if (!str_starts_with($color, '#')) {
            $color = '#' . $color;
        }
        if (preg_match('/^#([0-9a-fA-F]{3})$/', $color, $m)) {
            $color = '#' . $m[1][0] . $m[1][0] . $m[1][1] . $m[1][1] . $m[1][2] . $m[1][2];
        }
        return preg_match('/^#[0-9a-fA-F]{6}$/', $color) ? strtolower($color) : $default;
    };

    $primary = $normalizeHex($brandingPrimary, '#2e33ff');
    $secondary = $normalizeHex($brandingSecondary, '#14213d');
@endphp
<style id="cbt-branding-styles">
    :root {
        --color-primary: {{ $primary }};
        --color-primary-hover: color-mix(in srgb, {{ $primary }} 85%, black);
        --color-primary-50: color-mix(in srgb, {{ $primary }} 8%, white);
        --color-primary-100: color-mix(in srgb, {{ $primary }} 15%, white);
        --color-primary-200: color-mix(in srgb, {{ $primary }} 30%, white);
        --color-primary-300: color-mix(in srgb, {{ $primary }} 45%, white);
        --color-primary-400: color-mix(in srgb, {{ $primary }} 65%, white);
        --color-primary-500: {{ $primary }};
        --color-primary-600: {{ $primary }};
        --color-primary-700: color-mix(in srgb, {{ $primary }} 85%, black);
        --color-primary-800: color-mix(in srgb, {{ $primary }} 70%, black);
        --color-primary-900: color-mix(in srgb, {{ $primary }} 55%, black);
        --color-primary-950: color-mix(in srgb, {{ $primary }} 35%, black);

        --color-secondary: {{ $secondary }};
        --color-navy: {{ $secondary }};

        --sidenav-item-active-color: {{ $primary }};
        --sidenav-item-active-bg: color-mix(in srgb, {{ $primary }} 10%, transparent);
        --sidenav-item-hover-color: {{ $primary }};
        --sidenav-item-hover-bg: color-mix(in srgb, {{ $primary }} 6%, transparent);
    }

    /* Penyesuaian Utilitas Warna Primer */
    .bg-primary { background-color: var(--color-primary) !important; }
    .hover\:bg-primary-hover:hover { background-color: var(--color-primary-hover) !important; }
    .hover\:bg-primary-600:hover { background-color: var(--color-primary-hover) !important; }
    .text-primary { color: var(--color-primary) !important; }
    .text-primary-600 { color: var(--color-primary) !important; }
    .border-primary { border-color: var(--color-primary) !important; }
    .ring-primary { --tw-ring-color: var(--color-primary) !important; }
    .focus\:ring-primary:focus { --tw-ring-color: var(--color-primary) !important; }

    /* Hover Utility Overrides & Color Contrast Guarantees */
    .hover\:text-white:hover { color: #ffffff !important; }
    .hover\:text-white:hover * { color: #ffffff !important; stroke: #ffffff !important; }
    .hover\:text-primary:hover { color: var(--color-primary) !important; }
    .hover\:text-primary-hover:hover { color: var(--color-primary-hover) !important; }

    /* Ketika elemen beralih ke background primary saat hover, pastikan teks dan icon kontras putih bersih */
    .hover\:bg-primary:hover {
        background-color: var(--color-primary) !important;
        color: #ffffff !important;
    }
    .hover\:bg-primary:hover svg,
    .hover\:bg-primary:hover i,
    .hover\:bg-primary:hover span {
        color: #ffffff !important;
        stroke: #ffffff !important;
    }

    /* Penyesuaian Utilitas Warna Sekunder */
    .bg-secondary { background-color: var(--color-secondary) !important; }
    .text-secondary { color: var(--color-secondary) !important; }
    .border-secondary { border-color: var(--color-secondary) !important; }

    /* Tombol & Aksen Antarmuka */
    .btn-primary,
    .btn.bg-primary,
    button.bg-primary,
    a.btn.bg-primary {
        background-color: var(--color-primary) !important;
        border-color: var(--color-primary) !important;
        color: #ffffff !important;
    }
    .btn-primary:hover,
    .btn.bg-primary:hover,
    button.bg-primary:hover,
    a.btn.bg-primary:hover,
    .btn-primary:focus,
    .btn.bg-primary:focus {
        background-color: var(--color-primary-hover) !important;
        border-color: var(--color-primary-hover) !important;
        color: #ffffff !important;
    }
    .btn-primary svg,
    .btn.bg-primary svg,
    button.bg-primary svg,
    a.btn.bg-primary svg {
        stroke: currentColor;
    }
    .btn-primary:hover svg,
    .btn.bg-primary:hover svg,
    button.bg-primary:hover svg,
    a.btn.bg-primary:hover svg {
        stroke: #ffffff !important;
    }

    /* Navigasi Tab & Menu Aktif */
    .tab-btn.border-primary {
        border-color: var(--color-primary) !important;
        color: var(--color-primary) !important;
    }
    .side-nav .side-nav-item.active > .side-nav-link {
        color: var(--color-primary) !important;
        background-color: var(--sidenav-item-active-bg) !important;
    }
    .side-nav .side-nav-item.active > .side-nav-link > .menu-icon {
        color: var(--color-primary) !important;
    }
</style>

