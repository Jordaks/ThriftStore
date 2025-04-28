<?php
session_start();
include("config/database.php");

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Find user by email
    $sql = "SELECT * FROM thrift_db WHERE email = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email); // "s" for string
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        // Check password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id']; // Save ID to session
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

<div class="bg-white p-8 rounded shadow-md w-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>

    <?php if (!empty($error)): ?>
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" required class="w-full px-3 py-2 border rounded">
        </div>

        <div class="mb-6">
            <label>Password</label>
            <input type="password" name="password" required class="w-full px-3 py-2 border rounded">
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">
            Login
        </button>
    </form>
</div>

</body>
</html>
