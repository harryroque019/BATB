<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../user/usercss/orders.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
    <title>orders</title>
</head>
<body>

    <?php include '../../user/usercomponents/user-navigation.php'; ?>
    <section id="orders-section">
    <?php include '../../user/usercomponents/profile-skin-orders.php'; ?>

        <div class="container">
            <div class="user-container">
                <div class="user-info"> 
                    <div class="recent-order">
                        <h1>Your Recent Orders</h1>
                        <div class="recent-order-container">
                            <div class="recent-order-header">
                                <p>Product</p>
                                <p>Name</p>
                                <p>Quantity</p>
                                <p>Total Amount</p>
                                <p>Payment</p>
                                <p>Order Status</p>
                            </div>
                            <button class="recent-order-content">
                                <img src="/imagesuser/product-items/facial-wash/facial-cleanser-1.png" alt="">
                                <h3>Gentle Brightening Cleanser</h3>
                                <h3>1</h3>
                                <h3>₱ 199</h3>
                                <h3>PayPal</h3>
                                <h3>To Ship</h3>
                            </button>
                            <button class="recent-order-content">
                                <img src="/imagesuser/product-items/facial-wash/facial-cleanser-1.png" alt="">
                                <h3>Gentle Brightening Cleanser</h3>
                                <h3>1</h3>
                                <h3>₱ 199</h3>
                                <h3>COD</h3>
                                <h3>To Receive</h3>
                            </button>
                            <div class="line"></div>
                        </div>
                        <!-- Modal for Posting a Review -->
                        <div class="review-modal-container">
                            <div class="review-modal-content">
                                <div class="modal-header">
                                    <h1>Post a Review</h1>
                                    <span class="review-close">&times;</span>
                                </div>
                                <div class="inputs">
                                    <div class="input">
                                        <div class="inp1">
                                            <h2>Write us</h2>
                                            <textarea id="reviewText" name="reviewText"required placeholder="Write your review here.."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="review-save-btn" type="submit">Post Review</button>
                            </div>
                        </div>
                    </div>


                    <div class="account-header">
                        <h1>Order History</h1>
                    </div>           
                    <div class="order-container">
                        <div class="order-header">
                            <p>Order ID</p>
                            <p>Product</p>
                            <p>Quantity</p>
                            <p>Total Amount</p>
                            <p>Payment</p>
                            <p>Order Status</p>
                        </div>
                    </div>

                    <div class="review-header">
                        <h1>Write a review</h1>
                    </div>

                    <div class="review-container">
                        <div class="review-content">
                            <div class="text-content">
                                <h1>Product Name</h1>
                                <p>Review Details</p>
                                <textarea placeholder="What do you think of our product? Write here."></textarea>
                            </div>
                            <div class="image-content">
                                <img src="/imagesuser/product-items/facial-wash/facial-cleanser-1.png" alt="">
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </section>
    
    <script>
        const reviewModal = document.querySelector(".review-modal-container");
        const reviewSpan = document.querySelector(".review-close");
        const reviewSaveBtn = document.querySelector(".review-save-btn");

        function openReviewModal(event) {
            reviewModal.style.display = 'block';
            document.body.classList.add('review-no-scroll');
        }

        // Close review modal function
        function closeReviewModal() {
            reviewModal.style.display = 'none';
            document.body.classList.remove('review-no-scroll');
        }

        // Ensure review modal is hidden initially
        window.addEventListener("load", () => {
            reviewModal.style.display = "none";
            document.body.classList.remove("review-no-scroll");
        });

        // Close review modal when clicking on close button or outside the modal
        reviewSpan.addEventListener('click', closeReviewModal);
        window.addEventListener('click', (event) => {
            if (event.target === reviewModal) {
                closeReviewModal();
            }
        });

        // Handle review submission
        reviewSaveBtn.addEventListener('click', (event) => {
            event.preventDefault();
            const reviewText = document.getElementById('reviewText').value;

            if (reviewText) {
                alert('Review posted: ' + reviewText);
                closeReviewModal();
            } else {
                alert('Please enter a review.');
            }
        });

        // Adding functionality for "Post Review" buttons in recent orders
        document.querySelectorAll('.recent-order-content').forEach(button => {
            button.addEventListener('click', openReviewModal);
        });
    </script>

</body>
</html>