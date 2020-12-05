<?php
session_start();
include('partails/public_head.php');
include('partails/public_header.php');


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
                            <a href="#">Clothing</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Eclipse Pendant Light
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
                                <img id="img_zoom" data-zoom-image="assets/images/details-item-1.jpg"
                                     src="assets/images/details-item-1.jpg" alt="img">
                                <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                            
                        </div>
                        <div class="details-infor">
                            <h1 class="product-title">
                                Eclipse Pendant Light
                            </h1>
                            
                            <div class="availability">
                                availability:
                                <a href="#">in Stock</a>
                            </div>
                            
                            <div class="group-info"> 
                                    <div class="price">
                                      <del>
                                          $65
                                      </del>
                                          <ins>
                                            $45
                                          </ins>
                                    </div>
                            </div>
                            <div class="product-details-description">
                            <div id="product-descriptions" class="tab-panel active">
                                <p>
                                    Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim.
                                    Phasellus molestie risus non aliquet cursus.
                                    Integer
                                    vestibulum mi lorem, id hendrerit ante lobortis non.
                                    Nunc ante ante, lobortis non pretium non, vulputate vel nisi.
                                    Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed
                                    laoreet velit.
                                </p>
                                
                            </div>
                            </div>
                            
                            
                                <div class="quantity-add-to-cart">
                                    <div class="quantity">
                                        <div class="control">
                                            <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                            <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                   class="input-qty qty" size="4">
                                            <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                        </div>
                                    </div>
                                    <button class="single_add_to_cart_button button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-details-product">
                        <ul class="tab-link">
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Descriptions </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#information"> </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#reviews"></a>
                            </li>
                        </ul>
                        <div class="tab-container">
                            
                            
                            
                                    
                                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear: left;"></div>
                    <div class="related products product-grid">
                        <h2 class="product-grid-title">You may also like</h2>
                        <div class="owl-products owl-slick equal-container nav-center"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                            <div class="product-item style-1">
                                <div class="product-inner equal-element">
                                    <div class="product-top">
                                        <div class="flash">
													<span class="onnew">
														<span class="text">
															new
														</span>
													</span>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                            <a href="#">
                                                <img src="assets/images/product-item-1.jpg" alt="img">
                                            </a>
                                            
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#">Shark Shirt</a>
                                        </h5>
                                        <div class="group-info">
                                            
                                            <div class="price"> 
                                                
                                                <del>
                                                    $65
                                                </del>
                                                <ins>
                                                    $45
                                                </ins>
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
</div>
<?php

include('partails/public_footer.php');

?>