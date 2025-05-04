<?php
    include ("../../config/connection.php"); 
    session_start();

    $authenticated = false;
    if (isset($_SESSION["usertype"])) {
        $authenticated = $_SESSION["usertype"] !== "admin";
        $authenticated = true;
    }else {
        if (isset($_SESSION["usertype"])) {
            $authenticated = $_SESSION["usertype"] !== "user";
            $authenticated = false;
        }
    }

    // Initialize variables
    $first_name = $last_name = $email = $phone = $house_number = $zone = $barangay = $city = $province = $password = "";
    $name_error = $email_error = $phone_error = $password_error = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $house_number = $_POST['house_number'];
        $zone = $_POST['zone'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city']; 
        $province = $_POST['province'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];
        $error = false;

        // Validate First and Last Name
        if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name) || !preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
            $error = true;
            echo "<script>alert('First and Last Name: Only letters, apostrophes, hyphens, and spaces allowed.');</script>";
        }

        // Validate Phone Number (exactly 10 digits)
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $error = true;
            echo "<script>alert('Phone number must be exactly 10 digits.');</script>";
        }

        // Validate Email (must end with @gmail.com)
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
            $error = true;
            echo "<script>alert('Email must be a valid Gmail address (e.g., example@gmail.com).');</script>";
        }

        // Validate Barangay, City, Province (letters only)
        if (!preg_match("/^[a-zA-Z-' ]*$/", $barangay) || !preg_match("/^[a-zA-Z-' ]*$/", $city) || !preg_match("/^[a-zA-Z-' ]*$/", $province)) {
            $error = true;
            echo "<script>alert('Barangay, City, and Province: Only letters, apostrophes, hyphens, and spaces allowed.');</script>";
        }

        // Validate Password
        $password_valid = true;

        if (strlen($password) < 8) {
            $password_valid = false;
            echo "<script>alert('Password must be at least 8 characters.');</script>";
        }
        if (!preg_match('/[a-z]/', $password)) {
            $password_valid = false;
            echo "<script>alert('Password must include at least one lowercase letter (a–z).');</script>";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $password_valid = false;
            echo "<script>alert('Password must include at least one uppercase letter (A–Z).');</script>";
        }
        if (!preg_match('/[0-9]/', $password)) {
            $password_valid = false;
            echo "<script>alert('Password must include at least one number (0–9).');</script>";
        }
        if (!preg_match('/[@%&!()]/', $password)) { 
            $password_valid = false;
            echo "<script>alert('Password must include at least one special character (@ % & ! ()).');</script>";
        }

        if (!$password_valid) {
            $error = true;
        }

        // Only insert if no errors
        if (!$error) {
            $encpass = md5($password); // You may want to use a stronger encryption like password_hash() later.

            $query = "INSERT INTO thrift_db (first_Name, 
                                            last_Name, 
                                            email, 
                                            phone_Number, 
                                            house_Number, 
                                            zone, 
                                            barangay, 
                                            city, 
                                            province,
                                            password,
                                            usertype) 
                        VALUES ('$first_name',
                                '$last_name',
                                '$email', 
                                '$phone', 
                                '$house_number', 
                                '$zone', 
                                '$barangay', 
                                '$city', 
                                '$province',
                                '$encpass',
                                '$usertype')";

            if (mysqli_query($con, $query)) {
                echo "<script>alert('Successfully Added New Admin');</script>";
                header("Location: adminLogin.php");
                exit();
            } else {
                echo "<script>console.log('Query Error: " . addslashes($query) . "');</script>";
                echo "<script>alert('Error Saving New Admin.');</script>";
            }
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
    <title>Sign Up</title>

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
        <div class="bg-white p-12 rounded-3xl shadow-2xl w-1/2">
        <h2 class=" pt-1 text-4xl font-bold tracking-tight text-gray-900 text-center">Create Account</h2>
            <form action="adminSignup.php" method="POST">
                <!-- NAME -->
                <div class="mt-4 flex justify-between mr-2">
                    <div class="mt-7">
                        <label for="first_name" class="block font-semibold text-m text-gray-00">First Name</label>
                        <input type="text" placeholder="Enter your first name" name="first_name" id="first_name" value="<?= htmlspecialchars($first_name) ?>" class="px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                        <span class="text-danger"><?= $name_error ?></span>
                    </div>
                    <div class="mt-7 left-5">
                        <label for="last_name" class="block font-semibold text-m text-gray-00">Last Name</label>
                        <input type="text" placeholder="Enter your last name" name="last_name" id="last_name" value="<?= htmlspecialchars($last_name) ?>" class="px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="mt-7">
                    <label for="email" class="block font-semibold text-m text-gray-00">Email</label>
                    <input type="email" placeholder="Enter your email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                    <span class="text-danger"><?= $email_error ?></span>
                </div>

                <!-- PHONE -->
                <div class="mt-7">
                    <label for="phone" class="block font-semibold text-m text-gray-700 mb-2">Phone</label>
                    <div class="flex items-center gap-2">
                        <span class="text-center px-4 py-3 rounded-lg bg-gray-200 font-bold">+63</span>
                                <input 
                                    type="text" placeholder="e.g., 9123456789" name="phone" id="phone" value="<?= htmlspecialchars($phone) ?>"  class="w-full px-4 py-3 rounded-lg bg-gray-200 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                    </div>
                    <span class="text-danger text-sm"><?= $phone_error ?></span>
                </div>

                <!-- ADDRESS -->
                <div class="mt-4 flex justify-between mr-2">
                    <div class="mt-7">
                        <label for="house_number" class="block font-semibold text-m text-gray-00">House No.</label>
                        <input type="text" placeholder="Enter your house.no" name="house_number" id="house_number" value="<?= htmlspecialchars($house_number) ?>" class="px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                    </div>
                    <div class="mt-7 left-5">
                        <label for="zone" class="block font-semibold text-m text-gray-00">Zone</label>
                        <input type="text" placeholder="Enter your zone" name="zone" id="zone" value="<?= htmlspecialchars($zone) ?>" class="px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                    </div>
                </div>
                <div class="mt-4 flex justify-between mr-2">
                        <div class="mt-7">
                            <label for="barangay" class="block font-semibold text-m text-gray-00">Barangay</label>
                            <input type="text" placeholder="Enter your barangay" name="barangay" id="barangay" value="<?= htmlspecialchars($barangay) ?>" class="px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                        </div>
                        <div class="mt-7 left-5">
                            <label for="city" class="block font-semibold text-m text-gray-00">City</label>
                            <input type="text" placeholder="Enter your city" name="city" id="city" value="<?= htmlspecialchars($city) ?>" class="px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                        </div>
                </div>
                <div class="mt-7">
                    <label for="province" class="block font-semibold text-m text-gray-00">Province</label>
                    <input type="text" placeholder="Enter your province" name="province" id="province" value="<?= htmlspecialchars($province) ?>" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                </div>

                <input type="text" name="usertype" value="user" hidden>

                <!-- PASSWORD -->
                <div class="mt-7">
                    <label for="password" class="block font-semibold text-m text-gray-00">Password</label>
                    <input type="password" placeholder="Enter your password" name="password" id="password" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-orange-500 focus:bg-white focus:outline-none" required>
                    <i id="togglePassword" class="fa fa-eye cursor-pointer absolute right-4 top-12"></i>
                    <span class="text-danger"><?= $password_error ?></span>
                </div>

                <ul class="mt-4 space-y-1 text-sm text-gray-700" id="rules">
                    <li id="length" class="flex items-center gap-2 text-gray-400">
                        At least 8 characters
                    </li>
                    <li id="lower" class="flex items-center gap-2 text-gray-400">
                        Lowercase letter (a–z)
                    </li>
                    <li id="upper" class="flex items-center gap-2 text-gray-400">
                        Uppercase letter (A–Z)
                    </li>
                    <li id="number" class="flex items-center gap-2 text-gray-400">
                        Number (0–9)
                    </li>
                    <li id="special" class="flex items-center gap-2 text-gray-400">
                        Special character like @ % & ! ( )
                    </li>
                </ul>

                <div class="mt-5">
                    <button type="submit" class="w-fit ml-48 font-semibold mt-4 bg-black border-2 text-white  hover:bg-gray-600 px-4 py-2 rounded-2xl">
                        <p class="text-center text-lg px-5 font-bold">Create Account</p>
                    </button>
                </div>
            </form>
            <div class="mt-5 text-sm font-semibold text-center">
                Do you have an account? <a href="adminLogin.php" class="text-pink-500 hover:text-pink-700">Log In</a>
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
                                <a href="login.php" title="Login" target="_blank">
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

        //Password validation
        const password = document.getElementById("password");
        const toggle = document.getElementById("togglePassword");

        const rules = {
        length: document.getElementById("length"),
        lower: document.getElementById("lower"),
        upper: document.getElementById("upper"),
        number: document.getElementById("number"),
        special: document.getElementById("special")
        };

        password.addEventListener("input", () => {
        const val = password.value;

        rules.length.classList.toggle("text-green-600", val.length >= 8);
        rules.length.classList.toggle("text-gray-400", val.length < 8);

        rules.lower.classList.toggle("text-green-600", /[a-z]/.test(val));
        rules.lower.classList.toggle("text-gray-400", !/[a-z]/.test(val));

        rules.upper.classList.toggle("text-green-600", /[A-Z]/.test(val));
        rules.upper.classList.toggle("text-gray-400", !/[A-Z]/.test(val));

        rules.number.classList.toggle("text-green-600", /\d/.test(val));
        rules.number.classList.toggle("text-gray-400", !/\d/.test(val));

        rules.special.classList.toggle("text-green-600", /[!@#$%^&*()_\-+={}[\]:;"'<>,.?/\\|]/.test(val));
        rules.special.classList.toggle("text-gray-400", !/[!@#$%^&*()_\-+={}[\]:;"'<>,.?/\\|]/.test(val));
        });




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