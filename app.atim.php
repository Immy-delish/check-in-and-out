
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>traning</title>
        <!DOCTYPE html>

    
    <!-- Additional CSS and JavaScript imports can go here -->
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">

    </head>
     
    <header>
    <?php include 'signoutmenu.php'; ?>
    
<?php
// Start session
session_start();

// Check if user is not logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirect user to login page
    header("location: signin.php");
    exit;
}



// Other PHP code for the welcome page...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | atim</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
    <p>These are Your Downloads.</p>
    <p>Click <a href="https://preview.keenthemes.com/metronic8/demo1/index.html?mode=light">Metronic</a> to go to the Keenthemes demo page.</p>
</body>
</html>


<?php
//Display All Files and Folders that are in my Downloads Folder on The PC
$folder_path = "C:\Users\danniwe\Downloads"; // Replace this with the actual path to your folder
// Get the list of files in the folder
$files = scandir($folder_path);

// Remove . and .. from the list
$files = array_diff($files, array('.', '..'));

// Sort files by modification time
usort($files, function($a, $b) use ($folder_path) {
    return filemtime($folder_path . '/' . $b) - filemtime($folder_path . '/' . $a);
});

// Loop through the files and display them
foreach ($files as $file) {
    echo $file . "<br>";
}
?>
<b>
<footer>
 <!-- Footer content goes here --> 
    <?php include 'footer.php'; ?>
    
  
    
</footer>
</body>
</html>

