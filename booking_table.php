<?php
include_once 'includes/dbh-inc.php';
?>

<head>
    <link rel="stylesheet" href="bookingpage.css">
</head>
<body>
    
<center><h1>Previous Bookings/Cancellations</h1></center>

<div style="overflow-x:auto;">
  <table action="includes/login-inc.php" method="POST">
    <tr>
      <th>Ticket_number</th>

      <th>Date Of Journey</th>
      <th>Train Name</th>
      <th>Passenger Name</th>
      <th>Age</th>
      <th>Status</th>
      <th>Select</th>
    </tr>
    <?php
    session_start();

    $user_name=$_SESSION["user_name"];
    
    $sql = "SELECT * FROM user_booking WHERE user_name='$user_name';";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
          echo '<tr>';
          echo '<td>'.$row['t_num'].'</td>';
          echo '<td>'.$row['date'].'</td>';
          echo '<td>'.$row['train_name'].'</td>';
          echo '<td>'.$row['passenger_name'].'</td>';
          echo '<td>'.$row['passenger_Age'].'</td>';
          echo '<td>'.$row['status'].'</td>';
          echo '<td>' ;
                echo '<div class="check">';
                    echo '<span><label><input  class="x" name="Checkbox1" type="checkbox">Select</label></span>';
                echo '</div>';
          echo '</td>';
          echo '</tr>';
          //echo '$row[0]';
        }

    }
    else
    {
          echo 'wergw';
    }

    ?>
    
  </table>
  <br>
  <br>
  <center>
  <input type="button" name="cancel_train" class="button" value="Cancel Train" >
</div></body><center>

</body>