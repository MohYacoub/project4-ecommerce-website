<?php
session_start();

include_once 'partials/connection.php'; ?>

<?php 

if((isset($_SESSION['superadmin'])) || (isset($_SESSION['admin'])) ){
   
?>

<?php



// make the action when user click on Save Button
if (isset($_POST['submit_create_customer'])) {
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
        if (mysqli_num_rows($cust_email_query_run) > 0) {
            $repeated_email = "* E-mail already taken, please try another one!";
        } else {
            $query = "INSERT INTO customers (cust_name, cust_password , cust_email , cust_phone , cust_address  , cust_image )
              values('$cust_name','$cust_password' , '$cust_email' , '$cust_phone' , '$cust_address'  , '$cust_image')";
            mysqli_query($conn, $query);
            $_SESSION['created_customer'] = "The Customer added successfully "; 
            // header("location: manage_customer.php"); // if the rows of table repeated it self use this statement
        }
    } else {
        $_SESSION['empty_fields'] = 'Please enter all of fields ';
        // temprorary antil i have some time to be more spacific 
    }
}

?>
<?php
 include_once 'partials/header_admin.php';
 ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center"><strong>Create New Customer</strong></div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="" enctype="multipart/form-data">
                                <?php
                                if (isset($_SESSION['empty_fields']) && ($_SESSION['empty_fields'] != "")) {
                                    echo '<div class="text-center alert alert-danger">';
                                    echo ($_SESSION['empty_fields']);
                                    echo '</div>';
                                    unset($_SESSION['empty_fields']);
                                }
                                if (isset($_SESSION['created_customer']) && ($_SESSION['created_customer'] != "")) {
                                    echo '<div class="text-center alert alert-success">';
                                    echo ($_SESSION['created_customer']);
                                    echo '</div>';
                                    unset($_SESSION['created_customer']);
                                }
                                if (isset($_SESSION['deleted_customer']) && ($_SESSION['deleted_customer'] != "")) {
                                    echo '<div class=" text-center alert alert-danger">';
                                    echo ($_SESSION['deleted_customer']);
                                    echo '</div>';
                                    unset($_SESSION['deleted_customer']);
                                }
                                if (isset($_SESSION['edited_customer']) && ($_SESSION['edited_customer'] != "")) {
                                    echo '<div class=" text-center alert alert-warning">';
                                    echo ($_SESSION['edited_customer']);
                                    echo '</div>';
                                    unset($_SESSION['edited_customer']);
                                }

                                ?>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <!-- <label for="cc-payment" class="control-label mb-1">Customer Name </label> -->
                                        <input type="text" id="username" name="cust_name" placeholder="Username" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="cust_email" placeholder="Email" class="form-control">
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
                                        <input type="phone" id="phone" name="cust_phone" placeholder="Phone Number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                        <input type="text" id="Address" name="cust_address" placeholder="Address" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="cust_password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Upload your photo <small style="color: red;"> *optional</small> </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="file" id="file-input" name="cust_image" class="form-control-file" value="admin_image">
                                    </div>

                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg bg-success btn-block text-white" name="submit_create_customer">

                                    <span id="payment-button-amount">Create</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row m-t-30">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <div class="card-header text-center bg-light"><strong>Customers Table</strong></div>
                    <table id="bootstrap-data-table" class="table bg-white table-bordered">
                        <thead class="bg-info text-white">
                            <tr>
                                <th> ID</th>
                                <!-- <th>Created at</th> -->
                                <!-- <th>Updated at</th> -->
                                <th> Name</th>
                                <th> Email</th>
                                <th> Password</th>
                                <th> Phone</th>
                                <th> Address</th>
                                <th> Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query  = "select * from customers";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['cust_id']}</td>";
                                // echo "<td>{$row['created_at']}</td>";
                                // echo "<td>{$row['updated_at']}</td>";
                                echo "<td>{$row['cust_name']}</td>";
                                echo "<td>{$row['cust_email']}</td>";
                                echo "<td>{$row['cust_password']}</td>";
                                echo "<td>{$row['cust_phone']}</td>";
                                echo "<td>{$row['cust_address']}</td>";
                                echo "<td><img src='{$row['cust_image']}'></td>";
                                echo "<td><a href='edit_customer.php?id={$row['cust_id']}' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='delete_customer.php?id={$row['cust_id']}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
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