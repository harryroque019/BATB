// local storage retrieval
let cartData = JSON.parse(localStorage.getItem('cartData')) || [];

// cart display functionality
function updateCart() {
    const cartContainer = document.getElementById('cartContainer');
    const emptyCartMessage = document.getElementById('emptyCartMessage');
    cartContainer.innerHTML = ''; // clearing the cart container

    if (cartData.length > 0) {
        cartData.forEach((item, index) => {
            const productDiv = document.createElement('div');
            productDiv.className = 'cart-container'; // HTML external structure
            productDiv.innerHTML = `
            <div class="panel-container">
                <div class="cart-panel-left">
                    <img src="${item.image}" alt="${item.name}">
                    <div class="product-info">
                        <h2>${item.name}</h2>
                        <div class="price-wishlist">
                            <p>₱ ${item.price}</p>
                            <img src="images/svg/wishlistIcon.png" alt="" class="wishlistIconFill">
                        </div>
                    </div>
                </div>
                <div class="cart-panel-right">
                    <div class="total-product-content">
                        <div class="quantity-container-btn">
                            <div class="decreasing-btn" data-index="${index}">-</div>
                            <div class="line"></div>
                            <div class="quantity-value" data-index="${index}">${item.quantity}</div>
                            <div class="line"></div>
                            <div class="adding-btn" data-index="${index}">+</div>
                        </div>
                        <p>Total: ₱ <span class="total-price" data-index="${index}">${(item.price * item.quantity).toFixed(2)}</span></p>
                    </div>
                    <div class="cart-buttons">
                        <button class="buy-btn" data-index="${index}">Buy Now</button>
                        <button class="remove-btn" data-index="${index}">Remove</button>
                    </div>
                </div>
            </div>
            `;
            cartContainer.appendChild(productDiv);
        });
        emptyCartMessage.style.display = 'none';
    } else {
        emptyCartMessage.style.display = 'block';
    }

    // Add event listeners for the Buy Now buttons
    const buyBtns = document.querySelectorAll('.buy-btn');
    buyBtns.forEach(btn => {
        btn.addEventListener('click', openModal);
    });
}

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

// Open modal function
function openModal(event) {
    modal.style.display = 'block';
    document.body.classList.add('no-scroll');
}

// Close modal function
function closeModal() {
    modal.style.display = 'none';
    document.body.classList.remove('no-scroll');
}

// Ensure modal is hidden initially
window.addEventListener("load", () => {
    modal.style.display = "none";
    document.body.classList.remove("no-scroll");
});

// Event listener for responsive buttons
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('remove-btn')) {
        const index = event.target.getAttribute('data-index');
        removeItemFromCart(index);
    } else if (event.target.classList.contains('decreasing-btn')) {
        const index = event.target.getAttribute('data-index');
        const quantityValue = document.querySelector(`.quantity-value[data-index="${index}"]`);
        const newQuantity = parseInt(quantityValue.innerText) - 1;
        updateQuantity(index, newQuantity);
    } else if (event.target.classList.contains('adding-btn')) {
        const index = event.target.getAttribute('data-index');
        const quantityValue = document.querySelector(`.quantity-value[data-index="${index}"]`);
        const newQuantity = parseInt(quantityValue.innerText) + 1;
        updateQuantity(index, newQuantity);
    }
});

// Rendering initial cart display from function 
updateCart();

// Modal functionality
const modal = document.querySelector(".modal-container");
const span = document.querySelector(".close");
const saveBtn = document.querySelector(".save-btn");

// Close modal when clicking on close button or outside the modal
span.addEventListener('click', closeModal);
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        closeModal();
    }
});
