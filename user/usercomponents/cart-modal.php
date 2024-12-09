<?php
require '../../connection/connection.php';

// Retrieve current user's ID from session
$currid = $_SESSION['_id'];
$user = $collectionuser->findOne(['_id' => new MongoDB\BSON\ObjectId($currid)]);
$collectioncart = $client->BTBA->cart;

// Fetch only specific fields from the user's cart items
$cartItems = $collectioncart->find(
    ['user_id' => $currid],
    ['projection' => ['_id' => 1, 'product_name' => 1, 'product_price' => 1, 'user_id' => 1, 'quantity' => 1]]
);

// Initialize variables for order processing
$phone = '';
$payment = '';
$totalPrice = 0;

// Process the form submission when POST request is made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data from the checkout form
    $firstName = $_POST['firstName'] ?? '';
    $address = $_POST['address'] ?? '';
    $postalCode = $_POST['postalCode'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $payment = $_POST['payment'] ?? '';

    // Prepare the order data structure
    $order = [
        'user_id' => $currid,
        'user_name' => $user['firstname'] . ' ' . $user['lastname'],
        'user_username' => $user['username'],
        'user_email' => $user['email'],
        'user_phone' => $user['phonenumber'],
        'first_name' => $firstName,
        'address' => $address,
        'postal_code' => $postalCode,
        'customer_phone' => $phone,
        'payment_method' => $payment,
        'order_date' => new MongoDB\BSON\UTCDateTime(),
        'status' => 'To Pay',
        'order_items' => []
    ];

    // Iterate over the cart items and add them to the order
    foreach ($cartItems as $cartItem) {
        $order['order_items'][] = [
            'product_name' => $cartItem['product_name'],
            'product_price' => $cartItem['product_price'],
            'quantity' => $cartItem['quantity']
        ];
    }

    // Insert the order data into the orders collection
    $insertOrder = $collectionorder->insertOne($order);

    // If the order insertion is successful, update all cart items for the user to hide
    if ($insertOrder->getInsertedCount() > 0) {
        $collectioncart->updateMany(
            ['user_id' => $currid],
            ['$set' => ['hidden' => true]]
        );
        header('Location: cartmodal.php' . $insertOrder->getInsertedId());
        exit;
    } else {
        echo "There was an error processing your order. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="checkout-form" method="post" action="#">
            <!-- Product Information -->
            <div id="product-info"></div> <!-- Product details will go here -->
            <!-- User Information Inputs -->
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
            <div class="inputs">
                <div class="input">
                    <div class="inp">
                        <p>First Name</p>
                        <input type="text" id="fName" name="firstName" value="" required >
                    </div>
                    <div class="inp">
                        <p>Your Address</p>
                        <input type="text" id="address" name="address" value="" required>
                        <p>Postal Code</p>
                        <input type="text" id="postalCode" name="postalCode" value="" required>
                    </div>
                </div>  
                <div class="input">
                    <div class="inp1">
                    </div>
                    <div class="inp1">
                        <p>Phone Number</p>
                        <input type="tel" id="phone" name="phone" value="" required>
                    </div>
                    <div class="inp1">
                        <p>Payment Method</p>
                        <select id="payment" name="payment" required>
                            <option value="paypal">PayPal</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="payment-btn" type="submit">Confirm Purchase</button>
        </form>
</body>
</html>