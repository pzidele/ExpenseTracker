<?php
include_once '../header.php';


if(isset($_POST["addexp"])) {
    require_once 'dbh.inc.php';
    require 'functions.inc.php';
    // it goes into here but where do we get name and amount from
    $name = $_POST["name"];
    $amount = $_POST["amount"];    
    $cat = $_POST["category"];
    
    // get the id of this category
    $sql = "select CategoryID from Categories where CategoryName = '$cat';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $category = $row["CategoryID"];
            
    
    if (emptyInputAddExpense($name,$amount,$category) !== false) {
        header("location: ../addExpense.php?error=emptyinput");
        exit();
    }
    // add more error handling there if want to 
    
    addExpense($conn,$name,$category,$amount,$usersID); 
} 
else {
    header("location: ../addExpense.php?error=nothing");
    exit();
}

