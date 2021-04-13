<html>
<head>
    <title>Khaoji - Admin Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>


<?php include('partials/menu.php'); ?>

    <div  class="main-content">
        <div class="wrapper">
            <h1>Manage Order</h1>

            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM ordertable WHERE id=$id";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        $row = mysqli_fetch_assoc($res);
                        $food = $row['food'];
                        $qty = $row['qty'];
                        $price = $row['price'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];
                    }
                    else{
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                }
                else{
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Food Name:</td>
                        <td><?php echo $food; ?></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><?php echo $price; ?></td>
                    </tr>
                    <tr>
                        <td>Quantity:</td>
                        <td><input type="number" name="qty" value="<?php echo $qty; ?>"></td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <select name="status">
                                <option <?php if($status == "Ordered"){ echo "Selected";}?> value="Ordered">Ordered</option>
                                <option <?php if($status == "On Delivery"){ echo "Selected";}?> value="On Delivery">On Delivery</option>
                                <option <?php if($status == "Delivered"){ echo "Selected";}?> value="Delivered">Delivered</option>
                                <option <?php if($status == "Cancelled"){ echo "Selected";}?> value="Cancelled">Cancelled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Customer Name:</td>
                        <td><input type="text" name="customer_name" value="<?php echo $customer_name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer contact:</td>
                        <td><input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer email:</td>
                        <td><input type="text" name="customer_email" value="<?php echo $customer_email; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer address:</td>
                        <td><textarea type="text" name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;

                    $status = $_POST['status'];
                    $customer_name = $_POST['customer_name'];
                    $customer_contact = $_POST['customer_contact'];
                    $customer_email = $_POST['customer_email'];
                    $customer_address = $_POST['customer_address'];

                    $sql2 = "UPDATE ordertable SET
                            qty = $qty,
                            total = $total,
                            status = '$status',
                            customer_name = '$customer_name',
                            customer_contact = '$customer_contact',
                            customer_email = '$customer_email',
                            customer_address = '$customer_address'
                            WHERE id=$id";
                    
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == TRUE){
                        $_SESSION['update'] = "<div class='success'>Order Updated Successfully</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                    else{
                        $_SESSION['update'] = "<div class='error'>Order NOT Updated</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                }
            ?>

        </div>
    </div>

<?php include('partials/footer.php'); ?>

</body>
</html>