<?php
include('dbcon.php');
include('session.php');
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$query = mysqli_query($connection,"select * from users where user_id ='$id[$i]'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
	$uname = $row['username'];

	mysqli_query($connection,"insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted  user $uname')")or die (mysqli_error());
	mysqli_query($connection,"DELETE FROM users where user_id='$id[$i]'");
}
header("location: users.php");
}
?>