<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="login.css" >
</head>
<body>
        
        <div id="wrapper">
        <center><h1>Register</h1></center>
        <form action="includes/signup-inc.php" method="POST">
        	<?php 
        		echo '<label ><b>UserName</b></label><br>';
        		if(isset($_GET['username'])){
        			$user_name = $_GET['username'];
        		 	echo '<input name="username" type="text" placeholder="Type your Username" class="inputvalues" value="'.$user_name.'" required><br>';
        		}
        		else{
        			echo '<input name="username" type="text" placeholder="Type your Username" class="inputvalues" required><br>';
        		}
            ?>
            <label ><b>Password</b></label><br>
            <input name="password" type="password" placeholder="Type your Password" class="inputvalues" required><br>
            <label ><b>Confirm Password</b></label><br>
            <input name="cpassword" type="password" placeholder="Confirm your Password" class="inputvalues" required><br>
            <?php 
        		echo '<label ><b>Aadhar Number</b></label><br>';
        		if(isset($_GET['aadhar'])){
        			$aadhar = $_GET['aadhar'];
        		 	echo '<input name="aadhar" type="text" placeholder="Aadhar No." class="inputvalues" value="'.$aadhar.'" required><br>';
        		}
        		else{
        			echo '<input name="aadhar" type="text" placeholder="Aadhar No." class="inputvalues" required><br>';
        		}
            ?>
            <?php 
        		echo '<label ><b>Bank Account No.</b></label><br>';
        		if(isset($_GET['acno'])){
        			$acno = $_GET['acno'];
        		 	echo '<input name="acno" type="text" placeholder="Bank A/C" class="inputvalues" value="'.$acno.'" required><br>';
        		}
        		else{
        			echo '<input name="acno" type="text" placeholder="Bank A/C" class="inputvalues" required><br>';
        		}
            ?>
            <?php 
        		echo '<label ><b>Initial Amount</b></label><br>';
        		if(isset($_GET['amount'])){
        			$amount = $_GET['amount'];
        		 	echo '<input name="amt" type="text" placeholder="Amount" class="inputvalues" value="'.$amount.'" required><br>';
        		}
        		else{
        			echo '<input name="amt" type="text" placeholder="Amount" class="inputvalues" required><br>';
        		}
            ?>
            <input name="register" type="submit" id="signup-btn" value="Register"><br>
        </form>

        <?php 
        	/*$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        	if(strpos($fullUrl, "signup=fieldexists")){
        		echo "<p class='error'>Duplicate field entry!!</p>";
        		exit();
        	}
        	elseif (strpos($fullUrl, "signup=pwds")){
        		echo "<p class='error'>Password fields doesnot match!!!</p>";
        		exit();
        	}*/
        	if(!isset($_GET['signup'])){
        		exit();
        	}
        	else{
        		$signupCheck = $_GET['signup'];
        		if($signupCheck == "fieldexists"){
        			echo  "<center><p style='font-weight:bold;font-size:17px;' class='error'>Duplicate field entry!!!</p></center";
        			exit();
        		}
        		elseif($signupCheck == "pwds"){
        			echo "<center><p style='font-weight:bold;font-size:17px;' class='error'>Password fields doesnot match!!!</p></center";
        			exit();
        		}
        	}

         ?>

        </div>

</body>
</html>