<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d h:i:s', time () );
if(isset($_POST['submit']))
{
	$sql=mysqli_query($con,"SELECT password FROM  doctors where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
	$num=mysqli_fetch_array($sql);
	if($num>0)
	{
		$con=mysqli_query($con,"update doctors set `password`='".md5($_POST['npass'])."', `updationDate`='$currentTime' where id='".$_SESSION['id']."'");
		$_SESSION['msg1']="Password Changed Successfully !!";
	}
	else
	{
		$_SESSION['msg1']="Old Password not match !!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor  | change Password</title>
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
	<link href="../assets/css/custom.css" rel="stylesheet">
	<script type="text/javascript">
		function valid()
		{
			if(document.chngpwd.cpass.value=="")
			{
				alert("Current Password Filed is Empty !!");
				document.chngpwd.cpass.focus();
				return false;
			}
			else if(document.chngpwd.npass.value=="")
			{
				alert("New Password Filed is Empty !!");
				document.chngpwd.npass.focus();
				return false;
			}
			else if(document.chngpwd.cfpass.value=="")
			{
				alert("Confirm Password Filed is Empty !!");
				document.chngpwd.cfpass.focus();
				return false;
			}
			else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
			{
				alert("Password and Confirm Password Field do not match  !!");
				document.chngpwd.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body class="nav-md">
	<?php
	$page_title = 'Doctor | Change Password';
	$x_content = true;
	?>
	<?php include('include/header.php');?>
	<div class="row">
		<div class="col-md-12">
			<div class="row margin-top-30">
				<div class="col-lg-8 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Change Password</h5>
						</div>
						<div class="panel-body">
							<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
							<?php echo htmlentities($_SESSION['msg1']="");?></p>
							<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
								<div class="form-group">
									<label for="exampleInputEmail1">
										Current Password
									</label>
									<input type="password" name="cpass" class="form-control"  placeholder="Enter Current Password">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">
										New Password
									</label>
									<input type="password" name="npass" class="form-control"  placeholder="New Password">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">
										Confirm Password
									</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password">
								</div>
								<button type="submit" name="submit" class="btn btn-o btn-primary">
									Submit
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('include/footer.php');?>
	<!-- jQuery -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- Chart.js -->
	<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
	<!-- gauge.js -->
	<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- Skycons -->
	<script src="../vendors/skycons/skycons.js"></script>
	<!-- Flot -->
	<script src="../vendors/Flot/jquery.flot.js"></script>
	<script src="../vendors/Flot/jquery.flot.pie.js"></script>
	<script src="../vendors/Flot/jquery.flot.time.js"></script>
	<script src="../vendors/Flot/jquery.flot.stack.js"></script>
	<script src="../vendors/Flot/jquery.flot.resize.js"></script>
	<!-- Flot plugins -->
	<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
	<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
	<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
	<!-- DateJS -->
	<script src="../vendors/DateJS/build/date.js"></script>
	<!-- JQVMap -->
	<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
	<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
	<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../assets/js/custom.min.js"></script>
</body>
</html>