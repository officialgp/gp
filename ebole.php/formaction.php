<?php session_start();

$errorCount = 0;

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
$gender = $_POST['gender'] != ""  ? $_POST['male.female']  : $errorCount;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;


if($errorCount > 0){
    $session_error = "You have " . $errorCount . "error";

    if($errorCount > 1) {
            $session_error .= "s";
    }

    $session_error .= " in your submission";
    $_SESSION['error'] = $session_error ;


    

}else {
        $allUsers = scandir("database/users/");

        $countAllUsers = count($allUsers);

        $newUserId = $countAllUsers++;

    $userObject = [
            'id'=>$newUserId,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'gender'=>$gender,
            'email'=>$email,
            'password'=> password_hash($password, PASSWORD_DEFAULT)
    ];

    for ($counter = 0; $counter < $countAllUsers; $counter++) {
          
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            $_SESSION["error"] = "Sorry, User already exists " . $first_name;
            header("Location: login.php");
            die();
        }


    }
    
    file_put_contents("database/users/".$email . "json", json_encode($userObject));
    $_SESSION["message"] = "Registration Successful, you can now login! " . $first_name;
    header("Location: login.php");
}

?>
