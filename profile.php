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
		border-weight: 10px;
	}
	label{
		font-size: 20px;
	}
</style>
</head>
<body>

	<?php include('include/nav.html');?>

<div class="form">
<p>Change values if you want to update please <a href="edit_profile.php">Click Here</a></p>
<br>
		<label>Name: </label>		<?php echo $username?><br>

		<label>Phne: </label>		<?php echo $userphone?><br>

		<label>Email: </label>		<?php echo $useremail?><br>

		<label>Password:</label>	***********<br>

</div>
</body>

</html>