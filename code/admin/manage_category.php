<?php
session_start();

include_once 'partials/connection.php'; ?>


<?php 

if((isset($_SESSION['superadmin'])) || (isset($_SESSION['admin'])) ){
   
?>
<?php
// make the action when user click on Save Button
if (isset($_POST['submit_create_category'])) {

    if ((!empty($_POST['cat_name'])) && (!empty($_FILES['cat_image']['name']))) {

        // get image data
        $image_name = $_FILES['cat_image']['name'];
        $tmp_name   = $_FILES['cat_image']['tmp_name'];
        $path       = 'images/cat_images/';


        // move image to folder
        move_uploaded_file($tmp_name, $path . $image_name);


        // Take Data From Web Form 
        $cat_name    = $_POST['cat_name'];
        $cat_name    = mysqli_real_escape_string($conn , $cat_name) ; 


        $name_query = " SELECT * FROM categories WHERE cat_name = '$cat_name' ";
        $name_query_run = mysqli_query($conn, $name_query);
        if (mysqli_num_rows($name_query_run) > 0) {
            $repeated_name = "* Category name already taken, please try another one!";
        } else {
            $query = "INSERT INTO categories (cat_name, cat_image )
              values('$cat_name','$path$image_name')";
            mysqli_query($conn, $query);
            $_SESSION['created_category'] = "The Category added successfully "; 
            // header("location: manage_category.php"); // if the rows of table repeated it self use this statement
        }
    } else {
        $_SESSION['empty_fields'] = 'Please enter all of fields ';
        // temprorary antil i have some time to be more spacific 
    }
}
?>
<?php include_once 'partials/header_admin.php'; ?>
?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header text-center"><strong>Create New Category</strong></div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="">
                                <?php
                                if (isset($_SESSION['empty_fields']) && ($_SESSION['empty_fields'] != "")) {
                                    echo '<div class="text-center alert alert-danger">';
                                    echo ($_SESSION['empty_fields']);
                                    echo '</div>';
                                    unset($_SESSION['empty_fields']);
                                }
                                if (isset($_SESSION['created_category']) && ($_SESSION['created_category'] != "")) {
                                    echo '<div class="text-center alert alert-success">';
                                    echo ($_SESSION['created_category']);
                                    echo '</div>';
                                    unset($_SESSION['created_category']);
                                }
                                if (isset($_SESSION['deleted_category']) && ($_SESSION['deleted_category'] != "")) {
                                    echo '<div class=" text-center alert alert-danger">';
                                    echo ($_SESSION['deleted_category']);
                                    echo '</div>';
                                    unset($_SESSION['deleted_category']);
                                }
                                if (isset($_SESSION['edited_category']) && ($_SESSION['edited_category'] != "")) {
                                    echo '<div class=" text-center alert alert-warning">';
                                    echo ($_SESSION['edited_category']);
                                    echo '</div>';
                                    unset($_SESSION['edited_category']);
                                }

                                ?>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                        <input type="text" id="adminname" name="cat_name" placeholder="Category name" class="form-control" required>
                                        <small style="color: red;">
                                            <?php
                                            if (isset($repeated_name) && $repeated_name != "") {
                                                echo ($repeated_name);
                                                unset($repeated_name);
                                            }
                                            ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="file-input" class=" form-control-label">Upload Image</label>
                                        <input type="file" id="file-input" name="cat_image" class="form-control-file">
                                    </div>
                                </div>
                                <!-- <div class="form-actions form-group">
                                                <button type="submit" name="submit" class="btn btn-success btn-sm">Create Category</button>
                                            </div> -->
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" name="submit_create_category">
                                        <span id="payment-button-amount">Create</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <div class="card-header text-center bg-light"><strong>Categories Table</strong></div>
                <table class="table table-borderless table-data3">
                    <thead class="bg-info">
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query1  = "select * from categories";
                        $result1 = mysqli_query($conn, $query1);
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo "<tr>";
                            echo "<td>{$row['cat_id']}</td>";
                            echo "<td>{$row['cat_name']}</td>";
                            echo "<td><img src='{$row['cat_image']}' width='200' height='260'></td>";
                            echo "<td><a href='edit_category.php?id={$row['cat_id']}' class='btn btn-primary'>Edit</a></td>";
                            echo "<td><a href='delete_category.php?id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
    </div>
</div>
<!-- </div>
</div> -->

<?php
include_once 'partials/footer_admin.php';
?>


<?php
}else{
    header('location:../index.php');
}
?>