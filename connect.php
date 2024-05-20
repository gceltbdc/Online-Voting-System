<?php

$host = "localhost";
$username = "root";
$password = "demo@123"; // Change this to your new password
$database = "votingsystem";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful";
}

?>