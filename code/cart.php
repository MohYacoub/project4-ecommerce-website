<?php
session_start();

include('admin/partials/connection.php');

?>
<?php
include('partails/public_head.php');
include('partails/public_header.php');

?>

                                      
                                      
                                      
<?php


if(isset($_SESSION["cart"])){
    $cartarr3 = $_SESSION["cart"];
    foreach($cartarr3 as $key => $value){

     
     $valprice12 = $value['product_price'];
     $valprice22 = $value['special_price'];
 
     if(($valprice12 - $valprice22) < $valprice12 ){
         $protot2[] = $valprice22 ;
     }else{
         $protot2[] = $valprice12 ;
     }}
 
     $total2 = array_sum($protot2);
     $_SESSION['total']=$total2;
 }
 ?>


<?php 
if(isset($_POST['calsub'])){
   $cartarr2 = $_SESSION["cart"];
   foreach($cartarr2 as $key => $value){
    $varinp = (int)$value['product_id'];
    $inpinc = $_POST[$varinp];
    
    $valprice1 = $value['product_price'];
    $valprice2 = $value['special_price'];

    if(($valprice1 - $valprice2) < $valprice1 ){
        $protot[] = $inpinc * $valprice2 ;
    }else{
        $protot[] = $inpinc * $valprice1 ;
    }}

    $total = array_sum($protot);
    $_SESSION['total']=$total;
}
?>



<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="#">
								<span>
									Home
								</span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
							<span>
								Shopping Cart
							</span>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="main-content-cart main-content col-sm-2"></div>
                <div class="main-content-cart main-content col-sm-8">
                    <h3 class="text-center custom_blog_title">
                        Shopping Cart
                    </h3>
                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                        <?php 
                            if(isset($_SESSION["cart"])){ ?>
                            <form method='post' action='' class="cart-form">
                            
                                <table class="shop_table">
                                    <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name"></th>
                                        <th class="product-price"></th>
                                        <th class="product-quantity"></th>
                                        <th class="product-subtotal"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      
                                         $cartarr = $_SESSION["cart"];
                                         foreach($cartarr as $key => $value){
                                             ?>

                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a href="<?php echo "delete_cart.php?key2=$key";?>" class="remove"></a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="<?php echo"admin/{$value['product_image']}"?>" alt="img"
                                                     class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                            </a>
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#" class="title"><?php echo"{$value['product_name']}"?> </a>
                                            
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <div class="control">
                                                  
                                                    <a type="submit" class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                    <input name="<?php echo (int)$value['product_id']?>" type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                    class="input-qty qty" size="4">
                                                    <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">
															$
                                                        </span>
                                                        <?php 
                                        $val1 = $value['product_price'];
                                        $val2 = $value['special_price'];

                                        if(($val1 - $val2) < $val1 ){
                                           echo"{$value['special_price']}" ;
                                        }else{
                                            echo"{$value['product_price']}" ;
                                        }
                                        ?>
													</span>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                    <tr>
                                        <td class="actions">
                                            <!-- <div class="coupon">
                                                <label class="coupon_code">Coupon Code:</label>
                                                <input type="text" class="input-text" placeholder="Promotion code here">
                                                <a href="#" class="button"></a>
                                            </div> -->
                                            <div class="order-total">
                                               
                                            <button  name="calsub" type="submit" class="button btn-cart-to-checkout">
                                                Calculate Total 
                                            </button>

                                                  
                                                               	<span class="title">
															Total Price:
														</span>
                                                <span class="total-price">
                                                                
                                               
                                                            <?php 
                                                            if(!isset($total)){
                                                            echo $total2 ;
                                                        }else{
                                                            if(isset($_POST['calsub'])){
                                                              
                                                                echo $total ;
                                                                
                                                            }
                                                        }
                                                           
                                                             ?> 
														</span>
                                            </div>
                                        </td>
                                    </tr>
                                         
                                </table>
                            </form>

                            <?php }else{
                                        echo "<h3>Your Cart is Empty<h3>";
                                    }
                                    
                            ?>
                             <div class="control-cart">
                                <button class="button btn-continue-shopping">
                                    Continue Shopping
                                </button>
                            <?php
                            if(isset($_SESSION["cart"])){ ?>
                           
                                
                                <?php 
                                if(isset($_SESSION['user'])){

                                    ?>
                                <button class="button btn-cart-to-checkout">
                                    Checkout
                                </button>
                                <?php }else { ?>
                                <div class="control-cart">
                                <span>Please <a href="login2.php">Login</a> or <a href="">Register</a> to continue checkout</span>

                                <?PHP } ?>
                                </div>
                            </div>
                            <?PHP } ?>
                        </div>
                    </div>
                </div>
                <div class="main-content-cart main-content col-sm-2"></div>

            </div>
        </div>
    </main>
</div>
<?php

include('partails/public_footer.php');

?>