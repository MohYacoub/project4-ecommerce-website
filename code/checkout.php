
<?php
include('partails/public_head.php');
include('partails/public_header.php');

?> 

<?php

if(isset($_SESSION['user'])){
$total = 50;
$name = $_SESSION['user'];
$id = $_SESSION['cust_id'];
$phone = $_SESSION['phone'] ;
$address = $_SESSION['address'] ;

$query = "INSERT INTO orders(cust_id,order_address,order_total) VALUES ({$id},'$address',$total)";
$result = mysqli_query($conn,$query);

$query2 = "SELECT order_id FROM orders order by DESC LIMIT 1";
$result2 = mysqli_query($conn,$query2);
$row = mysqli_fetch_assoc($result2);
$orderid = $row['order_id'];


foreach($_SESSION['cart'] as $key => $value){

    $pro_id = $value['pro_id'];
    $qty = $value['qty'];

    $query3 = "INSERT INTO order_details(order_id,pro_id,qty) VALUES ($orderid,$pro_id,$qty)";
    $result3 = mysqli_query($conn,$query3);
}


echo $name . $id . $phone . $address;
} 
else {

    header('location: login2.php');
    
}
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
        <h3 class="custom_blog_title">
            Checkout
        </h3>
        <div class="checkout-wrapp">
            <div class="shipping-address-form-wrapp">
                <div class="shipping-address-form  checkout-form">
                    <div class="row-col-1 row-col">
                        <div class="shipping-address">
                            <h3 class="title-form">
                                Shipping Address
                            </h3>
                            <p class="form-row form-row-first">
                                <label class="text">First name</label>
                                <input title="first" type="text" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label class="text">Last name</label>
                                <input title="last" type="text" class="input-text">
                            </p>
                          
                            <p class="form-row form-row-first">
                                <label class="text">Your Phone</label>
                                <input title="address" type="text" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label class="text">Address</label>
                                <input title="address" type="text" class="input-text">
                            </p>
                        </div>
                        <div class="shipping-address">
                            <h3 class="title-form">
                                Payment Method
                            </h3>
                            <p class="form-row ">
                                <p style="color: black;"> Cash on Delivary only available. <small style="color: #EA624C;">* additional service fee will be added to your order total. </small></p>

                            </p>
                        </div>
                    </div>
                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                Your Order
                            </h3>
                            <ul class="list-product-order">


                                <?php


$cartarr = $_SESSION["cart"];
foreach($cartarr as $key => $value){
    ?>

                                <li class="product-item-order">
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="<?php echo"admin/{$value['product_image']}"?>" alt="img">
                                        </a>
                                    </div>
                                    <div class="product-order-inner">
                                        <h5 class="product-name">
                                            <a href="#"><?php echo"{$value['product_name']}"?></a>
                                        </h5>
                                        <div class="price">

                                        <?php 
                                        $val1 = $value['product_price'];
                                        $val2 = $value['special_price'];

                                        if(($val1 - $val2) < $val1 ){
                                           echo"{$value['special_price']}" ;
                                        }else{
                                            echo"{$value['product_price']}" ;
                                        }
                                        ?>
                                         <span class="count">x1</span>
                                        <?php } ?>
                                           
                                        </div>
                                    </div>
                                </li>
                              
                            </ul>
                            <div class="order-total">
                                <span class="title">
                                    Total Price:
                                </span>
                                <span class="total-price">
                                    $95
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment-method-wrapp">
                <div class="button-control">
                    <a href="#" class="button btn-back-to-shipping">Back to shipping</a>
                    <a href="#" class="button btn-pay-now">Pay now</a>
                </div>
            </div>

        </div>
    </div>
</div>


<?php

include('partails/public_footer.php');

?>