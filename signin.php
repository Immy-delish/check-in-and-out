<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Atim</title>
    <link rel="stylesheet" href="signin.css"> <!-- Link to external CSS file -->
    <script>
        // Function to validate username asynchronously
        function validateUsername() {
            var username = document.getElementById("username").value;

            // Make an asynchronous request to validate the username
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    if (response.valid) {
                        // Display green tick next to username field
                        document.getElementById("username-icon").innerHTML = "&#10004;";
                        // Enable password field
                        document.getElementById("password").disabled = false;
                        // Enable submit button
                        document.getElementById("submit-btn").disabled = false;
                    } else {
                        // Clear green tick next to username field
                        document.getElementById("username-icon").innerHTML = "";
                        // Disable password field
                        document.getElementById("password").disabled = true;
                        // Disable submit button
                        // document.getElementById("submit-btn").disabled = true;
                    }
                }
            };
            xhttp.open("GET", "validate_username.php?username=" + username, true);
            xhttp.send();
        }
    </script>
</head>
<body>
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
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM accounts WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: app.atim.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $password_err = "Password is Incorrect.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $username_err = "Password is Incorrect.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>
    <div class="container">
        <div class="form-container">
            <div class="image"> 
                <img src="immiephp2.png" alt="Image">
            </div>
            <div class="form-container">
                <h2>Sign In to iatim.io</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" id="username" onkeyup="validateUsername()">
                        <span id="username-icon"></span>
                        <span><?php echo $username_err; ?></span>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" id="password" disabled>
                        <span><?php echo $password_err; ?></span>
                    </div>
                    <div>
                        <input type="submit" value="Sign In" id="submit-btn" disabled>
                    </div>
                    <div class="centered-text">
                        <p>Don't have an account? <a href="signup.php">Sign Up now</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        var password = document.getElementById("passwordInput").value;
        if (password === '') {
            event.preventDefault(); // Prevent form submission
        }
    });
</script>

</body>
</html>
