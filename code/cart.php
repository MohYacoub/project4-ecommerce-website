<?php
include('admin/partials/connection.php');

?>
<?php
include('partails/public_head.php');
include('partails/public_header.php');

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
                            <form method='post' action='<?= $_SERVER['PHP_SELF']; ?>' class="cart-form">
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
                                                    <input name="increment" type="text" data-step="1" data-min="0" value="1" title="Qty"
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
														<span class="title">
															Total Price:
														</span>
                                                <span class="total-price">
															$95 <?php  echo $_POST['increment'] ; ?>
														</span>
                                            </div>
                                        </td>
                                    </tr>
                                         
                                </table>
                            </form>
                            <div class="control-cart">
                                <button class="button btn-continue-shopping">
                                    Continue Shopping
                                </button>
                                <button class="button btn-cart-to-checkout">
                                    Checkout
                                </button>
                            </div>
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