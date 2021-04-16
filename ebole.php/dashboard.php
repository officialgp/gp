<?php session_start(); ?>
if(!isset($_SESSION['loggedin'])){
    header("location: login.php");
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.">
        <title>PHP - Dashboard</title>
</head>
<body>
<h3>Dashboard</h3>
    
<?php
    //codes for PHP
?>
    Welcome to your Dashboard,

    <p>
        <a href="index.php">Home</a>
    </p>
</body>
</html>