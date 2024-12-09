<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                    <div class="quantity-container-btn">
                        <div class="decreasing-btn" onclick="decreaseQuantity()">-</div>
                        <div class="line"></div>
                        <div class="quantity-value" name="quantity-quantity-value" id="quantity-value">1</div>
                        <div class="line"></div>
                        <div class="adding-btn" onclick="increaseQuantity()">+</div>
                    </div>
</body>
<script>
function decreaseQuantity() {
let quantityElem = document.getElementById('quantity-value');
let formQuantityElem = document.getElementById('form-quantity-value');
let quantity = parseInt(quantityElem.innerText) || 1;
if (quantity > 1) {
quantity--;
quantityElem.innerText = quantity;
formQuantityElem.value = quantity;
}
}

function increaseQuantity() {
let quantityElem = document.getElementById('quantity-value');
let formQuantityElem = document.getElementById('form-quantity-value');
let quantity = parseInt(quantityElem.innerText) || 1;
if (quantity <= 1000) {
quantity++;
quantityElem.innerText = quantity;
formQuantityElem.value = quantity;
}
}
document.getElementById('addToCartBtn').addEventListener('click', () => {
    const item = {
        quantity: quantity
        };
        (item);
        alert('Item added to cart!');
});
</script>
</html>