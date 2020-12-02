<?php include_once 'partials/connection.php'; ?>

<?php

$query = "select * from admins where admin_id = {$_GET['id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);

// make the action when user click on Save Button
if (isset($_POST['submit_edit_admin'])) {
    // Take Data From Web Form 
    $admin_name     = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    $admin_email = $_POST['admin_email'];

    $email_query = " SELECT * FROM admins WHERE admin_email = '$admin_email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        $repeated_email = "* Email already taken, please try another one!";
    } else {
        $query = "update admins set admin_name        = '$admin_name'     ,
                                admin_password    = '$admin_password'  ,
                                admin_email       = '$admin_email'    
              where admin_id = {$_GET['id']}";

        mysqli_query($conn, $query);
        header("location:manage_admin.php");
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

                    <div class="card-header text-center"><strong>Updata Admin</strong></div>
                    <div class="card-body card-block">

                        <form action="" method="post" class="">
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
                                    <input type="password" id="adminpassword" name="admin_password" placeholder="Password" class="form-control" value="<?php echo $row['admin_password'] ?>">
                                </div>
                            </div>

                            <div>

                                <button id=" payment-button" type="submit" class="btn btn-lg btn-success btn-block" name="submit_edit_admin">
                                    <span id="payment-button-amount">Updata</span>
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