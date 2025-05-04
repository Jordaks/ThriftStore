<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../connection.php';

?>

<!DOCTYPE html>
<html>
<head><title>Shop</title></head>
<body>
<h2>Cart</h2>
<ul id="cart-list"></ul>
<button onclick="placeOrder()">Place Order</button>

<script>
let cart = [
  { productId: 1, name: "T-Shirt", price: 10.0, quantity: 2 },
  { productId: 2, name: "Jeans", price: 20.0, quantity: 1 }
];

document.getElementById("cart-list").innerHTML = cart.map(
  item => `<li>${item.name} x ${item.quantity}</li>`
).join("");

function placeOrder() {
  const userId = 1; // Assume logged in user ID
  const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);

    fetch("place_order.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: console.log(JSON.stringify({ userId, cart, total }))
  })
    .then(res => {
      if (!res.ok) {
        throw new Error(`HTTP error! Status: ${res.status}`);
      }
      return res.json();
    })
    .then(data => {
      console.log(data);
      alert(data.message);
    })
    .catch(err => {
      console.error(err);
      alert("Order failed: " + err.message);
    });

}
</script>
</body>
</html>
