<?php

include ("config/connection.php");
session_start();    


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ce431fb7e5.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/png" href="/ThriftStore/src/image/rethry.png"/>

    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        footer {
            font-family: 'Poppins', sans-serif;
        }
        nav {
            font-family: 'Poppins', sans-serif;
        }
        .welcome {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;        
        }
        .stay {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;        
        }
        header {
            -webkit-text-stroke: 1px black; /* Outline thickness and color */
            color: white; /* Text color */
        }        
    </style>

</head>
<body class="bg-pink-50 font-sans">

<div class="flex">

    <!-- Sidebar -->
    <div class="w-64 h-screen bg-white shadow-md">
        <div class="p-6  text-5xl font-bold text-pink-400 mb-6">
            <img src="/ThriftStore/src/image/rethry.png" alt="Logo" class="w-16 h-14 mb-4 ml-17">
            <p class="ml-7">
                Admin
            </p>
        </div>
        <nav class="mt-10 font-bold">
            <a href="dashboard.php" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Dashboard</a>
            <a href="./src/php/products.php" class="block py-8 px-4 rounded hover:bg-pink-50 text-gray-700">Products</a>
            <a href="./src/php/product_order.php" class="block py-8 px-4 rounded hover:bg-pink-50 text-gray-700">Orders</a>
            <a href="./src/php/customers.php" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Customers</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-20">
                <h1 class="text-3xl font-bold">DASHBOARD</h1>
                <a href="src/php/logout.php">
                    <button class="bg-black border-2 text-white hover:bg-gray-600 px-4 py-2 rounded-2xl font-semibold">
                        Logout
                    </button>
                </a>
            </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Sales</h2>
                        <?php
                            $query = "SELECT SUM(price) AS total_revenue FROM orders";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_assoc($result);
                            $total_revenue = $row['total_revenue'] ?? 0;
                        ?>
                    <p class="text-2xl font-bold text-green-600">₱<?php echo number_format($total_revenue, 2); ?></p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <a href="./src/php/product_order.php">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Orders</h2>
                        <?php
                            $query = "SELECT COUNT(*) AS total_orders FROM orders";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_assoc($result);
                            $total_orders = $row['total_orders'] ?? 0;
                        ?>
                    <p class="text-2xl font-bold text-blue-600"><?php echo $total_orders; ?></p>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <a href="./src/php/customers.php">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Customers</h2>
                        <?php
                            $query = "SELECT COUNT(*) AS customer_count FROM thrift_db WHERE email != 'admin@gmail.com'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_assoc($result);
                            $customer_count = $row['customer_count'] ?? 0;
                        ?>
                    <p class="text-2xl font-bold text-purple-600"><?php echo $customer_count; ?></p>
                </a>
            
            </div>

        </div>  

        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4">Recent Orders</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Order ID</th>
                            <th class="py-2 px-4 border-b text-left">Customer</th>
                            <th class="py-2 px-4 border-b text-left">Address</th>
                            <th class="py-2 px-4 border-b text-left">Contact</th>
                            <th class="py-2 px-4 border-b text-left">Product</th>
                            <th class="py-2 px-4 border-b text-left">Color</th>
                            <th class="py-2 px-4 border-b text-left">Size</th>
                            <th class="py-2 px-4 border-b text-left">Quantity</th>
                            <th class="py-2 px-4 border-b text-left">Amount</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php

                        $query = "SELECT * FROM orders ORDER BY order_date DESC";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                                <tr class='text-left'>
                                    <td class='text-center'>{$row['id']}</td>
                                    <td>{$row['full_name']}</td>
                                    <td class='p-2'>{$row['address']}</td>
                                    <td>+63{$row['phone']}</td>
                                    <td class='p-2'>{$row['product_name']}</td>
                                    <td class='p-2'>{$row['color']}</td>
                                    <td>{$row['size']}</td>
                                    <td class='text-center'>{$row['quantity']}</td>
                                    <td class='text-center'>₱{$row['price']}</td>
                                </tr>
                            ";
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

</body>
</html>
