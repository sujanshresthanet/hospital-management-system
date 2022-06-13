<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$ret=mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
$extra="dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['fullName']=$num['fullName'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
	// For stroing log if user login unsuccessfull
	$_SESSION['login']=$_POST['username'];
	$uip=$_SERVER['REMOTE_ADDR'];
	$status=0;
	mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
	$_SESSION['errmsg']="Invalid username or password";
	$extra="index.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>User-Login</title>

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
	<link href="assets/css/custom.min.css" rel="stylesheet">
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
							<form class="form-login" method="post">

								<fieldset>
									<legend>
										HMS | Patient Login
									</legend>
									<p>
										Please enter your name and password to log in.<br />
										<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
									</p>
									<div class="form-group">
										<span class="input-icon">
											<input type="text" class="form-control" name="username" placeholder="Username">
										</div>
										<div class="form-group form-actions">
											<span class="input-icon">
												<input type="password" class="form-control password" name="password" placeholder="Password">
											</span><a href="forgot-password.php">
												Forgot Password ?
											</a>
										</div>
										<div class="form-actions">

											<button type="submit" class="btn btn-primary pull-right" name="submit">
												Login <i class="fa fa-arrow-circle-right"></i>
											</button>
										</div>
										<div class="new-account">
											Don't have an account yet?
											<a href="registration.php">
												Create an account
											</a>
										</div>
									</fieldset>
								</form>

								<div class="copyright">
									&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
								</div>

							</div>

						</div>
					</section>
				</div>
			</body>
			<!-- end: BODY -->
			</html>