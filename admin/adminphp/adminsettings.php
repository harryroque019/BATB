<?php
session_start();
require '../../connection/connection.php';
if (!isset($_SESSION['_id'])) {
  header("Location: ../adminphp/login.php");
  exit;
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../admincss/adminsetting.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <title>Orders</title>
  </head>
  <body>
    <header>
      <div class="container">
        <nav>
          <div class="logoBrand">
            <a href="homePage.html"
              ><img
                src="/../allasset/logoIcon (1).png"
                class="logoIcon"
                style="height: 80px"
            /></a>
            <h1 class="brandName">BeautyandtheBest</h1>
          </div>
          <a href=""
            ><img
              style="height: 50px"
              src="/../allasset/registerUser.png"
              class="profileIcon"
              style="margin-left: -100px"
          /></a>
        </nav>
      </div>
    </header>

    <div class="menu">
      <div class="section">
        <div class="btn nav-btn">
          <a href="dashboard.php">
            <button type="submit">
              <img
                src="/../allasset/dashboardIcon.png"
                class="image"
                style="width: 30px; height: 30px"
              />
              <p>Dashboard</p>
            </button>
          </a>
        </div>
        <a href="products.php">
          <div class="btn nav-btn">
            <button type="submit">
              <img
                src="/../allasset/productsIcon.png"
                class="image"
                style="width: 30px; height: 30px"
              />
              <p>Products</p>
            </button>
          </div>
        </a>
        <div class="btn nav-btn">
          <a href="orders.php">
            <button type="submit">
              <img
                src="/../allasset/orderIcon.png"
                class="image"
                style="width: 30px; height: 30px"
              />
              <p>Orders</p>
            </button>
          </a>
        </div>
      </div>
      <div class="button">
        <form action="" method="post">
          <button type="submit" name="logout" id="logout">LOG OUT</button>
        </form>
      </div>
    </div>

   

    <!-- MODAL HERE -->
  <?php include '../../admin/admincomponents/admin-settings-modal.php'; ?>
     <!-- MODAL HERE -->
      
          <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
          ></script>
        </body>
      </html>
