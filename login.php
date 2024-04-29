<html>
<head>
<title>iSecure</title>
<style>
	*{
		margin: auto;
		padding: auto;
	}
	body{
		background-color: skyblue;
	}
	.nav{
		width: 100%;
		height: 100px;
		line-height: 2.5;
		text-align: center;
		background-color: black;
	}
	.form{
		background-color: white;
		width: 30%;
		padding: auto;
		margin: auto;
	}
	label{
		font-size: 20px;
	}
</style>
</head>
<body>
<h1 align="center">iSecure</h1>
<hr color="red">
<div class="nav">
	<h1><font color="skyblue">Login Form</font></h1>
</div>
<div class="form">
	<form method="post" action="#">

		<label>Email: </label>
		<input type="email" name="email" placeholder="Email@mail.com" ><br>

		<label>Password:</label>
		<input type="password" name="password" placeholder="Password" ><br>

			<input type="submit" value="Submit">
			<input type="reset" value="reset">
	</form>
			<a href="newuser.php"><button>New account</button></a>
</div>
</body>
<?php
$host="localhost";
$user="root";
$pass="";
$db="social";
$conn=mysqli_connect($host, $user, $pass, $db);

if(isSet($_POST['email']))
{
		$email=$_POST['email'];
		$password=$_POST['password'];
		
	$sql="SELECT * FROM `users` where email='".$email."' AND password='".$password."'";
	$result=mysqli_query($conn, $sql);
	if ($result){
		$row=mysqli_fetch_array($result);
		if(mysqli_num_rows($result) > 0){
			session_start();
			$_SESSION['id']=$row['id'];
			header('location: home.php');
		}



	}

}


?>
</html>