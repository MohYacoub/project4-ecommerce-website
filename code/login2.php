<?php
session_start();
include('admin/partials/connection.php');

?>
<?php
$query2  = "SELECT * FROM customers";
$result2 = mysqli_query($conn,$query2);
if(isset($_POST['submit'])){
	
	$username = strtolower($_POST['username']);
	$pass = $_POST['password'];
	if(!empty($username) && !empty($pass)){
    while($row2 = mysqli_fetch_assoc($result2)){
        if($username == $row2["cust_name"] && $pass== $row2["cust_password"] ){
			$_SESSION['pass'] = $pass;
			$_SESSION['user'] = $username;
			$_SESSION['cust_id'] = $row2['cust_id'];
			$_SESSION['phone'] = $row2['cust_phone'];
			$_SESSION['address'] = $row2['cust_address'];
            header("Location: checkout.php");}
            else{
				$errorcheck = "Incrorect Username Or Password";
            }
		}
	}
	else {
		$errorcheck = "Please Fill the empty field";
	}
	}

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
								LOGIN
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						<h3 class="custom_blog_title">
							LOGIN
						</h3>
						<div class="customer_login">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="login-item">
										<h5 class="title-login">Login your Account</h5>

										<form class="login" method="post">
										<?php if(isset($errorcheck)){echo "<div class='alert alert-danger'> $errorcheck </div>";}?>
											<p class="form-row form-row-wide">
												<label class="text">Username</label>
												<input name="username"title="username" type="text" placeholder="Username" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text">Password</label>
												<input name="password" title="password" type="password" placeholder="Password" class="input-text">
											</p>
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