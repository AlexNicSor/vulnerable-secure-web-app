<?php
include 'db.php';
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($current_password, $hashed_password)) {
        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE username = ?");
        $update_stmt->bind_param("ss", $new_hashed_password, $username);

        if ($update_stmt->execute()) {
            echo "<div class='alert alert-success text-center'>Password changed successfully!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error updating password.</div>";
        }
        $update_stmt->close();
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
