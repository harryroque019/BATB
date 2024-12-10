<?php
session_start();
require '../../connection/connection.php';
if (!isset($_SESSION['_id'])) {
    header("Location: ../userphp/login.php");
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
$product_Shop = $product['productShop'];
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
        'productprice' => $product_Price,
        'product_total' => (int)$product_Price * (int)$quantity,
        'product_image' => $product_image,
        'user_id' => $currid,
        'product_id' => $product_id,
        'quantity' => $quantity
    );
    // Check if the user_id and product_id exist in the cart
    $cartItem = $collectioncart->findOne(['user_id' => $currid, 'product_id' => $product_id,]);
    if ($cartItem) {
        $newTotal = (int)$cartItem['product_total'] + (int)$product_Price * (int)$quantity;
        $newQuantity = (int)$cartItem['quantity'] + (int)$quantity;
        $collectioncart->updateOne(
            ['user_id' => $currid, 'product_id' => $product_id],
            ['$set' => ['quantity' => $newQuantity, 'product_total' => $newTotal]],

        );
    } else {
        $collectioncart->insertOne($cart);
    }
    echo "<script>alert('Successfully added to cart'); window.location.href='productlist.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../user/usercss/allProductsStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
    <title><?php echo $product_name; ?></title>
</head>
<body>
    <?php include '../../user/usercomponents/user-navigation.php'; ?>

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
                    <p><b><em><?php echo $product_Stock; ?> Stock`s left</em></b></p>
                </div>
            </div>
        
            <div class="item-selection">
                <div class="image-container">
                    <img src="../../allasset/<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>">
                </div>
                <form action="#" method="post">
                    <?php include '../../user/usercomponents/plus-minus.php'; ?>

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

    <section id="product-description">
        <div class="container">
            <div class="description">
                <h1>Product Description</h1>
                <p>
                    <b>Product Name: </b> <?php echo $product_name; ?> <br><br>
                    <b>Product Shop: </b> <?php echo $product_Shop; ?> <br><br>
                    <b>Product Description: </b><?php echo $product_Desc; ?> <br><br>
                    <b>Size: </b><?php echo $product_Size; ?> <br><br>
                    <b>Category: </b><?php echo $product_Category; ?> <br><br>
                    <b>Skin Type: </b><?php echo $product_Skin; ?><br><br>
                    <b>Type: </b><?php echo $product_Type; ?><br><br>
                    <b>Benefits: </b><?php echo $product_Benefit; ?> <br><br>
                    <b>Main Ingredients: </b><?php echo $product_MainIng; ?> <br><br>
                    <b>Ingredients: </b> <?php echo $product_Ing; ?>

                </p>
            </div>  
        </div>
    </section>
    <?php include '../../user/usercomponents/similarproduct.php'; ?>

    <section id="review-section">
        <div class="container">
            <div class="review-container">
                <h1>Product Ratings</h1>
                <div class="users-review">
                    <div class="user-info-container">
                        <div class="user-info-content">
                            <img src="../../allasset/profileIcon.png" alt="">
                            <h3>Username</h3>
                        </div>
                    </div>
                    <div class="review-content">
                        <div class="review-rate">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon2.png">
                        </div>
                    </div>
                    <div class="posted-review">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum, eum, nihil tempore illum id labore qui reiciendis maiores officia fuga iusto consequatur voluptatibus asperiores eaque dolorum libero ipsa magnam aspernatur.</p>
                    </div>
                </div>

                <div class="users-review">
                    <div class="user-info-container">
                        <div class="user-info-content">
                            <img src="../../allasset/profileIcon.png" alt="">
                            <h3>Username</h3>
                        </div>
                    </div>
                    <div class="review-content">
                        <div class="review-rate">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon1.png">
                            <img src="../../allasset/starIcon2.png">
                        </div>
                    </div>
                    <div class="posted-review">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum, eum, nihil tempore illum id labore qui reiciendis maiores officia fuga iusto consequatur voluptatibus asperiores eaque dolorum libero ipsa magnam aspernatur.</p>
                    </div>
                </div>
                    
            </div>
        </div>
    </section>
<?php include '../../user/usercomponents/user-footer.php'; ?>
</body>
</html>