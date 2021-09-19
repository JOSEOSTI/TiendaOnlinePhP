<?php

$servername = "localhost";
$username = "root";
$password = "73198513";
$db = "e-comerce";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>