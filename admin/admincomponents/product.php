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
// Check if the required fields are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_Id'])) {
    // Get the form data
    $productId = $_POST['productId'];
    $productName = $_POST['productName'] ?? '';
    $productPrice = $_POST['productPrice'] ?? '';
    $productCategory = $_POST['productCategory'] ?? '';
    $productSize = $_POST['productSize'] ?? '';
    $productType = $_POST['productType'] ?? '';
    $productBenefit = $_POST['productBenefit'] ?? '';
    $productSkin = $_POST['productSkin'] ?? '';
    $productMaining = $_POST['productMaining'] ?? '';
    $productIng = $_POST['productIng'] ?? '';
    $productDesc = $_POST['productDesc'] ?? '';
    $productShop = $_POST['productShop'] ?? '';
    $productStock = $_POST['productStock'] ?? '';

    // Prepare the data to be updated
    $updateData = [
        'productName' => $productName,
        'productPrice' => $productPrice,
        'productCategory' => $productCategory,
        'productSize' => $productSize,
        'productType' => $productType,
        'productBenefit' => $productBenefit,
        'productSkin' => $productSkin,
        'productMaining' => $productMaining,
        'productIng' => $productIng,
        'productDesc' => $productDesc,
        'productShop' => $productShop,
        'productStock' => $productStock
    ];

    // MongoDB client and collection

    try {
        // Update the product in MongoDB
        $result = $collectionproducts->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($productId)],
            ['$set' => $updateData]
        );

        if ($result->getModifiedCount() > 0) {
            // If the product was updated, redirect or show a success message
            echo 'Product updated successfully!';
            // Redirect to another page or show a success message
        } else {
            // If no modification was made
            echo 'No changes made to the product.';
        }
    } catch (Exception $e) {
        // Handle any errors during the update process
        echo 'Error updating product: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request.';
}
?>
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
            <tr data-id="<?= htmlspecialchars($product['_id']); ?>">
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
                    <button class="updateBtn" onclick="openUpdateModal('<?= htmlspecialchars($product['_id']); ?>')">Update</button>
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
        <form id="updateForm" metho="post">
    <input type="hidden" id="productId" name="productId">
    
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

    <label for="productBenefit">Skin:</label>
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

    <!-- Add more fields as necessary -->

    <button type="submit">Save Changes</button>
</form>
        <button onclick="closeUpdateModal()">Close</button>
    </div>
</div>

</body>



<style>
/* Modal Styling */
.modal {
    display: none; /* Hide modal by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}
</style>
</html>
