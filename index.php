<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="login.css" />
</head>
<body>
        
        <div id="wrapper">
        <center><h1>Login</h1></center>
        <form action="includes/login-inc.php" method="POST">
            <label ><b>User</b></label><br>
            <input name="user_name" type="text" placeholder="Username" class="inputvalues" required><br>
            <label ><b>Password</b></label><br>
            <input name="password" type="password" placeholder="Password" class="inputvalues" required><br>
            <input name="s-btn" type="submit" id="login-btn" value="Sign In"><br>
        </form>
        <br>
        <a href="register.php"><input name="r-btn" type="submit" id="signup-btn" value="Register"></a>
        <br>
        <a href="adminlogin.php"><input name="ad-btn" type="submit" id="admin-btn" value="Admin"></a>

        <?php 
            if(!isset($_GET['login'])){
                exit();
            }
            else{
                $loginCheck = $_GET['login'];
                if($loginCheck == "Invalid"){
                    echo "<p class='error'>Invalid Username or Password!!</p>";
                    exit();
                }
            }

         ?>



        </div>


</body>
</html>