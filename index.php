<?php   
    include ("config/database.php");
    session_start();    
    $authenticated = false;
    if (isset ($_SESSION["email"]) ) {
        $authenticated = true;
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
    <title>Thrift Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/png" href="/ThriftStore/src/image/rethry.png"/>

    <style>
        html {
            scroll-behavior: smooth;
        }
        main {
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
<body >

    <div class="bg-white">
        <!-- Navbar -->
            <nav class="bg-pink-50 p-4 sticky top-0 z-50 shadow-md">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="hidden sm:ml-6 sm:block">
                            <div class=" flex space-x-4">
                            <img src="/ThriftStore/src/image/rethry.png" alt="Logo" class="w-12 h-9 mr-12">
                            <a href="#" class="nav-link active hover:scale-110 hover:text-black hover:bg-white transition duration-500 rounded-md px-3 py-2 text-sm font-bold text-black">HOME</a>
                            <a href="#t-shirt" class="nav-link hover:scale-110 transition duration-500 rounded-md px-3 py-2 text-sm  font-bold text-black hover:bg-white hover:text-black">T-SHIRT</a>
                            <a href="#shorts" class="nav-link active hover:scale-110 hover:text-black hover:bg-white transition duration-500 rounded-md px-3 py-2 text-sm font-bold text-black">SHORTS</a>
                            <a href="#bags" class="nav-link active hover:scale-110 hover:text-black hover:bg-white transition duration-500 rounded-md px-3 py-2 text-sm font-bold text-black">BAGS</a>
                            <a href="#shoes" class="nav-link active hover:scale-110 hover:text-black hover:bg-white transition duration-500 rounded-md px-3 py-2 text-sm font-bold text-black">SHOES</a>
                            <a href="#about" class="nav-link active hover:scale-110 hover:text-black hover:bg-white transition duration-500 rounded-md px-3 py-2 text-sm font-bold text-black">ABOUT</a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 space-x-4">
                        
                    </div>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 space-x-4">
                            
                            <!-- Cart -->
                        
                                <?php if($authenticated){ ?>
                                    <a href="src/php/cart.php">
                                        <button class="pl-3">
                                            <span >
                                                <svg  class="hover:scale-110 transition duration-500 fill-current text-black w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>                                
                                    </a>
                                <?php } else { ?>
                                    <button onclick="alert('Please login first before you order')"  class="pl-3"> 
                                            <span >
                                                <svg   svg  class="hover:scale-110 transition duration-500 fill-current text-black w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                    </button>
                                <?php } ?>  

                                <!-- User -->

                                <?php if($authenticated){ ?>
                                    <p id="cart-count" class="bg-white text-black text-xs rounded-full flex items-center justify-center absolute top-7 left-[86%] px-1 py-[2px]">0</p>
                                    <button onclick="toggleUser()" class="p-3 ">
                                        <span>
                                            <svg class="hover:scale-110 transition duration-500 text-gray-800 w-11 h-11"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </span>
                                    </button>

                                <!-- login/sign up -->

                                <?php } else { ?>  
                                    <div class="hover:scale-110 transition duration-500 relative ml-3 border-2 rounded-xl border-black bg-white hover:border-gray-500">
                                        <a href="src/php/adminLogin.php" target="">
                                            <button type="button" class="ml-1.5 mr-1.5  hover:scale-110 transition duration-500 relative rounded-full p-1  text-black hover:text-gray-500 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden font-bold"> LOG IN
                                                <span class="absolute -inset-1.5"></span>
                                            </button>
                                        </a>
                                    </div>

                                    <div class="hover:scale-110 transition duration-500 relative ml-3 border-2 rounded-xl border-black bg-white hover:border-gray-500 ">
                                    <a href="src/php/adminSignup.php" target="">
                                            <button type="button" class="ml-1.5 mr-1.5 hover:scale-110 transition duration-500 relative rounded-full p-1 text-black hover:text-gray-500 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden font-bold"> SIGN UP
                                                <span class="absolute -inset-1.5"></span>
                                            </button>
                                        </a>
                                    </div>
                                <?php } ?>                          
                        </div>
                </div>
            </nav>

            <header class="bg-[url('/ThriftStore/src/image/backg.jpg')] bg-center bg-cover px-6 min-h-screen grid place-items-center">
            <div class="mx-auto max-w-5xl px-6 sm:px-8 lg:px-10 border-2 border-gray-200 backdrop-filter backdrop-blur-sm bg-opacity-20 rounded-3xl">
                <div class="m-6 p-6 text-center">
                        <h1 class="welcome text-5xl font-bold tracking-tight text-white mb-4 ">WELCOME TO OUR THRIFT STORE</h1>
                        <p class="mt-4 text-2xl font-bold text-white italic">We are a thrift store that sells quality second-hand clothes at affordable prices.</p>
                        <p class="mt-4 text-2xl font-bold text-white italic">Where Your Grandma’s Closet Meets Your New Style – Thrift Like a Pro!</p>
                        <p class="stay mt-8 text-5xl font-semibold text-white">Stay Thrifty!</p>
                    </div>
                </div>
            </header>


        <main  >

            

            <div class="bg-white">
                <h1 class="ml-24 pt-5 text-4xl pl-2 font-bold tracking-tight text-gray-900"><section id="t-shirt">New Arrival</section></h1>
            
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                


                    <!--
                        
                    Tshirt
                        
                    -->
                    
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">T-shirt</h2>
                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
                            </div>
                                                    
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
                            </div>
                        </div>
                

                <!--
                    
                SHORTS
                    
                -->
                    

                    <h1 class=" pt-5 pb-24 text-4xl font-bold tracking-tight text-gray-900"><section id="shorts">New Arrival</section></h1>
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Shorts</h2>

                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
                            </div>
                        </div>
                        

                    <!--
                        Bags
                    -->

                    <h3 class=" pt-5 pb-24 text-4xl font-bold tracking-tight text-gray-900"><section id="bags">New Arrival</section></h1>        
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Bags</h2>

                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
                            </div>
                        </div>


                    <!--

                    SHOES
                        
                    -->


                        <h3 class=" pt-5 pb-24 text-4xl font-bold tracking-tight text-gray-900"><section id="shoes">New Arrival</section></h1>        
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Shoes</h2>

                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
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
                                <?php if($authenticated){ ?>
                                <button onclick="addToCart(this)" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } else { ?>
                                <button onclick="alert('Please login first before you order')" class="mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full add-to-cart relative">
                                        <i class="fa-solid fa-cart-plus text-2xl top-1 absolute left-12"></i>
                                        <span class="ml-8 flex items-center justify-center text-sm font-bold text-white">Add To Cart</span>
                                </button>
                                <?php } ?>
                            </div>
                        </div>

                
                <div id="user" class="fixed top-0 right-[-100%] w-[360px] border-2 h-full bg-pink-50 shadow-lg p-[65px_20px_40px] z-[100] overflow-auto transition-all duration-400">
                    <span>
                        <svg class="hover:scale-110 transition duration-500 text-gray-800 size-16 font-bold ml-32"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </span>

                    <h3 class="font-bold pb-10 text-center text-3xl">My Profile</h3>

                    <div class="flex justify-between items-center text-gray-700 mt-10 pt-2 text-lg font-semibold">
                        <p>First name: <span><?php echo $_SESSION["first_name"] ?? "Not set"; ?></span></p>
                    </div>


                    <div class="flex justify-between items-center text-gray-700 mt-10 pt-2 text-lg font-semibold">
                        <p>Last name:  <span><?php echo $_SESSION["last_name"] ?? "Not set"; ?></span></p>
                    </div>
                    
                    <div class="flex justify-between items-center text-gray-700 mt-10 pt-2 text-lg font-semibold">
                        <p>Email:  <span><?php echo $_SESSION["email"] ?? "Not set"; ?></span></p>
                    </div>

                    <div class="flex justify-between items-center  text-gray-700  font-semibold mt-10 pt-2 text-lg ">
                        <p>Address: 
                            <spa><?php echo $_SESSION["house_number"] ?? "Not set"; ?></spa>
                            <spa><?php echo $_SESSION["zone"] ?? "Not set"; ?></spa>
                            <spa><?php echo $_SESSION["city"] ?? "Not set"; ?></spa>
                            <spa><?php echo $_SESSION["province"] ?? "Not set"; ?></spa>
                        </p>
                        
                    </div>

                    <div class="flex justify-between items-center  text-gray-700 mt-10 pt-2 pb-64 text-lg font-semibold">
                        <p>Contact: <p>+63</p> <span><?php echo $_SESSION["phone"] ?? "Not set"; ?></span></p>
                    </div>


                
                    <a href="src/php/logout.php">
                        <button class="bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl w-full mt-5 w-full font-semibold  px-4 py-2 rounded-2xl hover:bg-gray-600">
                            Logout
                        </button>
                    </a>
                        
                        
                        <button onclick="toggleUser()"  class="absolute top-5 right-4 text-[35px] cursor-pointer">
                            <svg   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                        
                    
                </div>

        </main>

        <footer class="bg-pink-50" >
                    <div class="grid grid-cols-3 gap-4 p-6">
                        <div>
                            <h5 class="mr-20 ml-40 text-l font-bold tracking-tight text-gray-900"><section id="about">ABOUT THRIFT SHOP</section></h5>
                            <br>
                            <span class="ml-44 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="about.php" title="About Us" target="_blank">
                                    About Us
                                </a>
                            </span>
                            <br>
                            <span class="ml-44 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="" title="Privacy & Policy" target="_blank">
                                    Privacy & Policy
                                </a> 
                            </span>
                        </div>

                        <div>
                            <h5 class=" ml-30 text-l text-center font-bold tracking-tight text-gray-900">CUSTOMER SERVICE</h5>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="" title="Contact" target="_blank">
                                Contact Us
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="" title="Logout" target="_blank">
                                Payment Methods
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="" title="Shipping" target="_blank">
                                Free Shipping
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="" title="Return" target="_blank">
                                Return & Refund
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="" title="Cart" target="_blank">
                                Help Centre
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="" title="Order" target="_blank">
                                Order Tracking
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="ThriftStore/src/php/login.php" title="Login" target="_blank">
                                Login
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="ThriftStore/src/php/signup.php" title="Register" target="_blank">
                                Register
                                </a>
                            </span>                            
                        </div>


                        <div class="">
                            <h5 class=" text-center text-l font-bold tracking-tight text-gray-900">CONTACT US ON</h5>
                            <br>
                            <span class="ml-44 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400"  >
                                <a href="https://www.facebook.com/markjordan.javier" title="Mark Jordan Javier"  target="_blank">
                                <i class="fa-brands fa-facebook fa-1x "></i> Facebook
                                </a>
                            </span>
                            <br>
                            <span class="ml-44 mb-20 mx-3  hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="https://www.instagram.com/imnot_dannnnn/" title="imnot_dannnnn" target="_blank">
                                <i class="fa-brands fa-instagram fa-1x"></i> Instagram
                                </a>
                            </span>
                            <br>
                            <span class="ml-44 mb-20 mx-3  hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="https://www.tiktok.com/@jordamnnnn " title="Jordaks" target="_blank">
                                <i class="fa-brands fa-tiktok"></i> Tiktok
                                </a>
                            </span>
                            <br>
                            <span class="ml-44 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400"  >
                                <a href="https://www.linkedin.com/in/mark-jordan-javier-29b72935a/" title="Mark Jordan Javier" target="_blank">
                                <i  class="fa-brands fa-linkedin"></i> LinkedIn
                                </a>
                            </span>
                            <br>
                            <span class="ml-44 mb-20 mx-3  hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="mailto:javiermarkjorda@gmail.com" title="javiermarkjordan" target="_blank">
                                <i class="fa-solid fa-envelope  fa-1x"></i> Email
                                </a>
                            </span>
                        </div>
                    </div>

                    
            <div class="mt-auto bg-pink-100 text-gray-500 text-center py-4">
                &copy; <?php echo date("Y"); ?> RETHRY. All rights reserved. |
                <a href="#" class="text-gray-500 hover:underline mx-2">Terms of Service</a> |
                <a href="#" class="text-gray-500 hover:underline mx-2">FAQs</a> |
                <a href="#" class="text-gray-500 hover:underline mx-2">Philippines</a> |
            </div>
            
        </footer>

        <script src="index.php"></script>

        <script>
        function addToCart(button) {
        const product = button.closest('.product');

        const name = product.querySelector('.product-title').textContent.trim();
        const color = product.querySelector('.product-color').textContent.trim();
        const size = product.querySelector('.product-size').textContent.trim();
        const priceText = product.querySelector('.product-price').textContent.trim();
        const image = product.querySelector('.product-image').getAttribute('src');

        const price = parseFloat(priceText.replace('₱', '').replace(',', ''));
        
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        const existing = cart.find(item => 
            item.name === name && item.color === color && item.size === size
        );

        if (existing) {
            alert("Item is already in the cart.");
        } else {
            cart.push({ name, color, size, price, image, quantity: 1 });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartButtonCount();
        }

        function updateCartButtonCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const count = cart.reduce((sum, item) => sum + item.quantity, 0);
        document.getElementById('cart-count').textContent = count;
        }

        document.addEventListener('DOMContentLoaded', updateCartButtonCount);

        window.toggleUser = function() {
            const user = document.getElementById("user");
            user.style.right = user.style.right === "0px" ? "-100%" : "0px";
        };


        // animation

        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.nav-link');

            function setActive(link) {
                navLinks.forEach(el => el.classList.remove('bg-white', 'text-black'));
                link.classList.add('bg-white', 'text-black', );
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    setActive(this);
                });
            });

            window.addEventListener('scroll', () => {
                const scrollY = window.scrollY + 150;
                navLinks.forEach(link => {
                    const section = document.querySelector(link.getAttribute('href'));
                    if (section.offsetTop <= scrollY && section.offsetTop + section.offsetHeight > scrollY) {
                    setActive(link);
                    }
                });
            });
        });

        

        </script>
    </body>
</html>