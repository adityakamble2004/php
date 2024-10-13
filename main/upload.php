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

// Specify the target directory for user uploads
$user_id = $_SESSION['user_id']; // Get the logged-in user's ID
$target_dir = "user_sites/$user_id/"; // Create a directory for the user
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Create user-specific directory if it doesn't exist
}

// Check if a file has been uploaded
if ($_FILES['zipFile']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['zipFile']['tmp_name'];
    $name = basename($_FILES['zipFile']['name']);
    
    // Move the uploaded ZIP file to the target directory
    move_uploaded_file($tmp_name, "$target_dir$name");

    // Create a ZipArchive object
    $zip = new ZipArchive;
    if ($zip->open("$target_dir$name") === TRUE) {
        $zip->extractTo($target_dir); // Extract files to the user-specific directory
        $zip->close();
        
        // Remove the ZIP file after extraction
        unlink("$target_dir$name");
        
        echo '<div style="padding: 15px; background-color: #28a745; color: white; border-radius: 5px; text-align: center; margin: 20px 0;">
                Files extracted successfully
              </div>';
        echo'<h3 align="center"><a href="index.php" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 20px;">
             Go to home
             </a></h3>';
    } else {
        echo '<div style="padding: 15px; background-color: #dc3545; color: white; border-radius: 5px; text-align: center; margin: 20px 0;">
                Failed to open the ZIP file.
              </div>';
    }
} else {
    echo '<div style="padding: 15px; background-color: #dc3545; color: white; border-radius: 5px; text-align: center; margin: 20px 0;">
            No file was uploaded or there was an error.
          </div>';
}
?>
