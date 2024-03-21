<?php

// Define the test_input() function for input sanitization
function test_input($data) {
  $data = trim($data);            // Remove leading/trailing whitespace
  $data = stripslashes($data);    // Remove backslashes (\)
  $data = htmlspecialchars($data); // Convert special characters to HTML entities
  return $data;
}

// Define variables to store form data and error messages
$nameErr = $emailErr = $genderErr = $commentErr =  "";
$name = $email = $gender = $comment = $website = "";

// Validate form inputs when form is submitted
//Add the name input field.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
//Add the Email input field.
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }  
  }
//Add the comment input field
  if (empty($_POST["Comment"])) {
    $commentErr = "Comment is required";
  } else {
    $comment = test_input($_POST["Comment"]);
  }
  
  // Repeat the same pattern for other form fields...
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Form Validation</title>
  <style>
    .error { color: red; }
  </style>
</head>
<body>

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

<!-- Repeat for other form fields... -->

<input type="submit" name="submit" value="Submit">


</form>

<br>
    
    















// Create connection
        $conn = mysqli_connect($host, $username, $password, $dbname);
        // Prepare SQL statement to insert data into the registrations table
        $sql = "INSERT INTO registrations (name, email, comment, gender) VALUES ('$name', '$email', '$comment', '$gender')";

        // Execute SQL statement
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);