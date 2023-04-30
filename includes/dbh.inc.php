<?php

$serverName = "expense-tracker.cbps0xpjghgb.us-east-1.rds.amazonaws.com";
$dbUsername = "admin";
$dbPassword = "admin123";
$dbName = "expense-tracker";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    echo "Connection failed: " .mysqli_connect_error();
}