<?php
$host="localhost";
$user="root";
$pass="";
$db="social";
$conn=mysqli_connect($host, $user, $pass, $db);
session_start();
session_unset();
session_destroy;
header('location: login.php');

?>