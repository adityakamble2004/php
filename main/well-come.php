<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../login.html");
    exit;
}

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

// Initialize user name variable
$user_name = "Guest"; // Default value

// Get the user's name from the database
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username FROM login WHERE id = ?");
$stmt->bind_param("i", $user_id); // assuming the user ID is an integer
$stmt->execute();
$stmt->bind_result($user_name);

// Fetch result
if ($stmt->fetch()) {
    // If the username is found, it will replace "Guest"
    // $user_name is already set from the fetch
}
$stmt->close();

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .welcome-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }
        h1 {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
        <p>We're glad to have you here.</p>
    </div>
</body>
</html>
