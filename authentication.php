<?php
$servername = "localhost";
$username = "root";      // Default username for XAMPP MySQL
$password = "";          // Default password is empty
$dbname = "javapoint";   // Make sure this is the correct database name

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}
?>

<?php      
    session_start(); // Start the session at the beginning of the script
    include('connection.php');  

    // Retrieve username and password from POST request
    $username = $_POST['user'];  
    $password = $_POST['pass'];  

    // Prevent SQL injection
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  

    // SQL query to find matching user
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

    if ($count == 1) {  
        // Store user information in session
        $_SESSION['user_id'] = $row['id']; // Assuming 'id' is the primary key in 'login' table
        $_SESSION['username'] = $row['username'];
        
        // Redirect to main/index.php after successful login
        header("Location: main/index.php");
        exit();
    } else {  
        echo "<h1>Login failed. Invalid username or password.</h1>";  
    }     
?>
