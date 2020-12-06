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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="your_profile.php">User Profile</a></li>
              <li class="breadcrumb-item active" aria-current="page">Your Orders History </li>
            </ol>
            </nav>
           
            </div>
            <!-- /Breadcrumb -->
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                        Your Orders History
                    </h3>
                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                            
                                <table class="shop_table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order Id</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Total Price</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                
                                $queryod = "SELECT * FROM orders where cust_id = {$_SESSION['cust_id']}";

                            $resod = mysqli_query($conn,$queryod);

                            while($rowod = mysqli_fetch_assoc($resod)){
                                ?>

                                                  <tr>
                                                <th scope="row"><a href="<?php echo "det_order.php?ordid={$rowod['order_id']}"?>"><?php echo "{$rowod['order_id']}" ?> </a></th>
                                                <td><?php echo "{$rowod['created_at']}" ?></td>
                                                <td><?php echo  "$ {$rowod['order_total']}" ?></td>
                                                
                                            </tr>
                                            

                            <?php  } ?>
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