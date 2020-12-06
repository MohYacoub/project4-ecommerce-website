<?php
session_start();
include('admin/partials/connection.php');
include('partails/public_head.php');

?>
<?php

include('partails/public_header.php');

?>

<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <!-- Breadcrumb -->
            <div class="breadcrumb-trail breadcrumbs">
            
            <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User Profile</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Your Orders History</a></li>
              <li class="breadcrumb-item active" aria-current="page">Order Detials </li>

            </ol>
            </nav>
           
            </div>
            <!-- /Breadcrumb -->
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                     Order Detials
                    </h3>
                    <div class="page-main-content">
                        <div class="shoppingcart-content">

                            <table class="shop_table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>

                                        </tr>
                                    </thead>
                                    <tbody>



                                    <?php
                                    
                                    $odid = $_GET['ordid'];

                                    $odquery = "SELECT * FROM order_details WHERE order_id = $odid ";

                                    $odres = mysqli_query($conn,$odquery);

                                    while($row = mysqli_fetch_assoc($odres)){

                                    $selproid = "SELECT * FROM products WHERE pro_id = {$row['pro_id']}";

                                    $ressel = mysqli_query($conn,$selproid);
                                    $rowselpro = mysqli_fetch_assoc($ressel);

                                        ?>
                                   
                                        <tr>
                                            <th scope="row">
                                                <figure class="figure">
                                                    <img src="<?php echo "admin/{$rowselpro['pro_image']}"?>"  width='100' height='100' class="figure-img img-fluid rounded" alt="pro">
                                                    
                                                </figure>
                                            </th>
                                            <td><?php echo "{$rowselpro['pro_name']}"?></td>
                                            <td><?php echo "{$row['qty']}"?></td>
                                            <td>
                                            
                                            <?php 
                                        $val1 = $rowselpro['pro_price'];
                                        $val2 = $rowselpro['special_price'];

                                        if(($val1 - $val2) < $val1 ){
                                           echo "$ $val2" ;
                                        }else{
                                            echo "$ $val1" ;
                                        }
                                        ?>
                                                
                                          
                                        
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php

include('partails/public_footer.php');

?>