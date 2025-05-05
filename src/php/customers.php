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
            <img src="/ThriftStore/src/image/rethry.png" alt="Logo" class="w-16 h-16 mb-4 ml-17">
            <p class="ml-7">
                Admin
            </p>
        </div>
        <nav class="flex-1 mt-10 font-bold ">
            <a href="../../dashboard.php" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Dashboard</a>
            <a href="products.php" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Products</a>
            <a href="product_order.php" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Orders</a>
            <a href="customers.php" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Customers</a>
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

        <div class="mt-10">
        <h2 class="text-2xl font-bold mb-6">CUSTOMERS</h2>

            <div class="overflow-x-auto">
                <?php
                    $con = mysqli_connect("localhost", "root", "", "thriftshop_admin");
                // Fetch customer data from the database excluding admin@gmail.com
                    $query = "SELECT * FROM thrift_db WHERE email != 'admin@gmail.com'";
                    $query_run = mysqli_query($con, $query);
                // Check if there are any customers
                ?>
                <table class="min-w-full bg-white rounded-lg shadow">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Customer ID</th>
                            <th class="py-2 px-4 border-b text-left">First Name</th>
                            <th class="py-2 px-4 border-b text-left">Last Name</th>
                            <th class="py-2 px-4 border-b text-left">Email</th>
                            <th class="py-2 px-4 border-b text-left">Address</th>
                            <th class="py-2 px-4 border-b text-left">Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (mysqli_num_rows($query_run) > 0) 
                        {
                            while ($row = mysqli_fetch_assoc($query_run)) 
                            {
                                ?>
                                    <tr>
                                        <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                                        <td class="py-2 px-4 border-b"><?php echo $row['first_Name'];?></td>
                                        <td class="py-2 px-4 border-b"><?php echo $row['last_Name']; ?></td>
                                        <td class="py-2 px-4 border-b"><?php echo $row['email']; ?></td>
                                        <td class="py-2 px-4 border-b">
                                            <?php echo $row['house_Number']; ?>
                                            <?php echo $row['zone']; ?>
                                            <?php echo $row['city']; ?>
                                            <?php echo $row['province']; ?>
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            <span>+63</span>
                                            <?php echo $row['phone_Number']; ?>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else 
                        {
                            echo "<tr><td colspan='5' class='py-2 px-4 border-b text-center'>No customers found</td></tr>";
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
