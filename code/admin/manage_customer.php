<?php include_once 'partials/connection.php'; ?>
<?php

// make the action when user click on Save Button
if (isset($_POST['submit_create_customer'])) {

    // Take Data From Web Form 
    $cust_name    = $_POST['cust_name'];
    $cust_password    = $_POST['cust_password'];
    $cust_email    = $_POST['cust_email'];
    $cust_phone    = $_POST['cust_phone'];
    $cust_address    = $_POST['cust_address'];


    $cust_email_query = " SELECT * FROM customers WHERE cust_email = '$cust_email' ";
    $cust_email_query_run = mysqli_query($conn, $cust_email_query);
    if (mysqli_num_rows($cust_email_query_run) > 0) {
        $repeated_email = "* E-mail already taken, please try another one!";
    } else {
        $query = "INSERT INTO customers (cust_name, cust_password , cust_email , cust_phone , cust_address   )
              values('$cust_name','$cust_password' , '$cust_email' , '$cust_phone' , '$cust_address' )";
        mysqli_query($conn, $query);
        header("location: manage_customer.php");
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
                    <div class="card-header text-center"><strong>Create Customer</strong></div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">
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
                                <th>Customer ID</th>
                                <th>Created at</th>
                                <!-- <th>Updated at</th> -->
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Password</th>
                                <th>Customer Phone</th>
                                <th>Customer Address</th>
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
                                echo "<td>{$row['created_at']}</td>";
                                // echo "<td>{$row['updated_at']}</td>";
                                echo "<td>{$row['cust_name']}</td>";
                                echo "<td>{$row['cust_email']}</td>";
                                echo "<td>{$row['cust_password']}</td>";
                                echo "<td>{$row['cust_phone']}</td>";
                                echo "<td>{$row['cust_address']}</td>";
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