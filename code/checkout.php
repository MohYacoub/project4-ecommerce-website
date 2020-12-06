
<?php
session_start();

include('partails/public_head.php');
include('admin/partials/connection.php');
?> 

<?php

if(isset($_SESSION['user'])){
    
    $total = $_SESSION['total'];
 
$name = $_SESSION['user'];
$id = $_SESSION['cust_id'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];
$email = $_SESSION['email'];

if(isset($_POST['pay'])){
    

    $username1 = $_POST['username'];
    $email1 = $_POST['email'];
    $phone1 = $_POST['phone'];
    $address1 = $_POST['address'];
    $country1 = $_POST['country'];
    $postal1 = $_POST['postal_code'];

    $query1 = "INSERT INTO orders(cust_id,order_address,order_country,postal_code,order_total) VALUES ({$id},'$address1','$country1','$postal1',$total)";
    $result1 = mysqli_query($conn,$query1);

    
    $query2 = "SELECT * FROM orders order by order_id DESC LIMIT 1";
    $result2 = mysqli_query($conn,$query2);
    $row_order = mysqli_fetch_assoc($result2);
    $order_idf = $row_order['order_id'];
    $_SESSION['order_id'] = $order_idf;
    
    $_SESSION['thankyou'] = 'Thank you';
header('location:after_checkout.php');
} 
}


else {

    header('location: login2.php');
    
}
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
                            <a href="index.php">Home</a>
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
        <form method="post" action="">
        <div class="checkout-wrapp">
        
            <div class="shipping-address-form-wrapp">
                <div class="shipping-address-form  checkout-form">
                    <div class="row-col-1 row-col">
                        <div class="shipping-address">
                            <h3 class="title-form">
                                Shipping Address
                            </h3>
                            <p class="form-row form-row">
                                <label class="text">Username</label>
                                <input value="<?php echo $name?>" title="first" type="text" class="input-text" name="username">
                            </p>
                            
                            <p class="form-row form-row">
                                <label class="text">Email</label>
                                <input value="<?php echo $email?>" title="first" type="text" class="input-text" name="email">
                            </p>
                            <p class="form-row form-row-first">
                                <label class="text">Your Phone</label>
                                <input value="<?php echo $phone?>" title="address" type="text" name="phone" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label class="text">Address</label>
                                <input value="<?php echo $address?>" title="address" type="text" class="input-text" name="address">
                            </p>
                            <p class="form-row forn-row-col forn-row-col-1">
                                <label class="text">Country</label>
                                <select title="country" data-placeholder="United Kingdom" class="chosen-select" name="country" tabindex="1">
                                    <option value="Jordan">Jordan</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="Algeria">Lebanon</option>
                                    <option value="American Samoa">UAE</option>
                                    <option value="Andorra">kuwait</option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    </select>
                            </p>
                            <p class="form-row form-row-last">
                                <label class="text">Postal code</label>
                                <input title="zip" type="text" class="input-text" name="postal_code">
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
                                         <span class="count">
                                          <?php
                                            if(isset($_SESSION['qtyarr'])){
                                              echo "(x{$_SESSION['qtyarr'][$key]})";     
                                                    }  
                                                    else {
                                                        echo '(x1)';
                                                    }
                                                    ?>
                                                    </span>
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
                                    <?php
                                   echo "$ $total" ;
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment-method-wrapp">
                <div class="button-control">
                
                    <a href="cart.php" class="button btn-back-to-shipping">Back to cart</a>
                    <a href="after_checkout.php"><button class="button btn-pay-now" name="pay">
                    Order now
                                </button></a>
                    <!-- <a href="after_checkout.php" class="button btn-pay-now">Pay now</a> -->
                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<?php

include('partails/public_footer.php');

?>


