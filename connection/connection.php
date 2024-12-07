<?php 
require __DIR__ . '../../vendor/autoload.php'; 



$client = new MongoDB\Client;
$collectionadmin = $client->BTBA->admin;
$collectionproducts = $client->BTBA->products;
$collectionuser = $client->BTBA->user;
$collectionorders = $client->BTBA->orders;
?>