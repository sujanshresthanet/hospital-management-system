<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
	$docid=$_SESSION['id'];
	$patname=$_POST['patname'];
	$patcontact=$_POST['patcontact'];
	$patemail=$_POST['patemail'];
	$gender=$_POST['gender'];
	$pataddress=$_POST['pataddress'];
	$patage=$_POST['patage'];
	$medhis=$_POST['medhis'];
	$sql=mysqli_query($con,"insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
	if($sql)
	{
		echo "<script>alert('Patient info added Successfully');</script>";
		header('location:add-patient.php');

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor | Add Patient</title>

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

	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data:'email='+$("#patemail").val(),
				type: "POST",
				success:function(data){
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error:function (){}
			});
		}
	</script>
</head>
<body class="nav-md">
	<?php
	$page_title = 'Patient | Add Patient';
	$x_content = true;
	?>
	<?php include('include/header.php');?>

	<div class="row">
		<div class="col-md-12">
			<div class="row margin-top-30">
				<div class="col-lg-8 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Add Patient</h5>
						</div>
						<div class="panel-body">
							<form role="form" name="" method="post">

								<div class="form-group">
									<label for="doctorname">
										Patient Name
									</label>
									<input type="text" name="patname" class="form-control"  placeholder="Enter Patient Name" required="true">
								</div>
								<div class="form-group">
									<label for="fess">
										Patient Contact no
									</label>
									<input type="text" name="patcontact" class="form-control"  placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
								</div>
								<div class="form-group">
									<label for="fess">
										Patient Email
									</label>
									<input type="email" id="patemail" name="patemail" class="form-control"  placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
									<span id="user-availability-status1" style="font-size:12px;"></span>
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
								<div class="form-group">
									<label for="address">
										Patient Address
									</label>
									<textarea name="pataddress" class="form-control"  placeholder="Enter Patient Address" required="true"></textarea>
								</div>
								<div class="form-group">
									<label for="fess">
										Patient Age
									</label>
									<input type="text" name="patage" class="form-control"  placeholder="Enter Patient Age" required="true">
								</div>
								<div class="form-group">
									<label for="fess">
										Medical History
									</label>
									<textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"></textarea>
								</div>

								<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
									Add
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<div class="panel panel-white">
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