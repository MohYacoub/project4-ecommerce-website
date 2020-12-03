<?php include_once 'partials/connection.php'; ?>

<?php
if (isset($_POST['submit'])) {
    // get image data
    $image_name = $_FILES['image']['name'];
    $tmp_name   = $_FILES['image']['tmp_name'];
    $path       = 'images/product_images/';
    $pro_image = $path . $image_name;
    // move image to folder
    move_uploaded_file($tmp_name, $pro_image);

    $pro_name           = $_POST['product'];
    $pro_desc           = $_POST['description'];
    $pro_tags           = $_POST['tags'];
    $pro_price          = $_POST['price'];
    $pro_special_price  = $_POST['special_price'];
    $cat_id             = $_POST['category'];


    $pro_name_query = " SELECT * FROM products WHERE pro_name = '$pro_name' ";
    $pro_name_query_run = mysqli_query($conn, $pro_name_query);
    if (mysqli_num_rows($pro_name_query_run) > 0) {
        $repeated_name = "* Product name already taken, please try another one!";
    } else {
        $query = "INSERT INTO products(pro_name,pro_description,pro_image,pro_price,special_price,pro_tags,cat_id) 
              VALUES ('$pro_name','$pro_desc','$pro_image','$pro_price','$pro_special_price','$pro_tags','$cat_id')";

        $result = mysqli_query($conn, $query);
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
                        <div class="card-header text-center">
                            <strong>Adding a product</strong>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Product Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="product" placeholder="Product Name" class="form-control">
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

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="description" id="textarea-input" rows="9" placeholder="Description..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Product Tags</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="tags" placeholder="Product Tags" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Price</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="price" placeholder="Product price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Speacial Price</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="special_price" placeholder="Speacial price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-multiple-input" class=" form-control-label">Upload Product Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" name="image" multiple="" class="form-control-file">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Category</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="category" id="select" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <button id="CreateCategory" type="submit" name="submit" class="btn btn-lg btn-success btn-block" name="submit">
                                                <span id="payment-button-amount">Create</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <div class="card-header text-center bg-light"><strong>Products Table</strong></div>
                                <table class="table table-borderless table-data3">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>ID</th>
                                            <!-- <th>Created at</th> -->
                                            <!-- <th>Updated at</th> -->
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Speacial Price</th>
                                            <th>Tags</th>
                                            <th>Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query  = "SELECT * FROM products";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>{$row['pro_id']}</td>";
                                            // echo "<td>{$row['created_at']}</td>";
                                            // echo "<td>{$row['updated_at']}</td>";
                                            echo "<td>{$row['pro_name']}</td>";
                                            echo "<td>{$row['pro_description']}</td>";
                                            echo "<td><img src='{$row['pro_image']}'></td>";
                                            echo "<td>{$row['pro_price']}</td>";
                                            echo "<td>{$row['special_price']}</td>";
                                            echo "<td>{$row['pro_tags']}</td>";
                                            echo "<td>{$row['cat_id']}</td>";
                                            echo "<td><a href='edit_product.php?id={$row['pro_id']}' class='btn btn-primary'>Edit</a></td>";
                                            echo "<td><a href='delete_product.php?id={$row['pro_id']}' class='btn btn-danger'>Delete</a></td>";
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
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <?php
        include_once 'partials/footer_admin.php';
        ?>