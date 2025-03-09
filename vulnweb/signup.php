<?php
include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
	echo "$username";
    // Vulnerable SQL query (no prepared statements)
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($query) === TRUE) {
        echo "<div class='alert alert-success'>Sign up successful!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="container">
    <div class="card p-4 shadow-sm">
        <h3 class="text-center">Sign Up</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
    </div>
</div>
</body></html>
<p>Already have an account? <a href="login.php">Login here</a></p>
