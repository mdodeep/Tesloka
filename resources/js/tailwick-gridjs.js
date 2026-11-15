import { Grid, html } from 'gridjs';
import { createIcons, icons } from 'lucide';

/**
 * Tailwick Grid.js Standard Integration for TESLOKA CBT
 *
 * Mengonversi elemen <table> standar menjadi Grid.js interaktif berstandar Tailwick:
 * - Pencarian cepat (Global Search)
 * - Pengurutan kolom (Sorting)
 * - Paginasi data (Pagination)
 * - Penyesuaian lebar kolom (Resizable)
 * - Pelestarian elemen interaktif HTML (Form, Tombol Aksi, Checkbox, Badge, Link, Modal Triggers)
 * - Rehidrasi otomatis ikon Lucide pada setiap perubahan state DOM
 */
export function initTailwickGrid(table, options = {}) {
    if (!table || table._gridjsInitialized) return null;

    // Baca konfigurasi dari atribut data-* tabel atau options
    const searchEnabled = options.search ?? (table.dataset.gridjsSearch !== 'false');
    const sortEnabled = options.sort ?? (table.dataset.gridjsSort !== 'false');
    const paginationEnabled = options.pagination ?? (table.dataset.gridjsPagination !== 'false');
    const pageSize = options.pageSize ?? parseInt(table.dataset.gridjsPageSize || '10', 10);
    const resizableEnabled = options.resizable ?? (table.dataset.gridjsResizable !== 'false');

    // Ekstraksi header kolom dari thead
    const ths = Array.from(table.querySelectorAll('thead th'));
    if (ths.length === 0) return null;

    const columns = ths.map(th => {
        const text = th.innerText.trim().toLowerCase();
        const hasCheckbox = !!th.querySelector('input[type="checkbox"]');
        const isAction = ['aksi', 'action', 'tindakan', 'opsi'].includes(text) || th.dataset.sort === 'false' || hasCheckbox;

        return {
            name: html(th.innerHTML),
            sort: sortEnabled && !isAction,
            width: th.dataset.width || th.getAttribute('width') || (hasCheckbox ? '52px' : undefined)
        };
    });

    // Ekstraksi baris data dari tbody
    const trs = Array.from(table.querySelectorAll('tbody tr'));
    // Filter out empty state placeholder row jika ada (e.g. td dengan colspan)
    const validRows = trs.filter(tr => {
        const singleTd = tr.querySelector('td[colspan]');
        return !singleTd;
    });

    const data = validRows.map(tr => {
        return Array.from(tr.querySelectorAll('td')).map(td => html(td.innerHTML));
    });

    // Buat container wrapper Grid.js tepat sebelum tabel (atau pembungkus overflow-nya)
    const gridContainer = document.createElement('div');
    gridContainer.className = 'gridjs-auto-wrapper w-full';

    const parent = table.parentElement;
    const isOverflowParent = parent && (parent.classList.contains('overflow-x-auto') || parent.classList.contains('table-responsive'));

    if (isOverflowParent) {
        parent.parentNode.insertBefore(gridContainer, parent);
        parent.classList.add('hidden');
        parent.style.display = 'none';
    } else {
        table.parentNode.insertBefore(gridContainer, table);
        table.classList.add('hidden');
        table.style.display = 'none';
    }

    // Sembunyikan pagination bawaan Blade jika ada persis di bawah container tabel
    const targetWrapper = isOverflowParent ? parent : table;
    const nextSibling = targetWrapper.nextElementSibling;
    if (nextSibling && (nextSibling.querySelector('nav') || nextSibling.matches('nav') || nextSibling.classList.contains('pagination-footer'))) {
        nextSibling.classList.add('hidden');
        nextSibling.style.display = 'none';
    }

    const gridConfig = {
        columns: columns,
        data: data,
        sort: sortEnabled,
        resizable: resizableEnabled,
        language: {
            search: {
                placeholder: table.dataset.gridjsPlaceholder || 'Cari data...'
            },
            sort: {
                sortAsc: 'Urutkan kolom menaik',
                sortDesc: 'Urutkan kolom menurun'
            },
            pagination: {
                previous: 'Sebelumnya',
                next: 'Berikutnya',
                showing: 'Menampilkan',
                of: 'dari',
                to: 'sampai',
                results: () => 'data'
            },
            loading: 'Memuat data...',
            noRecordsFound: 'Tidak ada data yang ditemukan',
            error: 'Terjadi kesalahan saat memuat data'
        }
    };

    if (searchEnabled) {
        gridConfig.search = true;
    }

    if (paginationEnabled && data.length > 0) {
        gridConfig.pagination = {
            limit: pageSize
        };
    }

    // Observer untuk re-render ikon Lucide tanpa infinite loop
    let isUpdatingLucide = false;
    const observer = new MutationObserver((mutations) => {
        if (isUpdatingLucide) return;
        const hasLucide = mutations.some(m =>
            Array.from(m.addedNodes).some(n => n.nodeType === 1 && (n.hasAttribute?.('data-lucide') || n.querySelector?.('[data-lucide]')))
        );
        if (hasLucide) {
            isUpdatingLucide = true;
            createIcons({ icons });
            setTimeout(() => { isUpdatingLucide = false; }, 50);
        }
    });
    observer.observe(gridContainer, { childList: true, subtree: true });

    const grid = new Grid(gridConfig).render(gridContainer);
    table._gridjsInitialized = true;
    table._gridjsInstance = grid;

    // Trigger icon creation setelah render awal
    setTimeout(() => {
        createIcons({ icons });
    }, 100);

    return grid;
}

export function initTailwickGridTables() {
    const selector = 'table[data-gridjs="true"], table.table-gridjs';
    const tables = document.querySelectorAll(selector);
    tables.forEach(table => initTailwickGrid(table));
}
