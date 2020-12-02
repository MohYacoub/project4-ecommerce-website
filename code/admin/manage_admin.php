<?php include_once 'partials/connection.php'; ?>

<?php
if (isset($_POST['submit_create_admin'])) {
    // Take Data From Web Form 
    $admin_name     = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    $admin_email = $_POST['admin_email'];



    $email_query = " SELECT * FROM admins WHERE admin_email = '$admin_email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        $repeated_email = "* Email already taken, please try another one!";
    } else {
        $query = "INSERT INTO admins (admin_name,admin_password,admin_email)
    values('$admin_name','$admin_password','$admin_email')";
        mysqli_query($conn, $query);
        header("location: manage_admin.php");
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

                    <div class="card-header text-center"><strong>Create Admin</strong></div>
                    <div class="card-body card-block">
                        <form action="" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="adminname" name="admin_name" placeholder="Admin name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="adminemail" name="admin_email" placeholder="Email" class="form-control">
                                    <small style="color: red;">
                                        <?php
                                        if (isset($repeated_email) && $repeated_email != "") {
                                            echo ($repeated_email);
                                            unset($repeated_email);
                                        }
                                        ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                    <input type="password" id="adminpassword" name="admin_password" placeholder="Password" class="form-control">
                                </div>
                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" name="submit_create_admin">
                                    <span id="payment-button-amount">Create</span>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- <div class="col-lg-12"> -->

                <div class="row m-t-30">
                    <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <div class="card-header text-center bg-light"><strong>Admin Table</strong></div>
                                <table class="table table-borderless table-data3">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>ID</th>
                                            <th>Admin Name</th>
                                            <th>Admin Email</th>
                                            <th>Admin Password</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query  = "select * from admins";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>{$row['admin_id']}</td>";
                                            echo "<td>{$row['admin_name']}</td>";
                                            echo "<td>{$row['admin_email']}</td>";
                                            echo "<td>{$row['admin_password']}</td>";
                                            echo "<td><a href='edit_admin.php?id={$row['admin_id']}' class='btn btn-primary'>Edit</a></td>";
                                            echo "<td><a href='delete_admin.php?id={$row['admin_id']}' class='btn btn-danger'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE-->
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
            </div>
        </div>
    </div>
</div>

<?php
include_once 'partials/footer_admin.php';
?>