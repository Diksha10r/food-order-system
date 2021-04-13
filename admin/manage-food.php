<html>
<head>
    <title>Khaoji - Admin Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<?php include('partials/menu.php'); ?>

<div  class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
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

            if(isset($_SESSION['remove'])){
                echo $_SESSION['remove']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['remove']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['upload']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['unauthorize'])){
                echo $_SESSION['unauthorize']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['unauthorize']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['update']); // REMOVING SESSION MESSAGE
            }
        ?>

        <!-- Button to Add Food -->
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
        <br /><br />


        <table class="tbl-full">
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM food";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn = 1;

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td>Rs.<?php echo $price; ?></td>
                            <td>
                                <?php 
                                    if($image_name != ""){
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                    }
                                    else{
                                        echo "<div class='error'>Image NOT added</div>";
                                    }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else{
                    ?>
                    <tr>
                        <td colspan="7"><div class="error">No Food Added</div></td>
                    </tr>
                    <?php
                }      
            ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>

</body>
</html>