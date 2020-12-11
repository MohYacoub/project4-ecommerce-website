<?php
session_start();
include('admin/partials/connection.php');

if (isset($_GET['cartid'])) {


    $cart_query = "SELECT * FROM products WHERE pro_id ={$_GET['cartid']}";
    $cart_result = mysqli_query($conn, $cart_query);
    $cart_row = mysqli_fetch_assoc($cart_result);
    $new_item = array(
        "product_id" => $cart_row['pro_id'],
        "product_image" => $cart_row['pro_image'],
        "product_name" =>  $cart_row['pro_name'],
        "product_price" => $cart_row['pro_price'],
        "special_price" => $cart_row['special_price']
    );

    if (!isset($_SESSION["cart"])) {
        $cart_items = array();
        $_SESSION["cart"] = $cart_items;
    }
    array_push($_SESSION["cart"], $new_item);
    $url = $_SESSION['page'];
    header("Location: $url");
}

include('partails/public_head.php');
include('partails/public_header.php');
?>

<div class="main-content main-content-product left-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Grid Products
                        </li>

                        <?PHP

                        if (isset($_GET['catid'])) {
                            $cat_query = "SELECT * FROM categories WHERE cat_id={$_GET['catid']}";
                            $cat_result = mysqli_query($conn, $cat_query);
                            $cat_row = mysqli_fetch_assoc($cat_result);


                            echo "<li class='trail-item trail-end active'>";
                            echo "{$cat_row['cat_name']}";
                            echo "</li>";
                        }
                        if (isset($_GET['yrsid'])) {

                            echo "<li class='trail-item trail-end active'>";

                            $calc1 = $_GET['yrsid'];
                            $calc2 = $calc1 - 0.5;
                            $calc3 = $calc1 + 0.5;


                            echo "{$calc2}-{$calc3} yrs Products";
                            echo "</li>";
                        }
                        ?>



                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area shop-grid-content no-banner col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="site-main">

                    <?PHP

                    if (isset($_GET['catid'])) {
                        $cat_query2 = "SELECT * FROM categories WHERE cat_id={$_GET['catid']}";
                        $cat_result2 = mysqli_query($conn, $cat_query2);
                        $cat_row2 = mysqli_fetch_assoc($cat_result2);

                        echo " <h3 class='custom_blog_title'>{$cat_row['cat_name']}</h3>";
                    } elseif (isset($_GET['yrsid'])) {

                        $calc1 = $_GET['yrsid'];
                        $calc2 = $calc1 - 0.5;
                        $calc3 = $calc1 + 0.5;


                        echo " <h3 class='custom_blog_title'>{$calc2}-{$calc3} yrs Products</h3>";
                    } else {
                        echo " <h3 class='custom_blog_title'>All Products</h3>";
                    }
                    ?>
                    <div class="shop-top-control">
                        <!-- <form class="select-item select-form">
                            <span class="title">Sort</span>
                            <select title="sort" data-placeholder="12 Products/Page" class="chosen-select">
                                <option value="1">12 Products/Page</option>
                                <option value="2">9 Products/Page</option>
                                <option value="3">10 Products/Page</option>
                                <option value="4">8 Products/Page</option>
                                <option value="5">6 Products/Page</option>
                            </select>
                        </form> -->
                        <!-- <form class="filter-choice select-form">
                            <span class="title">Sort by</span>
                            <select title="sort-by" data-placeholder="Price: Low to High" class="chosen-select">
                                <option value="1">Price: Low to High</option>
                                <option value="2">Sort by popularity</option>
                                <option value="3">Sort by average rating</option>
                                <option value="4">Sort by newness</option>
                                <option value="5">Sort by price: low to high</option>
                            </select>
                        </form> -->

                    </div>
                    <ul class="row list-products auto-clear equal-container product-grid">
                        <!-- product for best seller start here -->

                        <?php
                        if (isset($_GET['catid'])) {
                            $query = "SELECT * FROM products WHERE cat_id ={$_GET['catid']}";
                        } elseif (isset($_GET['yrsid'])) {
                            $query = "SELECT * FROM products WHERE pro_filter ={$_GET['yrsid']}";
                        } else {
                            $query = "SELECT * FROM products";
                        }

                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) { ?>

                            <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                <div class="product-inner equal-element">
                                    <div class="product-top">
                                    </div>
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                            <a href="<?php echo "productdetails.php?proid={$row['pro_id']}" ?>">
                                                <img src="admin/<?php echo $row['pro_image']; ?>" alt="img">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="<?php echo "productdetails.php?proid={$row['pro_id']}" ?>"><?php echo $row['pro_name'] ?></a>
                                        </h5>
                                        <div class="group-info">
                                            <div class="price">
                                                <del>
                                                    $ <?php echo $row['pro_price'] ?>
                                                </del>
                                                <ins>
                                                    $ <?php echo $row['special_price'] ?>
                                                </ins>
                                            </div>
                                            <div class="button">
                                                <a href="<?php echo "grid_products.php?catid={$row['cat_id']}&cartid={$row['pro_id']}" ?> " class="add_to_cart_button"><i class="fa fa-cart-plus"></i> ADD TO CART </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        <?php } ?> </ul>
                </div>
            </div>




            <div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="wrapper-sidebar shop-sidebar">
                    <div class="widget woof_Widget">
                        <div class="widget widget-categories">
                            <h3 class="widgettitle">Categories</h3>
                            <ul class="list-categories">

                                <?php
                                $queryallcatgrid = "SELECT * FROM categories ";
                                $resultallcatgrid = mysqli_query($conn, $queryallcatgrid);
                                while ($cat_allgrid = mysqli_fetch_assoc($resultallcatgrid)) {
                                ?>
                                    <li>

                                        <a href="<?php echo "grid_products.php?catid={$cat_allgrid['cat_id']}" ?>">
                                            <i class="fa fa-angle-double-right"></i>
                                            <?php echo "{$cat_allgrid['cat_name']}"; ?>

                                        </a>


                                    </li>
                                <?php } ?>
                            </ul>
                        </div>



                        <div class="widget widget-categories">
                            <h3 class="widgettitle">Products By Years</h3>
                            <ul class="list-categories">
                                <li>
                                    <a href="grid_products.php?yrsid=1.5">
                                        <i class="fa fa-angle-double-right"></i>
                                        1-2 years 
                                    </a>
                                </li>
                                <li>
                                    <a href="grid_products.php?yrsid=2.5">
                                        <i class="fa fa-angle-double-right"></i>
                                        2-3 years 
                                    </a>
                                </li>
                                <li>
                                    <a href="grid_products.php?yrsid=3.5">
                                        <i class="fa fa-angle-double-right"></i>
                                        3-4 years 
                                    </a>
                                </li>
                                <li>
                                    <a href="grid_products.php?yrsid=4.5">
                                        <i class="fa fa-angle-double-right"></i>
                                        4-5 years 
                                    </a>
                                </li>
                                <li>
                                    <a href="grid_products.php?yrsid=5.5">
                                        <i class="fa fa-angle-double-right"></i>
                                        5-6 years 
                                    </a>
                                </li>
                                <li>
                                    <a href="grid_products.php?yrsid=6.5">
                                        <i class="fa fa-angle-double-right"></i>
                                        6-7 years 
                                    </a>
                                </li>
                                <li>
                                    <a href="grid_products.php?yrsid=7.5">
                                        <i class="fa fa-angle-double-right"></i>
                                        7-8 years 
                                    </a>
                                </li>

                            </ul>
                        </div>


                        <div class="widget widget-tags">
                            <h3 class="widgettitle">
                                Popular Tags
                            </h3>
                            <ul class="tagcloud">
                                <li class="tag-cloud-link">
                                    <a href="search.php?search=Arabic">Arabic</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="search.php?search=wooden">wooden</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="search.php?search=Cylinder">Cylinder</a>
                                </li>
                                <li class="tag-cloud-link active">
                                    <a href="search.php?search=Color">Color</a>
                                </li>
                                <li class="tag-cloud-link">
                                    <a href="search.php?search=alphabet">alphabet</a>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

include('partails/public_footer.php');

?>