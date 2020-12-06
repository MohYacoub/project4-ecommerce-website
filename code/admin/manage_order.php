<?php
session_start();

include('partials/connection.php'); ?>


<?php 

if((isset($_SESSION['superadmin'])) || (isset($_SESSION['admin'])) ){
   
?>
<!-- MAIN CONTENT-->
<?php include_once 'partials/header_admin.php'; ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-30">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table  table-bordered">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer ID</th>
                                        <th>Order Total</th>
                                        <th>Product ID</th>
                                        <th>Quantity</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                              
                                <?php  
                                $query = "SELECT * FROM orders ";
                                $result = mysqli_query($conn,$query) ;
                                while($row = mysqli_fetch_assoc($result)){

                                    $query2 = "SELECT * FROM order_details where order_id = {$row['order_id']} ";
                                    $result2 = mysqli_query($conn,$query2);

                                    while($row2 = mysqli_fetch_assoc($result2)){
                                    ?>
                              
                            <tr>
                            <td><?php echo "{$row['order_id']}"; ?> </td>
                            <td><?php echo "{$row['cust_id']}"; ?></td>
                            <td><?php echo "{$row['order_total']}"; ?></td>
                            <td><?php echo "{$row2['pro_id']}"; ?></td>
                            <td><?php echo "{$row2['qty']}"; ?></td>
                            <td><?php echo "{$row2['created_at']}"; ?></td>
                           
                               </tr>

                                <?php }} ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- END MAIN CONTENT-->


<?php 
 include_once 'partials/footer_admin.php';
 ?>

<?php
}else{
    header('location:../index.php');
}
?>