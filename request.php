<?php
	include('include/conn.php');
	include('include/session.php');
if(isset($_GET['userid'])){
	$userid=$_GET['userid'];
	$friendid=$_GET['friendid'];
	$sql="insert into `friends` values (NULL, '$userid', '$friendid')";
	$result=mysqli_query($conn, $sql);
	$sql="delete from `friend_request` where friend_id=$userid and user_id=$friendid";
	$result=mysqli_query($conn, $sql);}

else if(isset($_GET['user_id'])){
	$userid=$_GET['user_id'];
	$friendid=$_GET['friendid'];
	$sql="delete from `friend_request` where friend_id=$userid and user_id=$friendid";
	$result=mysqli_query($conn, $sql);}
?>
<html>
<head>
</head>
<body>
<?php include('include/nav.html')?>


<?php
	$sql="select * from `friend_request` where friend_id=$sesid";
	$result=mysqli_query($conn, $sql);	
		echo "<table align='center' border='3' width='40%' ><tr><th>Name</th><th>Email</th><th>Accept/Reject Friend Request</th></tr>";
		while($rows=$result -> fetch_assoc()){
			$rid=$rows['user_id'];
			$sql2="select * from `users` where id=$rid";
			$result2=mysqli_query($conn, $sql2);
			$rows2=mysqli_fetch_array($result2);			

			echo "<tr><td>" . $rows2['name'] . "</td><td>" . $rows2['email'] . '</td><td> 

					<form method="get" action="#">
						<input type="hidden" name="userid" value=' . $sesid . '>
						<input type="hidden" name="friendid" value=' . $rid .'>
						<input type="submit" value="Add Friend">
					</form>

					<form method="get" action="#">
						<input type="hidden" name="user_id" value=' . $sesid . '>
						<input type="hidden" name="friendid" value=' . $rid .'>
						<input type="submit" value="Remove it">
					</form>
	
			
			</td></tr>';

		
		}
		echo "</table>";
?>
</body>
</html>