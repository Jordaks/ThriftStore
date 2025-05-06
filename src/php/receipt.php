<?php
session_start();
include("../../config/connection.php");

$email = $_SESSION['email'] ?? '';

if (!$email) {
    echo "User not logged in.";
    exit;
}

// Fetch latest 10 orders for this user
$query = "SELECT * FROM orders WHERE user_email = ? ORDER BY order_date DESC LIMIT 10";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$orders = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="/ThriftStore/src/image/rethry.png"/>
    <meta charset="UTF-8">
    <title>Order Receipt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            #print-button, #back-button {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">

        <!-- Buttons -->
        <div class="flex justify-between mb-4">
            <a href="../../index.php" id="back-button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                ← Back to Home
            </a>
            <button id="print-button" onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                🖨️ Print Receipt
            </button>
        </div>

        <!-- Shop Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold">THRIFT SHOP</h1>
            <p class="text-gray-600">Ave. Mabini Street, Tanauan City, Batangas</p>
            <p class="text-gray-600">Phone: 0960-219-3250 | Email: thriftshop@gmail.com</p>
            <hr class="my-4">
            <h2 class="text-lg font-semibold">OFFICIAL RECEIPT</h2>
        </div>

        <!-- Customer Info -->
        <div class="mb-6">
            <h3 class="font-semibold">Customer Information</h3>
            <p>Name: <?= htmlspecialchars($orders[0]['full_name']) ?></p>
            <p>Phone: +63 <?= htmlspecialchars($orders[0]['phone']) ?></p>
            <p>Address: <?= htmlspecialchars($orders[0]['address']) ?></p>
            <p>Email: <?= htmlspecialchars($orders[0]['user_email']) ?></p>
            <p>Date: <?= date("F j, Y, g:i a", strtotime($orders[0]['order_date'])) ?></p>
        </div>

        <!-- Order Table -->
        <table class="w-full text-sm mb-6 border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-2 py-1 text-left">Item</th>
                    <th class="border px-2 py-1">Color</th>
                    <th class="border px-2 py-1">Size</th>
                    <th class="border px-2 py-1">Qty</th>
                    <th class="border px-2 py-1">Price</th>
                    <th class="border px-2 py-1">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($orders as $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td class="border px-2 py-1"><?= htmlspecialchars($item['product_name']) ?></td>
                    <td class="border px-2 py-1 text-center"><?= $item['color'] ?></td>
                    <td class="border px-2 py-1 text-center"><?= $item['size'] ?></td>
                    <td class="border px-2 py-1 text-center"><?= $item['quantity'] ?></td>
                    <td class="border px-2 py-1 text-right">₱<?= number_format($item['price'], 2) ?></td>
                    <td class="border px-2 py-1 text-right">₱<?= number_format($subtotal, 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Total -->
        <div class="text-right text-lg font-semibold">
            Total: ₱<?= number_format($total, 2) ?>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-sm text-center text-gray-500">
            <p>This receipt was generated electronically and does not require a signature.</p>
            <p>Thank you for shopping with Thrift Shop!</p>
        </div>
    </div>
</body>
</html>
