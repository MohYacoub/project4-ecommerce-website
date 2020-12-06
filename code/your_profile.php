<?php
session_start();
include('partails/public_head.php');

?>

<?php 

if(isset($_SESSION['user'])){
 

?>


<?php



include('admin/partials/connection.php');

$query = "SELECT * FROM customers WHERE cust_name ='{$_SESSION['user']}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


?>

<?php 
include('partails/public_header.php');
?>
<div class="site-content">
  <main class="site-main  main-container no-sidebar">
    <div class="container">
      <div class="container">
        <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
             
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center  ">
                    <img src='<?php echo "{$row['cust_image']}" ?>' alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">


                      <h4><?php echo "{$row['cust_name']}" ?></h4>

                      <a href="edit_profile.php" style="background-color:#ed71a3; border:#ed71a3; font-family: 'Baloo', serif;" class="btn btn-primary btn-lg " role="button" >edit your profile</a>
                      <br>
                      <br>
                    </div>
                    <div class="mt-3">
                    <a href="order_history.php" style="background-color:#ed71a3; border:#ed71a3; font-family: 'Baloo', serif;" class="btn btn-primary btn-lg " role="button" >orders history</a>
                      <br>
                      <br>

                    </div>
                    <div class="mt-3">
                      <br>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <?php
                  if (isset($_SESSION['edited_cust']) && ($_SESSION['edited_cust'] != "")) {
                    echo '<div class=" text-center alert alert-warning">';
                    echo ($_SESSION['edited_cust']);
                    echo '</div>';
                    unset($_SESSION['edited_cust']);
                    echo '<br>';
                  }
                  ?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "{$row['cust_name']}" ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "{$row['cust_email']}" ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "{$row['cust_phone']}" ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "{$row['cust_address']}" ?>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<div style="height: 100px;">

</div>


      <?php

      include('partails/public_footer.php');

      ?>

      <?php 
 
}
else {

  header('location:index.php');
}
      ?>