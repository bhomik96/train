<?php 
    include_once 'includes/dbh-inc.php';
    session_start();
    if(isset($_GET['deleteid']))
    {
      $id = $_GET['deleteid'];
      $sql_delete = "DELETE FROM user_booking WHERE t_num = '$id';";
      mysqli_query($conn, $sql_delete);
      $username = $_SESSION["user_name"];
      $sql_amt_update = "UPDATE user_details SET amount=amount+500 WHERE user_name = '$username';";
      mysqli_query($conn, $sql_amt_update);
    }

    header("Location: /TRAIN-BOOKING-SYSTEM/viewprevious.php?deletion=success");
 ?>