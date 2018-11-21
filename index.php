<?php
//require 'dbconfig/config.php';
?>
<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
    <script src="main.js"></script>
</head>
<body>
        
        <div id="wrapper">
        <center><h1>Login</h1></center>
        <form action="index.php" class="myform" method="post">
            <label ><b>UserName</b></label><br>
            <input name="user" type="text" placeholder="Username" class="inputvalues" required><br>
            <label ><b>Password</b></label><br>
            <input name="pass" type="password" placeholder="Password" class="inputvalues" required><br>
            <input name="s-btn" type="submit" id="login-btn" value="Sign In"><br>
            <a href="register.php"><input name="r-btn" type="submit" id="signup-btn" value="Register"></a>
        </form>
        <!-- <?php
            if(isset($_POST['s-btn'])){
                echo '<script type="text/javascript">alert("submit button clicked")</script>';
            $username=$_POST['user'];
            $password=$_POST['pass'];
            
            
            
            
            
            
            }

        ?> -->



        </div>

</body>
</html>