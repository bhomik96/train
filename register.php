<?php
//session_start();
//require 'dbconfig/config.php';
?>

<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
    <script src="main.js"></script>
</head>
<body>
        
        <div id="wrapper">
        <center><h1>Register</h1></center>
        <form action="register.php" class="myform" method="post">
            <label ><b>UserName</b></label><br>
            <input name="username" type="text" placeholder="Type your Username" class="inputvalues"><br>
            <label ><b>Password</b></label><br>
            <input name="password" type="password" placeholder="Type your Password" class="inputvalues"><br>
            <label ><b>Confirm Password</b></label><br>
            <input name="cpassword" type="password" placeholder="Confirm your Password" class="inputvalues"><br>
            <label ><b>Aadhar Number</b></label><br>
            <input name="aadhar" type="text" placeholder="Aadhar No." class="inputvalues"><br>
            <label ><b>Bank Account No.</b></label><br>
            <input name="acno" type="text" placeholder="Bank A/C" class="inputvalues"><br>
            <label ><b>Initial Amount</b></label><br>
            <input name="amt" type="text" placeholder="Amount" class="inputvalues"><br>
            <input name="register" type="submit" id="signup-btn" value="Register"><br>
            <a href="index.php"><input name="signin" type="submit" id="login-btn" value="Sign In"><br></a>
        </form>

        <!-- <?php
			// if(isset($_POST['register']))
			// {
			// 	@$username=$_POST['username'];
			// 	@$password=$_POST['password'];
			// 	@$cpassword=$_POST['cpassword'];
				
			// 	if($password==$cpassword)
			// 	{
			// 		$query = "select * from user where username='$username'";
			// 		//echo $query;
			// 	$query_run = mysqli_query($con,$query);
			// 	//echo mysql_num_rows($query_run);
			// 	if($query_run)
			// 		{
			// 			if(mysqli_num_rows($query_run)>0)
			// 			{
			// 				echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
			// 			}
			// 			else
			// 			{
			// 				$query = "insert into user values('$username','$password')";
			// 				$query_run = mysqli_query($con,$query);
			// 				if($query_run)
			// 				{
			// 					echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
			// 					$_SESSION['username'] = $username;
			// 					$_SESSION['password'] = $password;
			// 					header( "Location: homepage.php");
			// 				}
			// 				else
			// 				{
			// 					echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
			// 				}
			// 			}
			// 		}
			// 		else
			// 		{
			// 			echo '<script type="text/javascript">alert("DB error")</script>';
			// 		}
			// 	}
			// 	else
			// 	{
			// 		echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
			// 	}
				
			// }
			// else
			// {
			// }
		?> -->
        </div>

</body>
</html>