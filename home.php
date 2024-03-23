<!DOCTYPE html>
<html lang="en">
    <head>
        <title>traning</title>
        <!DOCTYPE html>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Additional CSS and JavaScript imports can go here -->
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    </head>


    </head>
     
    <header>
    <?php include 'menu.php'; ?>
    </header>

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
     Click <a href="form_application.php">HERE</a> to register for the Classes

     <br>
     <br>

     <?php


echo "" . date("l, "); echo "" . date("d/m/Y") . "<br>";




?>
<footer>
    <!-- Footer content goes here --> 
    <style>
        p3 {
            text-align: center;
        }
    </style>    
    <p3>copyright@PHP</p3>
</footer>
</body>
</html>