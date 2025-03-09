<?php
include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/";
    $file_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_types = ["jpg", "png", "txt", "pdf"];
    if (!in_array($file_type, $allowed_types)) {
        echo "<div class='alert alert-danger text-center'>Invalid file type!</div>";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<div class='alert alert-success text-center'>File uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>File upload failed.</div>";
        }
    }
}
?>
<div class="container">
    <div class="card p-4 shadow-sm">
        <h3 class="text-center">Upload File</h3>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
<div class="mb-3">
                <label class="form-label">Choose File</label>
                <input type="file" name="fileToUpload" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Upload</button>
        </form>
    </div>
</div>
</body></html>
