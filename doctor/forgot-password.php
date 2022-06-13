<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if(isset($_POST['submit'])){
	$contactno=$_POST['contactno'];
	$email=$_POST['email'];
	$query=mysqli_query($con,"select id from  doctors where contactno='$contactno' and docEmail='$email'");
	$row=mysqli_num_rows($query);
	if($row>0){

		$_SESSION['cnumber']=$contactno;
		$_SESSION['email']=$email;
		header('location:reset-password.php');
	} else {
		echo "<script>alert('Invalid details. Please try with valid details');</script>";
		echo "<script>window.location.href ='forgot-password.php'</script>";


	}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Password Recovery</title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-progressbar -->
	<link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- JQVMap -->
	<link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
	<!-- bootstrap-daterangepicker -->
	<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="../assets/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>
		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">

					<div class="box-login">
						<form class="form-login" method="post">
							<fieldset>
								<legend>
									HMS | Doctor Password Recovery
								</legend>
								<p>
									Please enter your  Contact number and Email to recover your password.<br />

								</p>

								<div class="form-group form-actions">
									<span class="input-icon">
										<input type="text" class="form-control" name="contactno" placeholder="Registred Contact Number">
									</span>
								</div>

								<div class="form-group">
									<span class="input-icon">
										<input type="email" class="form-control" name="email" placeholder="Registred Email">
									</div>

									<div class="form-actions">

										<button type="submit" class="btn btn-primary pull-right" name="submit">
											Reset <i class="fa fa-arrow-circle-right"></i>
										</button>
									</div>
									<div class="new-account">
										Already have an account?
										<a href="index.php">
											Log-in
										</a>
									</div>
								</fieldset>
							</form>

							<div class="copyright">
								&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
							</div>

						</div>
					</section>

				</div>
			</div>

		</body>
		<!-- end: BODY -->
		</html>