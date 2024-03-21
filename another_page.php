<?php
// Include database connection
include 'db_connection.php';

// Select all data from the registrations table
$sql = "SELECT * FROM registrations";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["name"]. " - Email: " . $row["email"]. " - Comment: " . $row["comment"]. " - Gender: " . $row["gender"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($conn);
?>
