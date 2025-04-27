<?php

include ("connection.php");

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
            $encpass = md5($password);

            $check_email = mysqli_query($con, "SELECT * FROM users_db WHERE email = '$email'");
            $result = $conn -> query($check_email);
            if ($result -> num_rows > 0) {
                echo "<script>alert('Email already exists!');</script>";
            } else {
                $sql = "INSERT INTO users_db (first_name, last_name, email, phone, house_number, zone, barangay, city, province, password) 
                        VALUES ('$first_name', '$last_name', '$email', '$phone', '$house_number', '$zone', '$barangay', '$city', '$province', '$encpass')";
                
                if ($conn -> query($sql)== TRUE) {
                    echo "<script>alert('Registration successful!');</script>";
                    header("Location: login.php");
                } else {
                    echo "<script>alert('Error: ".$conn->error."');</script>";
                }
            }
        } 

        if (isset($_POST['signIn'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = md5($password);

            $sql = "SELECT * FROM users_db WHERE email = '$email' AND password = '$password'";
            $result = $conn -> query($sql);
            if ($result -> num_rows > 0) {
                session_start();
                $row = $result -> fetch_assoc();
                $_SESSION['email'] = $row['email'];
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Invalid email or password!');</script>";
            }
        }

?>