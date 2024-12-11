<?php
session_start();
require '../../connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../user/usercss/brands.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
    <title>brands</title>
</head>
<body>
    <?php include '../../user/usercomponents/user-navigation.php'; ?>

    <section id="brand-1">
        <div class="container">
            <h1 class="title">Come shop now where <br>Beauty wins with every<br> Checkout!</h1>
            <p class="subtitle">Revive & Thrive your skin with the help of BeautyandtheBest.</p>
            <H1 class="title">Ellana</H1>

            <a href="../../user/userphp/productList.php">
                <button class="btn-primary"> 
                    DISCOVER MORE
                    <span class="btn-primary-background">
                        <img src="../../allasset/arrowIcon.png" class="arrowIcon">
                    </span>
                </button>
            </a>
            <?php include '../../user/usercomponents/productlist.php'; ?>
        </div>
    </section>

    <section id="brand-2">
        <div class="container">
        <H1 class="title">Soul Apothecary</H1>
            <a href="../../user/userphp/productList.php">
                <button class="btn-primary"> 
                    DISCOVER MORE
                    <span class="btn-primary-background">
                        <img src="../../allasset/arrowIcon.png" class="arrowIcon">
                    </span>
                </button>
            </a>
            <?php include '../../user/usercomponents/productlist.php'; ?>
        </div>
            
    </section>

    <?php include '../../user/usercomponents/user-footer.php'; ?>
</body>
</html>