<?php
		include('dbcon.php');
		include('../session.php');
		
		$student_id = $_POST['student_id'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$student_class = $_POST['student_class'];
		$gfname = $_POST['gfname'];
		$gmname = $_POST['gmname'];
		$glname = $_POST['glname'];
		$tel = $_POST['tel'];
		$rship = $_POST['rship'];
		$status = $_POST['status'];
		$transport = $_POST['transport'];
		$route = $_POST['route'];
		
		mysqli_query($connection,"update students set firstname = '$fname', middlename ='$mname',lastname ='$lname',gender ='$gender',dob='$dob',address ='$address',class ='$student_class',gfirstname ='$gfname',gmiddlename ='$gmname',glastname ='$glname',rship ='$rship',tel ='$tel', status ='$status', transport ='$transport', route ='$route'
		where student_id = '$student_id'")or die(mysqli_error());
		mysqli_query($connection,"insert into activity_log (username,date,action) values('$user_username',NOW(),'Updated Student $fname $mname')")or die (mysqli_error());
		
		$result1 = mysqli_query($connection,"select * from class where class_name='$student_class'  ")or die(mysqli_error());
		$row1 = mysqli_fetch_array($result1);
		$myfee = $row1['fee'];
		
		if($status=='paying'){
			$status_fee =$myfee;
		}else
		if($status=='exempted'){
			$status_fee =0;
		}else
		if($status=='half'){
			$status_fee =$myfee/2;
		}else
		if($status=='quarter'){
			$status_fee =$myfee/4;
		}
		mysqli_query($connection,"update janmar set status_fee ='$status_fee',status='$status' where student_id ='$student_id'")or die(mysqli_error());
		mysqli_query($connection,"update aprjun set status_fee ='$status_fee',status='$status' where student_id ='$student_id'")or die(mysqli_error());
		mysqli_query($connection,"update julsep set status_fee ='$status_fee',status='$status' where student_id ='$student_id'")or die(mysqli_error());
		mysqli_query($connection,"update octdec set status_fee ='$status_fee',status='$status' where student_id ='$student_id'")or die(mysqli_error());
		?>
		
		
		<!--
		
		