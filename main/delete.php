
<?php
require 'connection.php';
$file_id = $_GET['file_id'];

// Validate file ownership and get file path
$sql = "SELECT filepath FROM files WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $file_id, $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($filepath);
$stmt->fetch();
$stmt->close();

// Delete the file if exists
if (file_exists($filepath)) {
    unlink($filepath);
}

// Remove record from database
$sql = "DELETE FROM files WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $file_id);
$stmt->execute();

header("Location: dashboard.php");
?>
