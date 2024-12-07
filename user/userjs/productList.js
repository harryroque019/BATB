// Variables
const checkboxes = document.querySelectorAll('.category'); // all checkbox
const items = document.querySelectorAll('.item'); // all items
const productBrands = document.querySelectorAll('.product-brand-1, .product-brand-2');
const productPage = document.querySelectorAll('.product-brand-1');
const productPage2 = document.querySelectorAll('.product-brand-2');
const productCards = document.querySelectorAll('.item'); // all items ulit pero ibang function
const paginationDots = document.querySelectorAll('.page-dot'); // pagination for brand 1
const paginationDotsBrand2 = document.querySelectorAll('.page-dot-2'); // pagination for brand 2

let scrollDrag = false;
let scrollStart;
let xScrollLeft;
let filteredItems = Array.from(productCards); // functionality para sa filtered items

// Function to handle draggable scrolling for products
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
productBrands.forEach(brand => {
    setupDraggableScrolling(brand);
});

// Draggable scrolling for images
const images = document.querySelectorAll('.product-image img'); // all product images
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

// Event listeners for checkboxes
document.addEventListener('DOMContentLoaded', function () {
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterItems);
    });

    // Initial visibility check
    filterItems(); // product filter based sa chineck ni user
});

// Filter functionality
function filterItems() {
    const selectedCategories = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    // Show or hide items based on selected categories
    items.forEach(item => {
        const itemCategory = item.classList[1]; // Assuming the second class indicates the category
        if (selectedCategories.length === 0 || selectedCategories.includes(itemCategory)) {
            item.style.display = 'block'; // Show item
        } else {
            item.style.display = 'none'; // Hide item
        }
    });
}

// Update pagination based on scroll position
const itemsPerPage = 3.5; // render per item in max-width

productPage.forEach(brand => {
    brand.addEventListener('scroll', () => {
        const scrollPosition = brand.scrollLeft;
        const containerWidth = brand.clientWidth;

        // Get the width of the first item
        const firstItem = brand.querySelector('.item'); // Adjust the selector if necessary
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

const itemsPerPage2 = 3.5; // render per item in max-width

productPage2.forEach(brand => {
    brand.addEventListener('scroll', () => {
        const scrollPosition = brand.scrollLeft;
        const containerWidth = brand.clientWidth;

        // Get the width of the first item
        const firstItem = brand.querySelector('.item'); // Adjust the selector if necessary
        const itemWidth = firstItem ? firstItem.getBoundingClientRect().width : 0; // Use getBoundingClientRect for accurate width

        // Calculate the total number of items
        const totalItems = brand.children.length; // Assuming all children are items
        const totalPages = Math.ceil(totalItems / itemsPerPage2); // Calculate total pages

        // Calculate the index of the active pagination dot
        const index = Math.floor(scrollPosition / (itemWidth * itemsPerPage2));

        // Ensure the index is within bounds
        const activeIndex = Math.min(index, totalPages - 1);

        // Update active pagination dot
        paginationDotsBrand2.forEach((dot, i) => {
            dot.classList.toggle('active', i === activeIndex);
        });
    });
});



// Draggable scrolling for recommendations
const recommendedItemsContainer = document.querySelector('.recommended-items');
const recommendedPaginationDots = document.querySelectorAll('.recommendation-pagination .recommendation-page-dot');

let recommendedScrollDrag = false;
let recommendedScrollStart;
let recommendedXScrollLeft;

// Add event listeners for dragging
recommendedItemsContainer.addEventListener('mousedown', (e) => {
    recommendedScrollDrag = true;
    recommendedScrollStart = e.pageX - recommendedItemsContainer.offsetLeft;
    recommendedXScrollLeft = recommendedItemsContainer.scrollLeft;
});

recommendedItemsContainer.addEventListener('mouseleave', () => { recommendedScrollDrag = false; });
recommendedItemsContainer.addEventListener('mouseup', () => { recommendedScrollDrag = false; });

recommendedItemsContainer.addEventListener('mousemove', (e) => {
    if (!recommendedScrollDrag) return;
    e.preventDefault();
    const x = e.pageX - recommendedItemsContainer.offsetLeft;
    const walk = (x - recommendedScrollStart) * 1; // Adjust scroll speed
    recommendedItemsContainer.scrollLeft = recommendedXScrollLeft - walk;
});

const itemPerPage = 3.5;
// Update pagination based on scroll position
recommendedItemsContainer.addEventListener('scroll', () => {
    const scrollPosition = recommendedItemsContainer.scrollLeft;
    const firstRecommendedItem = recommendedItemsContainer.querySelector('.recommended-item-1');
    const itemWidth = firstRecommendedItem ? firstRecommendedItem.getBoundingClientRect().width : 0;
    const totalRecommendedItems = recommendedItemsContainer.children.length;
    const itemsPerPage = Math.floor(recommendedItemsContainer.clientWidth / itemWidth); // Calculate items per page based on container width
    const totalRecommendedPages = Math.ceil(totalRecommendedItems / itemsPerPage);
    const index = Math.floor(scrollPosition / (itemWidth * itemsPerPage));
    const activeRecommendedIndex = Math.min(index, totalRecommendedPages - 1);

    // Update active pagination dot
    recommendedPaginationDots.forEach((dot, i) => {
        dot.classList.toggle('active', i === activeRecommendedIndex);
    });
});

// Add click event to pagination dots
recommendedPaginationDots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        const firstRecommendedItem = recommendedItemsContainer.querySelector('.recommended-item-1');
        const itemWidth = firstRecommendedItem ? firstRecommendedItem.getBoundingClientRect().width : 0;
        const scrollToPosition = i * (itemWidth * Math.floor(recommendedItemsContainer.clientWidth / itemWidth));
        
        recommendedItemsContainer.scrollTo({
            left: scrollToPosition,
        });
    });
}); 
