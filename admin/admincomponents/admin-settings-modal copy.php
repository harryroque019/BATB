<?php 
include '../../connection/connection.php'; 
$currEmail = $_SESSION['_id'];
$admininfo = $collectionadmin->findOne(['_id' => $currEmail]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
</head>
<body>
<div class="user-info">
    <div class="box1">
        <form action="" method="POST">
            <div class="adminacct">
                <div class="image1">
                    <img src="/../allasset/registerUser.png" alt="" style="height: 250px; width: 280px;"/>
                </div>
                <div class="welcome">
                    <h3>WELCOME ADMIN:</h3>
                    <p>USERNAME: <?php echo $admininfo['username'];?></p>
                    <p>NAME: <?php echo $admininfo['firstname'];?> <?php echo $admininfo['lastname'];?></p>
                    <p>EMAIL: <?php echo $admininfo['email'];?></p>
                    <p>PHONE NUMBER: <?php echo $admininfo['phonenumber'];?></p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btnupdate">UPDATE</button>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Information</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="updateform" action="" method="POST">
                                <div class="inputs">
                                    <p>USERNAME:</p> 
                                    <input type="text" name="username" 
                                    value="<?php echo $admininfo['username']; ?>">
                                </div>
                                <div class="inputs">
                                    <p>FIRST NAME:</p> 
                                    <input type="text" name="firstname" 
                                    value="<?php echo $admininfo['firstname']; ?>">
                                </div>
                                <div class="inputs">
                                    <p>LAST NAME:</p> 
                                    <input type="text" name="lastname" 
                                    value="<?php echo $admininfo['lastname']; ?>">
                                </div>
                                <div class="inputs">
                                    <p>EMAIL:</p> 
                                    <input type="text" name="email" 
                                    value="<?php echo $admininfo['email']; ?>">
                                </div>
                                <div class="inputs">
                                    <p>PHONE NUMBER:</p> 
                                    <input type="text" name="phonenumber" 
                                    value="<?php echo $admininfo['phonenumber']; ?>">
                                </div>   
                                <button type="submit" 
                                class="btnupdate" 
                                name="updateinfo"
                                >SAVE</button>
                            </form>

                            <?php
                            if (isset($_POST['updateinfo'])) {
                                $collectionadmin->updateOne(
                                    ['_id' => $currEmail],
                                    [
                                        '$set' => [
                                            'username' => $_POST['username'],
                                            'firstname' => $_POST['firstname'],
                                            'lastname' => $_POST['lastname'],
                                            'email' => $_POST['email'],
                                            'phonenumber' => $_POST['phonenumber']
                                        ]
                                    ]
                                );
                                    echo "<script>alert('Information updated successfully'); window.location.href = '../adminphp/adminsettings.php';</script>";
                                exit();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

