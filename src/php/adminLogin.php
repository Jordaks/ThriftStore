<?php
    include ("../../config/connection.php"); // Corrected path to database.php

    session_start();    
    $authenticated = isset($_SESSION["email"]);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $encpass = md5($password);

        if(!empty($email) && !empty($encpass)) {

            $query = "SELECT * FROM thrift_db WHERE email = '$email' limit 1";  
            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    
                    $admin_data = mysqli_fetch_assoc($result);

                    if ($admin_data['password'] === $encpass) {
                        // Assign values from $admin_data to variables
                        
                        $_SESSION["user_id"] = $admin_data["user_id"];
                        $_SESSION["first_name"] = $admin_data["first_Name"];
                        $_SESSION["last_name"] = $admin_data["last_Name"];
                        $_SESSION["email"] = $admin_data["email"];
                        $_SESSION["phone"] = $admin_data["phone_Number"];
                        $_SESSION["house_number"] = $admin_data["house_Number"];
                        $_SESSION["zone"] = $admin_data["zone"];
                        $_SESSION["barangay"] = $admin_data["barangay"];
                        $_SESSION["city"] = $admin_data["city"];
                        $_SESSION["province"] = $admin_data["province"];

                        // Check for admin
                        if ($email === "admin@gmail.com" && $encpass === md5("Admin@123")) {
                            $_SESSION['is_admin'] = true;
                            $_SESSION['email'] = $email;
                            header("Location: ../../dashboard.php");
                            exit();
                        } else {
                            // In a real app, you'd check this against a user database
                            $_SESSION['is_admin'] = false;
                            $_SESSION['email'] = $email;
                            header("Location: ../../index.php");
                            exit();
                        }
                    } 
                }   
            }
            echo "<script> type='text/javascript'> alert('Invalid email or password!')</script>";
        }
        else {
            echo "<script> type='text/javascript'> alert('Invalid email or password!')</script>";
        }
    }

?>


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
    <title>Log In</title>

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
<body class="bg-pink-50">

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

            <div class="bg-[url('/ThriftStore/src/image/backg.jpg')] bg-center bg-cover px-6 min-h-screen grid place-items-center">
            <div class="bg-white p-11   rounded-3xl shadow-2xl w-1/2 ">
            <h2 class=" pt-1 text-4xl font-bold tracking-tight text-gray-900 text-center">Log In</h2>
            <form method="POST">
                <div class="mt-10">
                    <label for="email" class="block font-semibold text-m text-gray-00">Email</label>
                    <input type="email" name="email" placeholder="Enter your email" id="email" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                </div>
                <div class="mt-7">
                    <label for="password" class="block font-semibold text-m text-gray-00">Password</label>
                    <input type="password" minlength="8" placeholder="Enter your password" name="password" id="password" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                </div>
                <div class="mt-10">
                    <button type="submit" class="w-fit ml-60 font-semibold mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl">
                        <p class="text-center text-lg px-5 font-bold">
                            Log In
                        </p>
                    </button>
                </div>
            </form>
            <div class="mt-12 text-sm font-semibold text-center">
                Don't have an account ? <a href="adminSignup.php" class="text-pink-500 hover:text-pink-700">Sign Up</a>
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
                                <a href="log_in.php" title="Login" target="_blank">
                                Login
                                </a>
                            </span>
                            <br>
                            <span class="ml-40 mb-20 hover:scale-110 transition duration-500 hover:text-yellow-400">
                                <a href="signup.php" title="Register" target="_blank">
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
                        &copy; 2025 RETHRY. All Rights Reserved. |
                        <a href="#" class="text-gray-500 hover:underline mx-2">Terms of Service</a> |
                        <a href="#" class="text-gray-500 hover:underline mx-2">FAQs</a> |
                        <a href="#" class="text-gray-500 hover:underline mx-2">Philippines</a> |
                    </div>
            
        </footer>

        <script>
                    // animation

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

        </script>
</body>
</html>