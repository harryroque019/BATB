
<?php
session_start();
require '../../connection/connection.php';
if (!isset($_SESSION['_id'])) {
    header("Location: ../../userphp/login.php");
    exit;
}
$client = new MongoDB\Client;
$collectionproducts = $client->BTBA->products;
$currid = $_SESSION['_id'];
$product_id = $_GET['product_id'];
$product = $collectionproducts->findOne(['_id' => new MongoDB\BSON\ObjectId($product_id)]);
$product_name = $product['productName'];
$product_Price = $product['productPrice'];
$product_Category = $product['productCategory'];
$product_Stock = $product['productStock'];
$product_Size = $product['productSize'];
$product_Type = $product['productType'];
$product_Skin = $product['productSkin'];
$product_Benefit = $product['productBenefit'];
$product_Ing = $product['productIng'];
$product_Desc = $product['productDesc'];
$product_MainIng = $product['productDesc'];
$product_image = $product['image'];
$product_Count = $product['productCount'];

if (isset($_POST['addToCartBtn'])) {
$collectioncart = $client->BTBA->cart;
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
$cart = array(
'product_name' => $product_name,
'product_price' => $product_Price,
'product_image' => $product_image,
'user_id' => $currid,
'product_id' => $product_id,
'quantity' => $quantity
);
$collectioncart->insertOne($cart);

// Get the total quantity
$totalQuantity = 0;
$cartItems = $collectioncart->find(['user_id' => $currid]);
foreach ($cartItems as $item) {
$totalQuantity += $item['quantity'];
}

echo "<script>window.location.href='#'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../user/usercss/allProductsStyle.css">
</head>
<body>
<section id="radiance-boost-serum">
        <div class="back-button">
            <button onclick="window.history.back()"><img src="../../allasset/backIcon.png" alt=""></button>
            
            <p><?php echo $product_name; ?></p>
        </div>
        <div class="container">
            <div class="item-info">
                <div class="product-header">
                    <h1 class="title"><?php echo $product_name; ?></h1>
                    <div class="rating-price-content">
                        <div class="ratings">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon2.png">
                        </div>
                        <div class="price-wishlist">
                            <h1 class="price">₱<?php echo $product_Price; ?></h1>
                            <img src="../../allasset/wishlistIcon.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="product-information">
                    <p><?php echo $product_Desc; ?></p>
                </div>
                <div class="stocks-content">
                    <p><?php echo $product_Stock; ?></p>
                </div>
            </div>
        
            <div class="item-selection">
                <div class="image-container">
                    <img src="../../allasset/<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>">
                </div>
                <?php
                $exist = $collectioncart->findOne(['user_id' => $currid, 'product_id' => $product_id]);
                if ($exist) {
                    $quantity = $exist['quantity'] + 1;
                    $collectioncart->updateOne(
                        ['user_id' => $currid, 'product_id' => $product_id],
                        ['$set' => ['quantity' => $quantity]]
                    );
                } else {
                    $quantity = 1;
                }
                ?>
                <form action="#" method="post">
                    <div class="quantity-container-btn">
                        <div class="decreasing-btn" onclick="decreaseQuantity()">-</div>
                        <div class="line"></div>
                        <div class="quantity-value" id="quantity-value"><?php echo $quantity; ?></div>
                        <div class="line"></div>
                        <div class="adding-btn" onclick="increaseQuantity()">+</div>
                    </div>
                    <div class="button-container">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="hidden" name="quantity" id="form-quantity-value" value="">
                        <button type="submit" class="add-to-cart-btn" id="addToCartBtn" name="addToCartBtn">Add to Cart</button>
                    </div>
                </form>
                    
                    
                    <button class="buy-now-btn" id="buyNowBtn">Buy Now</button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>