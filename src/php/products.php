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
        <!-- Wrapper: Sidebar + Main Content -->
        <div class="flex">

            <!-- Sidebar -->
            <div class="fixed top-0 left-0 w-64 h-screen bg-white shadow-md flex flex-col">
                <div class="p-6  text-5xl font-bold text-pink-400 mb-5">
                    <img src="/ThriftStore/src/image/rethry.png" alt="Logo" class="w-16 h-16 mb-4 ml-17">
                    <p class="ml-7">
                        Admin
                    </p>
                </div>
                <nav class="flex-1 mt-10 font-bold ">
                    <a href="../../dashboard.php" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Dashboard</a>
                    <a href="products.php" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Products</a>
                    <a href="#" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Orders</a>
                    <a href="#" class="block py-8 px-4 rounded  hover:bg-pink-50 text-gray-700">Customers</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="flex-1 ml-64 p-6 bg-gray-50 min-h-screen">
                <h1 class="text-3xl font-bold mb-6">DASHBOARD</h1>

                <main>

                    <div class="bg-white rounded-lg p-6">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 mb-8">
                            <section id="t-shirt">New Arrival</section>
                        </h1>

                        <h2 class="text-2xl font-bold tracking-tight text-gray-900 mb-6">T-shirt</h2>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                            <!-- Product cards -->
                            
                            <!-- Example Product Card -->
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                    <img src="/ThriftStore/src/image/boss1.jpg" alt="Carhartt Tee" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Boss</h3>
                                        <p class="mt-1 text-sm text-black product-color">Gray/Green</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">Large</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱449</p>
                                    </div>
                                </div>
                            </div>

                            <!-- (Copy your other products here inside the grid) -->

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/essentials.jpg" alt="Carhartt Tee"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Essesntials</h3>
                                        <p class="mt-1 text-sm text-black product-color">Choco Brown</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">Small</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱599</p>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/rl.jpg" alt="Internal Reform Tee" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Ralph Lauren</h3>
                                        <p class="mt-1 text-sm text-black product-color">Khaki</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">Large</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱899</p>
                                    </div>
                                </div>
                                
                            </div>  

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/polo.jpg" alt="CRT Tee"
                                    class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Polo</h3>
                                        <p class="mt-1 text-sm text-black product-color">Orange</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">Medium</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱450</p>
                                    </div>
                                </div>
                            
                            </div> 
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/boss2.jpg" alt="Adidas Tee" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Boss</h3>
                                        <p class="mt-1 text-sm text-black product-color">Green</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">Medium</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱499</p>
                                    </div>
                                </div>
                                
                            </div>
                                                    
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/blueberry.jpg" alt="Carhartt Tee"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Blueberry</h3>
                                        <p class="mt-1 text-sm text-black product-color">Dirty White</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">Large</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱349</p>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/nike1.jpg" alt=" Teeluv Tee" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Nike</h3>
                                        <p class="mt-1 text-sm text-black product-color">Blue</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">Large</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱400</p>
                                    </div>
                                </div>
                                
                            </div>  

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/underarmour.jpg" alt="Lemandik Tee"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Under Armour</h3>
                                        <p class="mt-1 text-sm text-black product-color">Gray</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">Medium</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱500</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                            <!--
                    
                SHORTS
                    
                -->
                    

                    <h1 class=" pt-5 pb-24 text-4xl font-bold tracking-tight text-gray-900"><section id="shorts">New Arrival</section></h1>
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Shorts</h2>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/SHORT1.jpg" alt="RRJ" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Cotton On</h3>
                                        <p class="mt-1 text-sm text-black product-color">Blue</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">28-29</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱349</p>
                                    </div>
                                </div>
                            </div>
                                                    
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/whitejorts.jpg" alt="Jag Jeans"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Jag Jeans</h3>
                                        <p class="mt-1 text-sm text-black product-color">White</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">30-32</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱449</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/jorts.jpg" alt="Bench" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Bench</h3>
                                        <p class="mt-1 text-sm text-black product-color">Black/White</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">27-28</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱549</p>
                                    </div>
                                </div>
                                
                            </div>  

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/washjorts.jpg" alt="Oxygen"
                                    class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Oxygen</h3>
                                        <p class="mt-1 text-sm text-black product-color">Light Blue/Denim</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">30-32</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱550</p>
                                    </div>
                                </div>
                                
                            </div> 
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/lightjorts.jpg" alt="Lee " class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Lee</h3>
                                        <p class="mt-1 text-sm text-black product-color">Dark Blue Denim</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">30</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱459</p>
                                    </div>
                                </div>
                                
                            </div>
                                                    
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/denimjorts.jpg" alt="Levi's"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Levi's</h3>
                                        <p class="mt-1 text-sm text-black product-color">Dark Gray Denim</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">28</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱349</p>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/SHORT3.jpg" alt="Cotton On" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">RRJ</h3>
                                        <p class="mt-1 text-sm text-black product-color">Black</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">29</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱499</p>
                                    </div>
                                </div>
                                
                            </div>  

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/SHORT2.jpg" alt="Lemandik Tee"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">H&M</h3>
                                        <p class="mt-1 text-sm text-black product-color">Medium Blue Denim</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">34</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱550</p>
                                    </div>
                                </div>
                                
                            </div>
                    </div>

                    <!--
                        Bags
                    -->

                    <h3 class=" pt-5 pb-24 text-4xl font-bold tracking-tight text-gray-900"><section id="bags">New Arrival</section></h1>        
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Bags</h2>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/BROWNBAG.jpg" alt="Air Force 1" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Tommy Hilfiger</h3>
                                        <p class="mt-1 text-sm text-black product-color">Brown/Black</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">42</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱999</p>
                                    </div>
                                </div>

                            </div>
                                                    
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/STRIPEBAG.jpg" alt="Altra"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Gentle Woman </h3>
                                        <p class="mt-1 text-sm text-black product-color">Stripe</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">43</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱849</p>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/KHAKIBAG.jpg" alt="Birkenstock Clogs" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Gentle Woman </h3>
                                        <p class="mt-1 text-sm text-black product-color">Aphricot</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">42</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱949</p>
                                    </div>
                                </div>
                                
                            </div>  

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/PURPLEBAG.jpg" alt="Adidas Campus"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Supreme</h3>
                                        <p class="mt-1 text-sm text-black product-color">Purple</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">43</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div> 
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/ORANGEBAG.jpg" alt="Dr.Martens " class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Louis Vuitton</h3>
                                        <p class="mt-1 text-sm text-black product-color">Orange</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">44</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱1200</p>
                                    </div>
                                </div>
                                
                            </div>
                                                    
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/REDBAG.jpg" alt="New Balance 530"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Guess</h3>
                                        <p class="mt-1 text-sm text-black product-color">Red</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">40</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱1399</p>
                                    </div>
                                </div>
                            
                            </div>
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/BLACKBAG.jpg" alt="Converse" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Samsonite</h3>
                                        <p class="mt-1 text-sm text-black product-color">Black</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">44</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱899</p>
                                    </div>
                                </div>
                            
                            </div>  

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/GREENBAG.jpg" alt="Lemandik Tee"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Gentle Woman</h3>
                                        <p class="mt-1 text-sm text-black product-color">Green/Pink</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">45</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2550</p>
                                    </div>
                                </div>
                            
                            </div>
                    </div>

                    <!--

                    SHOES
                        
                    -->


                    <h3 class=" pt-5 pb-24 text-4xl font-bold tracking-tight text-gray-900"><section id="shoes">New Arrival</section></h1>        
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Shoes</h2>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                    <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/RED.jpg" alt="Air Force 1" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Jordan Low</h3>
                                        <p class="mt-1 text-sm text-black product-color">Gym Red</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">42</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div>
                                                    
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/YELLOW.jpg" alt="Altra"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Travis Scott</h3>
                                        <p class="mt-1 text-sm text-black product-color">Canary</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">43</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/GREY.jpg" alt="Birkenstock Clogs" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Nike V2K</h3>
                                        <p class="mt-1 text-sm text-black product-color">Metalic Silver</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">42</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div>  

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/GREYWHITE.jpg" alt="Adidas Campus"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Nike Blazer</h3>
                                        <p class="mt-1 text-sm text-black product-color">Mica Green</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">43</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div> 
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/DIRTYWHITE.jpg" alt="Dr.Martens " class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Onitsuka Tiger MEXICO 66</h3>
                                        <p class="mt-1 text-sm text-black product-color">CREAM/BLACK</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">44</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div>
                                                    
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/BLACKSILVER.jpg" alt="New Balance 530"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Adidas Originals</h3>
                                        <p class="mt-1 text-sm text-black product-color">Atmos Samba Tuxedo</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">40</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/BLACK.jpg" alt="Converse" class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Nike Blazer City Low Seude</h3>
                                        <p class="mt-1 text-sm text-black product-color">Black/White</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">44</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div>  

                            <div class="product hover:scale-100 transition duration-250 hover:shadow-2xl border-2 bg-white border-gray-300 rounded-2xl shadow-sm mt-4 mx-4 mb-4 p-4">
                                <img src="/ThriftStore/src/image/BROWN.jpg" alt="Lemandik Tee"  class="product-image w-full aspect-square object-cover rounded-2xl bg-gray-200" />
                                <div class="mt-4 flex justify-between mr-4">
                                    <div class="ml-4">
                                        <h3 class="text-sm font-bold text-gray-700 product-title">Onitsuka Tiger Tokuten</h3>
                                        <p class="mt-1 text-sm text-black product-color">Brown Olive</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 product-size">45</p>
                                        <p class="mt-1 text-sm font-bold text-gray-900 product-price">₱2000</p>
                                    </div>
                                </div>
                                
                            </div>

                    </div>

                </div>

                </main>
            </div>

        </div>

    </div>

</div>

</body>
</html>
