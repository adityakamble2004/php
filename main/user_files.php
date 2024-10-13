<?php
session_start();
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "javapoint";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID
$user_folder = "user_sites/$user_id/";

// Start output buffering to capture the output
ob_start();

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Uploaded Files</title>
    <style>
        body {
            background-color: #383636; /* Background color */
            color: #ffffff; /* Text color */
            font-family: Arial, sans-serif; /* Font style */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            margin-top: 50px; /* Margin for the heading */
        }
        ul {
            list-style-type: none; /* Remove bullet points */
            padding: 0; /* Remove padding */
            margin: 0; /* Remove margin */
        }
        li {
            background-color: #1c1f2b; /* Background for each list item */
            border: 1px solid #337ab7; /* Border color */
            border-radius: 5px; /* Rounded corners */
            margin: 10px 0; /* Space between items */
            padding: 10px; /* Padding inside items */
            width: 300px; /* Fixed width */
            text-align: center; /* Center the text */
        }
        a {
            color: #ffffff; /* Link color */
            text-decoration: none; /* Remove underline */
            font-weight: bold; /* Make text bold */
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
            color: #a6d0ac; /* Change color on hover */
        }
        .back-button {
            margin-top: 20px; /* Margin for the back button */
            padding: 10px 20px; /* Padding for button */
            background-color: #337ab7; /* Button background color */
            color: white; /* Button text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
        }
        .back-button:hover {
            background-color: #a6d0ac; /* Change background color on hover */
        }
    </style>
</head>
<body>';

if (is_dir($user_folder)) {
    // Scan the directory for files
    $files = array_diff(scandir($user_folder), array('.', '..')); // Exclude . and ..

    echo '<h2>Your Uploaded Files</h2>';
    echo '<ul>';
    
    // List files in the directory
    foreach ($files as $file) {
        // Create a link for each file
        echo '<li><a href="' . $user_folder . $file . '" target="_blank">' . $file . '</a></li>';
    }
    
    echo '</ul>';
} else {
    echo "<p>User folder does not exist.</p>";
}

// Add a button to go back
echo '<button class="back-button" onclick="window.history.back()">Back</button>';

echo '</body>
</html>';

// Flush the output buffer and end output buffering
ob_end_flush();
?>
