<?php include_once 'partials/connection.php'; ?>
<?php

$query = "select * from customers where cust_id = {$_GET['id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);

// make the action when user click on Save Button
if (isset($_POST['submit_edit_customer'])) {
    // Take Data From Web Form 
// Take Data From Web Form 
$cust_name        = $_POST['cust_name'];
$cust_password    = $_POST['cust_password'];
$cust_email       = $_POST['cust_email'];
$cust_phone       = $_POST['cust_phone'];
$cust_address     = $_POST['cust_address'];

    $cust_email_query = " SELECT * FROM customers WHERE cust_email = '$cust_email' ";
    $cust_email_query_run = mysqli_query($conn, $cust_email_query);
    if (mysqli_num_rows($cust_email_query_run) > 0) {
        $repeated_email = "* Email already taken, please try another one!";
    } else {
        $query = "update customers set cust_name        = '$cust_name'     ,
                                       cust_password    = '$cust_password' ,
                                       cust_email       = '$cust_email'    ,
                                       cust_phone       = '$cust_phone'    ,
                                       cust_address     = '$cust_address'    
                where cust_id = {$_GET['id']}";

        mysqli_query($conn, $query);
        header("location:manage_customer.php");
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
                        <div class="card-header">Example Form</div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <!-- <label for="cc-payment" class="control-label mb-1">Customer Name </label> -->
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
                                <button id="payment-button" type="submit" class="btn btn-lg bg-success btn-block text-white" name="submit_edit_customer">

                                    <span id="payment-button-amount">Create</span>
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