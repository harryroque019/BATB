<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../usercss/skinProfile.css">
  <title>skinProfile</title>
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

    <section id="skin-profile">
        <div class="container">
            <div class="menu">
                <div class="con-btn">
                    <div class="btn">
                        <button><a href="../user/userdashboard.php"><b>Profile</b></a></button>
                    </div>
                    <div class="btn">
                        <button><b>Skin Profile</b></button>
                    </div>
                    <div class="btn">
                        <button><a href="../user/orders.php"><b>Orders</b></button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="user-container">
                <div class="user-info">
                    <button class="changes" type="submit">Save Changes</button>
                    <div class="account-header">
                        <h1 class="skinprofile">Skin Profile</h1>
                    </div>
                    <div class="cons-drop">
                        <div class="inp">
                            <div class="selection1">
                                <p>Skin type</p>
                                <select>
                                    <option></option>
                                    <option>Oily</option>
                                    <option>Dry</option>
                                    <option>Combination</option>
                                    <option>Normal</option>
                                    <option>Sensitive</option>
                                </select>
                            </div>
                            <div class="selection1">
                                <p>Skin Sensitivities</p>
                                <select>
                                    <option></option>
                                    <option><p>Allergies (e.g., to certain ingredients)</p></option>
                                    <option><p>Reactions to specific products</p></option>
                                    <option<p>Sensitivity to fragrances or dyes</p></option>
                                </select>
                            </div>
                        </div>
                        <div class="inp">
                            <div class="selection2">
                                <p>Skin Concerns:</p>
                                <select>
                                <option></option>
                                <option ><p>Acne</p></option>
                                <option><p>Reactions to specific products</p></option>
                                <option><p>Aging (fine lines, wrinkles)</p></option>
                                <option><p>Hyperpigmentation</p></option>
                                <option><p>Redness or rosacea</p></option>
                                <option><p>Dullness</p></option>
                                <option><p>Dark circles</p></option>
                                <option><p>Large pores</p></option>
                                <option><p>Sun damage</p></option>
                            </select>
                            </div>
                            <div class="selection2">
                                <p>Goals</p>
                                <select>
                                    <option></option>
                                    <option><p>Hydration</p></option>
                                    <option><p>Brightening</p></option>
                                    <option><p>Firmness</p></option>
                                    <option><p>Texture improvement</p></option>
                                    <option><p>Acne control</p></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </section>
</body>
</html>












