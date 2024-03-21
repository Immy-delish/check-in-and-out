<?php
$host = "localhost";
$username = "root";
$password = "password";
$dbname = "immie";


// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



// Your application logic using the connection ($conn)

// Close the connection
mysqli_close($conn);
?>
