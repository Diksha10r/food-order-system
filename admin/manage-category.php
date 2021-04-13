<html>
<head>
    <title>Khaoji - Admin Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<?php include('partials/menu.php'); ?>

<div  class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br /><br />

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['add']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['remove'])){
                echo $_SESSION['remove']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['remove']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['delete']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['no-category-found'])){
                echo $_SESSION['no-category-found']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['no-category-found']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['update']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['upload']); // REMOVING SESSION MESSAGE
            }

            if(isset($_SESSION['failed-remove'])){
                echo $_SESSION['failed-remove']; // DISPLAYING SESSION MESSAGE
                unset($_SESSION['failed-remove']); // REMOVING SESSION MESSAGE
            }
        ?>



        <!-- Button to Add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br /><br />


        <table class="tbl-full">
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
            
                $sql = "SELECT * FROM category";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td>
                                <?php
                                    if($image_name != ""){
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                    }
                                    else{
                                        echo "<div class='error'>Image NOT Added</div>";
                                    }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else{
                    ?>
                    <tr>
                        <td colspan="6"><div class="error">No Category Added</div></td>
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