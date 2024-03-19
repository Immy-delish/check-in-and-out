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
// Define the test_input() function for input sanitization
function test_input($data) {
  $data = trim($data);            // Remove leading/trailing whitespace
  $data = stripslashes($data);    // Remove backslashes (\)
  $data = htmlspecialchars($data); // Convert special characters to HTML entities
  return $data;
}

// Define variables to store form data and error messages
$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = $comment = $website = "";

// Validate form inputs when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
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
<!-- Repeat for other form fields... -->

<input type="submit" name="submit" value="Submit">

</form>

</body>
</html>









     
    </body>
</html>