<?php
// Include database connection
include 'db_connection.php';

// Define the test_input() function for input sanitization
function test_input($data) {
    $data = trim($data);            // Remove leading/trailing whitespace
    $data = stripslashes($data);    // Remove backslashes (\)
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}

// Define variables to store form data and error messages
$emailErr = $usernameErr = $phoneErr = $genderErr = $passwordErr = "";
$email = $username = $phone = $gender = $password = "";

// Prepare SQL statement to insert data into the accounts table
$sql = "INSERT INTO accounts (username, email, phone, gender, password) 
        VALUES ('$username', '$email', '$phone', '$gender', '$password')";

// If all fields are valid, insert data into database
if (empty($emailErr) && empty($usernameErr) && empty($phoneErr) && empty($genderErr) && empty($passwordErr)) {
    // Open MySQL connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        // Redirect user to sign-in page after successful sign-up
        header("Location: signin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
