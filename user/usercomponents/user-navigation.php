<?php
require '../../connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <div class="navcontainer">
            <nav>
                <div class="logoBrand">
                    <a href="../userphp/homePage.php"><img src="/../allasset/logoIcon.png" class="logoIcon"></a>
                    <h1 class="brandName">BeautyandtheBest</h1>
                </div>
                <ul class="navList">
                    <li><a href="../userphp/homePage.php">Home</a></li>
                    <li><a href="../userphp/productList.php">Products</a></li>
                    <li><a href="../userphp/brands.php">Brands</a></li>
                </ul>
                <div class="icons">
                    <div class="search-container">
                        <input type="text" placeholder="Search..">
                        <img src="/../allasset/searchIcon.png" class="searchIcon">
                    </div>
                    <?php if (isset($_SESSION['_id'])) { ?>
                    <a href="../userphp/userDashboard.php"><img src="/../allasset/userIcon.png" class="profileIcon"></a>
                    <?php } else { ?>
                    <a href="../../user/userphp/login.php"><img src="/../allasset/userIcon.png" class="profileIcon"></a>
                    <?php } ?>
                    <a href="../../user/userphp/cartmodal.php"><img src="/../allasset/cartIcon.png" class="cartIcon"></a>
                    <a href="../../user/userphp/wishlist.php"><img src="/../allasset/wishlistBanner.png" class="wishlistIcon"></a>
                </div>
            </nav>
        </div>
    </header>
</body>
</html>