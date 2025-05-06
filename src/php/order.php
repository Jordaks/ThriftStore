<?php   
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
   include ("../../config/connection.php"); // Corrected path to database.php


    session_start();    
    $authenticated = isset($_SESSION["email"]);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="/ThriftStore/src/image/rethry.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Horizon&display=swap" rel="stylesheet">
    <title>ORDER</title>
</head>
<body class="bg-pink-50">


        <div >
        <nav class="backdrop-blur-md bg-opacity-10 text-white p-4 sticky top-0 z-50 shadow-md">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="hidden sm:ml-6 sm:block">
                            <div class=" flex space-x-4">
                            <img src="/ThriftStore/src/image/rethry.png" alt="Logo" class="w-10 h-9">
                            <p class="text-black  font-bold text-3xl font-horizon">RETHRY</p> <p class="text-black font-bold text-2xl">|</p> <p class="text-black  font-bold text-3xl pr-40 font-horizon">SHOPPING CART</p>
                            <span class="pl-96">
                                <a class="text-black hover:underline hover:text-gray-600 font-semibold text-xl font-bevan" href="../../index.php">← CONTINUE SHOPPING</a>
                            </span>
                            </div>
                        </div>
                    </div>                        
                    
                </div>
            </nav>
                <div class="bg-white rounded-xl pt-5 m-4 shadow-2xl ">
                        <h3 class="font-bold ml-10 text-2xl"><i class="fa-solid fa-location-dot mr-5"></i>Delivery Address</h3>
                    <div class=" px-16 rounded-3xl  w-full">
                        <div class="flex justify-between items-center pb-10 text-gray-700 m-5 text-lg font-semibold">
                                <div class="flex justify-between items-center text-gray-700 mt-10 pt-2 text-lg font-semibold">
                                    <p>
                                        <span><?php echo $_SESSION["first_name"] ?? "Not set"; ?></span>
                                        <span><?php echo $_SESSION["last_name"] ?? "Not set"; ?></span>
                                    </p>
                                </div>
                            
                            <div class="flex justify-between items-center text-gray-700 mt-10 pt-2 text-lg font-semibold">
                                <span><?php echo $_SESSION["email"] ?? "Not set"; ?></span>
                            </div>

                            <div class="flex justify-between items-center  text-gray-700  font-semibold mt-10 pt-2 text-lg ">
                                <p>
                                    <span><?php echo $_SESSION["house_number"] ?? "Not set"; ?></span>
                                    <span><?php echo $_SESSION["zone"] ?? "Not set"; ?></span>
                                    <span><?php echo $_SESSION["city"] ?? "Not set"; ?></span>
                                    <span><?php echo $_SESSION["province"] ?? "Not set"; ?></span>
                                </p>
                                <p class="ml-16"><p>+63</p> <span><?php echo $_SESSION["phone"] ?? "Not set"; ?></span></p>

                            </div>

                        </div>

                    </div>
                </div>

                        <div class="flex justify-between p-8 items-center bg-white text-gray-700 m-5 py-10bg-orange-100 rounded-xl shadow-2xl  text-lg font-semibold">
                            <h3 class="font-bold ml-32 mr-10 pr-3  text-2xl">PRODUCTS</h3>
                            <h4 class="font-semibold pr-7 text-2xl">Color | Size</h4>
                            <h4 class="font-semibold pl-5 text-2xl">Price</h4>
                            <h4 class="font-semibold mr-3 text-2xl">Remove</h4>
                        </div>

                        <div class="bg-white rounded-xl m-4 shadow-2xl ">
                            <ul class="" id="cartItems"></ul>
                        </div>

                        <div class="bg-white rounded-xl m-4 shadow-2xl ">
                            <div class="mx-10 text-right text-3xl border-t border-black mt-5 pt-5 font-semibold">
                                <span id="total"></span>
                            </div>

                            <span id="cart-count" style="display: none;"></span>
                        <div class="flex justify-end  my-3 pb-10 m-4 px-5">
                            <button class="bg-black border-2 text-white hover:bg-gray-600 py-2 px-5 font-bold rounded-2xl transition duration-300" onclick="submitOrder()">
                                PLACE ORDER
                            </button>
                        </div>                     
                    </div>
                        
        </div>

        <footer  >
                    <div class="grid grid-cols-3 gap-4 p-6">
                        <div>
                            <h5 class="mr-20 ml-40 text-l font-bold tracking-tight text-gray-900"><section id="about">ABOUT THRIFT SHOP</section></h5>
                        <!--   <span class="mr-20 ml-40 text-l tracking-tight text-gray-900">
                                <pre>
        RETHRY is a modern thrift shop wher
        you handpick pieces and turn them
        into your own perfect 
                                </pre> 
                                
                            </span> -->
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
                                <a href="contact.php" title="Contact" target="_blank">
                                Contact Us
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="payment.php" title="Logout" target="_blank">
                                Payment Methods
                                </a>
                            </span>
                            
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="adminLogin.php" title="Login" target="_blank">
                                Login
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="adminSignup.php" title="Register" target="_blank">
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
        
        <script>
        function renderCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartList = document.getElementById('cartItems');
        const totalText = document.getElementById('total');
        cartList.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const quantity = item.quantity ?? 1;
            const subtotal = item.price * quantity;
            total += subtotal;

            const li = document.createElement('li');
            li.classList.add('cart-item');

            li.innerHTML = `
            <div class="flex items-start gap-6 p-5 rounded-lg shadow-md">
            <!-- Product Image (35x35) -->
            <img class="object-cover rounded-lg" style="width: 140px; height: 140px;" src="${item.image}" alt="${item.name}">
            
            <!-- Product Details -->
            <div class="flex-1">

                <div class="flex justify-between pt-8 items-center text-gray-700 m-5 py-10 pt-2 text-lg font-semibold">
                    <h3 class="text-xl font-semibold text-gray-800">${item.name}</h3>
                    <p class="text-l text-gray-500">${item.color} | ${item.size}</p>
                    <p class="text-xl text-center font-bold text-gray-900 mt-1">₱${item.price}</p>
                <!-- Quantity and Remove -->
                    <button class="remove-item text-red-500 hover:text-red-600" onclick="removeItem(${index})">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    </button>
                </div>
            </div>
            </div>
            `;

            cartList.appendChild(li);
        });

        totalText.textContent = `Cart Total: ₱${total.toFixed(2)}`;
        }

        function changeQuantity(index, delta) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
        }

        function removeItem(index) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
        }

        renderCart();
        



        function submitOrder() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                alert("Cart is empty.");
                return;
            }

            fetch('place_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'cart=' + encodeURIComponent(JSON.stringify(cart))
            })
            .then(res => res.text())
            .then(data => {
                if (data.trim() === "success") {
                    alert("Order placed successfully!");
                    localStorage.removeItem('cart');
                    window.location.href = "receipt.php"; // redirect
                } else {
                    alert("Failed to place order: " + data);
                }
            })
            .catch(err => {
                console.error("Error placing order:", err);
                alert("Error placing order.");
            });
        }

    </script>

</body>
</html>