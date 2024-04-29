<?php
	include('include/conn.php');
session_start();
if(isset($_SESSION['id']))
{	
	if($_POST['post']!=""){
		$post=$_POST['post'];
		$sessid=$_SESSION['id'];		
		$sql="INSERT INTO `post` (post_id, sender_id, post) VALUES (NULL, '$sessid', '$post')";
		$result=mysqli_query($conn, $sql);
		if($result){
			header("location: home.php");
		}

	}
	else{
		header('location: home.php');
	}

}
else{
	header('location: login.php');	

}


?>