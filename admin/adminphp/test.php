<?php
require '../../connection/connection.php';
session_start();
$client = new MongoDB\Client;
$collectionproduct = $client->BTBA->products;
$document = $collectionproduct->findOne([], ['projection' => ['image' => 1]]);

$productimage = "";
if ($document && isset($document['image'])) {
    $productimage = 'data:image/png;base64,' . base64_encode($document['image']);
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
    <img src="<?= $productimage; ?>" alt="">
</body>

</html>
