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
                </ul>
                <div class="icons">
                    <div class="search-container">
                        <input type="text" placeholder="Search..">
                        <img src="../imagesuser/svg/searchIcon.png" class="searchIcon">
                    </div>
                    <a href=""><img src="../imagesuser/svg/userIcon.png" class="profileIcon"></a>
                    <a href="../user/cart.php"><img src="../imagesuser/svg/cartIcon.png" class="cartIcon"></a>
                    <a href="../user/wishlist.php"><img src="../imagesuser/svg/wishlistBanner.png" class="wishlistIcon"></a>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="cart-header">
            <button onclick="window.history.back()"><img src="../imagesuser/svg/backIcon.png" alt=""></button>
            <h1>Cart</h1>
        </div>
        <div id="cartContainer"></div>
        <div class="empty-cart" id="emptyCartMessage" style="display: none;">No items in the cart.</div>
    </div>
    <div class="modal-container">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Checkout</h1>
                <span class="close">&times;</span>
            </div>
            <div class="inputs">
                <div class="input">
                    <div class="inp">
                        <p>First Name</p>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="inp">
                        <p>Your Address</p>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="inp">
                        <p>Postal Code</p>
                        <input type="text" id="postalCode" name="postalCode" required>
                    </div>
                </div>  
                <div class="input">
                    <div class="inp1">
                        <p>Last Name</p>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                    <div class="inp1">
                        <p>Phone Number</p>
                        <input type="tel" id="phone" name="phone" required>
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
        </div>
    </div>

<script src="../userjs/cart.js"></script>
</body>
</html>

