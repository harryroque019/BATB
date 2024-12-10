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




    <!-- user info -->
     <?php include '../../admin/admincomponents/addproduct.php'; ?>
    <?php include '../../admin/admincomponents/product.php'; ?>
    
    

 
    
</body>
<script src="../adminjs/products.js"> </script>
<!--matic mag a-appear yung chosen image-->
<script src="../adminjs/chosenappear.js"></script>
<script>
// Open Modal Function
function openUpdateModal(productId) {
    // Send an AJAX request to fetch product data by ID
    fetch(`../../admin/admincomponents/fetch_product_data.php?id=${productId}`)
    .then(response => response.json())
    .then(data => {
    if (data.error) {
    alert(data.error); // If no data is found
    return;
    }
    // Populate the modal with the data
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