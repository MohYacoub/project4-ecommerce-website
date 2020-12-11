<?php
session_start();
include('admin/partials/connection.php');

?>
<?php
// $query2  = "SELECT * FROM customers  ";
// $result2 = mysqli_query($conn, $query2);
if (isset($_POST['submit'])) {
	$email = strtolower($_POST['username']);
	$pass = $_POST['password'];



	if (!empty($email) && !empty($pass)) {
		$cust_query = "SELECT * FROM customers WHERE cust_email ='$email'";
		$cust_result = mysqli_query($conn, $cust_query);
		$cust_row = mysqli_fetch_assoc($cust_result);
		// while ($row2 = mysqli_fetch_assoc($result2)) {
			if ($email == $cust_row["cust_email"] && $pass == $cust_row["cust_password"]) {

				$_SESSION['pass'] = $pass;
				$_SESSION['user'] = $cust_row['cust_name'];
				$_SESSION['cust_id'] =  $cust_row['cust_id'];
				$_SESSION['phone'] =  $cust_row['cust_phone'];
				$_SESSION['address'] = $cust_row['cust_address'];
				$_SESSION['email'] = $cust_row['cust_email'];
				header("Location: checkout.php");
			} else {
				$errorcheck = "Incrorect Username Or Password";
			// }
		}
	} else {
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
											<?php if (isset($errorcheck)) {
												echo "<div class='alert alert-danger'> $errorcheck </div>";
											} ?>
											<p class="form-row form-row-wide">
												<label class="text">Email</label>
												<input name="username" title="username" type="text" placeholder="Username" class="input-text">
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