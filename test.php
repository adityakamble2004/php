<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javapoint";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the ID you want to look up
$user_id = 1; // Replace with the ID you're looking for

// Prepare and execute the SQL query
$stmt = $conn->prepare("SELECT username FROM login WHERE id = 1");

if (!$stmt) {
    die("Prepare failed: " . $conn->error); // Show error if prepare fails
}

$stmt->bind_param("i", $user_id); // "i" indicates the type is integer
$stmt->execute();
$stmt->bind_result($username);

// Fetch the result
if ($stmt->fetch()) {
    echo "Username: " . $username;
} else {
    echo "No record found";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
