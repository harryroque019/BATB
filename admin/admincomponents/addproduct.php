<?php
require '../../connection/connection.php';

$collectionproducts = $client->BTBA->products;
$colected = $collectionproducts->find([])->toArray();
$categories = [];
foreach ($colected as $product) {
    $categories[] = $product['productCategory'] ?? '';
}
$categories = array_unique($categories);

$imageData = [];
foreach ($colected as $product) {
    if (isset($product['image'])) {
        $imagePath = __DIR__ . '/../../allasset/' . $product['image'];
        if (file_exists($imagePath)) {
            $imageData[$product['productName']] = file_get_contents($imagePath);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data from the form
    $productName = $_POST['productNameInput'] ?? '';
    $productCount = 0; // Set default count to 0 for new products
    $productPrice = $_POST['productPriceInput'] ?? 0;
    $productCategory = $_POST['productCategoryInput'] ?? '';
    $productStock = $_POST['productStockInput'] ?? 0;
    $productSize = $_POST['productSizeInput'] ?? '';
    $productType = $_POST['productTypeInput'] ?? '';
    $productSkin = $_POST['productSkinInput'] ?? '';
    $productBenefit = $_POST['productBenefitInput'] ?? '';
    $productMaining = $_POST['productMainingInput'] ?? '';
    $productIng = $_POST['productIngInput'] ?? '';
    $productDesc = $_POST['productDescInput'] ?? '';
    $productShop = $_POST['productShopNameInput'] ?? '';
    $image = $_FILES['image'] ?? null;

    // Process the uploaded image
    $imageName = $image['name'] ?? '';
    $imageTmpName = $image['tmp_name'] ?? '';
    $imageSize = $image['size'] ?? 0;
    $imageError = $image['error'] ?? 0;
    $imageType = $image['type'] ?? '';
    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    // Validate the image file
    if (in_array($imageActualExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 5000000) { // Check size is under 5MB
                $imageNameNew = uniqid('', true) . "." . $imageActualExt;
                $destination = __DIR__ . "/../../allasset/" . $imageNameNew;
                if (move_uploaded_file($imageTmpName, $destination)) {
                    // Insert product data into MongoDB
                    if (
                        $collectionproducts->insertOne([
                            'productName' => $productName,
                            'productPrice' => $productPrice,
                            'productCategory' => $productCategory,
                            'productStock' => $productStock,
                            'productSize' => $productSize,
                            'productType' => $productType,
                            'productSkin' => $productSkin,
                            'productBenefit' => $productBenefit,
                            'productMaining' => $productMaining,
                            'productIng' => $productIng,
                            'productDesc' => $productDesc,
                            'image' => $imageNameNew,
                            'productShop' => $productShop,
                            'productCount' => $productCount
                        ])
                    ) {
                        echo "<script>alert('Product added successfully!');</script>";
                        echo "<script>window.location.href = 'products.php';</script>";
                        exit;
                    }
                } else {
                    echo "<script>alert('Error uploading image');</script>";
                }
            } else {
                echo "<script>alert('Image size should be less than 5MB');</script>";
            }
        } else {
            echo "<script>alert('Error uploading image');</script>";
        }
    } else {
        echo "<script>alert('Image type should be jpg, jpeg, png, or gif');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Add Product</title>
</head>

<body>

    <!-- PRODUCT INFO FORM -->
    <div class="container mt-5">
        <h2>Add New Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <!-- Image Upload -->
                    <div class="form-group mb-3">
                        <label for="file">Product Image</label>
                        <input type="file" name="image" id="file" class="form-control" onchange="loadFile(event)" required>
                        <img id="output" style="width: 100%; height: 100%; object-fit: cover; display: none;" />
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Upload Product</button>
                </div>

                <div class="col-md-6">
                    <!-- Product Information -->
                    <div class="form-group mb-3">
                        <label for="productNameInput">Product Name</label>
                        <input type="text" name="productNameInput" id="productNameInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productPriceInput">Product Price</label>
                        <input type="number" name="productPriceInput" id="productPriceInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productCategoryInput">Product Category</label>
                        <input type="text" name="productCategoryInput" id="productCategoryInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productStockInput">Stock Quantity</label>
                        <input type="number" name="productStockInput" id="productStockInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productSizeInput">Size / Weight</label>
                        <input type="text" name="productSizeInput" id="productSizeInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productShopNameInput">Shop Name</label>
                        <input type="text" name="productShopNameInput" id="productShopNameInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productTypeInput">Product Type</label>
                        <input type="text" name="productTypeInput" id="productTypeInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productSkinInput">Skin Type</label>
                        <input type="text" name="productSkinInput" id="productSkinInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productBenefitInput">Benefits</label>
                        <input type="text" name="productBenefitInput" id="productBenefitInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productMainingInput">Main Ingredients</label>
                        <input type="text" name="productMainingInput" id="productMainingInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productIngInput">Other Ingredients</label>
                        <input type="text" name="productIngInput" id="productIngInput" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="productDescInput">Product Description</label>
                        <textarea name="productDescInput" id="productDescInput" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>

<script>
// Preview image when selected
function loadFile(event) {
var output = document.getElementById('output');
output.style.display = "block";
output.src = URL.createObjectURL(event.target.files[0]);
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
