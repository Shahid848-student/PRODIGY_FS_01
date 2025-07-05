
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        echo "<script>alert('Please fill all fields');</script>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            echo "<script>alert('✅ Registered successfully! Please login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('❌ Error: " . $stmt->error . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit" name="register">Register</button>
        </form>
        <div class="register-link">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>
</body>
</html>
