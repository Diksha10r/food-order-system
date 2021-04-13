<?php include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name !== ""){
            $path = "../images/food/".$image_name;
            $remove= unlink($path);

            if($remove == FALSE){
                $_SESSION['remove'] = "<div class='error'>Failed to remove Image</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }

        $sql = "DELETE FROM food WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res == TRUE){
            $_SESSION['delete'] = "<div class='success'>Food Deleted SuccessFully</div>";
            header("location:".SITEURL.'admin/manage-food.php');
        }
        else{
            $_SESSION['delete'] = "<div class='error'>Food NOT Deleted</div>";
            header("location:".SITEURL.'admin/manage-food.php');
        }
    }
    else{
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorizes Access</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>