<?php

include_once 'dbh-inc.php';
$passenger_name = mysqli_real_escape_string($conn, $_POST['passengername']);
$age = mysqli_real_escape_string($conn, $_POST['Age']);
$ticket_number =intval(mysqli_real_escape_string($conn, $_POST['t_num']));
$date = mysqli_real_escape_string($conn, $_POST['date']);
$train_name = mysqli_real_escape_string($conn, $_POST['train_name']);
$status = mysqli_real_escape_string($conn, $_POST['status']);

$sql = "SELECT * FROM user_bookings WHERE t_num = '$ticket_number' AND date='$date' AND passengername = '$passenger_name' AND train_name='$train_name' AND Age='$age' AND status='$status';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
		header("Location: /TRAIN-BOOKING-SYSTEM/print.php?login=succcs");
	}

else{
		echo '<script language="javascript">';
		echo 'alert("Invalid Username or Password!!")';
		echo '</script>';
	}
?>