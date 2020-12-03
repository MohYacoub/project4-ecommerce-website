
<?php
include('partails/connection.php');
if (isset($_POST['submit'])){

$username=$_POST['username'];
$pass=$_POST['password'];

if(!empty($username)&&!empty($pass)){
//validate username for customer 
$cust_query="select * from customers where cust_name ='$username'";
$cust_result= mysqli_query($conn,$cust_query);
$cust_row=mysqli_fetch_assoc($cust_result);
//validate username for admin 
$admin_query="select * from admins where admin_name ='$username'";
$admin_result= mysqli_query($conn,$admin_query);
$admin_row=mysqli_fetch_assoc($admin_result);

    if($cust_row){
        $cust_query ="select * from customers where cust_password ='$pass'";
        $cust_result = mysqli_query($conn,$cust_query);
        $cust_row =mysqli_fetch_assoc($cust_result);
	        if ($cust_row){
			   //the  page where customer should go after validation
				header("location:home3.php");
		      
	               }else{
				
				$err= "password is not correct , please enter correct password";
	                    
	                     }
	
	}else if ($admin_row){
        $admin_query="select * from admins where admin_password ='$pass'";
        $admin_result= mysqli_query($conn,$admin_query);
        $admin_row=mysqli_fetch_assoc($admin_result);
		   if ($admin_row){
			$admin_query="select * from admins where admin_name ='$username' AND admin_role ='super admin'";
			$admin_result= mysqli_query($conn,$admin_query);
			$admin_row=mysqli_fetch_assoc($admin_result);
			    if($admin_row){
				  //super admin page   
					echo"welcome super";
				  die;
				}else{
				  //admin page 
				  echo"welcome admin" ;
				  die; 
				}	   
			
			}else{
			 $err= "password is not correct , please enter correct password";
			 
				 }

	}else{

     $err= "username is not exist , please register ";
    
	}
	


}else{
$err= "username / password Required";

}}
?>




<?php
include('partails/public_head.php');
include('partails/public_header.php');
?> 
	<div>
	<div class="main-content main-content-login">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-trail breadcrumbs">
						<ul class="trail-items breadcrumb">
							<li class="trail-item trail-begin">
								<a href="index-2.html">Home</a>
							</li>
							<li class="trail-item trail-end active">
								Authentication
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						<h3 class="custom_blog_title">
							Authentication
						</h3>
						<div class="customer_login">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="login-item">
										<h5 class="title-login">Login your Account</h5>
										<form class="login" method="post">
										<?php if(isset($err)){echo "<div class='alert alert-danger'> $err </div>";}?>
											<p class="form-row form-row-wide">
												<label class="text">Username</label>
												<input name="username"title="username" type="text" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text">Password</label>
												<input name="password" title="password" type="password" class="input-text">
											</p>
											<!-- <p class="lost_password">
												<span class="inline">
													<input type="checkbox" id="cb1">
													<label for="cb1" class="label-text">Remember me</label>
												</span>
												<a href="#" class="forgot-pw">Forgot password?</a>
											</p> -->
											<p class="form-row">
												<input name="submit" type="submit" class="button-submit" value="login">
											</p>
										</form>
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