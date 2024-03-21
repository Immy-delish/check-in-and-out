<!DOCTYPE html>
<html>
    <head>
        <title>traning</title>
    </head>
    <body> 
    <style>
        h1 {
            text-align: center;
        }
    </style>    
    <b>
<h1>This is my first traning for PHP. <br> I have to learn this for the goal of Ukwelys.
 <br>I have to become that great PHP software Developer</h1>
</b>
<br>
<br>
        <?php
           $txt = "PHP";
           echo "I love $txt!<br><br>";
           
           $txt = "W3Schools.com";
           echo "I love $txt because it offers a simple and clear learning platform for me. And ChatGPT, because WHY NOT?" ;


            $var = 'Mark';
            $Var = 'Hilary';
            $txt1 = "Learn PHP";
            $txt2 = "W3Schools.com";
            $txt3 = "Format to be followed during the learning";
            $txt4 = "We shall balance our time using the timetable through checkins and checkouts";

            echo " My Coaches are " . $var . " and " . $Var;                   
            echo "<h2>" . $txt1 . "</h2>";
            echo "Study PHP at " . $txt2 . "<br>";          
            echo "<h3>" . $txt3. "</h3>" ;
            echo "By working Deligently, you will learn faster because, " . $txt4 ."<br>" ."<br>";
             
            define("GREETING", "<b>Welcome to learning PHP!</b>");
            echo GREETING. "<br>";
            if (6>5) {
                echo "PHP is good";
              } else {
                echo "PHP is Bad";
              }
              
        ?>
 
     <h3>Register for PHP Classes</h3>

     <?php


echo "" . date("l, "); echo "" . date("d/m/Y") . "<br>";




?>
<?php
// Define the test_input() function for input sanitization
function test_input($data) {
    $data = trim($data);            // Remove leading/trailing whitespace
    $data = stripslashes($data);    // Remove backslashes (\)
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
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
        // Include database connection
        include 'db_connection.php';
        
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
    }
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

</body>
</html>
