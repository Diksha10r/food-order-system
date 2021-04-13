<?php include('../config/constants.php'); ?>

<html>
<head>
    <title>Login: To KhaoJI Admin System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/adminLogin.css" >
</head>

<body>
    <div class="login">
        <img src="../images/adminlogo.png" alt="jsh" width="100px" height="100px">
        <br>
        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message'])){
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <br>
        <form action="" method="POST" class="transbox">
            Username:<br /> 
            <input type="text" name="username" placeholder="Enter Username" autofocus><br /><br />  
            Password:<br /> 
            <input type="password" name="password" placeholder="Enter Password"><br /><br /> 

            <input type="submit" class="text-center" name="submit" value="Submit"><br /> <br /> 
        </form>

        <p class="text-center">Created By - Diksha Rawat</p>
    </div>
</body>
</html>

<?php 

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);
        
        $count = mysqli_num_rows($res);

        if($count == 1){
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";
            $_SESSION['user'] = $username;
            header("location:".SITEURL.'admin/');
        }
        else{
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not Match</div>";
            header("location:".SITEURL.'admin/login.php');
        }
    }

?>