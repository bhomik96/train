<?php
include_once 'includes/dbh-inc.php';
?>

<head>
    <link rel="stylesheet" href="bookingpage.css">
</head>

<body>
    
      <center><h1>Previous Bookings/Cancellations</h1></center>

      <div style="overflow-x:auto;">
        <table >
          <tr>
            <th>Select</th>
            <th>Ticket_number</th>
            <th>Passenger Name</th>
            <th>Passenger Age</th>
            <th>User Name</th>
            <th>Train Name</th>
            <th>Train Number</th>
            <th>Date Of Journey</th>
            <th>Status</th>
          </tr>
          <?php
                session_start();

                $user_name=$_SESSION["user_name"];
                
                $sql_prev = "SELECT * FROM user_booking WHERE user_name='$user_name';";

                $prev_bookings = mysqli_query($conn, $sql_prev);
                $resultCheck = mysqli_num_rows($prev_bookings);
                if($resultCheck>0)
                {
                    while($row_prevbookings = mysqli_fetch_assoc($prev_bookings))
                    {
                      echo '<tr>';
                          $del = $row_prevbookings['t_num'];
                          echo '<td> <a href="cancel.php?deleteid=' . $del . '" >CancelthisBooking</a></td>';
                          echo '<td>' . $row_prevbookings['t_num'] . '</td>';
                          echo '<td>' . $row_prevbookings['passenger_name'] . '</td>';
                          echo '<td>' . $row_prevbookings['passenger_Age'] . '</td>';
                          echo '<td>' . $row_prevbookings['user_name'] . '</td>';
                          echo '<td>' . $row_prevbookings['train_name'] . '</td>';
                          echo '<td>' . $row_prevbookings['train_no'] . '</td>';
                          echo '<td>' . $row_prevbookings['date'] . '</td>';
                          echo '<td>' . $row_prevbookings['train_status'] . '</td>';
                      echo '</tr>';
                    }

                }
                else
                {
                      echo "No Bookings Found!!!!!!";
                }
          ?>
          
        </table>
        <br>
        <br>
      </div>

</body>

              
        
              