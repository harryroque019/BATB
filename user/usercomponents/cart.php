<?php
require '../../connection/connection.php';

$client = new MongoDB\Client;
$collectionuser = $client->BTBA->user;
$collectioncart = $client->BTBA->cart;
$collectionorder = $client->BTBA->order;
$currid = $_SESSION['_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? null;
    $id = $_POST['id'] ?? null;
    
    if ($action === 'remove' && $id) {
        // Deleting the product from the cart
        $collectioncart->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        header("Location: ../../user/userphp/cartmodal.php");
        exit;
    }

    if ($action === 'buy' && $id) {
        // Collect the product data from the hidden inputs
        $productName = $_POST['productName'] ?? '';
        $productPrice = $_POST['productPrice'] ?? 0;
        $productImage = $_POST['productImage'] ?? '';

        // Collect user details from the form
        $firstName = $_POST['firstName'] ?? '';
        $address = $_POST['address'] ?? '';
        $postalCode = $_POST['postalCode'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $paymentMethod = $_POST['payment'] ?? '';

        // Get the product's quantity and product_id from the cart collection
        $productInCart = $collectioncart->findOne(['user_id' => $currid, '_id' => new MongoDB\BSON\ObjectId($id)]);
        $quantity = $productInCart['quantity'] ?? 1;

        // Prepare the order data
        $order = [
            'user_id' => $currid,
            'user_name' => $firstName,
            'address' => $address,
            'postal_code' => $postalCode,
            'phone' => $phone,
            'payment_method' => $paymentMethod,
            'order_date' => new MongoDB\BSON\UTCDateTime(),
            'status' => 'To Pay',
            'product_name' => $productName,
            'product_price' => $productPrice,
            'product_image' => $productImage,
            'product_id' => $id,
            'total_price' => $productPrice * $quantity
        ];

        // Insert the order into the orders collection
        $insertOrder = $collectionorder->insertOne($order);

        if ($insertOrder->getInsertedCount() > 0) {
            echo "Successfully ORDER";
            // Update the cart by removing the item or setting its user_id to null
            $collectioncart->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]); // Remove item after order is placed

            // Redirect to the confirmation page
            header('Location: #?id=' . $insertOrder->getInsertedId());
            exit;
        } else {
            echo "There was an error processing your order. Please try again.";
        }
    }
}

$products = $collectioncart->find(['user_id' => $currid], ['projection' => ['_id' => 1, 'product_name' => 1, 'productprice' => 1, 'product_total' => 1, 'product_image' => 1, 'quantity' => 1]]);
$index = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../../allasset/styles.css"> <!-- Ensure the correct path to your styles -->
</head>
<body>

<?php foreach ($products as $product) { ?>
    <form action="" method="post">
        <div class="panel-container">
            <div class="cart-panel-left">
                <img src="../../allasset/<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                <div class="product-info">
                    <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                    <div class="price-wishlist">
                        <p>₱ <?= htmlspecialchars($product['productprice']); ?></p>
                    </div>
                </div>
            </div>
            <div class="cart-panel-right">
                <div class="total-product-content">
                    <div class="quantity-container-btn">
                        <div class="decreasing-btn" onclick="decreaseQuantity(this, -1)">-</div>
                        <div class="line"></div>
                        <div class="quantity-value" id="quantity-value<?php echo $index; ?>"><?php echo $product['quantity']; ?></div>
                        <div class="line"></div>
                        <div class="adding-btn" onclick="increaseQuantity(this, 1)">+</div>
                    </div>
                    <p>Total:₱ <span class="total-price" data-index="<?php echo $index; ?>">
                        <?php echo number_format($product['product_total']); ?></span></p>
                </div>
                <div class="cart-buttons">
                    <input type="hidden" name="id" value="<?= $product['_id']; ?>">
                    <input type="hidden" name="action" value="remove">
                    <button type="submit" class="remove-btn">Remove</button>
                    <!-- Buy Now Button with data-attributes for product details -->
                    <button type="button" class="buy-btn" data-index="<?php echo $index; ?>"
                        data-product-id="<?php echo $product['_id']; ?>"
                        data-product-name="<?php echo htmlspecialchars($product['product_name']); ?>"
                        data-product-price="<?php echo $product['product_total']; ?>"
                        data-product-image="<?php echo $product['product_image']; ?>"
                        onclick="openModal(this)">Buy Now</button>
                </div>
            </div>
        </div>
    </form>
<?php $index++; } ?>

<!-- Modal Container -->
<div class="modal-container" id="modal-container" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h1>Checkout</h1>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <?php include 'cart-modal.php'; ?>
    </div>
</div>


</body>
<script src="../userjs/cart-modal.js"></script>
</html>
