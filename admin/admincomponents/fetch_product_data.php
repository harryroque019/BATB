<?php
require '../../connection/connection.php';

if (isset($_GET['id'])) {
    $productId = new MongoDB\BSON\ObjectId($_GET['id']);
    $client = new MongoDB\Client;
    $collectionproducts = $client->BTBA->products;

    $product = $collectionproducts->findOne(['_id' => $productId]);

    if ($product) {
        // Return product data as JSON
        echo json_encode($product);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
} else {
    echo json_encode(['error' => 'No product ID provided']);
}
?>