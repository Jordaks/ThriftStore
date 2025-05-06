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
    <title>About Us</title>

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
                                                <svg  class="hover:scale-110 transition duration-500 fill-current text-black w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                    </button>
                                <?php } ?>  

                                <!-- User -->

                                <?php if($authenticated){ ?>
                                    <p id="cart-count" class="bg-pink-200 text-gray-500 text-xs rounded-full flex items-center justify-center absolute top-7 left-[86%] px-1 py-[2px]">0</p>
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
                                        <a href="adminLogin.php" target="">
                                            <button type="button" class="ml-1.5 mr-1.5  hover:scale-110 transition duration-500 relative rounded-full p-1  text-black hover:text-gray-500 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden font-bold"> LOG IN
                                                <span class="absolute -inset-1.5"></span>
                                            </button>
                                        </a>
                                    </div>

                                    <div class="hover:scale-110 transition duration-500 relative ml-3 border-2 rounded-xl border-black bg-white hover:border-gray-500 ">
                                    <a href="adminSignup.php" target="">
                                            <button type="button" class="ml-1.5 mr-1.5 hover:scale-110 transition duration-500 relative rounded-full p-1 text-black hover:text-gray-500 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden font-bold"> SIGN UP
                                                <span class="absolute -inset-1.5"></span>
                                            </button>
                                        </a>
                                    </div>
                                <?php } ?>                          
                        </div>
                </div>
            </nav>

    <!-- Hero Section -->
    <section class="bg-pink-100 py-16 text-center">
        <h1 class="text-5xl font-bold text-brand">About Us</h1>
        <p class="mt-4 max-w-xl mx-auto text-lg text-gray-700">A modern thrift shop where you handpick pieces and turn them into your own perfect fit.</p>
    </section>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-6 py-16 space-y-16">

        <!-- Our Purpose -->
        <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">Our Purpose</h2>
        <p class="text-lg">We believe technology can create positive change. That’s why we built Rethry—a platform where buyers and sellers can connect easily, grow together, and share a love for fashion with purpose.</p>
        </section>

        <!-- Our Positioning -->
        <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">Our Positioning</h2>
        <p class="text-lg">For style-conscious and eco-aware shoppers, Rethry offers a personalized thrifting experience where every piece is handpicked with care. We combine the ease of online shopping with a growing community that values sustainability, individuality, and connection.</p>
        </section>

        <!-- Our Way -->
        <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">Our Way</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-bold text-brand mb-2">Authentic</h3>
            <p>We stay true to our roots. We value honesty, embrace imperfections, and celebrate individuality through every pre-loved piece.</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-bold text-brand mb-2">Uplifting</h3>
            <p>We bring positive energy to everything we do. From our curated finds to our supportive community, we aim to brighten someone’s day.</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-bold text-brand mb-2">United</h3>
            <p>We grow stronger together. Whether you're a buyer, seller, or fellow thrifter, you're part of the Rethry family—and we’re here to lift each other up.</p>
            </div>
        </div>
        </section>

        <!-- Our Journey -->
        <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">Our Journey</h2>
        <p class="text-lg">Rethry began its story in <strong>March 2025</strong> with a simple mission: to make thrifting more accessible, stylish, and meaningful.</p>
        <p class="mt-4 text-lg">We launched as a modern online thrift shop, curating pre-loved fashion that empowers self-expression while promoting sustainability. From day one, our goal has been to build a community where buyers and sellers connect through a shared love for unique finds and conscious choices.</p>
        <p class="mt-4 font-semibold text-brand">This is just the start—and we’re excited to grow together with you.</p>
        </section>

        <!-- Our Values -->
        <section>
        <h2 class="text-3xl font-semibold text-gray-900 mb-4">Our Values</h2>
        <ul class="space-y-3 text-lg list-disc pl-6">
            <li><strong>We stay real</strong> – We value authenticity, honesty, and being true to ourselves and others.</li>
            <li><strong>We care deeply</strong> – We’re passionate about what we do and the people we serve.</li>
            <li><strong>We move with purpose</strong> – Everything we do is intentional, from the pieces we curate to the experiences we create.</li>
            <li><strong>We grow together</strong> – We support each other and build a strong, connected community.</li>
            <li><strong>We make it count</strong> – Every action, product, and connection matters.</li>
        </ul>
        </section>


    </main>

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

                <script>
                    function showMap() {
                        window.open("https://www.google.com/maps/place/Philippines", "_blank");
                    }
                </script>
            </div>
            
        </footer>

</body>
</html>
