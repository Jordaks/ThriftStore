<?php
include ("config/database.php");
session_start();    

// Assuming you saved 'user_id' during login in $_SESSION
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Query the database to get user info
    $sql = "SELECT first_name, last_name FROM thrift_db WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id); // "i" means integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Save to session (optional) or variables
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
    } else {
        $_SESSION['first_name'] = "Unknown";
        $_SESSION['last_name'] = "User";
    }

    $stmt->close();
}
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
            <img src="/ThriftStore/src/image/rethry.png" alt="Logo" class="w-16 h-16 mb-4 ml-17">
            <p class="ml-7">
                Admin
            </p>
        </div>
        <nav class="mt-10 font-bold">
            <a href="#" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Dashboard</a>
            <a href="./src/php/products.php" class="block py-8 px-4 rounded hover:bg-pink-50 text-gray-700">Products</a>
            <a href="./src/php/orders.php" class="block py-8 px-4 rounded hover:bg-pink-50 text-gray-700">Orders</a>
            <a href="#" class="block py-8 px-4 rounded hover:bg-pink-50 text-gray-700">Customers</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-6">DASHBOARD</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Sales</h2>
                <p class="text-2xl font-bold text-green-600">₱2000</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Orders</h2>
                <p class="text-2xl font-bold text-blue-600">1,234</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Customers</h2>
                <p class="text-2xl font-bold text-purple-600">567</p>
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
                            <th class="py-2 px-4 border-b text-left">Amount</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">#0001</td>
                            <td class="py-2 px-4 border-b"><span><?php echo $_SESSION["first_name"] ?? "Not set"; ?></span><span><?php echo $_SESSION["last_name"] ?? "Not set"; ?></span></td>
                            <td class="py-2 px-4 border-b">₱120.00</td>
                            <td class="py-2 px-4 border-b text-green-500">Completed</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">#0002</td>
                            <td class="py-2 px-4 border-b">Andrei Joseph Fajilan</td>
                            <td class="py-2 px-4 border-b">₱75.50</td>
                            <td class="py-2 px-4 border-b text-yellow-500">Pending</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">#0003</td>
                            <td class="py-2 px-4 border-b">Renier Glenn Cabello</td>
                            <td class="py-2 px-4 border-b">₱320.00</td>
                            <td class="py-2 px-4 border-b text-red-500">Cancelled</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">#0004</td>
                            <td class="py-2 px-4 border-b">Zylva Fesarit</td>
                            <td class="py-2 px-4 border-b">₱220.00</td>
                            <td class="py-2 px-4 border-b text-red-500">Cancelled</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">#0005</td>
                            <td class="py-2 px-4 border-b">John Carlos Carcia</td>
                            <td class="py-2 px-4 border-b">₱440.00</td>
                            <td class="py-2 px-4 border-b text-red-500">Cancelled</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

</body>
</html>
