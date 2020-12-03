<?php
include('partails/public_head.php');

?> 


<?php

$conn = mysqli_connect("localhost","root","","kidsstoredb");


// if(!$conn){
//    echo "no";
//     } else{
//         echo "yes";  die;
//     }



// if(isset($_POST['submit'])){
  
//   $name=$_POST['username'];
//   $email=$_POST['email'];
//    $password=$_POST['pass'];
//    $pwd=md5($password);
//    $cpassword=$_POST['cpass'];
//    $phone=$_POST['phone'];
//    $address=$_POST['address'];

// $query = "INSERT INTO customers (cust_name,cust_password,cust_email,cust_phone,cust_address)
//         VALUES ('$name','$password','$email','$phone',' $address')";
        
//         $result=mysqli_query($conn,$query);

        
if(isset($_POST["submit"])){

$name=$_POST['username'];
$email=$_POST['email'];
 $password=$_POST['pass'];
//  $pwd= md5($password);
 $cpassword=$_POST['cpass'];
 $phone=$_POST['phone'];
 $address=$_POST['address'];

 if(!empty($_POST['username']) && !empty($_POST['pass'])&& !empty($_POST['email'])){

    if(($_POST['pass'])==($_POST['cpass'])){

        $sel="SELECT *FROM  customers WHERE cust_name ='$name' ||  cust_email ='$email'" ;
                                 
        $num= mysqli_query($conn,$sel); 
        $row=mysqli_fetch_assoc($num); 
        if(!$row){ $query = "INSERT INTO customers (cust_name,cust_password,cust_email,cust_phone,cust_address)
            VALUES ('$name','$password','$email','$phone',' $address')";
            mysqli_query($conn,$query);
            

        } else {
           $err= "uesrname  or email is alerady exist";
        }

    } else {
        $err=" password not matching";
    } 


   
    
} else{
    $err= " please";
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

                                    <h5 class="title-login">Register now</h5>
                                    
                            
									<form   method ="post" action="" class="register">
                                    <?php if(isset($err)){echo "<div class='alert alert-danger'> $err </div>";}?>
                                    <p class="form-row form-row-wide">
												<label class="text">Username</label>
												<input title="name" type="text" class="input-text"  name="username" >
                                            </p>
                                            <p class="form-row form-row-wide">
												<label class="text">Your email</label>
												<input title="email" type="email" class="input-text"  name="email">
                                            </p>

                                            <p class="form-row form-row-wide">
												<label class="text">phone</label>
												<input title="name" type="text" class="input-text"  name="phone" >
                                            </p>


                                            <p class="form-row form-row-wide">
												<label class="text">address</label>
												<input title="name" type="text" class="input-text"  name="address">
                                            </p>
                                            <p class="form-row form-row-wide">
												<label class="text">Password</label>
												<input title="pass" type="password" class="input-text" name="pass">
                                            </p>
                                            <p class="form-row form-row-wide">
												<label class="text"> confirmPassword</label>
												<input title="pass" type="password" class="input-text" name="cpass" >
											</p>
                                            
											<p class="">
												<input type="submit" class="button-submit" value="Register Now" name="submit">
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