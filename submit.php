<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedExtensions = array("jpeg", "jpg", "png");

        if (in_array($imageFileType, $allowedExtensions)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file format. Only JPEG and PNG files are allowed.";
        }
    } else {
        echo "Invalid email format.";
    }
}
?>
