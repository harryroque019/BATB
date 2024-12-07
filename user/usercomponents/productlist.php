<?php
require '../../connection/connection.php';

$client = new MongoDB\Client;
$collectionproducts = $client->BTBA->products;

// Retrieve all products from the database
$products = $collectionproducts->find()->toArray();

$imageData = array();
foreach ($products as $product) {
    if (isset($product['image']) && file_exists(__DIR__ . '/../../allasset/' . $product['image'])) {
        $imageData[$product['productName']] = 'data:image/jpeg;base64,' . base64_encode(file_get_contents(__DIR__ . '/../../allasset/' . $product['image']));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../usercss/productlistelement.css">
</head>
<body>
<div class="listitem">
    <?php foreach ($products as $product): ?>
        <div class="item <?= strtolower(str_replace(' ', '-', $product['productCategory'])) ?>">
            <div class="product-image">
                <img src="/../allasset/<?= $product['image'] ?? 'default.png' ?>" alt="<?= htmlspecialchars($product['productName']) ?>">
            </div>
            <div class="product-item-name">
                <p class="item-1"><?= htmlspecialchars($product['productName']) ?></p>
            </div>
            <div class="product-item-price">
                <p class="item-1-price">₱ <?= htmlspecialchars($product['productPrice']) ?></p>
            </div>
            <div class="stars">
                <img src="/allasset/starIcon1.png" class="starIcon1">
                <img src="/allasset/starIcon1.png" class="starIcon1">
                <img src="/allasset/starIcon1.png" class="starIcon1">
                <img src="/allasset/starIcon2.png" class="starIcon1">
            </div>
            <div class="item-btn">
                <form action="../../user/userphp/gentleCleansingOil.php" method="get">
                    <input type="hidden" name="product_id" value="<?= $product['_id'] ?>">
                    <button type="submit" class="view-more-btn"> 
                        View More
                        <span class="btn-background">
                            <img src="/allasset/arrowIcon.png" class="arrowIcon">
                        </span>
                    </button>
                </form>
            </div>
        </div>
        
    <?php endforeach; ?>
    </div>
</body>
</html>

