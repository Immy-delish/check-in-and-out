<?php
// Include the file with database connection details
include 'db_connection.php';

// Write SQL query to select data from the database
$sql = "SELECT * FROM registrations";

// Execute the query and store the results in a variable
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($conn);
?>
