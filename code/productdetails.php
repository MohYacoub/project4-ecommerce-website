<?php
session_start();
include('admin/partials/connection.php');
if (isset($_GET['cartid'])) {

    


    $cart_query = "SELECT * FROM products WHERE pro_id ={$_GET['proid']}";
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
?>
<?php
include('partails/public_head.php');
include('partails/public_header.php');

?>
<?php

$pro_query = "SELECT * FROM products WHERE pro_id ={$_GET['proid']}";
$pro_result = mysqli_query($conn, $pro_query);
$pro_row = mysqli_fetch_assoc($pro_result);
//search for category name
$cat_query = "SELECT * FROM categories WHERE cat_id ={$pro_row['cat_id']}";
$cat_result = mysqli_query($conn, $cat_query);
$cat_row = mysqli_fetch_assoc($cat_result);

?>
<div class="main-content main-content-details single no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="trail-item">
                            <a href="<?php echo "grid_products.php?catid={$cat_row['cat_id']}" ?>"> <?php echo "{$cat_row['cat_name']}" ?> </a>
                        </li>
                        <li class="trail-item trail-end active">
                            <?php echo "{$pro_row['pro_name']}" ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="details-product">
                        <div class="details-thumd">
                            <div class="image-preview-container image-thick-box image_preview_container">
                                <img data-zoom-image="<?php echo "admin/{$pro_row['pro_image']}" ?>" src="<?php echo "admin/{$pro_row['pro_image']}" ?>" alt="img">
                            </div>

                        </div>
                        <div class="details-infor">
                            <h1 class="product-title">
                                <?php echo "{$pro_row['pro_name']}" ?>
                            </h1>
                            <div class="availability">
                                availability:
                                <span>in Stock</span>
                            </div>
                            <div class="group-info">
                                <div class="price">
                                    <del style="color:red;">
                                    <?php echo "{$pro_row['pro_price']}" ?>
                                    </del>
                                    <ins style="color:#71c0ef; font-size:3rem;">
                                    <?php echo "{$pro_row['special_price']}" ?>
                                      
                                    </ins>
                                </div>
                            </div>
                            <div class="product-details-description">
                                <p><?php echo "{$pro_row['pro_description']}" ?></p>
                            </div>
                            <div class="group-button">

                                <div class="quantity-add-to-cart">
                                    <div class="button">
                                        <a href="<?php echo "productdetails.php?proid={$pro_row['pro_id']}&cartid={$pro_row['pro_id']}" ?>" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> ADD TO CART </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear: left;"></div>
                    <div class="related products product-grid">
                        <h2 class="product-grid-title">You may also like</h2>
                        <div class="owl-products owl-slick equal-container nav-center" data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                           


                                <?php

                                $rel_query = "SELECT * FROM products WHERE cat_id ={$pro_row['cat_id']}";
                                $rel_result = mysqli_query($conn, $rel_query);

                                while ($rel_row = mysqli_fetch_assoc($rel_result)) {


                                ?>
                                     <div class="product-item style-1">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        NEW
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="<?php echo "productdetails.php?proid={$rel_row['pro_id']}" ?>">
                                                    <img src="admin/<?php echo $rel_row['pro_image']; ?>" alt="img">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name product_title">
                                                <a href="<?php echo "productdetails.php?proid={$rel_row['pro_id']}" ?>"><?php echo $rel_row['pro_name'] ?></a>
                                            </h5>
                                            <div class="group-info">
                                                <div class="price">
                                                    <del style="color:#a8b4ae; font-size: 77% " >
                                                        <?php echo $rel_row['pro_price'] ?>
                                                    </del>
                                                    <ins style="color: #71c0ef  ">
                                                        <?php echo $rel_row['special_price'] ?>
                                                    </ins>
                                                </div>
                                                <div class="button">
                                                    <a href="<?php echo "productdetails.php?proid={$rel_row['pro_id']}&cartid={$rel_row['pro_id']}" ?> " class="add_to_cart_button"><i class="fa fa-cart-plus"></i> ADD TO CART </a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <?php } ?>
                       

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