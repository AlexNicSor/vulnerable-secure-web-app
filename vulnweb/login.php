<?php
include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
	echo $username;

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0){

	session_start();
	$_SESSION['username'] = $username;
	header("Location: dashboard.php");
	exit();

    } else {
        echo "<div class='alert alert-danger text-center'>Invalid credentials!</div>";
    }
}
?>

<div class="container">
    <div class="card p-4 shadow-sm">
        <h3 class="text-center">Login</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
</body></html>
<p>Don't have an account? <a href="signup.php">Sign Up here</a></p>

