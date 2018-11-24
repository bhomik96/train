<?php 
  include_once 'includes/dbh-inc.php';
   session_start();
  $no_of_tickets=0;
 ?>

<head>
    <script >
      var i=1;var j=0;
      function passenger (argument){
        var mydiv = document.getElementById("main");
        var sp = document.createElement('span');
        var aTag = document.createElement('input');
        aTag.setAttribute('type',"text");
        aTag.required=true;
        aTag.setAttribute('class',"passengers");
    aTag.setAttribute("style", "padding: 6px 10px; margin: 4px 0;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;width: 250px;");
        aTag.setAttribute('name',"passenger" + i.toString());
        aTag.setAttribute('id',"passenger" + i.toString());
        aTag.setAttribute('placeholder',"passenger" + i.toString());
        sp.appendChild(aTag);
        var age = document.createElement('input');
        age.setAttribute('type',"text");
        age.setAttribute('class',"passengers");
    age.setAttribute("style", "padding: 6px 10px; margin: 4px 0; border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;width: 250px;");
        age.setAttribute('name',"passenger_age" + i.toString());
        age.setAttribute('id',"passenger_age" + i.toString());
        age.setAttribute('placeholder',"Age");
        age.required=true;
        sp.appendChild(age);
        mydiv.appendChild(sp);
        i=i+1;
    }

      function bookticket(acc_no, balance){
        if(j==0){
        var TotalAmount = (i-1)*500;
        var mydiv = document.getElementById("book");
        var rs = document.createElement('p');
        rs.innerHTML = "Cost Per Ticket : Rs 500";
         rs.setAttribute("style", "font-family:sans-serif;margin-left:30px;font-weight:bold;" );
        mydiv.appendChild(rs);
        var acc = document.createElement('p');
        acc.innerHTML = "Your account No. is : "+acc_no;
         acc.setAttribute("style", "font-family:sans-serif;margin-left:30px;font-weight:bold;" );
        mydiv.appendChild(acc);
        var amt = document.createElement('p');
        amt.innerHTML = "Your account balance. is : "+balance;
         amt.setAttribute("style", "font-family:sans-serif;margin-left:30px;font-weight:bold;" );
        mydiv.appendChild(amt);
        var t_amt = document.createElement('p');
        t_amt.innerHTML = "Your Total bill is : "+TotalAmount;
         t_amt.setAttribute("style", "font-family:sans-serif;margin-left:30px;font-weight:bold;" );
        mydiv.appendChild(t_amt);
        j=1;
      }
      }
  
      function showHint(str) {
      var xhttp;
      if (str.length == 0) { 
        document.getElementsByClassName("txtHint")[0].innerHTML = "";
        return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementsByClassName("txtHint")[0].innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "get-hint.php?q="+str, true);
      xhttp.send();   
    }
    </script> 
    <link rel="stylesheet" href="book.css">
</head>

