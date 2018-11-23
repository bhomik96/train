<?php
	include_once 'dbh-inc.php';
	$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	$sql = "SELECT * FROM admin_details WHERE user_name = '$user_name' AND password = '$password';";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		header("Location: /TRAIN-BOOKING-SYSTEM/update_details.php?adminlogin=succcs");
	}
	else{
		header("Location: /TRAIN-BOOKING-SYSTEM/adminlogin.php?adminlogin=Invalid");
	}

?> 