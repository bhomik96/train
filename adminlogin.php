<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
         <h1>Admin Login</h1>
         <form action="includes/admin-login-inc.php" method="POST">
             <div class="inputbox">
                 <input type="text" name="user_name" required>
                 <label>Username</label>
             </div>
             <div class="inputbox">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <input type="Submit" name="admin-login-btn" value="Submit">
         </form>
         <?php 
            if(!isset($_GET['adminlogin'])){
                exit();
            }
            else{
                $loginCheck = $_GET['adminlogin'];
                if($loginCheck == "Invalid"){
                    echo "<p class='error'>Invalid Username or Password!!</p>";
                    exit();
                }
            }

         ?>
    </div>
</body>

