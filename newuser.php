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
	<h1><font color="skyblue">Registeration Form</font></h1>
</div>
<div class="form">
	<form method="post" action="#"><label>Name: </label><input type="text" name="name"placeholder="Name" required><br><label>Phne: </label><input type="number" name="phone" placeholder="Phone-Number" ><br><label>Email: </label><input type="email" name="email" placeholder="Email@mail.com" ><br><label>Password:</label><input type="password" name="password" placeholder="Password" ><br><input type="submit" value="Submit"><input type="reset" value="reset"></form>
			<a href="login.php"><button>Login</button></a>

</div>
</body>
<?php
$host="localhost";
$user="root";
$pass="";
$db="social";
$conn=mysqli_connect($host, $user, $pass, $db);

if(isSet($_POST['name']))
{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		
	$sql="INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES (NULL, '".$name."', '".$email."', '".$phone."', '".$password."')";
	$result=mysqli_query($conn, $sql);
	if ($result){
		echo "<script> alert('Account Created Successfully') </script>";
		header('location: login.php');
	}

}


?>
</html>