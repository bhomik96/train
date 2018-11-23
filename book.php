<?php 
  include_once 'includes/dbh-inc.php';
 ?>

<head>
    <script >
      var i=1;
      function passenger (argument){
        var mydiv = document.getElementById("main");
        var sp = document.createElement('span');
        var aTag = document.createElement('input');
        aTag.setAttribute('type',"text");
        aTag.setAttribute('class',"passengers");
        aTag.setAttribute('id',"passenger" + i.toString());
        aTag.setAttribute('placeholder',"passenger" + i.toString());
        sp.appendChild(aTag);
        var age = document.createElement('input');
        age.setAttribute('type',"text");
        age.setAttribute('class',"passengers");
        age.setAttribute('id',"passenger_age" + i.toString());
        age.setAttribute('placeholder',"Age");
        sp.appendChild(age);
        mydiv.appendChild(sp);
        i=i+1;
    }

      function bookticket(){
        var mydiv = document.getElementById("main");
        var aTag = document.createElement('p');
        aTag.innerHTML = "HELLO";
        mydiv.appendChild(aTag);
      }
    </script>
    <link rel="stylesheet" href="book.css">
    <script>
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
</head>

<body>
    <div class="split left">
    <div class="centered">
            <div class="box">
                    <h1>Book An Experience</h1>
                    <form action="book.php" method="POST">
                        <div class="inputbox">
                            <input type="text" name="from" id="from" onkeyup="showHint(this.value)" required>
                            <label>From</label>
                            <p>Suggestions: <span class="txtHint" ></span></p>
                        </div>
                        <div class="inputbox">
                            <input type="text" name="to" id="to" onkeyup="showHint(this.value)" required>
                            <label>To</label>
                            <p>Suggestions: <span class="txtHint"></span></p>
                        </div>
                        <div class="inputbox">
                                <input type="date" name="date_of_journey">
                                <label>Date</label>
                        </div>
                       <input type="Submit" name="viewtrainsbtn" value="View Trains">
                       <div>
                            <button class="btn" type="button">View Previous Bookings</button>
                       </div>
                      
                    </form>
               </div>
    </div>
  <div class="split right">
    <div class="centered">
      <?php 
        session_start();
        if(!isset($_POST['viewtrainsbtn']))
        {
          echo 'Welcome heere';
        }
        else{
          $from_station = $_POST['from'];
          $to_station = $_POST['to'];
          $date_of_journey = $_POST['date_of_journey'];
          $timestamp = strtotime($date_of_journey);
          $day = date('l', $timestamp);
          $sql = "SELECT DISTINCT train_name from train_details AS A, train_stations AS B, train_days AS C where stations = 'Delhi' AND days = '$day' AND B.train_no IN(SELECT B.train_no from train_stations where stations = 'Tirupati');";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if($resultCheck > 0)
            {
                 while($row = mysqli_fetch_assoc($result)){

                    echo $row['train_name'] . "<br>" ;
                  }
            }
          $user_acc_no = "";
          $username = $_SESSION["user_name"];
          $sql1 = "SELECT acc_number FROM user_details WHERE user_name='$username';";
          $accno = mysqli_query($conn, $sql1);
          $resultCheck = mysqli_num_rows($accno);
          if($resultCheck>0)
          {
            while($row = mysqli_fetch_assoc($accno)){
              $user_acc_no = $row['acc_number'] ;
             }
          }
          $sql2 = "SELECT amount FROM user_details WHERE user_name='$username';";
          $amount = mysqli_query($conn, $sql2);
          echo '<p>Click the button and each will perform some dynamic function!</p>';
          echo '<div id="main">';
              echo '<input type="button" id="btAdd" onclick="passenger();" value="Add Passenger" class="bt"/><br>';
              echo "<br>";
              echo '<h1>Cost Per Ticket : Rs-500</h1>';
              echo '<button class="book-ticket" type="button" onclick="bookticket();">Book Ticket</button>';
              echo "<br>";
          echo '</div>';
          echo $from_station . "<br>";
          echo $to_station . "<br>";
          echo $date_of_journey . "<br>";
          echo $day . "<br>";
          echo 'Something here!!';
        }
       ?>
       <p></p>
    </div>
  </div>
</body>