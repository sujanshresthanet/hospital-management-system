<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
	$fname=$_POST['full_name'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
	if($query)
	{
		echo "<script>alert('Successfully Registered. You can login now');</script>";
	//header('location:index.php');
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>User Registration</title>

	<!-- Bootstrap -->
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-progressbar -->
	<link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- JQVMap -->
	<link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
	<!-- bootstrap-daterangepicker -->
	<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="assets/css/custom.css" rel="stylesheet">

	<script type="text/javascript">
		function valid()
		{
			if(document.registration.password.value!= document.registration.password_again.value)
			{
				alert("Password and Confirm Password Field do not match  !!");
				document.registration.password_again.focus();
				return false;
			}
			return true;
		}
	</script>


</head>

<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>
		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<div class="box-login">
						<div class="box-login">
							<!-- start: REGISTER BOX -->
							<div class="box-register">
								<form name="registration" id="registration"  method="post" onSubmit="return valid();">
									<fieldset>
										<legend>
											HMS | Patient Registration
										</legend>
										<p>
											Enter your personal details below:
										</p>
										<div class="form-group">
											<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="address" placeholder="Address" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="city" placeholder="City" required>
										</div>
										<div class="form-group">
											<label class="block">
												Gender
											</label>
											<div class="clip-radio radio-primary">
												<input type="radio" id="rg-female" name="gender" value="female" >
												<label for="rg-female">
													Female
												</label>
												<input type="radio" id="rg-male" name="gender" value="male">
												<label for="rg-male">
													Male
												</label>
											</div>
										</div>
										<p>
											Enter your account details below:
										</p>
										<div class="form-group">
											<span class="input-icon">
												<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
												<span id="user-availability-status1" style="font-size:12px;"></span>
											</div>
											<div class="form-group">
												<span class="input-icon">
													<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
												</div>
												<div class="form-group">
													<span class="input-icon">
														<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
													</div>
													<div class="form-group">
														<div class="checkbox clip-check check-primary">
															<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
															<label for="agree">
																I agree
															</label>
														</div>
													</div>
													<div class="form-actions">
														<p>
															Already have an account?
															<a href="index.php">
																Log-in
															</a>
														</p>
														<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
															Submit <i class="fa fa-arrow-circle-right"></i>
														</button>
													</div>
												</fieldset>
											</form>

											<div class="copyright">
												&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
											</div>

										</div>

									</div>
								</div>
							</section>
						</div>
					</div>
				</div>


				<script>
					function userAvailability() {
						$("#loaderIcon").show();
						jQuery.ajax({
							url: "check_availability.php",
							data:'email='+$("#email").val(),
							type: "POST",
							success:function(data){
								$("#user-availability-status1").html(data);
								$("#loaderIcon").hide();
							},
							error:function (){}
						});
					}
				</script>

			</body>
			<!-- end: BODY -->
			</html>