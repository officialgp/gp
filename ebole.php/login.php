<?php session_start();
  if(isset($_SESSION['message']) && !empty($_empty['message'])) {
    echo "<span style='color:blue'>" . $_SESSION['message'] . "</span>";

    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.">
        <title>PHP - Login</title>
</head>
<body>

    <p><strong>User Login</strong></p>

<form method="POST" action="loginaction.php">
    <p>
        <label>Email</label><br/>
            <input
                <?php
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];
                    }
                ?>
                type="text" name="email" placeholder="Email" />
    
    </p>
    <p>
        <label>Password</label><br/>
            <input type="password" name="password" placeholder="Password" />
    </p>
    <p>
        <button type="submit">Login</button>
    </p>
</form>
    <p>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="reset_password">Forgot Password</a>
    </p>
</body>
</html>
