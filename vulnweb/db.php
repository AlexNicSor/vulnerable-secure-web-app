<?php
$host = "localhost";
$user = "vulnuser";
$pass = "weakpassword";
$db = "vulnweb";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
