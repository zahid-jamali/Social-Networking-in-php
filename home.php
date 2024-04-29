<?php
	include('include/conn.php');
	include('include/session.php');
?>
k<html>
<head>
<title>iSecure</title>
<style>
</style>
</head>
<body>
<?php include('include/nav.html')?>




<form method="post" action="post.php" align="center">
		<textarea name="post" placeholder="Share something to us" style="margin: 0px; width: 449px; height: 135px;"></textarea>
		<input type="submit" value="Share">
	</form>


<?php

	$post="";

	$sql="select * from `post` where 1 order by post_id desc";
	$result=mysqli_query($conn, $sql);
	while($rows=$result -> fetch_assoc()){
		$sql2="select * from `friends` where user_id=$sesid or friend_id=$sesid";
		$result2=mysqli_query($conn, $sql2);
		while($rows2=$result2 -> fetch_assoc()){	
			if($rows2['user_id']==$sesid){


				$fid=$rows2['friend_id'];
			}
			else if($rows2['friend_id']==$sesid){
				$fid=$rows2['user_id'];
			}
			

			if ($rows['sender_id']==$fid){
				$sender_id=$rows['sender_id'];
				$sql3="select * from `users` where id=$sender_id";
				$result3=mysqli_query($conn, $sql3);
				$rows3=mysqli_fetch_array($result3);
				echo "<br><hr color='red'><div class='post'><b><u><i align='left'>" . $rows3['name'] . "</i></u></b><center>" . $rows['post'] . "</center></div>";	
			}
			else if($rows['sender_id']==$sesid){
				$sender_id=$rows['sender_id'];
				$sql3="select * from `users` where id=$sender_id";
				$result3=mysqli_query($conn, $sql3);
				$rows3=mysqli_fetch_array($result3);
				if($post!=$rows['post']){
				echo "<br><hr color='red'><div class='post'><b><u><i align='left'>" . $rows3['name'] . "</i></u></b><center>" . $rows['post'] . "</center></div>";	
				}
				$post=$rows['post'];
			}

		}	
	}










/*		$sql="select * from `friends` where user_id=$sesid or friend_id=$sesid";
		$result=mysqli_query($conn, $sql);
		while($rows=$result -> fetch_assoc()){	
			if($rows['user_id']==$sesid){
				$fid=$rows['friend_id'];
			}
			else if($rows['friend_id']==$sesid){
				$fid=$rows['user_id'];
			}
echo $fid;
			$sql2="select * from `post` where sender_id=$fid or sender_id=$sesid order by post_id desc";
			$result2=mysqli_query($conn, $sql2);
		
			while($rows2=$result2 -> fetch_assoc()){
				$sender_id=$rows2['sender_id'];
				$sql3="select * from `users` where id=$sender_id";
				$result3=mysqli_query($conn, $sql3);
				$rows3=mysqli_fetch_array($result3);
				echo "<br><hr color='red'><div class='post'><b><u><i align='left'>" . $rows3['name'] . "</i></u></b><center>" . $rows2['post'] . "</center></div>";	
			}
	}	
k		

*/
?>
</body>

</html>