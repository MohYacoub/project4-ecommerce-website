<?php
session_start();
include('partails/public_head.php');

?>


<?php

include('admin/partials/connection.php');


if (isset($_POST['submit'])) {
	
	$email = $_POST['email'];
	$pass     = $_POST['password'];
	if (!empty($email) && !empty($pass)) {

		//validate email for customer 
		$cust_query = "SELECT * FROM customers WHERE cust_email ='$email'";
		$cust_result = mysqli_query($conn, $cust_query);
		$cust_row = mysqli_fetch_assoc($cust_result);
		//validate email for admin 
		$admin_query = "SELECT* FROM admins WHERE admin_email = '$email'";
		$admin_result = mysqli_query($conn, $admin_query);
		$admin_row = mysqli_fetch_assoc($admin_result);
		if ($admin_row) {

			if ($admin_row['admin_password'] == $pass) {

				if ($admin_row['admin_role'] == 'admin') {
					//admin page   
					$_SESSION['admin'] = $admin_row['admin_name'];
					header("Location:index.php");
				} else {

					$_SESSION['superadmin'] = $admin_row['admin_name'];

					header("Location:index.php");
				}
			} else {
				$errorcheck = "password is not correct , please enter the correct password";
			}
		} elseif ($cust_row) {

			if ($cust_row['cust_password'] == $pass) {
				$_SESSION['pass'] = $pass;
				$_SESSION['user'] = $cust_row['cust_name'];
				$_SESSION['cust_id'] =  $cust_row['cust_id'];
				$_SESSION['phone'] =  $cust_row['cust_phone'];
				$_SESSION['address'] = $cust_row['cust_address'];
				$_SESSION['email'] = $cust_row['cust_email'];
				header("Location: index.php");
			} else {

				$errorcheck = "password is not correct , please enter the correct password";
			}
		} else {

			$errorcheck = "email is not exist , please register ";
		}
	} else {
		$errorcheck = "Please Fill the empty fields";
	}
}

?>

<?php

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
								<div class="col-lg-3 col-md-3 col-sm-12"></div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="login-item">
										<h5 class="title-login text-center">Login your Account</h5>

										<form class="login" method="post">
											<?php
											if (isset($_SESSION['created_cust']) && ($_SESSION['created_cust'] != "")) {
												echo '<div class="text-center alert alert-success">';
												echo ($_SESSION['created_cust']);
												echo '</div>';
												unset($_SESSION['created_cust']);
											}
											?>
											<?php if (isset($errorcheck)) {
												echo "<div class='alert alert-danger'> $errorcheck </div>";
											} ?>
											<p class="form-row form-row-wide">
												<label class="text">email</label>
												<input name="email" title="email" type="text" placeholder="email" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text">Password</label>
												<input name="password" title="password" type="password" placeholder="Password" class="input-text">
											</p>
											<p class="form-row text-center">
												<input name="submit" type="submit" class="button-submit" value="login">

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