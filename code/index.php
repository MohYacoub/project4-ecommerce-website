<?php
session_start();
include('admin/partials/connection.php');

?>


<!-- start coding for cart  -->
<?php

if(isset($_GET['cartid'])){

 $cart_query="SELECT * FROM products WHERE pro_id ={$_GET['cartid']}";   
 $cart_result=mysqli_query($conn, $cart_query);
 $cart_row=mysqli_fetch_assoc($cart_result);

 $new_item = array(
    "product_id" => $cart_row['pro_id'],
    "product_image" => $cart_row['pro_image'],
    "product_name"  => $cart_row['pro_name'],
    "product_price" => $cart_row['pro_price'],
    "special_price" => $cart_row['special_price']
);

if(!isset($_SESSION["cart"])){
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


<div class="main-content">
    <div class="fullwidth-template">

        <div class="home-slider fullwidth rows-space-60">
            <div class="slider-owl owl-slick equal-container nav-center equal-container" data-slick='{"autoplay":true, "autoplaySpeed":10000, "arrows":true, "dots":true, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                <div class="slider-item style4">
                    <div class="slider-inner equal-element">
                        <div class="container">
                            <div class="slider-infor">
                                <h1 style="color:#ed71a3" class="title-big">
                                children 
                                </h1>
                                <h5 class="title-big">
                                are our real investment
                                </h5>
                                <!-- <div class="price">
                                    New Price:
                                    <span class="number-price">
                                        $25.00
                                    </span>
                                </div> -->
                                <a href="grid_products.php" class="button btn-shop-the-look bgroud-style">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item style5">
                    <div class="slider-inner equal-element">
                        <div class="container">
                            <div class="slider-infor">
                                <h5 class="title-small">
                                    Sale Up To 50%
                                </h5>
                                <h3 class="title-big">
                                Look Inside a 
                                <br />
                                Montessori Category
                                </h3>
                                <div class="when-code">
                                    When Use Code:
                                    <span class="number-code">
                                        TOYZEE2020
                                    </span>
                                </div>
                                <a href="grid_products.php?catid=13" class="button btn-view-promotion bgroud-style">VIEW ALL</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item style6">
                    <div class="slider-inner equal-element">
                        <div class="container">
                            <div class="slider-infor">
                                <h5 class="title-small">
                                    Learn and fun!
                                </h5>
                                <h3 class="title-big">
                                    Let’s play<br />
                                    some awesome games
                                </h3>
                                <div class="price">
                                    start shop NOW!
                                   
                                </div>
                                <a href="#" class="button btn-lets-create bgroud-style">Let’s play</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- category section start here -->
        <div class="banner-wrapp rows-space-35">
            <div class="container">
                <div class="row">

                    <h3 class="custommenu-title-blog">
                        Our Categories
                    </h3>

                    <?php

                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $query);


                    while ($cat_row = mysqli_fetch_assoc($result)) {

                    ?>
                        <!-- category show start here   -->
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="banner">
                                <div class="item-banner style12">
                                    <div class="inner">
                                        <div style="background-image:url('admin/<?php echo $cat_row['cat_image']; ?>'); background-repeat:no-repeat" class="banner-content">
                                            <h3 class="title"><?php echo $cat_row['cat_name']; ?></h3>
                                            <div class="description">
                                                Check out new <br /> collection!
                                            </div>
                                            <a href="<?php echo "grid_products.php?catid={$cat_row['cat_id']}" ?>" class="button btn-shop-now">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- category show start here   -->

                </div>
            </div>
        </div>
        <!-- category section end here -->

        <div class="moorabi-tabs  default rows-space-40">
            <div class="container">
                <div class="tab-head">
                    <ul class="tab-link">
                        <li class="active">
                            <a data-toggle="tab" aria-expanded="true" href="#bestseller">On Sale!</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" aria-expanded="true" href="#new_arrivals">New Arrivals</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-container">
                    <div id="bestseller" class="tab-panel active">
                        <div class="moorabi-product">
                            <ul class="row list-products auto-clear equal-container product-grid">


                                <!-- product for best seller start here -->

                                <?php
                                $query_pro = "SELECT * FROM products LIMIT 8 ";
                                $result_pro = mysqli_query($conn, $query_pro);
                                while ($pro_row = mysqli_fetch_assoc($result_pro)) {
                                    $price = $pro_row['pro_price'];
                                    $sprice = $pro_row['special_price'];
                                    if ($price > $sprice) {
                                ?>

                                        <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div class="product-inner equal-element">
                                                <div class="product-top">
                                                    <div class="flash">
                                                        <span class="onnew">
                                                            <span class="text">
                                                                SALE
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="<?php echo "productdetails.php?proid={$pro_row['pro_id']}" ?>">
                                                            <img src="admin/<?php echo $pro_row['pro_image']; ?>" alt="<?php echo $pro_row['pro_name']; ?>">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5 class="product-name product_title">
                                                        <a href="<?php echo "productdetails.php?proid={$pro_row['pro_id']}" ?>"><?php echo $pro_row['pro_name'] ?></a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div class="price">
                                                            <del>
                                                                <?php echo $pro_row['pro_price'] ?>
                                                            </del>
                                                            <ins>
                                                                <?php echo $pro_row['special_price'] ?>
                                                            </ins>
                                                        </div>
                                                        <div class="button">
                                                            <a href="<?php echo "index.php?cartid={$pro_row['pro_id']}" ?> " class="add_to_cart_button"><i class="fa fa-cart-plus"></i> ADD TO CART </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                <?php  }
                                }
                                ?>
                                <!-- product for best seller end here -->

                            </ul>
                        </div>
                    </div>
                    <div id="new_arrivals" class="tab-panel">
                        <div class="moorabi-product">
                            <ul class="row list-products auto-clear equal-container product-grid">

                                <!-- product for new_arrivals end here -->
                                <?php
                                $query_new = "SELECT * FROM (
                                    SELECT * FROM products ORDER BY pro_id DESC LIMIT 8
                                ) sub
                                ORDER BY pro_id ASC";
                                $result_new = mysqli_query($conn, $query_new);
                                while ($new_row = mysqli_fetch_assoc($result_new)) {
                                ?>

                                <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                        <a href="<?php echo "productdetails.php?proid={$new_row['pro_id']}" ?>">
                                                            <img src="admin/<?php echo $new_row['pro_image']; ?>" alt="<?php echo $pro_row['pro_name']; ?>">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h5 class="product-name product_title">
                                                        <a href="<?php echo "productdetails.php?proid={$new_row['pro_id']}" ?>"><?php echo $new_row['pro_name'] ?></a>
                                                    </h5>
                                                    <div class="group-info">
                                                        <div class="price">
                                                            <del>
                                                                <?php echo $new_row['pro_price'] ?>
                                                            </del>
                                                            <ins>
                                                                <?php echo $new_row['special_price'] ?>
                                                            </ins>
                                                        </div>
                                                        <div class="button">
                                                            <a href="<?php echo "index.php?cartid={$new_row['pro_id']}" ?> " class="add_to_cart_button"><i class="fa fa-cart-plus"></i> ADD TO CART </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>


                                <?php
                                }
                                ?>
                                <!-- product for new_arrivals end here -->

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="moorabi-iconbox-wrapp rows-space-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 moorabi-iconbox-wrapp-small">
                        <div class="moorabi-iconbox default">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-rocket-ship"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Free Delivery
                                    </h4>
                                    <div class="text">
                                        On order over $90.00
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 moorabi-iconbox-wrapp-small">
                        <div class="moorabi-iconbox default">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-return"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Money Guarantee
                                    </h4>
                                    <div class="text">
                                        30 Days money back!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 moorabi-iconbox-wrapp-small last-item">
                        <div class="moorabi-iconbox default">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-padlock"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">
                                        Online Support 24/7
                                    </h4>
                                    <div class="text">
                                        We’re Always here!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="moorabi-product layout1">
            <div class="container">
                <div class="container-wapper">
                    <div class="head">
                        <h3 class="title">SERCH BY YEARS</h3>
                        <div class="subtitle">Let’s Shop our Categories</div>
                    </div>
                    <div class="product-list-owl owl-slick equal-container nav-center-left" data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800,"infinite":false}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":1}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":1}}]'>
                        <div class="product-item style-1 product-type-variable">
                            <div class="product-inner equal-element">
                               
                                <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="#">
                                            <img src="assets/images/1.png" alt="img">
                                        </a>
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="product-item style-1">
                            <div class="product-inner equal-element">
                               
                            <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="#">
                                            <img src="assets/images/2.png" alt="img">
                                        </a>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="product-item style-1">
                            <div class="product-inner equal-element">
                               
                            <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="#">
                                            <img src="assets/images/1.png" alt="img">
                                        </a>
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="product-item style-1 product-type-variable">
                            <div class="product-inner equal-element">
                               
                            <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="#">
                                            <img src="assets/images/2.png" alt="img">
                                        </a>
                                       
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="product-item style-1 product-type-variable">
                            <div class="product-inner equal-element">
                               
                            <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="#">
                                            <img src="assets/images/1.png" alt="img">
                                        </a>
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="product-item style-1 product-type-variable">
                             <div class="product-inner equal-element">
                              
                            <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="#">
                                            <img src="assets/images/2.png" alt="img">
                                        </a>
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="moorabi-blog-wraap default">
            <div class="container">
                <h3 class="custommenu-title-blog">
                    Our Latest News
                </h3>
                <div class="moorabi-blog style2">
                    <div class="owl-slick equal-container nav-center" data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":2}},{"breakpoint":"1200","settings":{"slidesToShow":1}},{"breakpoint":"992","settings":{"slidesToShow":1}},{"breakpoint":"768","settings":{"slidesToShow":1}},{"breakpoint":"481","settings":{"slidesToShow":1}}]'>
                        <div class="moorabi-blog-item equal-element style2">
                            <div class="moorabi-blog-inner">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="assets/images/slider-blog-thumb-5.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <div class="post-top">
                                        <a href="#">Backpack</a>
                                        <div class="post-item-share">
                                            <a href="#" class="icon">
                                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                            </a>
                                            <div class="box-content">
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-date">
                                        January 08, 09:14 am
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">Please join us as we evolve and disrupt the industry together</a>
                                    </h2>
                                    <div class="blog-meta">
                                        <div class="blog-meta-wrapp">
                                            <span class="author">
                                                <img src="assets/images/avt-blog1.png" alt="img">
                                                Adam Smith
                                            </span>
                                            <span class="view">
                                                <i class="icon fa fa-eye" aria-hidden="true"></i>
                                                631
                                            </span>
                                            <span class="comment">
                                                <i class="icon fa fa-commenting" aria-hidden="true"></i>
                                                84
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="moorabi-blog-item equal-element style2">
                            <div class="moorabi-blog-inner">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="assets/images/slider-blog-thumb-6.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <div class="post-top">
                                        <a href="#">New Arrivals</a>
                                        <div class="post-item-share">
                                            <a href="#" class="icon">
                                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                            </a>
                                            <div class="box-content">
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-date">
                                        January 08, 09:14 am
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">Rosa was easy to deal, arrived quickly and very happy</a>
                                    </h2>
                                    <div class="blog-meta">
                                        <div class="blog-meta-wrapp">
                                            <span class="author">
                                                <img src="assets/images/avt-blog1.png" alt="img">
                                                Adam Smith
                                            </span>
                                            <span class="view">
                                                <i class="icon fa fa-eye" aria-hidden="true"></i>
                                                631
                                            </span>
                                            <span class="comment">
                                                <i class="icon fa fa-commenting" aria-hidden="true"></i>
                                                84
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="moorabi-blog-item equal-element style2">
                            <div class="moorabi-blog-inner">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="assets/images/slider-blog-thumb-7.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <div class="post-top">
                                        <a href="#">New Arrivals</a>
                                        <div class="post-item-share">
                                            <a href="#" class="icon">
                                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                            </a>
                                            <div class="box-content">
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-date">
                                        January 08, 09:14 am
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">How to Build Your Perfect Toys</a>
                                    </h2>
                                    <div class="blog-meta">
                                        <div class="blog-meta-wrapp">
                                            <span class="author">
                                                <img src="assets/images/avt-blog1.png" alt="img">
                                                Adam Smith
                                            </span>
                                            <span class="view">
                                                <i class="icon fa fa-eye" aria-hidden="true"></i>
                                                631
                                            </span>
                                            <span class="comment">
                                                <i class="icon fa fa-commenting" aria-hidden="true"></i>
                                                84
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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