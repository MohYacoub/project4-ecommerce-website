<?php
session_start();

include_once 'partials/connection.php';
?>

<?php 

if(!isset($_SESSION['superadmin'])){
    header('location:../index.php');
}

?>

<?php
if (isset($_POST['submit_create_admin'])) {
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
            $admin_image = 'images/admin_images/noimage.jpg';
        }

        $email_query = " SELECT * FROM admins WHERE admin_email = '$admin_email' ";
        $email_query_run = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_query_run) > 0) {
            $repeated_email = "* Email already taken, please try another one!";
        } else {
            $query = "INSERT INTO admins (admin_name,admin_password,admin_email, admin_image)
        values('$admin_name','$admin_password','$admin_email', '$admin_image' )";
            mysqli_query($conn, $query);
            $_SESSION['created_admin'] = "The Admin added successfully "; 
            // header("location: manage_admin.php"); // if the rows of table repeated it self use this statement
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

                    <div class="card-header text-center"><strong>Create New Admin</strong></div>
                    <div class="card-body card-block">
                        <form action="" method="post" class="" enctype="multipart/form-data">

                            <?php
                            if (isset($_SESSION['empty_fields']) && ($_SESSION['empty_fields'] != "")) {
                                echo '<div class="text-center alert alert-danger">';
                                echo ($_SESSION['empty_fields']);
                                echo '</div>';
                                unset($_SESSION['empty_fields']);
                            }
                            if (isset($_SESSION['created_admin']) && ($_SESSION['created_admin'] != "")) {
                                echo '<div class="text-center alert alert-success">';
                                echo ($_SESSION['created_admin']);
                                echo '</div>';
                                unset($_SESSION['created_admin']);
                            }
                            if (isset($_SESSION['deleted_admin']) && ($_SESSION['deleted_admin'] != "")) {
                                echo '<div class=" text-center alert alert-danger">';
                                echo ($_SESSION['deleted_admin']);
                                echo '</div>';
                                unset($_SESSION['deleted_admin']);
                            }
                            if (isset($_SESSION['edited_admin']) && ($_SESSION['edited_admin'] != "")) {
                                echo '<div class=" text-center alert alert-warning">';
                                echo ($_SESSION['edited_admin']);
                                echo '</div>';
                                unset($_SESSION['edited_admin']);
                            }

                            ?>

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
                                </div>
                                <small style="color: red;">
                                    <?php
                                    if (isset($repeated_email) && ($repeated_email != "")) {
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
                                    <input type="password" id="adminpassword" name="admin_password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">Upload your photo <small style="color: red;"> *optional</small> </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="file" id="file-input" name="admin_image" class="form-control-file" value="admin_image">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <!-- <th>Password</th> -->
                                        <th>Image</th>
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
                                        // echo "<td>{$row['admin_password']}</td>";
                                        echo "<td><img src='{$row['admin_image']}'></td>";
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