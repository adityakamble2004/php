<?php
// Include the database connection
$servername = "localhost";
$username = "root"; // Change if your MySQL username is different
$password = ""; // Change if you have a MySQL password
$dbname = "javapoint"; // Ensure this matches your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Check for empty fields
    if (empty($username) || empty($password)) {
        die("All fields are required.");
    }

    // Prepare the SQL statement to insert into the login table
    $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("ss", $username, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful!";

        } else {
            echo "Error: Could not register user.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement.";
    }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f5;
        }
        .message-box {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
        }
        .button {
            margin-top: 15px;
            padding: 10px 20px;
            color: white;
            background-color: #00FF9C;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2>Registration Successful!</h2>
        <p>Your account has been created successfully.</p>
        <a href="login.html" class="button">Go to Login</a>
    </div>
</body>
</html>
