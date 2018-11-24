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
	echo $username . "<br>";
	echo $train_name . "<br>";
	echo $train_no . "<br>";
	echo $date_of_journey . "<br>";
	$sql_status = "SELECT train_status FROM train_details WHERE train_no = '$train_no';";
	$result = mysqli_query($conn, $sql_status);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			$train_status = $row['train_status'];
		}
	}
	echo $train_status . "<br>";
	$i = 1;
	$count = strval($i);
	while(isset($_POST['passenger' . $count]))
	{
		$passenger_name = mysqli_real_escape_string($conn, $_POST['passenger' . $count]);
		$passenger_age = mysqli_real_escape_string($conn, $_POST['passenger_age' . $count]);
		echo $passenger_name . "<br>";
		echo $passenger_age . "<br>";
		$insert_booking = "INSERT INTO user_booking (passenger_name, passenger_Age, user_name, train_name, train_no, date, train_status) VALUES ('$passenger_name', '$passenger_age', '$username', '$train_name', '$train_no', '$date_of_journey', '$train_status');";
		mysqli_query($conn, $insert_booking);
		$i = $i + 1;
		$count = strval($i);
	}
	
	//header("Location: /TRAIN-BOOKING-SYSTEM/print.php?bookticket=succcs");
 ?>