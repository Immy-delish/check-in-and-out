<?php
// Include database connection
include 'db_connection.php';

// Establish a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute SQL query to retrieve data
$sql = "SELECT * FROM registrations";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Display data on the page
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Comment: " . $row["comment"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br><br>";
    }
} else {
    echo "No data found";
}

// Close the database connection
mysqli_close($conn);

?>
