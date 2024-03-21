<!DOCTYPE html>
<html>
<head>
    <title>Training</title>
    <style>
        h1 {
            text-align: center;
        }
        .error { color: red; }
    </style>
</head>
<body>

<?php
// Establish database connection
include 'db_connection.php';

// Function to sanitize form inputs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Define variables to store form data and error messages
$nameErr = $emailErr = $commentErr = "";
$name = $email = $gender = $comment = "";

// Validate form inputs when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate comment
    if (empty($_POST["Comment"])) {
        $commentErr = "Comment is required";
    } else {
        $comment = test_input($_POST["Comment"]);
    }

    // If all fields are valid, insert data into database
    if (empty($nameErr) && empty($emailErr) && empty($commentErr)) {
        // Prepare SQL statement to insert data into the registrations table
        $sql = "INSERT INTO registrations (name, email, comment, gender) VALUES ('$name', '$email', '$comment', '$gender')";

        // Execute SQL statement
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<h1>This is my first training for PHP.</h1>
<p>I have to learn this for the goal of Ukwelys. I have to become a great PHP software developer.</p>

<h3>Register for PHP Classes</h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    E-mail:
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    Comment:
    <input type="text" name="Comment" value="<?php echo $comment; ?>">
    <span class="error">* <?php echo $commentErr;?></span>
    <br><br>

    Gender:
    <input type="radio" name="gender"
           <?php if (isset($gender) && $gender=="female") echo "checked";?>
           value="female">Female
    <input type="radio" name="gender"
           <?php if (isset($gender) && $gender=="male") echo "checked";?>
           value="male">Male
    <input type="radio" name="gender"
           <?php if (isset($gender) && $gender=="other") echo "checked";?>
           value="other">Other

    <br><br>

    <input type="submit" name="submit" value="Submit">

</form>

</body>
</html>
