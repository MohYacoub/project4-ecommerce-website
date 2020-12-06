<?php
session_start();
include('partails/public_head.php');
?>


<?php

$conn = mysqli_connect("localhost", "root", "", "kidsstoredb");


if (isset($_POST["submit"])) {

	$name  = strtolower($_POST['username']);
	$email = strtolower($_POST['email']);
	$password = $_POST['pass'];
	//  $pwd= md5($password);
	$cpassword = $_POST['cpass'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	// get image data
	$image_name = $_FILES['regist_image']['name'];
	$tmp_name   = $_FILES['regist_image']['tmp_name'];
	$path       = 'images/customer_images/';

	// move image to folder
	move_uploaded_file($tmp_name, $path . $image_name);

	// choose photo 
	if ($image_name) {
		$cust_image = $path . $image_name;
	} else {
		$cust_image = 'admin/images/admin_images/noimage.jpg';
	}

	if (!empty($name) && !empty($password) && !empty($email) && !empty($cpassword) && !empty($phone) && !empty($address)) {
		if ($password == $cpassword) {

			// check email from customers table
			$check_email = " SELECT * FROM customers WHERE cust_email = '$email' ";
			$result1 = mysqli_query($conn, $check_email);
			//
			// check email from admins table 
			// I will be back to continue it
			// $admin_email = " SELECT * FROM admins WHERE admin_email = '$email' ";
			// $result_admin = mysqli_query($conn, $admin_email);
			if (mysqli_num_rows($result1) > 0) {
				$err = "* Email already taken, please try another one!";
			} else {
				$query = "INSERT INTO customers (cust_name,cust_password,cust_email,cust_phone,cust_address, cust_image )
		                                 VALUES ('$name','$password','$email','$phone',' $address', '$cust_image' )";
				mysqli_query($conn, $query);
				$_SESSION['created_cust'] = "The Registration process completed successfully! '<br>' please login here ";
				header("location: login.php");
			}

		} else {
			$err = " password does not match";
		}
	} else {
		$err = " please fill the empty fields";
	}
}
?>




<?php include('partails/public_header.php');
?>

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
							Register
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="site-main">
					<h3 class="custom_blog_title">
					Register
					</h3>
					<div class="customer_login">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12"></div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="login-item">

									<h5 class="title-login text-center">Register now</h5>


									<form method="post" action="" class="register" enctype="multipart/form-data">
										<?php if (isset($err)) {
											echo "<div class='alert alert-danger'> $err </div>";
										} ?>
										<p class="form-row form-row-wide">
											<label class="text">Username</label>
											<input title="name" type="text" class="input-text" name="username">
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your email</label>
											<input title="email" type="email" class="input-text" name="email">
										</p>

										<p class="form-row form-row-wide">
											<label class="text">phone</label>
											<input title="name" type="text" class="input-text" name="phone">
										</p>


										<p class="form-row form-row-wide">
											<label class="text">address</label>
											<input title="name" type="text" class="input-text" name="address">
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Password</label>
											<input title="pass" type="password" class="input-text" name="pass">
										</p>
										<p class="form-row form-row-wide">
											<label class="text"> confirmPassword</label>
											<input title="pass" type="password" class="input-text" name="cpass">
										</p>
										<p class="form-row form-row-wide">
											<div class="col-6 col-md-6">
												<label for="file-input" class="text">Upload your photo <small style="color: red;">(optional)</small> </label>
											</div>
											<div class="col-6 col-md-6">
												<input type="file" id="file-input" name="regist_image" class="form-control-file">
											</div>
										</p>
										<br>
										<br>
										<br>
										<p class="text-center">
											<input type="submit" class="button-submit" value="Register Now" name="submit">
										</p>
									</form>
								</div>

							</div>
							<div class="col-lg-3 col-md-3 col-sm-12"></div>

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