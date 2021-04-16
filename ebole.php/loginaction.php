<?php session_start();
    
    $errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0){
    $session_error = "You have " . $errorCount . "error";

    if($errorCount > 1) {
            $session_error .= "s";
    }

    $session_error .= " in your submission";
    $_SESSION['error'] = $session_error ;


    header("Location: login.php");

}else {
    $allUsers = scandir("database/users/");
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers; $counter++) {
          
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            
            $userString = file_get_contents("database/users/" .$currentUser);
            $userObject = json_decode($userString);
            $passwordFromDatabase = $userObject->password;

            $passwordFromUser = password_verify($password, $passwordFromDatabase);

            if($passwordFromDatabase == $passwordFromUser){

                $_SESSION['loggedIn'] = $userObject->id;
                echo "Inside the dashboard";
                die();
            }
            
        }


    }
        $_SESSION['error'] = "Invalid Email or Password";   
       header("Location: login.php");
    die();

}


