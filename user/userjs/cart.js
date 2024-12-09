// local storage retrieval
let cartData = JSON.parse(localStorage.getItem('cartData')) || [];


// Function to update quantity and total price
function updateQuantity(index, newQuantity) {
    if (newQuantity < 1) return; // Prevent quantity from going below 1
    cartData[index].quantity = newQuantity;
    localStorage.setItem('cartData', JSON.stringify(cartData));
    updateCart();
}

// Functionality for removing items
function removeItemFromCart(index) {
    cartData.splice(index, 1);
    localStorage.setItem('cartData', JSON.stringify(cartData));
    updateCart();
}