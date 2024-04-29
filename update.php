<?php

$host="localhost";
$user="root";
$pass="";
$db="social";
$conn=mysqli_connect($host, $user, $pass, $db);
session_start();
if(isset($_SESSION['id'])){

	$sesid=$_SESSION['id'];


		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		
	$sql="UPDATE `users` SET name='$name', email='$email', phone='$phone', password='$password'  WHERE id = '$sesid'";
	$result=mysqli_query($conn, $sql);
	if ($result){
		echo "<script> alert('Data updated successfully---') </script>";
		header('location: profile.php');
	}
	else{
		echo mysqli_error($conn);
	}


}
else{
	header("location: login.php");
}

?>