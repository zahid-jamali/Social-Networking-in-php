<?php
session_start();
if(isset($_SESSION['id']))
{	$sesid=$_SESSION['id'];
	$sql= "select * from `users` where id='$sesid' ";
	$result=mysqli_query($conn, $sql);
	$rows=mysqli_fetch_array($result);
	$username=$rows['name'];
	$userphone=$rows['phone'];	
	$useremail=$rows['email'];
	$userpassword=$rows['password'];

}

else{
	header('location: login.php');	
}


?>