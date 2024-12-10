<?php
session_start();
require '../../connection/connection.php';

if (!isset($_SESSION['_id'])) {
    header("Location: ../userphp/login.php");
    exit;
}

$client = new MongoDB\Client;
$collectionproduct = $client->BTBA->products;

// Fetch all products
$products = $collectionproduct->find();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../usercss/wishlist.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
    <title>wishlist</title>
</head>
<body>

    <?php include '../usercomponents/user-navigation.php'; ?>

    <section id="wishlist-section">
        <div class="container">
            <div class="wishlist-header">
                <button onclick="window.history.back()"><img src="../imagesuser/svg/backIcon.png" alt=""></button>
                <h1>Wishlist</h1>
            </div>
            <div class="wishlist-container">
                <?php foreach ($products as $product) { ?>
                <div class="wishlist-content">
                    <div class="left-panel">
                        <img src="../../allasset/<?php echo htmlspecialchars($product['image']); ?>" alt="">
                        <div class="product-info">
                            <h2 class="product-name"><?php echo htmlspecialchars($product['productName']); ?></h2>
                            
                            <img src="../../allasset/wishlistIconFill.png" alt="" class="wishlistIconFill">
                            <div class="stars">
                                <img src="../../allasset/starIcon1.png" class="starIcon1">
                                <img src="../../allasset/starIcon1.png" class="starIcon1">
                                <img src="../../allasset/starIcon1.png" class="starIcon1">
                                <img src="../../allasset/starIcon2.png" class="starIcon1">
                            </div>
                        </div>
                    </div>
                    <div class="right-panel">
                        <div class="btn-container">
                            <button class="buy-btn">Add to Wishlist</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php include '../usercomponents/user-footer.php'; ?>
</body>
</html>

