// Open Modal Function
function openUpdateModal(productId) {
    // Send an AJAX request to fetch product data by ID
    fetch(`../../admin/admincomponents/fetch_product_data.php?id=${productId}`)
    .then(response => response.json())
    .then(data => {
    if (data.error) {
    alert(data.error); // If no data is found
    return;
    }
    // Populate the modal with the data
    document.getElementById('productName').value = data.productName || '';
    document.getElementById('productCategory').value = data.productCategory || '';
    document.getElementById('productPrice').value = data.productPrice || '';
    document.getElementById('productStock').value = data.productStock || '';
    
    // Show the modal
    document.getElementById('updateModal').style.display = 'flex';
    })
    .catch(error => {
    console.error('Error fetching product data:', error);
    });
    }
    
    // Close Modal Function
    function closeUpdateModal() {
    document.getElementById('updateModal').style.display = 'none';
    }
    
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