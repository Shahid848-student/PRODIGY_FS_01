<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "login_register");

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
} else {
    // Comment this line after testing if it works
    // echo "✅ Database connected!";
}
?>
