<?php
require '../../connection/connection.php';

$client = new MongoDB\Client;
$collectionproducts = $client->BTBA->products;

$colected = $collectionproducts->find([])->toArray();

// Get the list of categories
$categories = [];
foreach ($colected as $product) {
    $categories[] = $product['productCategory'];
}
$categories = array_unique($categories);

$imageData = [];
foreach ($colected as $product) {
    if (isset($product['image'])) {
        $imageData[$product['productName']] = $product['image'];
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['from_action']) && $_POST['from_action'] === 'update') {
    // Get the product data from the form
    $productId = $_POST['productId']; // MongoDB ID
    $productData = [
        'productName' => $_POST['productName'],
        'productPrice' => $_POST['productPrice'],
        'productCategory' => $_POST['productCategory'],
        'productSize' => $_POST['productSize'],
        'productType' => $_POST['productType'],
        'productSkin' => $_POST['productSkin'],
        'productBenefit' => $_POST['productBenefit'],
        'productMaining' => $_POST['productMaining'],
        'productIng' => $_POST['productIng'],
        'productDesc' => $_POST['productDesc'],
        'productShop' => $_POST['productShop'],
        'productStock' => $_POST['productStock'],
    ];

    try {
        // Update the product in MongoDB
        $result = $collectionproducts->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId((string)$productId)], // Filter by the product ID
            ['$set' => $productData] // Set the new values
        );
        if ($result->getModifiedCount() > 0) {
            echo "Product updated successfully!";
        } else {
            echo "No changes made or product not found!";
        }
    } catch (Exception $e) {
        echo "Error updating product: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="filter_plus_productlist">
    <div class="filter_category">
    <label for="category">Filter by Category:</label>
    <select id="category" onchange="filterTableByCategory(this.value)">
        <option value="">All</option>
        <?php
        sort($categories);
        foreach ($categories as $category) { ?>
            <option value="<?= htmlspecialchars($category); ?>"><?= htmlspecialchars($category); ?></option>
        <?php } ?>
    </select>
    </div>
    <div class="product_list">
    <table>
        <tr>
            <th>PRODUCT CATEGORY</th>
            <th>SHOP NAME</th>
            <th>IMAGE</th>
            <th>PRODUCT NAME</th>
            <th>PRODUCT TYPE</th>
            <th>SKIN TYPE</th>
            <th>STOCKS</th>
            <th>PRICE</th>
            <th>ACTION</th>
        </tr>
        <?php foreach ($colected as $product) { ?>
            <tr data-id="<?= htmlspecialchars($product['_id']->__toString()); ?>">
                <td><?= htmlspecialchars($product['productCategory'] ?? ''); ?></td>
                <td><?= htmlspecialchars($product['productShop'] ?? ''); ?></td>
                <td>
                    <?php if (isset($product['image']) && isset($imageData[$product['productName']])) { ?>
                        <img src="/../allasset/<?= htmlspecialchars($imageData[$product['productName']]); ?>" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                    <?php } else { ?>
                        <img src="" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                    <?php } ?>
                </td>
                <td><?= htmlspecialchars($product['productName'] ?? ''); ?></td>
                <td><?= htmlspecialchars($product['productType'] ?? ''); ?></td>
                <td><?= htmlspecialchars($product['productSkin'] ?? ''); ?></td>
                <td><?= htmlspecialchars($product['productStock'] ?? ''); ?></td>
                <td><?= htmlspecialchars($product['productPrice'] ?? ''); ?></td>
                <td class="td_button">
                    <button class="updateBtn" onclick="openUpdateModal('<?= htmlspecialchars($product['_id']->__toString()); ?>')">Update</button>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>

<!-- Modal Structure -->
<div id="updateModal" class="modal">
    <div class="modal-content">
        <h4>Update Product</h4>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="from_action" value="update">
            <input type="hidden" name="productId" id="productId"> <!-- This will be populated dynamically -->
            
            <!-- Other form fields go here (productName, productPrice, etc.) -->
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName"><br><br>

            <label for="productPrice">Product Price:</label>
            <input type="text" id="productPrice" name="productPrice"><br><br>

            <label for="productCategory">Product Category:</label>
            <input type="text" id="productCategory" name="productCategory"><br><br>

            <label for="productSize">Product Size:</label>
            <input type="text" id="productSize" name="productSize"><br><br>

            <label for="productType">Product Type:</label>
            <input type="text" id="productType" name="productType"><br><br>

            <label for="productBenefit">Skin Benefit:</label>
            <input type="text" id="productBenefit" name="productBenefit"><br><br>

            <label for="productSkin">Skin:</label>
            <input type="text" id="productSkin" name="productSkin"><br><br>

            <label for="productMaining">Main Ingredients:</label>
            <input type="text" id="productMaining" name="productMaining"><br><br>

            <label for="productIng">Other Ingredients:</label>
            <input type="text" id="productIng" name="productIng"><br><br>

            <label for="productDesc">Product Description:</label>
            <input type="text" id="productDesc" name="productDesc"><br><br>

            <label for="productShop">Shop:</label>
            <input type="text" id="productShop" name="productShop"><br><br>

            <label for="productStock">Product Stock:</label>
            <input type="text" id="productStock" name="productStock"><br><br>

            <button type="submit">Save Changes</button>
        </form>
        <button onclick="closeUpdateModal()">Close</button>
    </div>
</div>

</body>
<script>
// Open Modal Function
function openUpdateModal(productId) {
// Send an AJAX request to fetch product data by ID
fetch(`/../../admin/admincomponents/fetch_product_data.php?id=${productId}`)
.then(response => response.json())
.then(data => {
if (data.error) {
alert(data.error); // If no data is found
return;
}
// Populate the modal with the data
document.getElementById('productId').value = data._id; // Set the product ID
document.getElementById('productName').value = data.productName || '';
document.getElementById('productPrice').value = data.productPrice || '';
document.getElementById('productCategory').value = data.productCategory || '';
document.getElementById('productSize').value = data.productSize || '';
document.getElementById('productType').value = data.productType || '';
document.getElementById('productSkin').value = data.productSkin || '';
document.getElementById('productBenefit').value = data.productBenefit || '';
document.getElementById('productMaining').value = data.productMaining || '';
document.getElementById('productIng').value = data.productIng || '';
document.getElementById('productDesc').value = data.productDesc || '';
document.getElementById('productShop').value = data.productShop || '';
document.getElementById('productStock').value = data.productStock || '';

// Show the modal
document.getElementById('updateModal').style.display = 'flex';
})
.catch(error => {
console.error('Error fetching product data:', error);
});
}

// Close Modal Function
function closeUpdateModal() {
document.getElementById('updateModal').style.display = 'none';
}
</script>
</html>


