<?php
require '../connection/connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $pnum = $_POST['pnum'];

    $isAdmin = $_POST['isAdmin'] ?? false;

  
    $existuser = $collectionadmin->findOne(['email' => $email]);
    if($existuser) {
     echo "<script>alert('Email already exist');</script>";
    } else {
  
      $hashedpass = password_hash($password, PASSWORD_DEFAULT);
  
      $collectionadmin->insertOne([
  
        'firstname' => $fname,
        'lastname' => $lname,
        'username' => $uid,
        'email' => $email,
        'phonenumber'=> $pnum,
        'password' => $hashedpass,
        'isAdmin' => $isAdmin
  
      ]);
      echo "<script>alert('Registered successfully'); window.location.href = '../admin/login.php';</script>";
      exit;
    }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admincss/register.css">
    <title>Sign-up</title>
</head>
<body>

    <!-- header -->
    <div class="nav">
        <img src="../imageadmin/logo.png" alt="Logo" class="logo" style="margin-left: 190px; " height=70px>
        <p id="Beauty">BeautyandtheBest</p>
        <ul>
            <li><a href="Home"><b>Home</b></a></li>
            <li><a href="Home"><b>Shop</b></a></li>
            <li><a href="Home"><b>About Us</b></a></li>
            <a href=""><img src="../imageadmin/image 47.png" alt="" style="width: 37px;" height="30px"></a>
        </ul>
    </div>
    <!-- end -->

    
    <div class="container">
        <div class="cons">
            <!--============for image slidess============= -->
            <div class="images">
                <section id="image1">
                    <img src="../imageadmin/k.png" alt="Image 1" style="width: 420px; height: 470px;">
                </section>
                <section id="image2">
                    <img src="../imageadmin/hey.png" alt="Image 2" style="width: 420px; height: 470px;">
                </section>
        
                <!-- Buttons at the bottom of the images -->
                <div class="buttons-container">
                    <button id="showFirstImageButton" class="dot-button"></button>
                    <button id="showSecondImageButton" class="dot-button"></button>
                </div>
            </div>
        

            <!-- =================end================= -->
                <div class="register">
                    <form method="POST" action="">
                        <div class="text">
                            <h1>Create an account</h1>
                            <p>Already have an account?<a href="../../admin/login.php">Singin</a></p>
                        </div>
                        <div class="inputs">
                            <input id="fname" name="fname" type="text" placeholder="First Name" required> 
                            <input id="lname" name="lname" type="input-b" placeholder="Last Name"required>
                        </div>
                        <div class="inputs">
                            <input id="uid" name="uid" type="text" placeholder="User Name" required>
                        </div>
                        <div class="inputs">
                            <input id="email" name="email" type="text" placeholder="Email" required>
                        </div>
                        <div class="inputs">
                            <input id="pnum" name="pnum" type="tel" pattern="\d{11}" placeholder="Phone Number" required>
                        </div>
                        <div class="inputs">
                            <input id="pass" name="pass" type="password" placeholder="Password" required>
                        </div>
                        <div class="check">
                           <label id="lebel" for="check">
                            <input id="check" type="checkbox" required>I agree to the Terms & Conditions</label >
                        </div>

                        <div class="input-b">
                            <button name="submit" type="submit">Sign-in</button>
                        </div>
                        <div class="text-with-lines">Or register with</div>
                        <div>
                            <button type="submit" class="google-btn">
                                <img src="../imageadmin/googleIcon 1 (1).png" alt="Google Icon" class="google-icon">
                                Continue With Google
                            </button>
                        </div>
                                 
                    </div>
                    <input type="hidden" name="isAdmin" value="1">
                 </form>
        </div> 
    </div>
<script src="../adminjs/register.js"></script>
    
   
</body>
</html>
