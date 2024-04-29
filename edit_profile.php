<?php
	include('include/conn.php');
	include('include/session.php');

?>
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
		line-height: 1;
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

	<?php include('include/nav.html');?>

<div class="form">
<p>Change values if you want to update</p>
	<form method="post" action="update.php">
		<label>Name: </label>
		<input type="text" name="name" placeholder="Name" value="<?php echo $username?>" required><br>

		<label>Phne: </label>
		<input type="number" name="phone" value="<?php echo $userphone?>" required><br>

		<label>Email: </label>
		<input type="email" name="email"value="<?php echo $useremail?>" required><br>

		<label>Password:</label>
		<input type="text" name="password"value="<?php echo $userpassword?>" required><br>

			<input type="submit" value="Update">
			<input type="reset" value="Reset">
	</form>
</div>
</body>

</html>