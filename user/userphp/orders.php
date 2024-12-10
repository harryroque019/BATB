<?php
require '../../connection/connection.php';
session_start();

if (!isset($_SESSION['_id'])) {
    header("Location: ../userphp/login.php");
    exit;
}

$client = new MongoDB\Client;
$collectionorder = $client->BTBA->order;

// Fetch orders for the logged-in user
$userId = $_SESSION['_id'] ?? null;
$currentOrders = [];
if ($userId) {
    $currentOrders = array_map(function ($currOr) {
        $currOr['quantity'] = (int) ($currOr['quantity'] ?? 0); // Ensure quantity is an integer
        $currOr['total_price'] = (int) ($currOr['total_price'] ?? 0); // Ensure total_price is an integer
        return $currOr; // Return processed order
    }, iterator_to_array($collectionorder->find([
        'user_id' => $userId, // Match logged-in user's ID
        'status' => [
            '$in' => ['To Pay', 'To Ship', 'To Receive'] // Match any of the specified statuses
        ]
    ])));
}
// Fetch only orders with status 'Received'
if ($userId) {
    $receive = array_map(function ($order) {
        $order['quantity'] = (int) ($order['quantity'] ?? 0); // Ensure quantity is an integer
        $order['total_price'] = (int) ($order['total_price'] ?? 0); // Ensure total_price is an integer
        return $order; // Return processed order
    }, iterator_to_array($collectionorder->find([
        'user_id' => $userId, // Match logged-in user's ID
        'status' => 'Received' // Filter by order status 'Received'
    ])));
}

// Debugging: Uncomment to check the fetched data
// echo '<pre>', print_r($receive, true), '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../user/usercss/orders.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
    <title>Orders</title>
</head>
<body>
    <?php include '../../user/usercomponents/user-navigation.php'; ?>
    <section id="orders-section">
        <?php include '../../user/usercomponents/profile-skin-orders.php'; ?>

        <div class="container">
            <div class="user-container">
                <div class="user-info">
                    <!-- Received Orders -->
                    <div class="recent-order">
                        <h1>Recent Orders</h1>
                        <div class="recent-order-container">
                            <div class="recent-order-header">
                                <p>Product</p>
                                <p>Name</p>
                                <p>Quantity</p>
                                <p>Total Amount</p>
                                <p>Payment</p>
                                <p>Order Status</p>
                            </div>
                            <?php if (!empty($currentOrders)) { ?>
    <?php foreach ($currentOrders as $order) { ?>
        <button class="recent-order-content">
            <img src="../../allasset/<?php echo htmlspecialchars($currOr['product_image'] ?? 'default-image.png'); ?>" alt="Product Image">
            <h3><?php echo htmlspecialchars($order['product_name'] ?? 'Unknown Product'); ?></h3>
            <h3><?php echo htmlspecialchars($order['quantity'] ?? 0); ?></h3>
            <h3>₱ <?php echo number_format($order['total_price'], 2); ?></h3>
            <h3><?php echo htmlspecialchars($order['payment_method'] ?? 'Unknown'); ?></h3>
            <h3><?php echo htmlspecialchars($order['status'] ?? ''); ?></h3>
        </button>
        <div class="line"></div>
    <?php } ?>
<?php } else { ?>
    <p>No current orders found.</p>
<?php } ?>
                        </div>
                    </div>

                    <!-- Order History -->
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
                        <?php if (!empty($receive)) { ?>
    <?php foreach ($receive as $currOr) { ?>
        <button class="recent-order-content">
            <img src="../../allasset/<?php echo htmlspecialchars($currOr['product_image'] ?? 'default-image.png'); ?>" alt="Product Image">
            <h3><?php echo htmlspecialchars($currOr['product_name'] ?? 'Unknown Product'); ?></h3>
            <h3><?php echo htmlspecialchars($currOr['quantity'] ?? 0); ?></h3>
            <h3>₱ <?php echo number_format($currOr['total_price'], 2); ?></h3>
            <h3><?php echo htmlspecialchars($currOr['payment_method'] ?? 'Unknown'); ?></h3>
            <h3><?php echo htmlspecialchars($currOr['order_status'] ?? ''); ?></h3>
        </button>
        <div class="line"></div>
    <?php } ?>
<?php } else { ?>
    <p>No current orders found.</p>
<?php } ?>

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

        function closeReviewModal() {
            reviewModal.style.display = 'none';
            document.body.classList.remove('review-no-scroll');
        }

        window.addEventListener("load", () => {
            reviewModal.style.display = "none";
            document.body.classList.remove("review-no-scroll");
        });

        reviewSpan.addEventListener('click', closeReviewModal);
        window.addEventListener('click', (event) => {
            if (event.target === reviewModal) {
                closeReviewModal();
            }
        });

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

        document.querySelectorAll('.recent-order-content').forEach(button => {
            button.addEventListener('click', openReviewModal);
        });
    </script>
</body>
</html>
