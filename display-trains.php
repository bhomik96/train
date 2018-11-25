<?php 
    include_once 'includes/dbh-inc.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="adminpage.css">
    <script type="text/javascript">
        function addField (row_count_new){
            var myTable = document.getElementById("t");
            var currentIndex = myTable.rows.length;
            var currentRow = myTable.insertRow(-1);
            var linksBox = document.createElement("td");
            var ipt = document.createElement("input");
            ipt.setAttribute("type", "text");
            ipt.setAttribute("name", "train_number[]");
            ipt.setAttribute("value", "");
            linksBox.appendChild(ipt);
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);
          
            var linksBox = document.createElement("td");
            var ipt = document.createElement("input");
            ipt.setAttribute("type", "text");
            ipt.setAttribute("name", "train_name[]");
            ipt.setAttribute("value", "");
            linksBox.appendChild(ipt);
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);

            var linksBox = document.createElement("td");
            var ipt = document.createElement("input");
            ipt.setAttribute("type", "text");
            ipt.setAttribute("name", "stations_list[]");
            ipt.setAttribute("value", "");
            linksBox.appendChild(ipt);
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);

            var linksBox = document.createElement("td");

            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "Row" + row_count_new + "[]");
            addRowBox.setAttribute("value", "Monday");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Monday";
            linksBox.appendChild(sp);

            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "Row" + row_count_new + "[]");
            addRowBox.setAttribute("value", "Tuesday");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Tuesday";
            linksBox.appendChild(sp);

            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "Row" + row_count_new + "[]");
            addRowBox.setAttribute("value", "Wednesday");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Wednesday";
            linksBox.appendChild(sp);

            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "Row" + row_count_new + "[]");
            addRowBox.setAttribute("value", "Thursday");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Thursday";
            linksBox.appendChild(sp);

           var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "Row" + row_count_new + "[]");
            addRowBox.setAttribute("value", "Friday");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Friday";
            linksBox.appendChild(sp);

            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "Row" + row_count_new + "[]");
            addRowBox.setAttribute("value", "Saturday");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Saturday";
            linksBox.appendChild(sp);

            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "Row" + row_count_new + "[]");
            addRowBox.setAttribute("value", "Sunday");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Sunday";
            linksBox.appendChild(sp);

            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);
          
            var linksBox = document.createElement("td");
            var currentCell = currentRow.insertCell(-1);

            var mydiv = document.createElement('div');  
            mydiv.setAttribute("class", "radio");
            var rdio=document.createElement('input');
            rdio.setAttribute("type", "radio");
            rdio.setAttribute("class", "regular");
            rdio.setAttribute("value","Running");
            rdio.setAttribute("name", "optradio" + row_count_new + "[]");
            mydiv.appendChild(rdio);
            var sp = document.createElement('span');
            sp.innerHTML="Running";
            mydiv.appendChild(sp);
            currentCell.appendChild(mydiv);

            var mydiv = document.createElement('div'); 
            mydiv.setAttribute("class", "radio"); 
            var rdio=document.createElement('input');
            rdio.setAttribute("type", "radio");
            rdio.setAttribute("class", "regular");
            rdio.setAttribute("value","Cancel");
            rdio.setAttribute("name", "optradio" + row_count_new + "[]");
            mydiv.appendChild(rdio);
            var sp = document.createElement('span');
            sp.innerHTML="Cancel";
            mydiv.appendChild(sp);
            currentCell.appendChild(mydiv);

            row_count_new = row_count_new + 1;
        }
    </script>
</head>

