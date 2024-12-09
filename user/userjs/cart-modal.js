function openModal(button) {
    const modal = document.getElementById('modal-container');
    const productName = button.getAttribute('data-product-name');
    const productPrice = button.getAttribute('data-product-price');
    const productImage = button.getAttribute('data-product-image');

    // Set product information in modal
    document.getElementById('product-info').innerHTML = `
        <p><strong>${productName}</strong></p>
        <p>Price: ₱${productPrice}</p>
        <img src="../../allasset/${productImage}" alt="${productName}" style="width:100px;">
    `;

    // Store the selected product details as hidden inputs
    document.getElementById('selectedProductName').value = productName;
    document.getElementById('selectedProductPrice').value = productPrice;
    document.getElementById('selectedProductImage').value = productImage;

    modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
    document.getElementById('modal-container').style.display = 'none';
}