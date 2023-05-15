<?php

include 'header.php';

// pull info from database with option to change phone number?
require 'includes/dbh.inc.php';

$usersID = $_SESSION['UserID'];
$query = "select * from Users where UserID=$usersID;";
$result = mysqli_query($conn, $query);
$info = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($info as $userinfo) :
    echo $userinfo["UserFullName"]."<br>";
    echo $userinfo['UserUsername']."<br>";
    echo $userinfo['UserNumber']."<br>";
    echo $userinfo['UserEmail'];
endforeach;

include 'footer.php';
