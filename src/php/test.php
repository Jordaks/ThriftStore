
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .sidebar { width: 200px; background: #333; color: #fff; position: fixed; height: 100vh; padding: 20px; }
        .sidebar a { color: #fff; display: block; margin: 10px 0; text-decoration: none; }
        .content { margin-left: 220px; padding: 20px; }
        .card { background: #f4f4f4; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
        .grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>
    <a href="#">Dashboard</a>
    <a href="#">Orders</a>
    <a href="#">Products</a>
    <a href="#">Customers</a>
    <a href="#">Logout</a>
</div>

<div class="content">
    <h1>Dashboard</h1>

    <div class="grid">
        <div class="card">
            <h3>Total Sales</h3>
            <p>$<?php echo number_format($totalSales, 2); ?></p>
        </div>
        <div class="card">
            <h3>Total Orders</h3>
            <p><?php echo $totalOrders; ?></p>
        </div>
        <div class="card">
            <h3>Total Products</h3>
            <p><?php echo $totalProducts; ?></p>
        </div>
        <div class="card">
            <h3>Total Customers</h3>
            <p><?php echo $totalCustomers; ?></p>
        </div>
    </div>

    <h2>Recent Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Date</th>
        </tr>
        <?php while($order = $recentOrdersQuery->fetch_assoc()): ?>
        <tr>
            <td><?php echo $order['id']; ?></td>
            <td><?php echo $order['customer_name']; ?></td>
            <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
            <td><?php echo $order['order_date']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
