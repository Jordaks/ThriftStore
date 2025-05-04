<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../config/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cart = json_decode($_POST['cart'], true);
    if (!is_array($cart)) {
        echo "Invalid cart data.";
        exit;
    }

    $email = $_SESSION["email"] ?? '';
    $user_email = $email; // Assign $email to $user_email
    $full_name = ($_SESSION["first_name"] ?? '') . ' ' . ($_SESSION["last_name"] ?? '');
        $address = ($_SESSION["house_number"] ?? '') . ', ' .
                ($_SESSION["zone"] ?? '') . ', ' .
                ($_SESSION["barangay"] ?? '') . ', ' .
                ($_SESSION["city"] ?? '') . ', ' .
                ($_SESSION["province"] ?? '');
        $phone = $_SESSION["phone"] ?? '';

    foreach ($cart as $item) {
        $product_name = $item['name'] ?? '';
        $color = $item['color'] ?? '';
        $size = $item['size'] ?? '';
        $price = $item['price'] ?? 0.0;
        $quantity = $item['quantity'] ?? 0;
        $image_url = $item['image'] ?? '';

        $stmt = $con->prepare("INSERT INTO orders (user_email, full_name, address, phone, product_name, color, size, price, quantity, image_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssdis", 
                        $user_email,
                        $full_name, 
                        $address, 
                        $phone,
                        $product_name, 
                        $color, 
                        $size, 
                        $price, 
                        $quantity, 
                        $image_url
        );

        $stmt->execute();
    }

    echo "success";
} else {
    echo "Invalid request.";
}
?>
