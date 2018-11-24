<?php
	include_once 'includes/dbh-inc.php';
	$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$sql = "SELECT * FROM admin WHERE username = '$user_name' AND password = '$password';";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
?> 

<head>
    <link rel="stylesheet" href="adminpage.css">
    <script type="text/javascript">
        function addField (argument){
            var myTable = document.getElementById("t");
            var currentIndex = myTable.rows.length;
            var currentRow = myTable.insertRow(-1);
            var linksBox = document.createElement("td");
            linksBox.setAttribute("contenteditable", "true");
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);
          
            var linksBox = document.createElement("td");
            linksBox.setAttribute("contenteditable", "true");
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);
            var linksBox = document.createElement("td");
            linksBox.setAttribute("contenteditable", "true");
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);
            var linksBox = document.createElement("td");
            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "checkbox1");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Sunday";
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "checkbox1");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Monday";
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "checkbox1");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Tuesday";
            linksBox.appendChild(sp);
           var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "checkbox1");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Wednesday";
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "checkbox1");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Thursday";
            linksBox.appendChild(sp);
           var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "checkbox1");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Friday";
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            var addRowBox = document.createElement("input");
            addRowBox.setAttribute("type", "checkbox");
            addRowBox.setAttribute("name", "checkbox1");
            addRowBox.setAttribute("class", "x");
            sp.appendChild(addRowBox);
            linksBox.appendChild(sp);
            var sp = document.createElement('span');
            sp.innerHTML="Saturday";
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
            rdio.setAttribute("name", "optradio");
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
            rdio.setAttribute("name", "optradio");
            mydiv.appendChild(rdio);
            var sp = document.createElement('span');
            sp.innerHTML="Cancel";
            mydiv.appendChild(sp);
            currentCell.appendChild(mydiv);

            var linksBox = document.createElement("td");
            var atag = document.createElement("a");
            atag.setAttribute('href',"modify.php");
            atag.innerHTML = "Modify table";
            linksBox.appendChild(atag);
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);
        }
		function deletetrain() {
		    var txt;
		    var person = prompt("Please Enter Train ID to be deleted");
		    if (person == null || person == "") {
		        txt = "";
		    } else {
		        txt =person;
		    }
		    document.getElementById("demo").innerHTML = txt;
		}
    </script>
</head>

<body>
<center><h1>Trains Information</h1></center>
<div style="overflow-x:auto;">
  <table id="t">
    <tr>
      <th>Train No.</th>
      <th>Train Name</th>
      <th>Station List</th>
      <th>Days</th>
      <th>Status</th>
      <th>Modify</th>
    </tr>
    <?php
	
	if($resultCheck>0)
	{

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
				echo '<td contenteditable="true" name="train_number_modified">' . $row1['train_no'] .'</td>';

				echo '<td contenteditable="true" name="train_name_modified">' .$row1['train_name'] . '</td>';
				$req_train_no = $row1['train_no'];
				$sql_train_stations = "SELECT stations from train_stations where train_no='$req_train_no';";
				$result_2=mysqli_query($conn,$sql_train_stations);
				$resultCheck2=mysqli_num_rows($result_2);
				if($resultCheck2>0)
				{
					while($row2=mysqli_fetch_assoc($result_2))
					{
						$stations=$stations . $row2['stations'] . "  ";
					}
					echo '<td contenteditable="true" name="stations_list">'.$stations.'</td>';
					$stations = "";
				}
				$week_days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
				echo '<td>';
				foreach($week_days as $req_day){
					$sql_train_day = "SELECT * from train_days where train_no='$req_train_no' and days='$req_day';";
					$result_3=mysqli_query($conn,$sql_train_day);
					$resultCheck3=mysqli_num_rows($result_3);
					if($resultCheck3 > 0){
						echo '<span><input  class="x" name="Checkbox1" type="checkbox" checked>' . $req_day . '</span>';
					}
					else{
						echo '<span><input  class="x" name="Checkbox1" type="checkbox">' .$req_day. '</span>';
					}
				}

				echo '</td>';
				echo '<td>';
				$train_status = $row1['status'];
				if($train_status === "Running"){
					
            			echo '<div class="radio">';
                			echo '<span><input type="radio" class="regular" name="optradio' . $row_count . '" checked>Running</span>';
            			echo '</div>';
            			echo '<div class="radio">';
                			echo '<span><input type="radio" class="regular" name="optradio' . $row_count . '">Cancel</span>';
            			echo '</div>';
      				
				}
				else{
					
            			echo '<div class="radio">';
                			echo '<span><input type="radio" class="regular" name="optradio' . $row_count . '">Running</span>';
            			echo '</div>';
            			echo '<div class="radio">';
                			echo '<span><input type="radio" class="regular" name="optradio' . $row_count . '" checked>Cancel</span>';
            			echo '</div>';
      				
				}
				$i=$i+1;
				$row_count = strval($i);
				echo '</td>';
				$train_status = "";
				echo '<td> <a href="modify.php">Modify Table</a></td>';
    			echo '</tr>';
			}
		}

			
	}

    ?>
  </table>
  <br>
  <br>
  <center>
      <input type="button" id ="add-btn" class="button" value="Add Train" onclick="addField();">
      <input type="button" id="del-btn" class="button" value="Delete Train" onclick="deletetrain();">
  </center>
  <center><h2 id="demo">
  </h2></center>
</div>
</body>
