<?php
session_start();

include_once 'partials/connection.php'; ?>


<?php 

if((isset($_SESSION['superadmin'])) || (isset($_SESSION['admin'])) ){
   
?>

<?php

$query = "select * from customers where cust_id = {$_GET['id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);

// make the action when user click on Save Button
if (isset($_POST['submit_edit_customer'])) {
    if ((!empty($_POST['cust_name'])) && (!empty($_POST['cust_password'])) && (!empty($_POST['cust_email'])) && (!empty($_POST['cust_phone'])) && (!empty($_POST['cust_address']))) {
        // Take Data From Web Form 
        $cust_name        = $_POST['cust_name'];
        $cust_name        = mysqli_real_escape_string($conn , $cust_name) ; 
        $cust_password    = $_POST['cust_password'];
        $cust_email       = $_POST['cust_email'];
        $cust_phone       = $_POST['cust_phone'];
        $cust_address     = $_POST['cust_address'];
        $cust_address     = mysqli_real_escape_string($conn , $cust_address) ; 

        // get image data
        $image_name = $_FILES['cust_image']['name'];
        $tmp_name   = $_FILES['cust_image']['tmp_name'];
        $path       = 'images/customer_images/';

        // move image to folder
        move_uploaded_file($tmp_name, $path . $image_name);

        // choose photo 
        if ($image_name) {
            $cust_image = $path . $image_name;
        } else {
            $cust_image = 'images/admin_images/noimage.jpg';
        }

        $cust_email_query = " SELECT * FROM customers WHERE cust_email = '$cust_email' ";
        $cust_email_query_run = mysqli_query($conn, $cust_email_query);


        
        if (($cust_email != $row['cust_email']) && (mysqli_num_rows($cust_email_query_run) > 0)) {
            $repeated_email = "* Email already taken, please try another one!";
        } else {
            $query = "update customers set cust_name    = '$cust_name'     ,
                                       cust_password    = '$cust_password' ,
                                       cust_email       = '$cust_email'    ,
                                       cust_phone       = '$cust_phone'    ,
                                       cust_address     = '$cust_address'  ,    
                                       cust_image       = '$cust_image'    
                where cust_id = {$_GET['id']}";

            mysqli_query($conn, $query);

            if (($cust_name == $row['cust_name']) && ($cust_password == $row['cust_password']) && ($cust_email == $row['cust_email']) && ($cust_phone == $row['cust_phone']) && ($cust_address == $row['cust_address']) && ($cust_image == $row['cust_image']) ) {
                $_SESSION['edited_customer'] = "Nothing Edited !";
                header("location:manage_customer.php");
            } else {
                $_SESSION['edited_customer'] = "The Customer Edited Successfully";
                header("location:manage_customer.php");
            }
        }
    } else {
        $_SESSION['empty_fields'] = 'Please enter all of fields ';
        // temprorary antil i have some time to be more spacific 
    }
}
?>

<?php include_once 'partials/header_admin.php'; ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center"><strong>Edit Customer</strong></div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="" enctype="multipart/form-data">
                                <?php
                                if (isset($_SESSION['empty_fields']) && ($_SESSION['empty_fields'] != "")) {
                                    echo '<div class="text-center alert alert-danger">';
                                    echo ($_SESSION['empty_fields']);
                                    echo '</div>';
                                    unset($_SESSION['empty_fields']);
                                }
                                ?>
                                <div class="form-group ">
                                    <div class="input-group">
                                    <?php
                                echo "<img class='rounded mx-auto d-block' width='200' height='200' src='{$row['cust_image']}'>";
                                ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="username" name="cust_name" placeholder="Username" class="form-control" value="<?php echo $row['cust_name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="cust_email" placeholder="Email" class="form-control" value="<?php echo $row['cust_email'] ?>">
                                    </div>
                                    <small style="color: red;">
                                        <?php
                                        if (isset($repeated_email) && $repeated_email != "") {
                                            echo ($repeated_email);
                                            unset($repeated_email);
                                        }
                                        ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="phone" id="phone" name="cust_phone" placeholder="Phone Number" class="form-control" value="<?php echo $row['cust_phone'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                        <input type="text" id="Address" name="cust_address" placeholder="Address" class="form-control" value="<?php echo $row['cust_address'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="cust_password" placeholder="Password" class="form-control" value="<?php echo $row['cust_password'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="file-input" class=" form-control-label">Upload Image</label>
                                        <input type="file" id="file-input" name="cust_image" class="form-control-file">
                                    </div>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg bg-success btn-block text-white" name="submit_edit_customer">

                                    <span id="payment-button-amount">Edit</span>
                                </button>
                                <button id="payment-button" type="submit" class="btn btn-lg bg-success btn-block text-white" name="cancel_edit_customer">

                                    <a href="manage_customer.php" id="payment-button-amount">cancel</a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MAIN CONTENT-->
<?php
include_once 'partials/footer_admin.php';
?>

<?php
}else{
    header('location:../index.php');
}
?>