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
        <div class="container">
            <nav>
                <div class="logoBrand">
                    <a href=""><img src="/../allasset/logoIcon (1).png" class="logoIcon"></a>
                    <h1 class="brandName">BeautyandtheBest</h1>
                </div>
                <?php if (isset($_SESSION['_id']) || isset($_SESSION['username'])) { ?>
                    <a href="adminsettings.php"><img src="/../allasset/registerUser.png" class="profileIcon"></a>
                <?php } else { ?>
                    <a href="login.php"><img src="/../allasset/registerUser.png" class="profileIcon"></a>
                <?php } ?>
            </nav>
        </div>
</header>
<div class="menu">
    <div class="section">
        <div class="btn nav-btn">
         <a href="/../../admin/adminphp/dashboard.php">
            <button type="submit">
                <img src="/../allasset/dashboardIcon.png" class="image" style="width: 30px; height: 30px;">
                <p>Dashboard</p>
            </button>
         </a>
        </div>
        <a  href="/../../admin/adminphp/products.php" class="side-bar" text=>
        <div class="btn nav-btn">
            <button type="submit">
                <img src="/../allasset/productsIcon.png" class="image" style="width: 30px; height: 30px;">
                <p>Products</p>
            </button>
        </a>
        </div>
        <div class="btn nav-btn">
            <a href="/../../admin/adminphp/orders.php">
                <button type="submit">
                    <img src="/../allasset/orderIcon.png" class="image" style="width: 30px; height: 30px;">
                    <p>Orders</p>
                </button>
               </a>
        </div>
    </div>
</div>
</body>
</html>