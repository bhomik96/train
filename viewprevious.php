<?php 
  include_once 'includes/dbh-inc.php';
  session_start();
  $username = $_SESSION["user_name"];
  $sql_prev = "SELECT * FROM user_booking WHERE user_name = '$username';";
  $prev_bookings  = mysqli_query($conn, $sql_prev);
  $resultCheck = mysqli_num_rows($prev_bookings);
      if($resultCheck > 0)
              {
                while($row_prevbookings = mysqli_fetch_assoc($prev_bookings)){
                  //array_push($ticket_num, $row_prevbookings['t_num']);
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
                  echo "<br>";
                }
             }
      else{
        echo "No Bookings Found!!!!!!";
      }
  
             /* $ticket_num = array();
              $ticket_id = array();
              echo '<table>';
              
              echo '</table>';
              $_SESSION["ticket_num_array"] = $ticket_num;
              $_SESSION["selected_ticket_count"] = 

              echo '<button type = "submit" id="deletebtn">Delete</button>';
          echo '</form>';

          if(isset($_POST['deletebtn'])){
              $count = 1;
              while($count != $k){
                  $id = 'Booking' . $count ;
                  if(isset($id)){
                    $tick_num = $ticket_num[$count - 1];
                    $sql_delete = "DELETE FROM user_booking WHERE t_num = '$tick_num';";
                    mysqli_query($conn, $sql_delete);
                  }
                  $count = $count + 1;
                }
            }
          echo "Want to see previous Boookings????";
        }*/
 ?>
              
        
              