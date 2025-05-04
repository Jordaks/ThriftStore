<?php
require '../connection.php';
$sql = "SELECT o.order_id, o.user_id, o.total_amount, o.order_date,
                p.product_name, i.quantity
        FROM orders o
        JOIN order_items i ON o.order_id = i.order_id
        JOIN products p ON i.product_id = p.product_id
        ORDER BY o.order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head><title>Admin - Orders</title></head>
<body>
<h2>Order List</h2>
<table border="1">
    <tr>
        <th>Order ID</th><th>User ID</th><th>Product</th>
        <th>Quantity</th><th>Total</th><th>Date</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['order_id'] ?></td>
        <td><?= $row['user_id'] ?></td>
        <td><?= $row['product_name'] ?></td>
        <td><?= $row['quantity'] ?></td>
        <td><?= $row['total_amount'] ?></td>
        <td><?= $row['order_date'] ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