<body>
    <center>
        <h1>
            Trains Information
        </h1>
    </center>
    <div style="overflow-x:auto;">
        <?php 
            echo '<form action="modify-details.php" method="POST">';
            echo '<table id="t">';
            echo '<tr>';
              echo '<th>Train No.</th>';
              echo '<th>Train Name</th>';
              echo '<th>Station List</th>';
              echo '<th>Days</th>';
              echo '<th>Status</th>';
            echo '</tr>';
                //if($resultCheck>0)
                 //{
                    $t_num="";
                    $stations="";
                    $days=array();
                    $status="";
                    $train_status="";
                    $sql_train_details = "SELECT * from train_details;";
                    $result_1=mysqli_query($conn,$sql_train_details);
                    $resultCheck1=mysqli_num_rows($result_1);
                    if($resultCheck1>0)
                        {
                            $i=1;$row_count=strval($i);
                            while($row1=mysqli_fetch_assoc($result_1))
                             {
                                echo '<tr>';
                                    echo '<td><input type="text" name="train_number[]" value="' . $row1['train_no'] . '" /></td>';
                                    echo '<td><input type="text" name="train_name[]" value="' . $row1['train_name'] . '" /></td>';
                                    $req_train_no = $row1['train_no'];
                                    $sql_train_stations = "SELECT stations from train_stations where train_no='$req_train_no';";
                                    $result_2=mysqli_query($conn,$sql_train_stations);
                                    $resultCheck2=mysqli_num_rows($result_2);
                                    if($resultCheck2>0)
                                     {
                                        while($row2=mysqli_fetch_assoc($result_2))
                                        {
                                             $stations=$stations . $row2['stations'] . " ";
                                        }
                                        echo '<td><input type="text" name="stations_list[]" value="' . $stations . '" /></td>';
                                        $stations = "";
                                     }
                                    $week_days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                                    echo '<td>';
                                    foreach($week_days as $req_day){
                                        $sql_train_day = "SELECT * from train_days where train_no='$req_train_no' and days='$req_day';";
                                        $result_3=mysqli_query($conn,$sql_train_day);
                                        $resultCheck3=mysqli_num_rows($result_3);
                                        if($resultCheck3 > 0){
                                            echo '<span><input  class="x" value ="' .$req_day. '"name="Row' .$row_count. '[]" type="checkbox" checked>' . $req_day . '</span>';
                                          }
                                        else{
                                            echo '<span><input  class="x" value="' . $req_day . '"name="Row' .$row_count. '[]" type="checkbox">' .$req_day. '</span>';
                                          }
                                    }
                                    echo '</td>';
                                    echo '<td>';
                                    $train_status = $row1['train_status'];
                                    if($train_status === "Running"){
                                        echo '<div class="radio">';
                                            echo '<span><input type="radio" class="regular" value ="Running" name="optradio' . $row_count .'[]" checked>Running</span>';
                                        echo '</div>';
                                        echo '<div class="radio">';
                                            echo '<span><input type="radio" class="regular" value ="Cancel" name="optradio' . $row_count .'[]">Cancel</span>';
                                        echo '</div>';
                            
                                     }
                                    else{
                                        echo '<div class="radio">';
                                            echo '<span><input type="radio" class="regular" value ="Running" name="optradio' . $row_count .'[]">Running</span>';
                                        echo '</div>';
                                        echo '<div class="radio">';
                                            echo '<span><input type="radio" class="regular" value ="Cancel" name="optradio' . $row_count .'[]" checked>Cancel</span>';
                                        echo '</div>';
                                        
                                     }

                                    $i=$i+1;
                                    $row_count = strval($i);
                                    echo '</td>';
                                    $train_status = "";
                                echo '</tr>';
                            }
                        }   
                 //}
                
            echo '</table>';
            echo '<br>';
            echo '<center><input style="width:150px;" type="submit" id ="modify-btn" class="button" value="Modify Trains"></center>';
            echo '</form>';
            echo '<br>';
            echo '<center>';              
            echo '<input style="width:150px;" type="button" id ="add-btn" class="button" value="Add Train" onclick="addField(' .$row_count. ');">';
            echo '</center>';
        ?>
         <button style="background-color: #039BE5; border: none; color: white;padding: 15px 32px; text-align: center; text-decoration: none;display: inline-block;
       font-size: 16px;position:absolute; top:0; right:0;border-radius:10px;margin-top:10px;margin-right:10px;" onclick="location.href='adminlogin.php?action=logout';" value="Logout" type="button">Logout</button>
    </div>
</body>
</html>