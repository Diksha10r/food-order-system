<?php include('../config/constants.php');

    // GET THE ID OF ADMIN TO BE DELETED
    $id = $_GET['id'];

    // SQL FOR DELETE ADMIN
    $sql = "DELETE FROM admin WHERE id=$id";

    // EXECUTE THE QUERY
    $res  = mysqli_query($conn, $sql);

    if($res == TRUE){
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Admin NOT Deleted</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>