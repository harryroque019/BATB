const reviewContainer = document.querySelector('.reviewContainer');
const reviewItems = document.querySelectorAll('.reviewContent1');
const pageDots = document.querySelectorAll('.page-dot');

let reviewDrag = false;
let reviewStartX;
let reviewScrollLeft;

function setupDraggableScrolling(container) {
    container.addEventListener('mousedown', (e) => {
        reviewDrag = true;
        reviewStartX = e.pageX - container.offsetLeft;
        reviewScrollLeft = container.scrollLeft;
        container.style.cursor = 'grabbing'; // Change cursor to grabbing
    });

    container.addEventListener('mouseleave', () => {
        reviewDrag = false;
        container.style.cursor = 'grab'; // Change cursor back to grab
    });
    
    container.addEventListener('mouseup', () => {
        reviewDrag = false;
        container.style.cursor = 'grab'; // Change cursor back to grab
    });

    container.addEventListener('mousemove', (e) => {
        if (!reviewDrag) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - reviewStartX) * 1; // Adjust scroll speed
        container.scrollLeft = reviewScrollLeft - walk;
        updatePagination(); // Update pagination on scroll
    });
}

// Setup draggable scrolling for the review container
setupDraggableScrolling(reviewContainer);

// Pagination Logic
const itemsPerPage = 2; // Number of items per page

function updatePagination() {
    const scrollPosition = reviewContainer.scrollLeft;
    const itemWidth = reviewItems[0].getBoundingClientRect().width + 20; // Include margin
    const totalItems = reviewItems.length;
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    
    // Calculate the index of the active pagination dot
    const index = Math.floor(scrollPosition / (itemWidth * itemsPerPage));
    
    // Ensure the index is within bounds
    const activeIndex = Math.min(index, totalPages - 1);
    
    // Update active pagination dot
    pageDots.forEach((dot, i) => {
        dot.classList.toggle('active', i === activeIndex);
    });
}

// Initialize pagination on load
updatePagination();


const productRangeContent = document.querySelector('.productRangeContent');

let isDragging = false;
let startX;
let scrollLeft;

productRangeContent.addEventListener('mousedown', (e) => {
    isDragging = true;
    startX = e.pageX - productRangeContent.offsetLeft; // Get the mouse position relative to the container
    scrollLeft = productRangeContent.scrollLeft; // Get the current scroll position
    productRangeContent.style.cursor = 'grabbing'; // Change cursor to grabbing
});

productRangeContent.addEventListener('mouseleave', () => {
    isDragging = false;
    productRangeContent.style.cursor = 'grab'; // Change cursor back to grab
});

productRangeContent.addEventListener('mouseup', () => {
    isDragging = false;
    productRangeContent.style.cursor = 'grab'; // Change cursor back to grab
});

productRangeContent.addEventListener('mousemove', (e) => {
    if (!isDragging) return; // If not dragging, exit
    e.preventDefault(); // Prevent default behavior (text selection)
    const x = e.pageX - productRangeContent.offsetLeft; // Get the current mouse position
    const walk = (x - startX) * 1; // Calculate how far the mouse has moved
    productRangeContent.scrollLeft = scrollLeft - walk; // Scroll the container
});

const images = document.querySelectorAll('.productImage1'); // all product images
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