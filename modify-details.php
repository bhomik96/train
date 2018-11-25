<?php 
	include_once 'includes/dbh-inc.php';
	
	echo "Its done!!" . "<br>";
	$i = 0;
	$j = $i + 1;
	$rowcount = strval($j);
	while(isset($_POST['train_number'][$i])){
		$Train_Number = $_POST['train_number'][$i];
		$Train_Name = $_POST['train_name'][$i];

		$Stations_List = $_POST['stations_list'][$i];
		$stations = array();
		$stations = explode(" ", $Stations_List);

		$week_days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$Updated_Days = array();
		$row_in = 'Row' . $rowcount;
		foreach($_POST[$row_in] as $selected){
			array_push($Updated_Days, $selected);
		}

		$Train_Status = "";
		$radio_btn = 'optradio' . $rowcount;
		foreach($_POST[$radio_btn] as $selected){
			$Train_Status = $selected;
		}

		$sql_train_exists = "SELECT train_no FROM train_details WHERE train_no='$Train_Number';";
		$train_exists = mysqli_query($conn, $sql_train_exists);
		$train_exists_check = mysqli_num_rows($train_exists);
		if($train_exists_check > 0){
				$Original_days = array();
				$sql_retrieve_days = "SELECT days FROM train_days WHERE train_no='$Train_Number';";
				$result_days=mysqli_query($conn, $sql_retrieve_days);
				$result_check_days = mysqli_num_rows($result_days);
				if($result_check_days > 0){
					while($row_days = mysqli_fetch_assoc($result_days)){
						array_push($Original_days, $row_days['days']);
						//echo $row_days['days'] . "<br>";
					}
				}

				foreach($week_days as $p_day){
					if(in_array($p_day, $Updated_Days)){
						if(in_array($p_day, $Original_days)){

						}
						else{
							$sql_add_day = "INSERT INTO train_days VALUES ('$Train_Number', '$p_day');";
							mysqli_query($conn, $sql_add_day);
						}
					}
					else{
						if(in_array($p_day, $Original_days)){
							$sql_delete_day = "DELETE FROM train_days WHERE train_no='$Train_Number' AND days='$p_day';";
							mysqli_query($conn, $sql_delete_day);
							$sql_delete_bookings = "SELECT * FROM user_booking WHERE train_no='$Train_Number' AND day='$p_day';";
							$up_book = mysqli_query($conn, $sql_delete_bookings);
							$result_book = mysqli_num_rows($up_book);
							if($result_book > 0){
								while($row_book = mysqli_fetch_assoc($up_book)){
									$username = $row_book['user_name'];
									$tnum = $row_book['t_num'];
									$sql_amt_add = "UPDATE user_details SET amount=amount+500 WHERE user_name='$username';";
									mysqli_query($conn, $sql_amt_add);
									$sql_delete_row = "DELETE FROM user_booking WHERE t_num='$tnum';";
									mysqli_query($conn, $sql_delete_row);
								}
							}
							else{
								echo "UU";
							}

						}
						else{

						}
					}
				}


				$sql_stations_delete = "DELETE FROM train_stations WHERE train_no='$Train_Number';";
				mysqli_query($conn, $sql_stations_delete);
				foreach($stations as $station){
					if($station!=""){
						$sql_stations_update = "INSERT INTO train_stations VALUES ('$Train_Number', '$station');";
						mysqli_query($conn, $sql_stations_update);
					}
				}


				$sql_status_update = "UPDATE train_details SET train_status='$Train_Status' WHERE train_no='$Train_Number';";
				mysqli_query($conn, $sql_status_update);


				$sql_retrieve = "SELECT * FROM user_booking WHERE train_no='$Train_Number';";
				$result_s = mysqli_query($conn, $sql_retrieve);
				$resultCheck = mysqli_num_rows($result_s);
				if($resultCheck > 0){
					while($row_p = mysqli_fetch_assoc($result_s)){
						$username=$row_p['user_name'];
						$status=$row_p['train_status'];
						if($Train_Status == "Cancel"){
							$sql_status_update_bookings = "UPDATE user_booking SET train_status='$Train_Status' WHERE train_no='$Train_Number';";
						    mysqli_query($conn, $sql_status_update_bookings);
						    if($status=="Running"){
								$sql_update_amount = "UPDATE user_details SET amount=amount+500 WHERE user_name='$username';";
								mysqli_query($conn, $sql_update_amount);
							}
						}
					}
				}
				$j = $j + 1;
				$rowcount = strval($j);
				$i = $i + 1;
			}
			else{
				echo "Tii";
				$insert_new_train = "INSERT INTO train_details VALUES ('$Train_Name', '$Train_Number', '$Train_Status');";
				mysqli_query($conn, $insert_new_train);
				foreach($stations as $station){
					if($station!=""){
						$insert_station = "INSERT INTO train_stations VALUES ('$Train_Number', '$station');";
						mysqli_query($conn, $insert_station);
					}
				}
				foreach($Updated_Days as $day){
						$insert_day = "INSERT INTO train_days VALUES ('$Train_Number', '$day');";
						mysqli_query($conn, $insert_day);
				}

				$j = $j + 1;
				$rowcount = strval($j);
				$i = $i + 1;
			}	
	}
	header("Location: display-trains.php?modify=success");
 ?>