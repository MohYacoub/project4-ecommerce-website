<?php include('partials/connection.php'); ?>
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
                                        <th>Created at</th>
                                        <!-- <th>Updated at</th> -->
                                        <th>Customer ID</th>
                                        <th>Order Address</th>
                                        <th>Order Total</th>
                                        <th>Product ID</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query  = "SELECT * FROM orders";
                                $result = mysqli_query($conn,$query);
                                $query1 = "SELECT * FROM order_details";
                                $result1 = mysqli_query($conn,$query1);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                        echo "<td>{$row['order_id']}</td>";
                                        echo "<td>{$row['created_at']}</td>";
                                        // echo "<td>{$row['updated_at']}</td>";
                                        echo "<td>{$row['cust_id']}</td>";
                                        echo "<td>{$row['order_address']}</td>";
                                        echo "<td>{$row['order_total']}</td>";
                                        while($row1 = mysqli_fetch_assoc($result1)){
                                            echo "<td>{$row1['pro_id']}</td>";
                                            echo "<td>{$row1['qty']}</td>";
                                        }
                                    echo "</tr>";
                                }
                                  
                                ?>
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