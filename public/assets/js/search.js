// public/js/searchTable.js
function searchTable(input, tableId) {
    const filter = input.value.toLowerCase();
    const rows = document.querySelectorAll(`#${tableId} tbody tr`);

    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let match = false;

        for (let i = 0; i < cells.length; i++) {
            if (cells[i].innerText.toLowerCase().includes(filter)) {
                match = true;
                break;
            }
        }

        row.style.display = match ? '' : 'none'; // Menampilkan atau menyembunyikan baris
    });
}

// Menambahkan event listener untuk semua input pencarian
document.addEventListener('DOMContentLoaded', () => {
    // Ambil semua input pencarian dengan class 'search-input'
    const searchInputs = document.querySelectorAll('.search-input');
    
    searchInputs.forEach(input => {
        // Ambil ID tabel dari atribut data-input
        const tableId = input.dataset.tableId; 
        input.addEventListener('keyup', () => {
            searchTable(input, tableId);
        });
    });
});
