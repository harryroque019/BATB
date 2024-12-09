<?php
require '../../connection/connection.php';
session_start();
if (!isset($_SESSION['_id'])) {
    header("Location: ../userphp/login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="../usercss/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "../../user/usercomponents/user-navigation.php"; ?>

    <div class="container">
        <div class="cart-header">
            <button onclick="window.history.back()"><img src="../../allasset/backIcon.png" alt=""></button>
            <h1>Cart</h1>
        </div>
        <div id="cartContainer"></div>
        <div class="empty-cart" id="emptyCartMessage" style="display: none;">No items in the cart.</div>
        </div>

    <?php include "../../user/usercomponents/cart.php"; ?>
</body>
</html>

