<?php 
	include_once 'dbh-inc.php';
	session_start();
    $amount = $_SESSION["amount"];
	$i = 1;
	$count = strval($i);
	while(isset($_POST['passenger' . $count])){
		$i = $i + 1;
		$count = strval($i);
	}
	$passengers_count = $i - 1;
	$Total_Amount = $passengers_count * 500;
	if($amount < $Total_Amount){
		header("Location: /TRAIN-BOOKING-SYSTEM/book.php?Booking=failed");
		exit();
	}
	$username = $_SESSION["user_name"];
	$train_name = $_SESSION["train_name"];
	$train_no = $_SESSION["train_no"];
	$date_of_journey = $_SESSION["date_of_journey"];
	$timestamp = strtotime($date_of_journey);
    $day = date('l', $timestamp);
	$sql_status = "SELECT train_status FROM train_details WHERE train_no = '$train_no';";
	$result = mysqli_query($conn, $sql_status);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			$train_status = $row['train_status'];
		}
	}
	$i = 1;
	$count = strval($i);
	while(isset($_POST['passenger' . $count]))
	{
		$passenger_name = mysqli_real_escape_string($conn, $_POST['passenger' . $count]);
		$passenger_age = mysqli_real_escape_string($conn, $_POST['passenger_age' . $count]);
		$insert_booking = "INSERT INTO user_booking (passenger_name, passenger_Age, user_name, train_name, train_no, date, train_status, day) VALUES ('$passenger_name', '$passenger_age', '$username', '$train_name', '$train_no', '$date_of_journey', '$train_status','$day');";
		mysqli_query($conn, $insert_booking);
		$decrease_amt = "UPDATE user_details SET amount=amount-500 WHERE user_name='$username';";
		mysqli_query($conn, $decrease_amt);
		$i = $i + 1;
		$count = strval($i);
	}
	
	header("Location: /TRAIN-BOOKING-SYSTEM/exitpage.php?Booking=Success");
 ?>