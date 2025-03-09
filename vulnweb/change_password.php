<?php
include 'db.php'; // Ensure this connects to your MySQL database
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // 🛑 No session verification, users can change ANY password
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // ❌ SQL Injection Vulnerable Query
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$current_password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // ❌ No password hashing, passwords stored in plaintext
        $update = "UPDATE users SET password='$new_password' WHERE username='$username'";
        if ($conn->query($update) === TRUE) {
            echo "<div class='alert alert-success text-center'>Password changed successfully!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error updating password.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Incorrect current password!</div>";
    }
}
?>

<div class="container">
    <div class="card p-4 shadow-sm">
        <h3 class="text-center">Change Password</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label> <!-- 🛑 This should not be here, makes it easy to attack -->
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Change Password</button>
        </form>
    </div>
</div>
</body></html>
