<?php
	include('include/conn.php');
	include('include/session.php');
?>
<html>
<head>
</head>
<body>
	<?php include('include/nav.html')?>;

<?php
		$sql="select * from `friends` where user_id=$sesid or friend_id=$sesid";
		$result=mysqli_query($conn, $sql);
	
		echo "<table align='center' border='3' width='40%' ><tr><th>Name</th><th>Email</th></tr>";
		while($rows=$result -> fetch_assoc()){	
			if($rows['user_id']==$sesid){
				$fid=$rows['friend_id'];
			}
			else if($rows['friend_id']==$sesid){
				$fid=$rows['user_id'];
			}
			$sql2="select * from `users` where id=$fid";
			$result2=mysqli_query($conn, $sql2);
			while($rows2=$result2 -> fetch_assoc()){
			echo "<tr><td>" . $rows2['name'] . "</td><td>" . $rows2['email']  . "</td></tr>";	
	}	}
?>

</body>
</html>
