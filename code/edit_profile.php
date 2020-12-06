<?php
session_start();
//Connection to database 
include('admin/partials/connection.php');

include('partails/public_head.php');

//fetch old data
$query = "SELECT *FROM  customers WHERE cust_name ='{$_SESSION['user']}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


if (isset($_POST["update"])) {
	if ((!empty($_POST['username'])) && (!empty($_POST['email'])) && (!empty($_POST['pass'])) && (!empty($_POST['phone'])) && (!empty($_POST['address']))) {

		$name =strtolower($_POST['username']);
		$email=strtolower($_POST['email']);
		$password=$_POST['pass'];
		//  $pwd= md5($password);
		$phone=$_POST['phone'];
		$address=$_POST['address'];

		// get image data
		$image_name = $_FILES['cust_image']['name'];
		$tmp_name   = $_FILES['cust_image']['tmp_name'];
		$path       = 'images/customer_images/';

		// move image to folder
		move_uploaded_file($tmp_name, $path . $image_name);

		// choose photo 
		if ($image_name) {
			$cust_image = $path . $image_name;
		} else {
			$cust_image = $row['cust_image'];
		}

		$cust_email_query = " SELECT * FROM customers WHERE cust_email = '$email' ";
		$cust_email_query_run = mysqli_query($conn, $cust_email_query);



		if (($email != $row['cust_email']) && (mysqli_num_rows($cust_email_query_run) > 0)) {
			$repeated_email = "* Email already taken, please try another one!";
		} else {

			$query = "UPDATE customers set  cust_name        ='$name' ,
                                            cust_password    ='$password',
                                            cust_email       ='$email',
                                            cust_phone       ='$phone',
											cust_address     ='$address',
											cust_image       ='$cust_image'
	
                 WHERE cust_name  = '{$_SESSION['user']}'";
			mysqli_query($conn, $query);
			$_SESSION['user'] = $name;
			header("location:your_profile.php");

			if (($name == $row['cust_name']) && ($password == $row['cust_password']) && ($email == $row['cust_email']) && ($phone == $row['cust_phone']) && ($address == $row['cust_address']) && ($image == $row['cust_image'])) {
				$_SESSION['edited_cust'] = "Nothing Edited !";
				header("location:your_profile.php");
			} else {
				$_SESSION['edited_cust'] = "The Customer profile Edited Successfully";
				header("location:your_profile.php");
			}
			// header("location:your_profile.php");
		}
	} else {
		$_SESSION['empty_field'] = 'Please enter all of fields ';
		// temprorary antil i have some time to be more spacific 
	}
}


?>
<?php

include('partails/public_header.php');

?>
<div class="site-content">
	<main class="site-main  main-container no-sidebar">
		<div class="container">
			<div class="main-content main-content-login">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<!-- Breadcrumb -->
							<nav aria-label="breadcrumb" class="main-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Your Profile</li>
								</ol>
							</nav>
							<!-- /Breadcrumb -->
						</div>
					</div>
					<div class="row">
						<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="site-main">
								<h3 class="custom_blog_title  text-center">
									Edit Your Profile
								</h3>
								<div class="customer_login">
									<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12"></div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="login-item">
												<br>

												<div class="text-center">
													<img class='rounded mx-auto d-block' width='200' height='200' src='<?php echo "{$row['cust_image']}" ?>'>
												</div>
												<br>
												<br>
												<form method="post" action="" class="register" enctype="multipart/form-data">
													<p>
														<?php
														if (isset($repeated_email) && ($repeated_email != "")) {
															echo '<div class="text-center alert alert-danger">';
															echo ($repeated_email);
															echo '</div>';
															unset($repeated_email);
														}
														?>
														<?php
														if (isset($_SESSION['empty_field']) && ($_SESSION['empty_field'] != "")) {
															echo '<div class="text-center alert alert-danger">';
															echo ($_SESSION['empty_field']);
															echo '</div>';
															unset($_SESSION['empty_field']);
														}
														?>
													</p>
													<?php if (isset($err)) {
														echo "<div class='alert alert-danger'> $err </div>";
													} ?>

													<p class="form-row form-row-wide">
														<label class="text">Full Name</label>
														<input title="name" type="text" class="input-text" name="username" value=" <?php echo "{$row['cust_name']}" ?>">
													</p>
													<p class="form-row form-row-wide">
														<label class="text"> Email</label>
														<input title="email" type="email" class="input-text" name="email" value=" <?php echo "{$row['cust_email']}" ?>">
													</p>

													<p class="form-row form-row-wide">
														<label class="text"> Phone</label>
														<input title="name" type="text" class="input-text" name="phone" value=" <?php echo "{$row['cust_phone']}" ?>">
													</p>


													<p class="form-row form-row-wide">
														<label class="text">Address</label>
														<input title="name" type="text" class="input-text" name="address" value=" <?php echo "{$row['cust_address']}" ?>">
													</p>
													<p class="form-row form-row-wide">
														<label class="text">Password</label>
														<input title="pass" type="text" class="input-text" name="pass" value="<?php echo "{$row['cust_password']}" ?>">
													</p>
													<p class="form-row form-row-wide">
														<div class="col-3 col-md-3">
															<label for="file-input" class="text">Update your photo </label>
														</div>
														<div class="col-9 col-md-9">
															<input type="file" id="file-input" name="cust_image" class="form-control-file">
														</div>
													</p>
													<br>
													<br>
													<p class="form-row form-row-wide ">
														<p class="text-center">
															<input type="submit" class="button-submit " value="Update" name="update">
														</p>
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
		</div>
	</main>
</div>


			<?php


			include('partails/public_footer.php');

			?>