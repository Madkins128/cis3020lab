<?php
$targetDir = "uploads/";

// Create folder if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// ✅ Match the HTML name="fanArt"
$fileName = uniqid() . "-" . basename($_FILES["fanArt"]["name"]);
$targetFile = $targetDir . $fileName;

// Validate it's an image
if (getimagesize($_FILES["fanArt"]["tmp_name"]) === false) {
    die("File is not an image.");
}

// Move file
if (move_uploaded_file($_FILES["fanArt"]["tmp_name"], $targetFile)) {
    echo "Upload successful!<br>";
    echo "<img src='$targetFile' width='300'>";
} else {
    echo "Upload failed.";
}
?>