<?php
session_start();
include_once './admin/partials/connection.php';
include('partails/public_head.php');
include('partails/public_header.php');

?>



<div class="main-content main-content-product no-sidebar">
    <div class="container">

    <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            SEARCH RESULT
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">
                          SEARCH RESULT
                    </h3>
                    <ul class="row list-products auto-clear equal-container product-grid">

                
<?php

$query = $_GET['search'];
// gets value sent over search form
$min_length = 3;
// you can set minimum length of the query if you want

if (strlen($query) >= $min_length) {

    $query = htmlspecialchars($query);


    $query = mysqli_real_escape_string($conn, $query);

    $searchTerms = explode(' ', $query);
    
    foreach ($searchTerms as $term) {
        $term = trim($term);
        if (!empty($term)) {
    $raw_results = "SELECT * FROM products 
     WHERE (`pro_name`  LIKE '%$term%')";
            
        }
    }


    $res = mysqli_query($conn, $raw_results);
    if (mysqli_num_rows($res) > 0) {

        while ($results = mysqli_fetch_array($res)) { 
            //  $results = mysqli_fetch_array($raw_results); ?>
             

                        <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                            <div class="product-inner equal-element">
                                <div class="product-thumb">
                                    <div class="thumb-inner">
                                        <a href="<?php echo "productdetails.php?proid={$results['pro_id']}";?>">
                                            <img src="<?php echo "admin/{$results['pro_image']}";?>" alt="img">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name product_title">
                                        <a href="<?php echo "productdetails.php?proid={$results['pro_id']}";?>">
                                        <?php echo "{$results['pro_name']}";?>
                                    </a>
                                    </h5>
                                    <div class="group-info">
                                        <div class="price">
                                            <del>
                                            <?php echo "{$results['pro_price']}";?>
                                            </del>
                                            <ins>
                                            <?php echo "{$results['special_price']}";?>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

        <?php } ?>
                    </ul>
                    <?php }}?>
                </div>
             
            </div>
           
        </div>
     
    </div>
    
</div>


    
<?php

include('partails/public_footer.php');

?>