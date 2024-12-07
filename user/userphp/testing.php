<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Buy Modal</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

form input,
form select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
}

form button:hover {
    background-color: #45a049;
}

</style>
<body>
    <!-- Buy Button -->
    <button id="buyBtn">Buy</button>
    
    <!-- Modal -->
    <div id="buyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Complete Your Purchase</h2>
            <form id="buyForm">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="payment">Payment Method:</label>
                <select id="payment" name="payment" required>
                    <option value="paypal">PayPal</option>
                    <option value="cod">Cash on Delivery</option>
                </select>

                <button type="submit">Confirm Purchase</button>
            </form>
        </div>
    </div>

    <script>
        // Get modal element
const buyModal = document.getElementById("buyModal");
// Get open modal button
const buyBtn = document.getElementById("buyBtn");
// Get close button
const closeBtn = document.querySelector(".close");

// Listen for open click
buyBtn.addEventListener("click", () => {
    buyModal.style.display = "block";
});

// Listen for close click
closeBtn.addEventListener("click", () => {
    buyModal.style.display = "none";
});

// Listen for outside click
window.addEventListener("click", (event) => {
    if (event.target == buyModal) {
        buyModal.style.display = "none";
    }
});

    </script>
</body>
</html>
