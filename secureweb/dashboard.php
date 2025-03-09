<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">SecureApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="upload.php">Upload</a></li>
                    <li class="nav-item"><a class="nav-link" href="change_password.php">Change Password</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! 🎉</h1>
        <p class="lead">You have successfully logged in.</p>
        
        <!-- Display an Image -->
        <img src="welcome.jpg" class="img-fluid rounded" alt="Welcome Image" style="max-width: 400px;">
        
        <br><br>
        <a href="login.php" class="btn btn-primary">Go Back</a>
    </div>

</body>
</html>
