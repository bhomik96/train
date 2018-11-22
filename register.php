<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="login.css" />
    <script src="main.js"></script>
</head>
<body>
        
        <div id="wrapper">
        <center><h1>Register</h1></center>
        <form action="includes/signup-inc.php" method="POST">
            <label ><b>UserName</b></label><br>
            <input name="username" type="text" placeholder="Type your Username" class="inputvalues" required><br>
            <label ><b>Password</b></label><br>
            <input name="password" type="password" placeholder="Type your Password" class="inputvalues" required><br>
            <label ><b>Confirm Password</b></label><br>
            <input name="cpassword" type="password" placeholder="Confirm your Password" class="inputvalues" required><br>
            <label ><b>Aadhar Number</b></label><br>
            <input name="aadhar" type="text" placeholder="Aadhar No." class="inputvalues" required><br>
            <label ><b>Bank Account No.</b></label><br>
            <input name="acno" type="text" placeholder="Bank A/C" class="inputvalues" required><br>
            <label ><b>Initial Amount</b></label><br>
            <input name="amt" type="text" placeholder="Amount" class="inputvalues" required><br>
            <input name="register" type="submit" id="signup-btn" value="Register"><br>
        </form>
        </div>

</body>
</html>