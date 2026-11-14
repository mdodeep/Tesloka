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

    /* Penyesuaian Utilitas Warna Sekunder */
    .bg-secondary { background-color: var(--color-secondary) !important; }
    .text-secondary { color: var(--color-secondary) !important; }
    .border-secondary { border-color: var(--color-secondary) !important; }

    /* Tombol & Aksen Antarmuka */
    .btn-primary {
        background-color: var(--color-primary) !important;
        border-color: var(--color-primary) !important;
        color: #ffffff !important;
    }
    .btn-primary:hover {
        background-color: var(--color-primary-hover) !important;
        border-color: var(--color-primary-hover) !important;
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

