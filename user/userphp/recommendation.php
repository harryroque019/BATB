<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recommendation</title>
    <link rel="stylesheet" href="../usercss/recommendation.css">    
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
                    <a href="../user/login.php"><img src="../imagesuser/svg/userIcon.png" class="profileIcon"></a>
                    <a href="../user/cart.php"><img src="../imagesuser/svg/cartIcon.png" class="cartIcon"></a>
                    <a href="../user/wishlist.php"><img src="../imagesuser/svg/wishlistBanner.png" class="wishlistIcon"></a>
                </div>
            </nav>
        </div>
    </header>
    <!-- eto ang 1st page -->
    <section id="age-and-gender-section">
        <div class="container">
            <div class="next-btn">
                <a href="javascript:void(0);" onclick="goToFirstPage()"> <!-- Trigger function on click. sliding pages -->
                    <button>Next</button>
                </a>
            </div>
            <div class="age-gender-container">
                <div class="age-gender-content">
                    <div class="age-left-panel">
                        <div class="age-panel-title">
                            <h1 class="title">Tell us your age</h1>
                        </div>
                        <div class="age-button-selection">
                            <button>12 to 19 years old</button>
                            <button>20 to 29 years old</button>
                            <button>30 to 39 years old</button>
                            <button>40 to 49 years old</button>
                            <button>50+ years old</button>
                            <button>Prefer not to say</button>
                        </div>
                    </div>
                </div>
    
                <div class="age-gender-content">
                    <div class="age-right-panel">
                        <div class="gender-panel-title">
                            <h1 class="title">Gender</h1>
                        </div>
                        <div class="gender-button-selection">
                            <button>Male</button>
                            <button>Female</button>
                            <button>Non-Binary</button>
                            <button>Prefer not to say</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- second page to -->
    <div id="firstpage" class="firstpage">
        <div class="btns1">
                <div class="text-with-lines"><b>Skin Type</b></div> <br>
                <p style="font-size: 20px;" id="paragraph1"></p>
            <div class="con-btn1">
                <div class="btn1">
                    <button onclick="changeheadingstext1()" type="submit">Normal Skin</button>
                </div>
                <div class="btn1">
                    <button onclick="changeheadingstext2()" type="submit">Dry Skin</button>
                </div>
                <div class="btn1">
                    <button onclick="changeheadingstext3()" type="submit">Oily Skin</button>
                </div>
                <div class="btn1">
                    <button onclick="changeheadingstext4()" type="submit">Sensitive Skin</button>
                </div>
                <div class="btn1">
                    <button onclick="changeheadingstext5()" type="submit">Combination Skin</button>
                </div>
            </div>
            <div class="button">
                <div class="bt">
                    <button id="button13" onclick="goToAgeAndGenderSection()" type="submit">Back</button>
                </div>
                <div class="bt">
                    <button id="button12" onclick="goToSecondPage()" type="submit">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- third page  -->
    <div id="secondpage" class="secondpage">
        <div class="btns">
            <div class="lineeee"><b>Skin Concern</b></div>
            <p style="font-size: 20px;" id="paragraph5">asdasd</p>    
            <div class="con-btn">
                <div class="btn">
                    <button onclick="changeheadingstext6()" type="submit">Dehydration</button> 
                    <button onclick="changeheadingstext7()" type="submit">Texture</button><br>
                </div>
                <div class="btn">
                    <button onclick="changeheadingstext8()" type="submit">Dark Circles</button> 
                    <button onclick="changeheadingstext9()" type="submit">Uneven Skintone</button><br>
                </div>
                <div class="btn">
                    <button onclick="changeheadingstext10()" type="submit">Congestion</button> 
                    <button onclick="changeheadingstext11()" type="submit">Sensitivity</button><br>
                </div>
                <div class="btn">
                    <button onclick="changeheadingstext12()" type="submit">Early Aging</button> 
                    <button onclick="changeheadingstext13()" type="submit">Dullness</button><br>
                </div>
            </div>
            <div class="button">
                <div class="bt">
                    <button id="button13" onclick="goToFirstPage()" type="submit">Back</button>
                </div>
                <div class="bt">
                    <button style="height: 33px;" id="button12"type="submit">Complete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../userjs/recommendation.js"></script>
</body>
</html>


