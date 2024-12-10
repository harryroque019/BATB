 // Filter Table by Category
 function filterTableByCategory(category) {
    const tableRows = document.querySelectorAll('table tr');
    tableRows.forEach((row, index) => {
    if (index === 0) return; // Skip the header row
    const cellCategory = row.querySelector('td:nth-child(1)');
    if (category === "" || cellCategory.textContent.trim() === category) {
    row.style.display = 'table-row';
    } else {
    row.style.display = 'none';
    }
    });
    }