/**
 * Modern Design System Engine
 * Ported from template-envato/src/assets/js/app.js
 */

export class CbtApp {
    initSidenav() {
        const pageUrl = window.location.href.split(/[?#]/)[0];
        document.querySelectorAll("ul.side-nav .menu-item > a").forEach((element) => {
            if (element.href === pageUrl) {
                element.classList.add("active");
                const parentLi = element.closest(".menu-item");
                if (parentLi) {
                    parentLi.classList.add("active");
                }
                let parentAccordion = element.closest(".hs-accordion");
                while (parentAccordion) {
                    parentAccordion.classList.add("active");
                    const toggle = parentAccordion.querySelector(":scope > .hs-accordion-toggle");
                    if (toggle) {
                        toggle.classList.add("active");
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                    const submenu = parentAccordion.querySelector(":scope > .hs-accordion-content");
                    if (submenu) {
                        submenu.classList.remove("hidden");
                    }
                    parentAccordion = parentAccordion.parentElement?.closest(".hs-accordion");
                }
            }
        });
    }

    initFullScreen() {
        function getFsElement() {
            return document.fullscreenElement || document.webkitFullscreenElement;
        }

        function enterFullscreen(el) {
            if (el.requestFullscreen) {
                return el.requestFullscreen();
            } else if (el.webkitRequestFullscreen) {
                return el.webkitRequestFullscreen();
            }
        }

        function exitFullscreen() {
            if (document.exitFullscreen) {
                return document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                return document.webkitExitFullscreen();
            }
        }

        function toggleFullscreen(el) {
            if (getFsElement()) {
                exitFullscreen();
            } else {
                enterFullscreen(el);
            }
        }

        document.addEventListener("click", function (e) {
            const trigger = e.target.closest('[data-toggle="fullscreen"]');
            if (trigger) {
                e.preventDefault();
                toggleFullscreen(document.documentElement);
            }
        });
    }

    init() {
        this.initSidenav();
        this.initFullScreen();
    }
}

export class CbtLayout {
    constructor() {
        this.html = document.documentElement;
        this.defaultConfig = {
            dir: "ltr",
            theme: "light",
            sidenav: {
                color: "light",
                size: "default",
            },
        };
        this.config = Object.assign({}, this.defaultConfig);
    }

    init() {
        this.initSwitchListener();
        this.initWindowSize();
        this._adjustLayout();
    }

    showBackdrop() {
        if (document.getElementById('custom-backdrop')) return;
        const backdrop = document.createElement('div');
        backdrop.id = 'custom-backdrop';
        backdrop.className = 'fixed inset-0 bg-default-900/60 backdrop-blur-xs z-40 transition-opacity duration-300 opacity-0';
        document.body.appendChild(backdrop);
        
        // Trigger reflow for smooth fade-in transition
        window.getComputedStyle(backdrop).opacity;
        backdrop.classList.remove('opacity-0');
        backdrop.classList.add('opacity-100');

        backdrop.addEventListener('click', () => {
            this.closeMobileSidebar();
        });
    }

    hideBackdrop() {
        const backdrop = document.getElementById('custom-backdrop');
        if (backdrop) {
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            setTimeout(() => {
                if (backdrop && backdrop.parentNode) {
                    backdrop.parentNode.removeChild(backdrop);
                }
            }, 250);
        }
    }

    openMobileSidebar() {
        this.html.setAttribute('data-sidenav-size', 'offcanvas');
        this.html.classList.add('sidenav-enable');
        const toggleBtn = document.querySelector('#button-toggle-menu');
        if (toggleBtn) toggleBtn.setAttribute('aria-expanded', 'true');
        this.showBackdrop();
    }

    closeMobileSidebar(restoreFocus = false) {
        this.html.classList.remove('sidenav-enable');
        const toggleBtn = document.querySelector('#button-toggle-menu');
        if (toggleBtn) {
            toggleBtn.setAttribute('aria-expanded', 'false');
            if (restoreFocus && window.innerWidth <= 1024) {
                toggleBtn.focus();
            }
        }
        this.hideBackdrop();
    }

    _toggleSidebar() {
        const width = window.innerWidth;
        if (width <= 1024) {
            // Mode Mobile: langsung buka/tutup offcanvas menu penuh dengan backdrop (bukan mode icon-only mini rail)
            if (this.html.classList.contains('sidenav-enable')) {
                this.closeMobileSidebar();
            } else {
                this.openMobileSidebar();
            }
        } else {
            // Mode Desktop: toggle antara ukuran default (normal) dan sm (mini sidebar)
            const current = this.html.getAttribute('data-sidenav-size') || 'default';
            const newSize = current === 'sm' ? 'default' : 'sm';
            this.html.setAttribute('data-sidenav-size', newSize);
            try {
                localStorage.setItem('tesloka_sidenav_size', newSize);
            } catch (e) {}
        }
    }

    _adjustLayout() {
        const width = window.innerWidth;
        if (width <= 1024) {
            this.html.setAttribute('data-sidenav-size', 'offcanvas');
            if (!this.html.classList.contains('sidenav-enable')) {
                this.hideBackdrop();
            }
        } else {
            this.html.classList.remove('sidenav-enable');
            this.hideBackdrop();
            let savedSize = 'default';
            try {
                savedSize = localStorage.getItem('tesloka_sidenav_size') || 'default';
            } catch (e) {}
            this.html.setAttribute('data-sidenav-size', savedSize);
        }
    }

    initSwitchListener() {
        const toggleBtn = document.querySelector('#button-toggle-menu');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => this._toggleSidebar());
        }

        const closeBtn = document.querySelector('#button-close-mobile-menu');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => this.closeMobileSidebar(true));
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.html.classList.contains('sidenav-enable')) {
                this.closeMobileSidebar(true);
            }
        });

        // Tutup otomatis drawer mobile saat pengguna mengklik item menu
        document.querySelectorAll('#staffSidebarNav a.menu-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 1024) {
                    this.closeMobileSidebar();
                }
            });
        });
    }

    initWindowSize() {
        window.addEventListener('resize', () => this._adjustLayout());
    }
}

