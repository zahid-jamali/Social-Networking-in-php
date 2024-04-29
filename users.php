<?php
	include('include/conn.php');
	include('include/session.php');
	if(isset($_POST['search'])){
		$search=$_POST['search'];
		$sql="select * from `users` where name like '%$search%'";
		$result=mysqli_query($conn, $sql);
	}
	if(isset($_GET['userid'])){
		$userid=$_GET['userid'];
		$friend_id=$_GET['friendid'];
		$sql="insert into `friend_request` values (NULL, '$userid', '$friend_id')";
		$result=mysqli_query($conn, $sql);
		header('location: home.php');
	}


?>

<html>
<title>iSecure</title>

</head>
<body>
<?php include('include/nav.html')?>


<?php
	
		echo "<table align='center' border='3' width='40%' ><tr><th>Name</th><th>Email</th><th>Friend Request</th></tr>";
		while($rows=$result -> fetch_assoc()){
			$fid=$rows['id'];
			$sql2="select * from `friend_request` where user_id=$sesid and friend_id=$fid";
			$result2=mysqli_query($conn, $sql2);
			$rows2=mysqli_fetch_array($result2);

			$sql3="select * from `friends` where (user_id=$sesid and friend_id=$fid) or (user_id=$fid and friend_id=$sesid)";
			$result3=mysqli_query($conn, $sql3);
			$rows3=mysqli_fetch_array($result3);
			if(isset($rows3['id'])){
			echo "<tr><td>" . $rows['name'] . "</td><td>" . $rows['email'] . '</td><td> <u>Already friend</u>' . "</td></tr>";
			}
			else if(isset($rows2['id'])){				
				echo "<tr><td>" . $rows['name'] . "</td><td>" . $rows['email'] . '</td><td> <u>Pending</u>' . "</td></tr>";	
			}
			else if($fid==$sesid){
				continue;
			}
			else{
				echo "<tr><td>" . $rows['name'] . "</td><td>" . $rows['email'] . '</td><td> 
					<form method="get" action="#">
						<input type="hidden" name="userid" value=' . $sesid . '>
						<input type="hidden" name="friendid" value=' . $rows["id"] .'>
						<input type="submit" value="Add Friend">
					</form>
	
			
			' . "</td></tr>";

			}
		}
		echo "</table>";
?>



</body>

</html>