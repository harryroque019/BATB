<?php
require '../../connection/connection.php';

use MongoDB\BSON\ObjectId;

// MongoDB connection and product collection
$collectionproducts = $client->BTBA->products;
$colected = $collectionproducts->find([])->toArray();

// Collect unique product categories
$categories = [];
foreach ($colected as $product) {
    $categories[] = $product['productCategory'] ?? '';
}
$categories = array_unique($categories);

// Handle new product form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $productName = $_POST['productNameInput'] ?? '';
    $productPrice = $_POST['productPriceInput'] ?? 0;
    $productCategory = $_POST['productCategoryInput'] ?? '';
    $productStock = $_POST['productStockInput'] ?? 0;
    $productSize = $_POST['productSizeInput'] ?? null;
    $productType = $_POST['productTypeInput'] ?? '';
    $productSkin = $_POST['productSkinInput'] ?? '';
    $productBenefit = $_POST['productBenefitInput'] ?? null;
    $productMaining = $_POST['productMainingInput'] ?? '';
    $productIng = $_POST['productIngInput'] ?? '';
    $productDesc = $_POST['productDescInput'] ?? '';
    $productShop = $_POST['productShopNameInput'] ?? '';
    $image = $_FILES['image'] ?? null;

    // Process the uploaded image
    if ($image && isset($image['name'])) {
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageSize = $image['size'];
        $imageError = $image['error'];
        $imageExt = explode('.', $imageName);
        $imageActualExt = strtolower(end($imageExt));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageActualExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize < 5000000) { // Check if the file size is under 5MB
                    $imageNameNew = uniqid('', true) . "." . $imageActualExt;
                    $destination = _DIR_ . "/../../allasset/" . $imageNameNew;
                    if (move_uploaded_file($imageTmpName, $destination)) {
                        // Insert product data into MongoDB
                        $insertResult = $collectionproducts->insertOne([
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
                            'productCount' => 0 // Default to 0 for new products
                        ]);
                        if ($insertResult) {
                            echo "<script>alert('Product added successfully!'); window.location.href = '../../admin/admincomponents/tes.php';</script>";
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
}

// Handle product update (when POST request contains 'update' action)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['from_action']) && $_POST['from_action'] === 'update') {
    $productId = $_POST['productId'] ?? '';
    if (preg_match('/^[a-f\d]{24}$/i', $productId)) {
        $productData = [
            'productName' => $_POST['productName'] ?? '',
            'productPrice' => $_POST['productPrice'] ?? 0,
            'productCategory' => $_POST['productCategory'] ?? '',
            'productSize' => $_POST['productSize'] ?? '',
            'productType' => $_POST['productType'] ?? '',
            'productSkin' => $_POST['productSkin'] ?? '',
            'productBenefit' => $_POST['productBenefit'] ?? '',
            'productMaining' => $_POST['productMaining'] ?? '',
            'productIng' => $_POST['productIng'] ?? '',
            'productDesc' => $_POST['productDesc'] ?? '',
            'productShop' => $_POST['productShop'] ?? '',
            'productStock' => $_POST['productStock'] ?? 0,
        ];
        try {
            $result = $collectionproducts->updateOne(
                ['_id' => new ObjectId($productId)],
                ['$set' => $productData]
            );
            if ($result->getModifiedCount() > 0) {
                echo "Product updated successfully!";
            } else {
                echo "No changes made or product not found!";
            }
        } catch (Exception $e) {
            echo "Error updating product: " . $e->getMessage();
        }
    } else {
        echo "Invalid Product ID!";
    }
}

// Fetch product data by ID for modal
if (isset($_GET['id']) && preg_match('/^[a-f\d]{24}$/i', $_GET['id'])) {
    $productId = $_GET['id'];
    $product = $collectionproducts->findOne(['_id' => new ObjectId($productId)]);
    echo json_encode($product ?? []);
    exit;
} elseif (isset($_GET['id'])) {
    echo json_encode([]);
    exit;
}
?>



<!-- HTML Structure for Product Form and Table -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <title>Add Product</title>
</head>

<body>

    <div class="container1 mt-5">
        <h2>Add New Product</h2>
        <form action="../../admin/admincomponents/tes.php" method="post" enctype="multipart/form-data">
            <!-- Product form fields -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="file">Product Image</label>
                        <input type="file" name="image" id="file" class="form-control" onchange="loadFile(event)"
                            required>
                        <img id="output" style="width: 100%; height: 100%; object-fit: cover; display: none;" />
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Upload Product</button>
                </div>
                <div class="col-md-6">
                    <!-- Other product input fields -->
                    <div class="form-group mb-3">
                        <label for="productNameInput">Product Name</label>
                        <input type="text" name="productNameInput" id="productNameInput" class="form-control" required>
                    </div>
                    <!-- ...other input fields... -->
                </div>
            </div>
        </form>
    </div>

    <!-- Product List and Filtering -->
    <div class="filter_plus_productlist">
        <div class="filter_category">
            <label for="category">Filter by Category:</label>
            <select id="category" onchange="filterTable()">
                <option value="all">All</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                <?php } ?>
            </select>
        </div>

        <table id="productTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($colected as $product) { ?>
                    <tr>
                        <td><?php echo $product['productName']; ?></td>
                        <td><?php echo $product['productCategory']; ?></td>
                        <td><?php echo $product['productPrice']; ?></td>
                        <td><?php echo $product['productStock']; ?></td>
                        <td>
                            <button onclick="openUpdateModal('<?php echo $product['_id']; ?>')"
                                class="btn btn-warning btn-sm">Edit</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for updating product -->
    <div id="updateModal" style="display: none;">
        <div class="modal-content">
            <div class="close-modal" onclick="closeModal()">&times;</div>
            <h4>Edit Product</h4>
            <form id="updateForm" method="POST" action="tes.php">
                <input type="hidden" id="productId" name="productId">
                <div>
                    <label for="productName">Product Name</label>
                    <input type="text" id="productName" name="productName">
                </div>
                <div>
                    <label for="productPrice">Product Price</label>
                    <input type="number" id="productPrice" name="productPrice">
                </div>
                <div>
                    <label for="productCategory">Product Category</label>
                    <input type="text" id="productCategory" name="productCategory">
                </div>
                <!-- Add other fields here -->
                <button class="update-btn" type="submit" name="from_action" value="update">Update Product</button>
            </form>
        </div>
    </div>

    <style>
        .container {
            max-width: 1700px;
            margin-top: -550px;
        }

        .container1 {
            margin-left: auto;
            margin-right: auto;
            max-width: 1450px;
            padding: 20px;
            width: 100%;
        }

        .filter_category {
            margin-left: 250px;
        }

        .table {
            margin-top: 30px;
        }

        #updateModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 30%;
            width: 100%;
            height: 100%;
            overflow: auto;
        }

        #updateModal input {
            padding: 10px 10px;
            margin-top: 1rem;
            margin-left: 1rem;
        }

        input {
            outline: none;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            height: 38%;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }

        .close-modal {
            position: absolute;
            right: 20px;
            top: 5px;
            cursor: pointer;
            font-size: 30px;
        }

        .update-btn {
            padding: 10px 20px;
            background-color: brown;
            margin-top: 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }
    </style>



    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.style.display = 'block';
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        function openUpdateModal(productId) {
            fetch('../../admin/admincomponents/product2.php?id=' + productId)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        document.getElementById('productId').value = productId;
                        document.getElementById('productName').value = data.productName;
                        document.getElementById('productPrice').value = data.productPrice;
                        document.getElementById('productCategory').value = data.productCategory;
                        document.getElementById('updateModal').style.display = 'block';
                    }
                });
        }

        function closeModal() {
            document.getElementById('updateModal').style.display = 'none';
        }

        // Filter table by category
        function filterTable() {
            const category = document.getElementById('category').value;
            const table = document.getElementById('productTable');
            const rows = table.getElementsByTagName('tr');
            for (let i = 1; i < rows.length; i++) {
                const cell = rows[i].getElementsByTagName('td')[1]; // Category column
                if (cell) {
                    const textValue = cell.textContent || cell.innerText;
                    rows[i].style.display = (category === 'all' || textValue === category) ? '' : 'none';
                }
            }
        }
    </script>

</body>

</html>