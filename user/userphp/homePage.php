<?php
session_start();
require '../../connection/connection.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->BTBA->user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../usercss/homePage.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
    <title>homePage</title>
</head>

<body>

    <?php include '../../user/usercomponents/user-navigation.php'; ?>

    <section id="discovery">
        <div class="container">
            <h1 class="title">Come shop now where <br>Beauty wins with every<br> Checkout!</h1>
            <p class="subtitle">Revive & Thrive your skin with the help of BeautyandtheBest.</p>
            <a href="../userphp/productList.php">
                <button class="btn-primary"> 
                    DISCOVER MORE
                    <span class="btn-primary-background">
                        <img src="../../allasset/arrowIcon.png" class="arrowIcon">
                    </span>
                </button>
            </a>
        </div>
    </section>

    <section id="whyChooseUs">
        <div class="container">
            <div class="text">
                <h1 class="title">Why Choose Us?</h1>
                <p class="subtitle">Discover the unique features that set us apart in the world of <br>skincare.</p>
                <ul class="list">
                    <li><span class="textTitle">Curated Selection:</span> Our team carefully selects each product to ensure you receive only the best in skincare.</li>
                    <li><span class="textTitle">Authenticity Guaranteed:</span> We partner directly with brands to bring you genuine products.</li>
                    <li><span class="textTitle">Unique Deals:</span> Shop with us, and take advantage of unique deals, loyalty benefits, and special savings.</li>
                </ul>
            </div>
            <div class="contentImage">
                <img src="../../allasset/homePageBanner2.png" class="banner2">
            </div>
        </div>
    </section>

    <section id="productRange">
        <div class="container">
            <div class="text">
                <h1 class="title">OUR PRODUCT RANGE</h1>
                <p class="subtitle">Explore our collection of skincare essentials, thoughtfully curated to address the unique needs of every skin type and concern.</p>
            </div>
            <div class="productRangeContent">
                <div class="productContent1">
                     <img src="../../allasset/facialwashandcleanser.jpg" class="productImage1">
                    <div class="titleContent">
                        <h2 class="itemTitle">Facial Wash & Cleanser</h2>
                    </div>
                    <div class="btnContent">
                        <button class="btnBackground">
                            <a href="../userphp/productList.php"><img src="../../allasset/arrowIcon.png" class="arrowIcon2"></a>
                        </button>
                    </div>
                </div>

                <div class="productContent1">
                    <img src="../../allasset/moisturizersandcreams.jpg" class="productImage1">
                    <div class="titleContent">
                        <h2 class="itemTitle">Moisturizers and Creams</h2>
                    </div>
                    <div class="btnContent">
                        <button class="btnBackground">
                            <a href=""><img src="../../allasset/arrowIcon.png" class="arrowIcon2"></a>
                        </button>
                    </div>
                </div>

                <div class="productContent1">
                    <img src="../../allasset/serum.jpg" class="productImage1">
                    <div class="titleContent">
                        <h2 class="itemTitle">Serum</h2>
                    </div>
                    <div class="btnContent">
                        <button class="btnBackground">
                            <a href=""><img src="../../allasset/arrowIcon.png" class="arrowIcon2"></a>
                        </button>
                    </div>
                </div>

                <div class="productContent1">
                    <img src="../../allasset/sunscreen.jpg" class="productImage1">
                    <div class="titleContent">
                        <h2 class="itemTitle">Sunscreens</h2>
                    </div>
                    <div class="btnContent">
                        <button class="btnBackground">
                            <a href=""><img src="../../allasset/arrowIcon.png" class="arrowIcon2"></a>
                        </button>
                    </div>
                </div>

                <div class="productContent1">
                    <img src="../../allasset/toner.jpg" class="productImage1">
                    <div class="titleContent">
                        <h2 class="itemTitle">Toner</h2>
                    </div>
                    <div class="btnContent">
                        <button class="btnBackground">
                            <a href=""><img src="../../allasset/arrowIcon.png" class="arrowIcon2"></a>
                        </button>
                    </div>
                </div>

                <div class="productContent1">
                    <img src="../../allasset/others.jpg" class="productImage1">
                    <div class="titleContent">
                        <h2 class="itemTitle">Others</h2>
                    </div>
                    <div class="btnContent">
                        <button class="btnBackground">
                            <a href=""><img src="../../allasset/arrowIcon.png" class="arrowIcon2"></a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="moreInfo">
        <div class="container">
            <img src="../../allasset/homePageBanner3.jpeg" class="banner3">
            <div class="content">
                <h1 class="title">A right solution for the right product</h1>
                <p class="subtitle">Don’t have an idea or enough knowledge about the product you have your eye on? Don’t worry, we’ve got your back, our dear BaTB customers! Our team is here to provide you with all the information and support you need to make an informed decision. </p>
                <a href="/user/moreInformation.php"><button class="btn-primary">
                    FOR MORE INFO
                    <span class="btn-primary-background">
                        <img src="../../allasset/arrowIcon.png" class="arrowIcon">
                    </span>
                </button></a>
            </div>
        </div>
    </section>

    <section id="aboutUs">
        <div class="container">
            <div class="aboutContent">
                <div class="textContent">
                    <h1 class="title">What is BeautyandtheBest?</h1>
                    <p class="subtitle">At BeautyandtheBest, we prioritize your skincare journey by providing clear and detailed information about our products and their ingredients. We focus on educating our customers about active ingredients like niacinamide and salicylic acid, ensuring you understand their benefits and safe usage.<br><br>
                    Our mission is to simplify your shopping experience, eliminate ingredient confusion, and build trust in our products. Offering comprehensive product details and demonstrations, we aim to enhance your satisfaction and encourage repeat purchases. Join us in discovering skincare that empowers you to look and feel your best.</p>
                    <div class="buttonContent">
                        <a href="/user/aboutUs-1.php"><button class="btn-secondary">ABOUT US</button></a>
                    </div>
                </div>
                <img src="../../allasset/aboutUs1.png" class="aboutUsTrial">
            </div>
        </div>
    </section>

    <section id="review">
        <div class="container">
            <div class="reviewText">
                <h1 class="title">WHAT OUR CUSTOMERS SAY ABOUT US</h1>
                <p class="subtitle">We proudly collaborate with outstanding skincare brands, both local and international, to bring you only the best.</p>
                <p class="totalReview">Reviews (10)</p>
            </div>

            <div class="reviewContainer">
                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Michael G.</h2>
                    </div>
                    <p class="reviewText">I love the variety of products available! The website is easy to navigate, and my order arrived quickly.</p>
                    <div class="stars">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">James T.</h2>
                    </div>
                    <p class="reviewText">The customer service was outstanding! I had a question about my order, and they responded within minutes.</p>
                    <div class="stars">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Sophia L.</h2>
                    </div>
                    <p class="reviewText">I appreciate the detailed product descriptions and reviews. It helped me choose the right products for my skin type.</p>
                    <div class="stars">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Joshua C.</h2>
                    </div>
                    <p class="reviewText">I had a minor issue with my order, but the support team handled it professionally and quickly. The products are high quality.</p>
                    <div class="stars">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Ava S.</h2>
                    </div>
                    <p class="reviewText">The website is beautifully designed and user-friendly. I found exactly what I needed without any hassle. The eye cream is my new favorite!</p>
                    <div class="stars">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Rina A.</h2>
                    </div>
                    <p class="reviewText">Nagustuhan ko yung personalized recommendations! Nakatulong talaga sa akin na makahanap ng tamang products.</p>
                    <div class="stars">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Kevin L.</h2>
                    </div>
                    <p class="reviewText">Sobrang satisfied ako sa quality ng products! Ang moisturizer, ang ganda sa skin ko. Hindi na ako maghahanap pa sa ibang site!</p>
                    <div class="stars">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Jess C.</h2>
                    </div>
                    <p class="reviewText">I love the way each product is described in detail. It really helped me decide on the right skincare products.</p>
                    <div class="stars">
                    <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Audrei D.</h2>
                    </div>
                    <p class="reviewText">The comprehensive descriptions and honest reviews were crucial in choosing the right products for my skin concerns.</p>
                    <div class="stars">
                    <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>

                <div class="reviewContent1">
                    <div class="nameBackground">
                        <h2 class="name">Jack D.</h2>
                    </div>
                    <p class="reviewText">The website's product descriptions are thorough and incredibly useful. I was able to find exactly what I needed for my sensitive skin.</p>
                    <div class="stars">
                    <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon1.png" class="starIcon1">
                        <img src="../../allasset/starIcon2.png" class="starIcon1">
                    </div>
                </div>
            </div>
            <div class="pagination">
                <li class="page-dot active"></li>
                <li class="page-dot"></li>
                <li class="page-dot"></li>
                <li class="page-dot"></li>
            </div>
        </div>
    </section>

    <?php include "../../user/usercomponents/user-footer.php" ?>
    
    <script src="../../user/userjs/homePage.js"></script>
</body>
</html>