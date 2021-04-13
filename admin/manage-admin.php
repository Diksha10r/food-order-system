<html>
<head>
    <title>Khaoji - Admin Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<?php include('partials/menu.php'); ?>
        
    <div class="main-content">

        <div class="wrapper">
        <h1>Manage Admin</h1>
        <br /><br />

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['add']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['delete']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['update']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['user-not-found']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['pwd-not-match'])){
                echo $_SESSION['pwd-not-match']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['pwd-not-match']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['change-pwd'])){
                echo $_SESSION['change-pwd']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['change-pwd']); // REMOVING SESSION MESSAGE
            }
        ?>
 

        <!-- Button to Add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /><br />


        <table class="tbl-full">
            <tr>
                <th>S.No</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php
                // GET ALL ADMIN
                $sql = "SELECT * FROM admin";
                $res = mysqli_query($conn, $sql);

                // CHECK QUERY EXECUTED OR NOT 
                if($res == TRUE){
                    //COUNT ROWS TO CHECK WHETHER THERE DATA IN DB
                    $count = mysqli_num_rows($res);
                    $sn = 1;

                    if($count > 0){
                        while($rows = mysqli_fetch_assoc($res)){
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else{
                        echo "no data";
                    }
                }
            ?>
        </table>
    </div>      

<?php include('partials/footer.php'); ?>
</body>
</html>