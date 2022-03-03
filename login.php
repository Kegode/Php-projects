<?php
		include('dbcon.php');
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* student */
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($connection,$query)or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$num_row = mysqli_num_rows($result);
		$pass=$row['password'];
		$status =$row['status'];


		if( $num_row > 0 ) { 
		session_start();
		$_SESSION['id']=$row['user_id'];
		
		echo $_SESSION['id'];
		if($status=='administrator'){
		    header("location:dashboard.php");
			echo 'true_admin';
			mysqli_query($connection,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysqli_error());
		}else
		if($status=='normal'){
            header("location:normal/dashboard.php");
			echo 'true_user';
			mysqli_query($connection,"insert into user_log (username,login_date,user_id)values('$username','".date('H:m')."',".$row['user_id'].")")or die(mysqli_error());
		}
		else{
				echo 'false';
		}}
		?>