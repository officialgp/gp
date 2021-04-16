<?php session_start();
    
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.">
        <title>PHP - Registration</title>
</head>
<html>
<body>
<p><strong>Zuri_Task Registration Form</strong></p>

<form method="POST" action="formaction.php">


<p>
    <?php
        if(isset($_SESSION['error']) && !empty($_empty['error'])) {
            echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
            session_destroy();
        }
    ?>
</p>

<p>
    <label>First Name</label><br/>
        <input type="text" name="first_name" placeholder="First name" required/> 
</p>

<p>
    <label>Last Name</label><br/>
        <input type="text" name="last_name" placeholder="Last name" required/>
</p>

<p>
    <label>Gender</label><br/>
        <select>
            <option value="">Select One</option>
            <option>Male</option>
            <option>Female</option>
        </select>
</p>
<p>
    <label>Email Address</label><br/>
        <input type="text" name="email" placeholder="Email Address"required/>
</p>
<p>
    <label>Password</label><br/>
        <input type="password" name="password" required/>
</p>
<button type="submit" name="submit">Register</button>

</form>
<p>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
    </p>

</body>
</html>