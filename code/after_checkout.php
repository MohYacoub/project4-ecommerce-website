<?php
session_start();
include('partails/public_head.php');
include('admin/partials/connection.php');

if(isset($_SESSION['thankyou'])){

    
    $cartarr = $_SESSION["cart"];
    foreach($cartarr as $key => $value){
    $order_id = $_SESSION['order_id'];
    $pro_id = $value['product_id'];
    $qtyres = $_SESSION['qtyarr'][$key];

    $query_details = "INSERT INTO order_details (order_id,pro_id,qty) VALUES ('$order_id','$pro_id','$qtyres')";

    $result_details = mysqli_query($conn,$query_details);
    }
    unset($_SESSION["cart"]);

    // $qty[] = $_SESSION['qtyarr'];
?> 
<?php
include('partails/public_header.php');
?>
<div class="main-content main-content-checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Checkout
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="end-checkout-wrapp">
            <div class="end-checkout checkout-form">
                <div class="icon">
                </div>
                <h3 class="title-checkend">
                    Congratulation! Your order has been processed.
                </h3>
                <div class="sub-title">
                    Aenean dui mi, tempus non volutpat eget, molestie a orci.
                    Nullam eget sem et eros laoreet rutrum.
                    Quisque sem ante, feugiat quis lorem in.
                </div>
                <a href="index.php" class="button btn-return">Return to Store</a>
            </div>
        </div>


    </div>
</div>


<?php

include('partails/public_footer.php');

?>
<?php
} 
else {
    header('location:index.php');
} ?>