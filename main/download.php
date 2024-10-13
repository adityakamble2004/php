<?php
require 'connection.php';
$file_id = $_GET['file_id'];

// Validate file ownership
$sql = "SELECT filename, filepath FROM files WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $file_id, $_SESSION['user_id']);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows == 1) {
    $stmt->bind_result($filename, $filepath);
    $stmt->fetch();

    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    readfile($filepath);
} else {
    echo "File not found.";
}
?>