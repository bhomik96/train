<?php
	session_start();
	include 'dbh-inc.php';
	$user_name = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	$aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
	$acno = mysqli_real_escape_string($conn, $_POST['acno']);
	$amount = mysqli_real_escape_string($conn, $_POST['amt']);

	if($password == $cpassword){
		$sql_q = "SELECT * FROM user_details WHERE user_name = '$user_name' OR password = '$password' OR aadhar_details = '$aadhar' OR acc_number = '$acno';";
		$result = mysqli_query($conn, $sql_q);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck == 0)
		{
			$sql = "INSERT INTO user_details VALUES ('$user_name', '$password', '$aadhar', '$acno', '$amount');";
			$result = mysqli_query($conn, $sql);
			$_SESSION['user_name']=$user_name;
			header("Location: /TRAIN-BOOKING-SYSTEM/book.php?signup=succs");
		}
		else{
			header("Location: /TRAIN-BOOKING-SYSTEM/register.php?signup=fieldexists");
		}
	}
	else{
		/*echo '<script language="javascript">';
		echo 'alert("Password fields does not match")';
		echo '</script>';*/
		header("Location: /TRAIN-BOOKING-SYSTEM/register.php?signup=pwds&username=$user_name&aadhar=$aadhar&acno=$acno&amount=$amount");
	}

?> 