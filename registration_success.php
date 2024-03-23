
<!DOCTYPE html>
<html>
<head>

</head>

<body>
<h2>Thank you so much for signing Up for the classes.</h2>
<br>

<?php
// Include database connection
include 'db_connection.php';

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statement to select the last entry from the registrations table
$sql = "SELECT * FROM registrations ORDER BY id DESC LIMIT 1";

// Execute SQL statement
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($result);

    // Output the retrieved data
    echo "Name: " . $row["name"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
    echo "Comment: " . $row["comment"] . "<br>";
    echo "Gender: " . $row["gender"] . "<br>";
} else {
    echo "No entries found.";
}

// Close the database connection
mysqli_close($conn);

?>




</body>

</html>