<body>
    <div class="split left">
    <div class="centered">
            <div class="box">
                    <h1>Book An Experience</h1>
                    <form action="book.php" method="POST">
                        <div class="inputbox">
                            <input type="text" name="from" id="from" onkeyup="showHint(this.value)" >
                            <label>From</label>
                            <p>Suggestions: <span class="txtHint" ></span></p>
                        </div>
                        <div class="inputbox">
                            <input type="text" name="to" id="to" onkeyup="showHint(this.value)" >
                            <label>To</label>
                            <p>Suggestions: <span class="txtHint"></span></p>
                        </div>
                        <div class="inputbox">
                                <input type="date" name="date_of_journey">
                                <label>Date</label>
                        </div>
                        <input type="Submit" name="viewtrainsbtn" value="View Trains">
                    </form>
                    <form action="viewprevious.php">
                        <div>
                          <input type="Submit" name="ViewPreviousBooking" value="View Previous Bookings">
                       </div>
                    </form>     
               </div>
    </div>
  <div class="split right">
    <div class="centered1">
      <?php 
        // session_start();
        if(!isset($_POST['viewtrainsbtn']))
          {
            echo 'Welcome heere';
          }
        elseif(isset($_POST['viewtrainsbtn'])){

              $from_station = $_POST['from'];
              $to_station = $_POST['to'];
              $date_of_journey = $_POST['date_of_journey'];
              $timestamp = strtotime($date_of_journey);
              $day = date('l', $timestamp);
              $sql = "SELECT DISTINCT train_name,A.train_no from train_details AS A, train_stations AS B, train_days AS C where stations = '$from_station' AND days = '$day' AND B.train_no IN(SELECT B.train_no from train_stations where stations = '$to_station');";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              if($resultCheck > 0)
                {
                    echo '<form>';
                    $j = 1;
                    $buttncount = strval($j);
                    $Train_Name_list = array();
                    $Train_Numbers_list = array();
                     while($row = mysqli_fetch_assoc($result)){
                            echo '<div style="margin-left:60px;font-weight:bold;font-family:sans-serif;" class="radio">';
                            echo '<input type="radio" id="Train_Name'.$buttncount.'" name="optradio">'.$row['train_name'].'';
                            array_push($Train_Name_list, $row['train_name']);
                            array_push($Train_Numbers_list, $row['train_no']);
                            echo '</div>';
                            $j = $j + 1;
                            $buttncount = strval($j);
                          }
                    echo '</form>';
                }
              $count = 1;
              $train_name_selected = "";
              $train_number_selected = "";
              while($count != $j){
                $id = 'Train_name' . $count ;
                if(isset($id)){
                  $train_name_selected = $Train_Name_list[$count - 1];
                  $train_number_selected = $Train_Numbers_list[$count - 1];
                  break;
                }
                $count = $count + 1;
              }
              $_SESSION["train_name"] = $train_name_selected;
              $_SESSION["train_no"] = $train_number_selected;
              $_SESSION["date_of_journey"] = $date_of_journey;
              $user_acc_no = "";
              $user_balance = "";
              $username = $_SESSION["user_name"];
              $sql1 = "SELECT acc_number FROM user_details WHERE user_name='$username';";
              $accno = mysqli_query($conn, $sql1);
              $resultCheck_accno = mysqli_num_rows($accno);
              if($resultCheck_accno > 0)
              {
                while($row_accno = mysqli_fetch_assoc($accno)){
                  $user_acc_no = $row_accno['acc_number'] ;
                 }
              }
              $sql2 = "SELECT amount FROM user_details WHERE user_name='$username';";
              $amount = mysqli_query($conn, $sql2);
              $resultCheck_amount = mysqli_num_rows($amount);
              if($resultCheck_amount > 0)
              {
                while($row_amount = mysqli_fetch_assoc($amount)){
                  $user_balance = $row_amount['amount'] ;
                 }
              }
              $_SESSION["amount"] = $user_balance;
              //echo '<p>Click the button and each will perform some dynamic function!</p>';
              echo '<form action=' . 'includes/book-ticket-inc.php' . ' ' . 'method=' . 'POST' . '>';
                echo '<div id="main">';
                    echo '<input style="background-color: #4CAF50;font-weight:bold;font-family:sans-serif; border: none;color: white;padding: 8px 16px;text-align: center; text-decoration: none; width: 250px;display: inline-block;border-radius:10px;font-size: 14px;" type="button" id="btAdd" onclick="passenger();" value="Add Passenger" class="bt"/><br>';
                    // echo "<br>";
                echo '</div>';
                echo '<div id="book">';
                echo '<br>';
                    // echo '<p style="font-weight:bold;font-family:sans-serif;margin-left:30px;">Cost Per Ticket : Rs 500</p>';
                    echo '<button style="background-color: #4CAF50;font-weight:bold;font-family:sans-serif; width: 250px; border: none;color: white;padding: 8px 16px;text-align: center; text-decoration: none;display: inline-block;border-radius:10px;font-size: 14px;margin-bottom:10px;" class="book-ticket" type="button" onclick="bookticket(' . $user_acc_no . ',' . $user_balance .');">Show Payment Details</button>';
                    echo "<br>";
                echo '</div>';
                echo '<button style="background-color: #4CAF50;width: 250px;font-weight:bold;font-family:sans-serif; border: none;color: white;padding: 8px 16px;text-align: center; text-decoration: none;display: inline-block;border-radius:10px;font-size: 14px;" class="ticket" type="submit">Book Ticket</button>';
              echo '</form>';
            }
        
       ?>
       <?php 
            if(!isset($_GET['Booking'])){
                exit();
            }
            else{
                $bookingstatus = $_GET['Booking'];
                if($bookingstatus == "failed"){
                    echo '<script language="javascript">';
                    echo 'alert("Insufficient Balance - Booking Failed")';
                    echo '</script>';
                    exit();
                }
            }

         ?>
    </div>
  </div>
</body>
