<?php
require '../../connection/connection.php';

$client = new MongoDB\Client;
$collectionproducts = $client->BTBA->products;

$categories = $collectionproducts->distinct('productCategory');
// Retrieve all products from the database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../usercss/productList.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
    <title>productList</title>
</head>
<body>

   <?php include '../usercomponents/user-navigation.php'; ?>

    <section id="category-product-section">
        <div class="container">
            <div class="welcome-content">
                <h1 class="title">Hello, Welcome to Beauty and the Best Shop! Enjoy Shopping!</h1>
            </div>
            <section id="category-container-section">
                <div class="category-left-panel">
                    <div class="checkbox-content">
                        <div class="title-cetegories">
                            <span class="categories">Categories</span>
                            <div class="line"></div>
                        </div>

                        <div class="checkbox-list">
                            <?php foreach ($categories as $category): ?>
                            <label class="category-checkbox">
                                <input type="checkbox" value="<?= strtolower(str_replace(' ', '-', $category)) ?>" class="category">
                                <span class="checkbox-title"><?= htmlspecialchars($category) ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                        
                    </div>
                </div>
             
                <div class="category-right-panel">
                        <div class="brand-1">
                            <h1>Soul Apothecary</h1>
                            <?php include '../usercomponents/productlist.php'; ?>
                </div>

                    <div class="recommendation-pagination">
                        <li class="recommendation-page-dot active"></li>
                        <li class="recommendation-page-dot"></li>
                        <li class="recommendation-page-dot"></li>
                </div>
                    <section id="recommendation-section">
                        <div class="recommendation-container">
                            <div class="recommendation-content">
                                <h1 class="recommendations">Recommendations</h1>
                                <div class="recommended-items">
                                    <?php include '../usercomponents/productlist.php'; ?>
                                    <div class="recommendation-pagination">
                                    <li class="recommendation-page-dot active"></li>
                                    <li class="recommendation-page-dot"></li>
                                    <li class="recommendation-page-dot"></li>
                                </div>
                            </div>  
                        </div>
                    </section> 

                </div>
             </section>
        </div>
    </section>

    
<?php include '../usercomponents/user-footer.php'; ?>

</body>

</html>