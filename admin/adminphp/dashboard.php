<?php
require '../../connection/connection.php';
session_start();

if (!isset($_SESSION['_id'])) {
    header("Location: ../adminphp/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $status = $_POST['status'];

    $collectionuser->updateOne(
        ['email' => $email],
        ['$set' => ['status' => $status]]
    );

    echo "<script>alert('Status updated successfully'); window.location.href = 'dashboard.php';</script>";
    exit;
}

$users = $collectionuser->find();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../admin/admincss/dasboard.css">
    <title>Document</title>
    
</head>
<body>
    <?php include '../admincomponents/admin-nav-side.php'; ?>
    <div class="user-info">
        <div class="boxes">
            <div class="box">
                <h2>Registered <br>User</h2>
                <h1>100</h1>
            </div>
            <div class="box">
                <h2>Registered <br>User</h2>
                <h1>100</h1>
            </div>
            <div class="box">
                <h2>Registered <br>User</h2>
                <h1>100</h1>
            </div>
    </div>
        
        <form method="GET">
            <input type="text" name="search" id="search" placeholder="Search by Firstname or Lastname" required>
            <button type="submit" name="search">Search</button>
        </form>

        <?php
        $searchQuery = $_GET['search'] ?? '';
        $filter = [];
        if ($searchQuery) {
            $filter = [
                '$or' => [
                    ['firstname' => new \MongoDB\BSON\Regex($searchQuery, 'i')],
                    ['lastname' => new \MongoDB\BSON\Regex($searchQuery, 'i')]
                ]
            ];
        }
        $users = $collectionuser->find($filter);
        ?>
        <div class="user-data">
           <div class="table">
            <table>
                <tr>
                <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                
                <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phonenumber']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td>
                    <form method="POST">
                        <select name="status" class="status">
                            <option value="Active" <?php echo $user['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
                            <option value="Inactive" <?php echo $user['status'] == 'Inactive' ? 'selected' : ''; ?>>nactive</option>
                        </select>
                        <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
                        <button type="submit">Save</button>
                    </form>
                    </td>
                    <td></td>
                </tr>
                <?php } ?>
            </table>
            </div> 
        </div>
    </div>
</body>
</html>

