<?php 
    include_once 'includes/dbh-inc.php';
    session_start();
    if(isset($_GET['deleteid']))
    {
      $id = $_GET['deleteid'];
      $sql_retrieve = "SELECT train_status FROM user_booking WHERE t_num='$id';";
      $result_up = mysqli_query($conn, $sql_retrieve);
      $prev = mysqli_fetch_assoc($result_up);
      $prev_status = $prev['train_status'];
      $sql_delete = "UPDATE user_booking SET train_status='Cancel' WHERE t_num = '$id';";
      mysqli_query($conn, $sql_delete);
      $username = $_SESSION["user_name"];
      if($prev_status == "Running"){
          $sql_amt_update = "UPDATE user_details SET amount=amount+500 WHERE user_name = '$username';";
          mysqli_query($conn, $sql_amt_update);
      }
    }

    header("Location: /TRAIN-BOOKING-SYSTEM/viewprevious.php?deletion=success");
 ?>