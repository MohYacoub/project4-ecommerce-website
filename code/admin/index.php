
<?php
//this page made by feras 
session_start();

?>

<?php 

if((isset($_SESSION['superadmin'])) || (isset($_SESSION['admin'])) ){
   
?>

<?php
include_once 'partials/connection.php';
include('partials/header_admin.php');
?>

 <!-- MAIN CONTENT-->
 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                   
                                      
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                           
                                            <div class="text">
                                                <h2>
                                                
                                                <?php 
                                                
                                                $querycustnum  = "select * from customers";
                                                $resultcustnum = mysqli_query($conn,$querycustnum);
                                                $res = mysqli_num_rows($resultcustnum);
                                                echo $res;

                                                ?>
                                                
                                                </h2>
                                                <span>members </span>
                                            </div>
                                        </div>
                                        <div style="height:25px;">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2>
                                                <?php 
                                                  
                                                $queryqtypro  = "SELECT * FROM order_details";
                                                $resultqtypro = mysqli_query($conn,$queryqtypro);

                                               $sum = 0;
                                              
                                                while($rowqty = mysqli_fetch_assoc($resultqtypro)){

                                                    $sum += $rowqty['qty'];
                                                }
                                                
                                                echo $sum ;

                                                ?>
                                                </h2>
                                                <span>Products solid</span>
                                            </div>
                                        </div>
                                        <div style="height:25px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>
                                                

                                                <?php 
                                                  
                                                  $querytotord  = "SELECT * FROM orders";
                                                  $resulttotord = mysqli_query($conn,$querytotord);
  
                                                 $sum2 = 0;
                                                
                                                  while($rowqty = mysqli_fetch_assoc($resulttotord)){
  
                                                     $sum2 += 1;
                                                  }
                                                  
                                                  echo $sum2 ;
                                                  ?>
                                                
                                                </h2>
                                                <span>Total Orders</span>
                                            </div>
                                        </div>
                                        <div style="height:25px;">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>$
                                                
                                                <?php 
                                                  
                                                  $querytotmony  = "SELECT * FROM orders";
                                                  $resulttotmony = mysqli_query($conn,$querytotmony);
  
                                                  
                                                 $sumtot = 0;
                                                
                                                  while($rowtotmony = mysqli_fetch_assoc($resulttotmony)){
  
                                                      $sumtot += $rowtotmony['order_total'];
                                                  }
                                                  
                                                  echo $sumtot ;
  
                                                  ?>
                                                
                                                </h2>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        <div style="height:25px;">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                        
                       
                    </div>
                </div>
            </div>


<?php
include('partials/footer_admin.php');
?>


<?php
}else{
    header('location:../index.php');
}
?>