<?php
require '../../connection/connection.php';
session_start();

// Check if user is logged in
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Log incoming POST data for debugging
    error_log('Received POST data: ' . json_encode($_POST));

    // Sanitize POST data
    $orderId = filter_var($_POST['order_id'], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

    // Check if all required data is provided
    if (empty($orderId) || empty($status)) {
        echo json_encode(['success' => false, 'error' => 'Missing required fields']);
        exit;
    }

    try {
        // Convert orderId to MongoDB ObjectId
        $orderId = new MongoDB\BSON\ObjectId($orderId);

        // Log the orderId to ensure it's being passed correctly
        error_log('Updating order ID: ' . $orderId);  // Log the order ID

        // Update the status in the database for the given orderId
        $result = $collectionorder->updateOne(
            ['_id' => $orderId], 
            ['$set' => [
                'status' => $status
            ]]
        );

        // Log the result of the update
        error_log('Update result: ' . json_encode($result));

        // Check if the update was successful
        if ($result->getModifiedCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No changes were made, please try again.']);
        }
    } catch (Exception $e) {
        // Log the error message
        error_log('Error: ' . $e->getMessage());
        // Return error
        echo json_encode(['success' => false, 'error' => 'Something went wrong: ' . $e->getMessage()]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/../admin/admincss/orders.css">
    <title>Orders</title>
</head>
<body>
    <?php include '../../admin/admincomponents/admin-nav-side.php'; ?>

    <div class="user-info">
        <div class="user-data">
            <div class="table">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Product ID</th>
                        <th>Price</th>
                        <th>User</th>
                        <th>MOP</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($collectionorder->find([]) as $order) { ?>
                    <tr>
                        <td><img src="../../allasset/<?php echo htmlspecialchars($order['product_image'] ?? '') ?>" alt=""><p><?php echo htmlspecialchars($order['product_name'] ?? '') ?></p></td>
                        <td><?php echo $order['product_id'] ?? '' ?></td>
                        <td>₱<?php echo $order['product_price'] ?? '' ?></td>
                        <td><?php echo $order['user_name'] ?? '' ?></td>
                        <td><?php echo $order['payment_method'] ?? '' ?></td>
                        <td class="status"><button class="btn1"><?php echo $order['status'] ?? '' ?></button></td>
                        <td>
                            <button class="editBtn btn btn-primary" data-id="<?php echo $order['_id'] ?? ''; ?>" data-status="<?php echo $order['status'] ?? ''; ?>" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> 
                            <button class="delete btn btn-danger" data-id="<?php echo $order['_id'] ?? ''; ?>">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div> 
        </div>
    </div>  

<!-- Modal -->
<div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="editModalLabel">Edit Status</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form id="editForm" method="post">
<div class="mb-3">
<label for="status" class="form-label">Status:</label>
<select id="status" name="status" class="form-select">
<option value="To Pay">To Pay</option>
<option value="To Ship">To Ship</option>
<option value="To Receive">To Receive</option>
<option value="Cancelled">Cancelled</option>
<option value="Received">Received</option>
</select>
</div>
<button type="submit" class="btn btn-success">Save Changes</button>
</form>
</div>
</div>
</div>
</div>
<!--modal-->
</body>
<script>
// When the edit button is clicked
document.querySelectorAll('.editBtn').forEach(button => {
    button.addEventListener('click', function() {
        // Get the order ID and status from the data attributes
        const orderId = this.getAttribute('data-id');
        const currentStatus = this.getAttribute('data-status');

        // Populate the modal with the current status
        document.querySelector('#status').value = currentStatus;

        // Set the order ID to a hidden field in the form (so it gets submitted)
        const form = document.querySelector('#editForm');
        const orderIdInput = document.createElement('input');
        orderIdInput.type = 'hidden';
        orderIdInput.name = 'order_id';
        orderIdInput.value = orderId;
        form.appendChild(orderIdInput);
    });
});
</script>

</html>
