<html>
<head>
    <title>Khaoji - Admin Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['add']); // REMOVING SESSION MESSAGE
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //process the form and save in DB
    //check if Submit button if clicked or not
    
    if(isset($_POST['submit'])){

            // GET DATA FROM DB
           $full_name = $_POST['full_name'];
           $username = $_POST['username'];
           $password = md5($_POST['password']); // PASSWORD ENCRYPTION WITH MD5

           //SQL QUERY TO SAVE DATA IN DB
            $sql = "INSERT INTO admin SET 
                    full_name = '$full_name',
                    username = '$username',
                    password = '$password'";

            // EXECUTE QUERY AND SAVE DATA IN DB
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            // CHECK WHETHER THE (QUERY IS EXECUTED OR NOT)DATA IS PASSED OR NOT
            if($res == TRUE){
                // CREATE A SESSION VARIABLE TO DISPLAY MESSAGE
                $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";

                // REDIRECT PAGE TO MANAGE ADMIN PAGE
                header("location:".SITEURL.'admin/manage-admin.php');
            }
            else{
                // CREATE A SESSION VARIABLE TO DISPLAY MESSAGE
                $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";

                // REDIRECT PAGE TO ADD ADMIN PAGE
                header("location:".SITEURL.'admin/add-admin.php');
            }
    }
?>
</body>
</html>