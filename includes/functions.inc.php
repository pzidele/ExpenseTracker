<?php

function emptyInputSignup($name, $email, $username, $password, $passwordRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    // check if certain types of characters in the username
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidPhone($phone) {
    $result;

    $phone = str_replace([' ', '.', '-', '(', ')'], '', $phone);
    
   
    $phone=trim($phone);
    $phone=preg_replace("/[^0-9]/", "", $phone);
    
    //eliminate leading 1 if its there
    if (strlen($phone) == 11) {
        $justNums = preg_replace("/^1/", '',$phone);
    }
  
    //if we have 10 digits left, it's probably valid.
    if (preg_match('/^[0-9]{10}+$/', $justNums) && strlen($justNums) == 10) {
        $result = true;
    }
    else {
        $result = false;
    }
    
    
    return $result;
}

function passwordMatch($password, $passwordRepeat) {
    $result;
    if ($password !== $passwordRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email) { 
    $sql = "SELECT * FROM Users WHERE UserUsername = ? OR UserEmail = ?;"; // use prepared statements
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        // send user back to signup page with error message
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }    
    
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    // checking if theres a result from this statement here
    if ($row = mysqli_fetch_assoc($resultData)) {
        // if there's data with this username in this db, 
        // I want to grab data from db
        // and continue doing what doing inside login form
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $phone, $getText, $username, $password) {
    $sql = "INSERT INTO Users(UserFullName,UserEmail,UserNumber,UserSendText,UserUsername,UserPassword) VALUES(?,?,?,?,?,?);"; 
    // prepared statement
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        // send user back to signup page with error message
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }    
    
    // hashing password
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssssss",$name,$email,$phone,$getText,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    // After the new user is successfully inserted into the database
    //$userPhoneNumber = $_POST['phone']; 

    // Make an HTTP POST request to send_sms.php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/expenseTracker/send_text.php'); 
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'phone=' . urlencode($phone));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    header("location: ../signup.php?error=none");
    
    exit();   
}

function modifyUserOptions($conn, $changeGetText) {
    //require_once 'dbh.inc.php';
    $usersID = $_SESSION['UserID'];
    
    $sql = "UPDATE Users SET UserSendText=$changeGetText WHERE UserID=$usersID";
    $conn->query($sql);
}

function emptyInputAddExpense($name, $category, $amount) {
    $result;
    if (empty($name) || empty($category) || empty($amount)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function addExpense($conn,$name,$category,$amount,$usersID) {   
    $sql = "INSERT INTO Expenses(ExpenseName,CategoryID,ExpenseAmount,UserID,ExpenseDate) VALUES(?,?,?,?,?);"; 
    // prepared statement
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        // send user back to addExpense page with error message
        header("location: ../addExpense.php?error=stmtfailed");
        exit();
    }     
   // $date = date('Y-m-d');
    mysqli_stmt_bind_param($stmt,"sssss",$name,$category,$amount,$usersID,date('Y-m-d'));
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../addExpense.php?error=none");
    exit(); 
}
    
function emptyInputLogin($username,$password) {
    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
} 
    
function loginUser($conn, $username, $password) {
    $usernameExists = usernameExists($conn, $username, $username);
    
    if ($usernameExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    
    // data gets returned as assoc array
    $passwordHashed = $usernameExists["UserPassword"];
    $checkPassword = password_verify($password,$passwordHashed);

    if ($checkPassword === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true) {
        // start a session
        session_start();
        // create session variables with superglobals
        $_SESSION["UserID"] = $usernameExists["UserID"];
        $_SESSION["UserUsername"] = $usernameExists["UserUsername"];
        header("location: ../index.php");
        exit();
    }   
}

function getSumExpenses() {
    require 'dbh.inc.php';

    $usersID =  $_SESSION['UserID'];
    
    $curYear = (Integer)date('Y');
    $curMonth = (Integer)date('m');

    $query = "select sum(ExpenseAmount) As sumExpenses from Expenses where UserID=$usersID "
            . "&& month(ExpenseDate)=$curMonth && year(ExpenseDate)=$curYear;";
    // want to get the current month and year and only select where month and year equals that
    $result = mysqli_query($conn,$query);
    // Get the sum value from the query result
    $row = mysqli_fetch_assoc($result);
    $sum = number_format($row['sumExpenses'], 2, '.',',');
    return $sum;
}

