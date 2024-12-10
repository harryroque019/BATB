
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <input type="text" id="fName" name="firstName" value="" required>
                    </div>
                    <div class="inp">
                        <p>Your Address</p>
                        <input type="text" id="address" name="address" value="" required>
                        <p>Postal Code</p>
                        <input type="text" id="postalCode" name="postalCode" value="" required>
                    </div>
                </div>
                <div class="input">
                    <div class="inp1"></div>
                    <div class="inp1">
                        <p>Phone Number</p>
                        <input type="tel" id="phone" name="phone" value="" pattern="[0-9]{11,}" required>
                    </div>
                    <div class="inp1">
                        <p>Payment Method</p>
                        <select id="payment" name="payment" required>
                            <option value="paypal">PayPal</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="payment-btn" type="submit">Confirm Purchase</button>
        </form>
</body>
</html>