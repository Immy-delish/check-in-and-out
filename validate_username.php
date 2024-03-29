<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "password";
$dbname = "immie";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the username from the GET request
$username = $_GET['username'];

// Prepare a select statement
$sql = "SELECT id FROM accounts WHERE username = ?";

if ($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("s", $username);

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();

        // Check if username exists
        $response = array();
        if ($stmt->num_rows == 1) {
            // Username exists
            $response['valid'] = true;
        } else {
            // Username does not exist
            $response['valid'] = false;
        }

        // Return response as JSON
        echo json_encode($response);
    } else {
        // Error occurred while executing the statement
        echo json_encode(array('valid' => false, 'error' => 'An error occurred while executing the statement.'));
    }

    // Close statement
    $stmt->close();
} else {
    // Error occurred while preparing the statement
    echo json_encode(array('valid' => false, 'error' => 'An error occurred while preparing the statement.'));
}

// Close connection
$conn->close();
?>
