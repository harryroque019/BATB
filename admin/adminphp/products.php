<?php
session_start();
require '../../connection/connection.php';
if (!isset($_SESSION['_id'])) {
  header("Location: ../adminphp/login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admincss/products.css">
    <title>Document</title>
</head>
<body>
<?php include '../../admin/admincomponents/admin-nav-side.php'; ?>
<?php include '../../admin/admincomponents/tes.php'?>
</body>
</html>