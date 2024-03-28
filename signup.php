<?php
// Start the session
session_start();

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

// Define variables and initialize with empty values
$email = $phone = $username = $gender = $password = "";
$email_err = $phone_err = $username_err = $gender_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate phone number
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter phone number.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please select gender.";
    } else {
        $gender = trim($_POST["gender"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before inserting into database
    if (empty($email_err) && empty($phone_err) && empty($username_err) && empty($gender_err) && empty($password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO accounts (email, phone_number, username, gender, password) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_email, $param_phone, $param_username, $param_gender, $param_password);

            // Set parameters
            $param_email = $email;
            $param_phone = $phone;
            $param_username = $username;
            $param_gender = $gender;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: signin.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css"> <!-- Link to external CSS file -->
    <title>Sign Up | Atim</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
        <div class="image"> 
        <img src="IMG-20231207-WA0003.jpg" alt="Image">
            <h2>Sign Up for to iatim.io</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <span><?php echo $email_err; ?></span>
                </div>
                <div>
                    <label>Phone Number</label>
                    <input type="text" name="phone" value="<?php echo $phone; ?>">
                    <span><?php echo $phone_err; ?></span>
                </div>
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    <span><?php echo $username_err; ?></span>
                </div>
                <div>
                    <label>Gender</label>
                    <select name="gender">
                        <option value="">Select...</option>
                        <option value="male" <?php if ($gender === 'male') echo 'selected="selected"'; ?>>Male</option>
                        <option value="female" <?php if ($gender === 'female') echo 'selected="selected"'; ?>>Female</option>
                    </select>
                    <span><?php echo $gender_err; ?></span>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                    <span><?php echo $password_err; ?></span>
                </div>
                <div>
                    <input type="submit" value="Sign Up">
                </div>
                <p>Aready have an account? <a href="signin.php">Sign In</a>.</p>  
            </form>
        </div>
    </div>
</body>
</html>
