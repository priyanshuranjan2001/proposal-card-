<?php
require("Connection.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login-form">
    <h2>ADMIN LOGIN</h2>
    <form method="POST">
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="AdminName">
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Password" name="AdminPassword">
        </div>
        <button type="Submit" name="Signin">Sign In</button>
        <div class="extra">
            <a href="#">Forgot Password</a>
        </div>
    </form>
    </div>

    <?php
    if(isset($_post['signin']))
    {
        $query="SELECT * FROM `admin_login` WHERE `Admin_Name`=`$_POST[AdminName]`AND `Admin_Password`=`$_POST[AdminPassword]";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($rresult)==1)
        {
            echo"ok";
            session_start();
            $_SESSION['AdminLoginId']=$_POST['AdminName'];
            header("location:admin panel.php");
        }
        else
        {
            echo "<script>alert('Incorrect Password');</script>";
        }
    }

    ?>
</body>
</html>