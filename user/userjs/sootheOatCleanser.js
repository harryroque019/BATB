let quantity = 1;

document.querySelector('.decreasing-btn').addEventListener('click', () => {
    if (quantity > 1) {
        quantity--;
        document.querySelector('.quantity-value').innerText = quantity;
    }
});

document.querySelector('.adding-btn').addEventListener('click', () => {
    quantity++;
    document.querySelector('.quantity-value').innerText = quantity;
});

document.getElementById('addToCartBtn').addEventListener('click', () => {
    const item = {
        name: 'Calm + Soothe Oat Cleanser',
        description: 'The Calm + Soothe Oat Cleanser from Soul Apothecary is a gentle, nourishing formula designed to cleanse and soothe sensitive skin. Enriched with oat extracts, this creamy cleanser helps to reduce redness and irritation while effectively removing impurities and makeup. Its hydrating properties leave the skin feeling soft and calm, making it perfect for daily use.',
        price: 199,
        image: 'images/product-items/facial-wash/facial-cleanser-3.png',
        quantity: quantity
        };
        addItemToCart(item);
        alert('Item added to cart!');
});

document.getElementById('buyNowBtn').addEventListener('click', () => {
    // Implement Buy Now functionality here
    alert('Buy Now functionality not implemented yet!');
});

function addItemToCart(item) {
    let cartData = JSON.parse(localStorage.getItem('cartData')) || [];
    cartData.push(item);
    localStorage.setItem('cartData', JSON.stringify(cartData));
}

// recommended items functionality
const recommendedItems = document.querySelectorAll('.recommended-items');

let scrollDrag = false;
let scrollStart;
let xScrollLeft;
let filteredItems = Array.from(recommendedItems);

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
// Setup draggable scrolling for all product brands
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
                event.preventDefault(); // logic para hindi sya mag scroll
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

const itemsPerPage = 2.5;

paginationPage.forEach(brand => {
    brand.addEventListener('scroll', () => {
        const scrollPosition = brand.scrollLeft;
        const containerWidth = brand.clientWidth;

        // Get the width of the first item
        const firstItem = brand.querySelector('.recommended-item-1'); // Adjust the selector if necessary
        const itemWidth = firstItem ? firstItem.getBoundingClientRect().width : 0; // Use getBoundingClientRect for accurate width

        // Calculate the total number of items
        const totalItems = brand.children.length; // Assuming all children are items
        const totalPages = Math.ceil(totalItems / itemsPerPage); // Calculate total pages

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