<?php
require '../../connection/connection.php';
session_start();

if (!isset($_SESSION['_id'])) {
    header("Location: ../userphp/login.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../userphp/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../usercss/userDashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Italiana&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>userDashboard</title>
</head>
<body>

    <?php include '../usercomponents/user-navigation.php'; ?>

    <section id="user-dashboard">
    <?php include '../../user/usercomponents/profile-skin-orders.php'; ?>   

        <div class="container">
            <div class="user-info">
                <div class="account-header">
                    <h1>Profile Information</h1>
                    <a href="?logout=true"><button>Logout</button></a>
                </div>                
                <div class="inputs">
                    <div class="input">
                        <div class="inp">
                            <p>FIRST NAME</p>
                            <input type="text"> 
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="inp">
                            <p>EMAIL</p>
                            <input type="email">
                            <i class='bx bx-envelope'></i>
                        </div>
                        <div class="inp">
                            <p>DATE OF BIRTH</p>
                            <input type="date">
                        </div>
                    </div>  
                    <div class="input">
                        <div class="inp1">
                            <p>LAST NAME</p>
                            <input type="text">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="inp1">
                            <p>PHONE NUMBER</p>
                            <input type="text">
                            <i class='bx bxs-phone'></i>
                        </div>
                        <div class="inp1">
                            <p>ADDRESS</p>
                            <input type="text">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                    </div>
                </div> 
                <button class="edit">Edit</button>
                
                <div class="modal-container">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1>Update Profile</h1>
                            <span class="close">&times;</span>
                        </div>
                        <div class="inputs">
                            <div class="input">
                                <div class="inp">
                                    <p>Change Email</p>
                                    <input type="email">
                                </div>
                                <div class="inp">
                                    <p>Add Your Birthday</p>
                                    <input type="date">
                                </div>
                                <div class="inp">
                                    <p>Change Password</p>
                                    <input type="password">
                                </div>
                            </div>  
                            <div class="input">
                                <div class="inp1">
                                    <p>Change Phone Number</p>
                                    <input type="text">
                                </div>
                                <div class="inp1">
                                    <p>Change Address</p>
                                    <input type="text">
                                </div>
                                <div class="inp1">
                                    <p>Confirm New Password</p>
                                    <input type="password">
                                </div>
                            </div>
                        </div>
                        <button class="save-btn" type="submit">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const modal = document.querySelector(".modal-container");
        const editBtn = document.querySelector(".edit");
        const span = document.querySelector(".close");
        const saveBtn = document.querySelector(".save-btn");

        window.addEventListener("load", () => {
            modal.style.display = "none";
        });

        editBtn.addEventListener("click", () => {
            modal.style.display = "block";
        });

        span.addEventListener("click", () => {
            modal.style.display = "none";
        });

        saveBtn.addEventListener("click", (event) => {
            event.preventDefault(); // Prevent form submission
            modal.style.display = "none";
        });

        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    </script>
</body>
</html>

