<!-- This is a connection for the sql database, will be setting it up as it is now to 
 connect with XAMPP off local host -->

<?php 

$host = "localhost"; // Connection for XAMPP and MySQL running locally
$username = "root"; // Default user
$password = ""; //Default pass is empty for XAMPP
$dbname = "bookDB"; // Our Book Database name

//Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if Successful
if ($conn -> connect_error)
{
    die("Connection failed. Please Contact an Admin: " . $conn->connect_error);
    
}

?>