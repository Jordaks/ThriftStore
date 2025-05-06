<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="/ThriftStore/src/image/rethry.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Horizon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>FAQs</title>

    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        nav {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-white">

            <nav class="bg-pink-50  p-4 sticky top-0 z-50 shadow-2xl">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="hidden sm:ml-6 sm:block">
                            <div class=" flex space-x-4">
                            <img src="/ThriftStore/src/image/rethry.png" alt="Logo" class="w-12 h-9 mr-12">
                            <a href="/ThriftStore/index.php" class="nav-link active hover:scale-110 hover:text-black hover:bg-white transition duration-500 rounded-md px-3 py-2 text-sm font-bold text-black">HOME</a>
                            <a href="#about" class="nav-link active hover:scale-110 hover:text-black hover:bg-white transition duration-500 rounded-md px-3 py-2 text-sm font-bold text-black">ABOUT</a>
                            </div>
                        </div>
                    </div>
            </nav>

            <section class="max-w-3xl mx-auto my-16 px-4">
            <h2 class="text-4xl font-extrabold text-black mb-10 text-center">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <!-- FAQ Item -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 font-semibold text-black flex justify-between items-center">
                    What is a thrift shop system?
                    <span class="transform transition-transform duration-300">+</span>
                </button>
                <div class="hidden p-4 text-gray-700 bg-white">
                    A thrift shop system is a digital platform that helps manage the operations of a secondhand store, including inventory tracking, sales processing, donation management, and customer interactions.
                </div>
                </div>

                <!-- Repeat for each question -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 font-semibold text-black flex justify-between items-center">
                    Who can use the thrift shop system?
                    <span class="transform transition-transform duration-300">+</span>
                </button>
                <div class="hidden p-4 text-gray-700 bg-white">
                    The system can be used by shop administrators, staff members, donors, and customers who want to buy or donate used items.
                </div>
                </div>

                <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 font-semibold text-black flex justify-between items-center">
                    How do I browse and buy items?
                    <span class="transform transition-transform duration-300">+</span>
                </button>
                <div class="hidden p-4 text-gray-700 bg-white">
                    You can view available items by category on the website or app. Once you find something you like, you can add it to your cart and check out using our secure payment system.
                </div>
                </div>

                <!-- Add the rest similarly... -->
                <!-- Example of another entry: -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 font-semibold text-black flex justify-between items-center">
                    Can I reserve an item before purchasing?
                    <span class="transform transition-transform duration-300">+</span>
                </button>
                <div class="hidden p-4 text-gray-700 bg-white">
                    Reservations depend on shop policy. Some shops allow holding an item for a limited time after customer request.
                </div>
                </div>

                <!-- Add more as needed -->
            </div>
            </section>

        <!-- Footer -->
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
                                <a href="privacy.php" title="Privacy & Policy" target="_blank">
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
                <a href="termsofservice.php" class="text-gray-500 hover:underline mx-2">Terms of Service</a> |
                <a href="faqs.php" class="text-gray-500 hover:underline mx-2">FAQs</a> |
                <a href="#" class="text-gray-500 hover:underline mx-2" onclick="showMap()">Philippines</a> |
            </div>
            
        </footer>

        <script>
        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            const symbol = button.querySelector('span');
            const isOpen = !content.classList.contains('hidden');

            document.querySelectorAll('section button + div').forEach(div => div.classList.add('hidden'));
            document.querySelectorAll('section button span').forEach(span => span.textContent = '+');

            if (!isOpen) {
            content.classList.remove('hidden');
            symbol.textContent = '−';
            }
        }

        function showMap() {
            window.open("https://www.google.com/maps/place/Philippines", "_blank");
        }
        </script>

</body>
</html>
