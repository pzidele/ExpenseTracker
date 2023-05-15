<?php

if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["uid"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordrepeat"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if (emptyInputSignup($name,$email,$username,$password,$passwordRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }   
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }   
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($password,$passwordRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (usernameExists($conn,$username,$email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    if (invalidPhone($phone) !== false) {
        header("location: ../signup.php?error=invalidphone");
        exit();
    }
    
    
    createUser($conn,$name,$email,$phone,$username,$password);
}
else {
    header("location: ../signup.php");
    exit();
}