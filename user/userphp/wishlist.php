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

    <header>
        <div class="container">
            <nav>
                <div class="logoBrand">
                    <a href="../user/homePage.php"><img src="../imagesuser/svg/logoIcon.png" class="logoIcon"></a>
                    <h1 class="brandName">BeautyandtheBest</h1>
                </div>
                <ul class="navList">
                    <li><a href="../user/homePage.php">Home</a></li>
                    <li><a href="../user/productList.php">Products</a></li>
                    <li><a href="../user/brands.php">Brands</a></li>
                    <li><a href="../user/homePage.php">Home</a></li>
                    <li><a href="../user/productList.php">Products</a></li>
                    <li><a href="../user/brands.php">Brands</a></li>
                </ul>
                <div class="icons">
                    <div class="search-container">
                        <input type="text" placeholder="Search..">
                        <img src="../imagesuser/svg/searchIcon.png" class="searchIcon">
                    </div>
                    <a href="../user/login.php"><img src="../imagesuser/svg/userIcon.png" class="profileIcon"></a>
                    <a href="../user/cart.php"><img src="../imagesuser/svg/cartIcon.png" class="cartIcon"></a>
                    <a href="../user/wishlist.php"><img src="../imagesuser/svg/wishlistBanner.png" class="wishlistIcon"></a>
                </div>
            </nav>
        </div>
    </header>

    <section id="wishlist-section">
        <div class="container">
            <div class="wishlist-header">
                <button onclick="window.history.back()"><img src="../imagesuser/svg/backIcon.png" alt=""></button>
                <h1>Wishlist</h1>
            </div>
            <div class="wishlist-container">
                <div class="wishlist-content">
                    <div class="left-panel">
                        <img src="../imagesuser/product-items/facial-wash/facial-cleanser-1.png" alt="">
                        <div class="product-info">
                            <h2 class="product-name">Product Name</h2>
                            <h2 class="product-price">₱100</h2>
                            <img src="../imagesuser/svg/wishlistIconFill.png" alt="" class="wishlistIconFill">
                            <div class="stars">
                                <img src="../imagesuser/svg/starIcon1.png" class="starIcon1">
                                <img src="../imagesuser/svg/starIcon1.png" class="starIcon1">
                                <img src="../imagesuser/svg/starIcon1.png" class="starIcon1">
                                <img src="../imagesuser/svg/starIcon2.png" class="starIcon1">
                            </div>
                        </div>
                    </div>
                    <div class="right-panel">
                        <div class="btn-container">
                            <button class="buy-btn">Add to Cart</button>
                            <button class="cart-btn">Remove</button>
                        </div>
                    </div>
                </div>

                <div class="wishlist-content">
                    <div class="left-panel">
                        <img src="../imagesuser/product-items/facial-wash/facial-cleanser-1.png" alt="">
                        <div class="product-info">
                            <h2 class="product-name">Product Name</h2>
                            <h2 class="product-price">₱100</h2>
                            <img src="../imagesuser/svg/wishlistIconFill.png" alt="" class="wishlistIconFill">
                            <div class="stars">
                                <img src="../imagesuser/svg/starIcon1.png" class="starIcon1">
                                <img src="../imagesuser/svg/starIcon1.png" class="starIcon1">
                                <img src="../imagesuser/svg/starIcon1.png" class="starIcon1">
                                <img src="../imagesuser/svg/starIcon2.png" class="starIcon1">
                            </div>
                        </div>
                    </div>
                    <div class="right-panel">
                        <div class="btn-container">
                            <button class="buy-btn">Add to Cart</button>
                            <button class="cart-btn">Remove</button>
                        </div>
                    </div>
                </div>

            
            </div>

            
            
        </div>
    </section>


    
</body>
</html>


