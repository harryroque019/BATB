<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AXz7M1BDnsa3yMeXVawLA5lzEB6uy93z6f5VAp-mPfm4-LjMisd6ezj7wOJqIhYPNgXufZ8KhUXZVTOO"></script>
</head>
<body>
    <form id="checkout-form" method="post" action="">
        <!-- Product Information -->
        <div id="product-info"></div>

        <!-- Hidden inputs to hold selected product details -->
        <input type="hidden" name="productName" id="selectedProductName">
        <input type="hidden" name="productPrice" id="selectedProductPrice">
        <input type="hidden" name="productImage" id="selectedProductImage">
        <input type="hidden" name="action" value="buy">
        <input type="hidden" name="id" id="selectedProductId">

        <!-- User Information Inputs -->
        <div class="inputs">
            <div class="input">
                <div class="inp">
                    <p>First Name</p>
                    <input type="text" id="fName" name="firstName" required>
                </div>
                <div class="inp">
                    <p>Your Address</p>
                    <input type="text" id="address" name="address" required>
                    <p>Postal Code</p>
                    <input type="text" id="postalCode" name="postalCode" required>
                </div>
            </div>
            <div class="input">
                <div class="inp1"></div>
                <div class="inp1">
                    <p>Phone Number</p>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{11,}" required>
                </div>
                <div class="inp1">
                    <p>Payment Method</p>
                    <select id="payment" name="payment" required>
                        <option value="cod">Cash on Delivery</option>
                        <option value="paypal">PayPal</option>
                    </select>
                    <div id="paypal-button-container" style="display: none;"></div>
                </div>
            </div>
        </div>
        <button class="payment-btn" id="submit-button" type="submit">Confirm Purchase</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const paymentSelect = document.getElementById("payment");
            const paypalButtonContainer = document.getElementById("paypal-button-container");
            const submitButton = document.getElementById("submit-button");

            let totalAmount = 170; // Example amount; replace with actual value dynamically.

            // Toggle PayPal button visibility
            function togglePayPalButton() {
                if (paymentSelect.value === "paypal") {
                    paypalButtonContainer.style.display = "block";
                    submitButton.style.display = "none"; // Hide submit button for PayPal
                } else {
                    paypalButtonContainer.style.display = "none";
                    submitButton.style.display = "block"; // Show submit button for COD
                }
            }

            paymentSelect.addEventListener("change", togglePayPalButton);

            // Render PayPal Buttons
            if (paypal.Buttons) {
                paypal.Buttons({
                    createOrder: function (data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: { value: totalAmount.toFixed(2) }
                            }]
                        });
                    },
                    onApprove: function (data, actions) {
                        return actions.order.capture().then(function (details) {
                            alert(`Transaction completed by ${details.payer.name.given_name}.`);
                            // Submit the form programmatically
                            document.getElementById("checkout-form").submit();
                        });
                    },
                    onError: function (err) {
                        console.error("PayPal error: ", err);
                        alert('Something went wrong with PayPal.');
                    }
                }).render('#paypal-button-container');
            } else {
                console.error("PayPal SDK not loaded.");
            }
        });
    </script>
</body>
</html>
