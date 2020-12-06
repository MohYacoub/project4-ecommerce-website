<?php
session_start();

include_once 'partials/connection.php'; ?>


<?php 

if((isset($_SESSION['superadmin'])) || (isset($_SESSION['admin'])) ){
   
?>

<?php

$query = "select * from admins where admin_id = {$_GET['id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);

// make the action when user click on Save Button
if (isset($_POST['submit_edit_admin'])) {
    if ((!empty($_POST['admin_name'])) && (!empty($_POST['admin_password'])) && (!empty($_POST['admin_email']))) {
        // Take Data From Web Form 
        $admin_name     = $_POST['admin_name'];
        $admin_name     = mysqli_real_escape_string($conn , $admin_name) ; 
        $admin_password = $_POST['admin_password'];
        $admin_email    = $_POST['admin_email'];

        // get image data
        $image_name = $_FILES['admin_image']['name'];
        $tmp_name   = $_FILES['admin_image']['tmp_name'];
        $path       = 'images/admin_images/';
        // move image to folder
        move_uploaded_file($tmp_name, $path . $image_name);

        // choose photo 
        if ($image_name) {
            $admin_image = $path . $image_name;
        } else {
            $admin_image = $row['admin_image'];
        }

        $email_query = " SELECT * FROM admins WHERE admin_email = '$admin_email' ";
        $email_query_run = mysqli_query($conn, $email_query);
        if (($admin_email != $row['admin_email']) && (mysqli_num_rows($email_query_run) > 0)) {
            $repeated_email = "* Email already taken, please try another one!";
        } else {
            $query = "update admins set admin_name        = '$admin_name'     ,
                                    admin_password    = '$admin_password'  ,
                                    admin_email       = '$admin_email'    ,
                                    admin_image       = '$admin_image'    
                  where admin_id = {$_GET['id']}";
            mysqli_query($conn, $query);

            if (($admin_email == $row['admin_email']) && ($admin_password == $row['admin_password']) && ($admin_name == $row['admin_name']) && ($admin_image == $row['admin_image'])) {
                $_SESSION['edited_admin'] = "Nothing Edited !";
                header("location:manage_admin.php");
            } else {
                $_SESSION['edited_admin'] = "The Admin Edited Successfully";
                header("location:manage_admin.php");
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

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header text-center"><strong>Update Admin</strong></div>
                    <div class="card-body card-block">

                        <form action="" method="post" class="" enctype="multipart/form-data">
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
                                    echo "<img class='rounded mx-auto d-block' width='200' height='200' src='{$row['admin_image']}'>";
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="adminname" name="admin_name" placeholder="Admin name" class="form-control" value="<?php echo $row['admin_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="adminemail" name="admin_email" placeholder="Email" class="form-control" value="<?php echo $row['admin_email'] ?>">
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
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                    <input type="text" id="adminpassword" name="admin_password" placeholder="Password" class="form-control" value="<?php echo $row['admin_password'] ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">Upload your photo <small style="color: red;"> *optional</small> </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="file" id="file-input" name="admin_image" class="form-control-file">
                                </div>
                            </div>
                            <div>
                                <button id=" payment-button" type="submit" class="btn btn-lg btn-success btn-block" name="submit_edit_admin">
                                    <span id="payment-button-amount">Update</span>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- <div class="col-lg-12"> -->
            </div>
        </div>
    </div>
</div>

<?php
include_once 'partials/footer_admin.php';
?>

<?php
}else{
    header('location:../index.php');
}
?>