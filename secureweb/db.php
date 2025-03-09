<?php
$host = "localhost";
$user = "secureuser"; // Change to a more secure username
$pass = "StrongPassword123!"; // Use a strong password
$db = "secureweb"; // New database

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

