<?php
session_start();
require '../../connection/connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if(filter_var($username, FILTER_VALIDATE_EMAIL)){
        $admin = $collectionadmin->findOne(['email' => $username]);
    } else {
        $admin = $collectionadmin->findOne(['$or' => [['username' => $username], ['firstname' => $username], ['lastname' => $username]]]);
    }
    
    if($admin && password_verify($password, $admin['password'])){
        $_SESSION['_id'] = $admin['_id'];
        
        echo "<script>alert('Log in successfully'); window.location.href = '../adminphp/dashboard.php';</script>";
        exit();
    } else {
       echo "<script>alert('Invalid username and password'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="/../admin/admincss/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <!-- header -->
    <div class="nav">
       <a href=""><img src="/../allasset/logo.png" alt="Logo" class="logo" style="margin-left: 250px;" height=70px ></a>
        <p id="Beauty">BeautyandtheBest</p>
        <ul>
            <li><a href="home"><b></b></a></li>
            <li><a href="home"><b></b></a></li>
        </ul>
    </div>
    <!-- end -->
     
    <div class="container">
        <div class="log-in">
            <form method="POST" action="">
                <h2>HI, WELCOME BACK ! ADMIN </h2> 
                <div class="input-b">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class="bx bx-user"></i> 
                </div>
                <div class="input-b">
                    <input type="password" name="password" id="" placeholder="Password" required>
                    <i class='bx bx-lock'></i>
                </div>

                <div class="input-b">
                    <button type="submit" name="btn">Sign-in</button>
                </div>

                <div class="forget">
                    <a href="">Forgot your password?</a>
                </div>

                <div class="sign-in-container">
                    <div class="line"></div>
                    <span class="or-text">or sign in with</span>
                    <div class="line"></div>
                  </div>
                
                  <div>
                    <button type="submit" class="google-btn">
                        <img src="/../allasset/googleIcon 1 (1).png" alt="Google Icon" class="google-icon">
                        Continue With Google
                    </button>
                </div>
            </form>
        </div>  
    </div>

</body>
</html>