<?php
include('dbcon.php');
include('session.php');
$status= $_POST['status'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $fname.'.'.$lname;

mysqli_query($connection,"insert into users (username,password,firstname,lastname,status) values('$uname','12345','$fname','$lname','$status')")or die(mysqli_error());
mysqli_query($connection,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')")or die(mysqli_error());
?>