<?php
require '../../connection/connection.php';

// Get product ID from the query string
if (isset($_GET['id'])) {
    $productId = $_GET['id'];  // MongoDB ID
    $product = $collectionproducts->findOne(['_id' => new MongoDB\BSON\ObjectId($productId)]);
    if ($product) {
        header('Content-Type: application/json');
        echo json_encode($product);  // Return the product details in JSON format
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Product not found']);
    }
}
?>

