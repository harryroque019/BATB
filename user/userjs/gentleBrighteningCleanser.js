let quantity = 1;

const decreasingBtn = document.querySelector('.decreasing-btn');
const increasingBtn = document.querySelector('.adding-btn');
const quantityValue = document.querySelector('.quantity-value');
const addToCartBtn = document.getElementById('addToCartBtn');
const buyNowBtn = document.getElementById('buyNowBtn');
const modal = document.querySelector(".modal-container");
const buyBtn = document.querySelector(".buy-now-btn");
const closeBtn = document.querySelector(".close");
const saveBtn = document.querySelector(".save-btn");

if (decreasingBtn && quantityValue) {
    decreasingBtn.addEventListener('click', () => {
        if (quantity > 1) {
            quantity--;
            quantityValue.innerText = quantity;
        }
    });
}

if (increasingBtn && quantityValue) {
    increasingBtn.addEventListener('click', () => {
        quantity++;
        quantityValue.innerText = quantity;
    });
}

// Ensure modal is hidden initially
window.addEventListener("load", () => {
    if (modal) {
        modal.style.display = "none";
    }
});

// Show modal and disable background scrolling
if (buyBtn) {
    buyBtn.addEventListener("click", () => {
        modal.style.display = "block";
        document.body.classList.add("no-scroll");
    });
}

// Hide modal and enable background scrolling
if (closeBtn) {
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
        document.body.classList.remove("no-scroll");
    });
}

if (saveBtn) {
    saveBtn.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent form submission
        modal.style.display = "none";
        document.body.classList.remove("no-scroll");
    });
}

// Hide modal and enable background scrolling when clicking outside the modal
window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
        document.body.classList.remove("no-scroll");
    }
});

if (addToCartBtn) {
    addToCartBtn.addEventListener('click', () => {
        const item = {
            name: 'Gentle Brightening Cleanser',
            description: 'The Radiance Boost Serum, featuring key ingredients like Vitamin C, turmeric, niacinamide, olive leaf extract, and tamarind, brightens skin tone, hydrates, reduces fine lines, improves texture, protects against environmental stressors, and soothes irritation for a youthful and radiant complexion.',
            price: 199,
            image: 'images/product-items/facial-wash/facial-cleanser-1.png',
            quantity: quantity
        };
        addItemToCart(item);
        alert('Item added to cart!');
    });
}

function addItemToCart(item) {
    let cartData = JSON.parse(localStorage.getItem('cartData')) || [];
    cartData.push(item);
    localStorage.setItem('cartData', JSON.stringify(cartData));
}

// Recommended items functionality
const recommendedItems = document.querySelectorAll('.recommended-items');

let scrollDrag = false;
let scrollStart;
let xScrollLeft;

function setupDraggableScrolling(brand) {
    brand.addEventListener('mousedown', (e) => {
        scrollDrag = true;
        scrollStart = e.pageX - brand.offsetLeft;
        xScrollLeft = brand.scrollLeft;
    });

    brand.addEventListener('mouseleave', () => { scrollDrag = false; });
    brand.addEventListener('mouseup', () => { scrollDrag = false; });

    brand.addEventListener('mousemove', (e) => {
        if (!scrollDrag) return;
        e.preventDefault();
        const x = e.pageX - brand.offsetLeft;
        const walk = (x - scrollStart) * 1; // Adjust scroll speed
        brand.scrollLeft = xScrollLeft - walk;
    });
}

recommendedItems.forEach(brand => {
    setupDraggableScrolling(brand);
});

// Draggable Images functionality
const images = document.querySelectorAll('.recommended-product-image img');
images.forEach(image => {
    image.addEventListener('mousedown', (e) => {
        e.preventDefault(); // Prevent default behavior
        let isDragging = true;

        const mouseMoveHandler = (event) => {
            if (isDragging) {
                event.preventDefault();
                console.log("image dragged"); // working!
            }
        };

        const mouseUpHandler = () => {
            isDragging = false; // Stop dragging
            document.removeEventListener('mousemove', mouseMoveHandler);
            document.removeEventListener('mouseup', mouseUpHandler);
        };

        document.addEventListener('mousemove', mouseMoveHandler);
        document.addEventListener('mouseup', mouseUpHandler);
    });
});

// Pagination functionality
const paginationPage = document.querySelectorAll('.recommended-items');
const paginationDots = document.querySelectorAll('.page-dot');
const recommendedItemsContainer = document.querySelector('.recommended-items-container');

const itemsPerPage = 2.5;

paginationPage.forEach(brand => {
    brand.addEventListener('scroll', () => {
        const scrollPosition = brand.scrollLeft;
        const containerWidth = brand.clientWidth;

        // Get the width of the first item
        const firstItem = brand.querySelector('.recommended-item-1');
        const itemWidth = firstItem ? firstItem.getBoundingClientRect().width : 0;

        // Calculate the total number of items
        const totalItems = brand.children.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        // Calculate the index of the active pagination dot
        const index = Math.floor(scrollPosition / (itemWidth * itemsPerPage));

        // Ensure the index is within bounds
        const activeIndex = Math.min(index, totalPages - 1);

        // Update active pagination dot
        paginationDots.forEach((dot, i) => {
            dot.classList.toggle('active', i === activeIndex);
        });
    });
});

paginationDots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        const firstRecommendedItem = recommendedItemsContainer.querySelector('.recommended-item-1');
        const itemWidth = firstRecommendedItem ? firstRecommendedItem.getBoundingClientRect().width : 0;
        const scrollToPosition = i * (itemWidth * Math.floor(recommendedItemsContainer.clientWidth / itemWidth));
        
        recommendedItemsContainer.scrollTo({
            left: scrollToPosition,
        });
    });
});