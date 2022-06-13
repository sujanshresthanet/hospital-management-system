<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$vid=$_GET['viewid'];
	$bp=$_POST['bp'];
	$bs=$_POST['bs'];
	$weight=$_POST['weight'];
	$temp=$_POST['temp'];
	$pres=$_POST['pres'];
	$query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
	if ($query) {
		echo '<script>alert("Medicle history has been added.")</script>';
		echo "<script>window.location.href ='manage-patient.php'</script>";
	}
	else
	{
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor | Manage Patients</title>
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
<body class="nav-md">
	<?php
	$page_title = 'Doctor | Manage Patients';
	$x_content = true;
	?>
	<?php include('include/header.php');?>
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
			<?php
			$vid=$_GET['viewid'];
			$ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
			$cnt=1;
			while ($row=mysqli_fetch_array($ret)) {
				?>
				<table border="1" class="table table-bordered">
					<tr align="center">
						<td colspan="4" style="font-size:20px;color:blue">
						Patient Details</td></tr>
						<tr>
							<th scope>Patient Name</th>
							<td><?php  echo $row['PatientName'];?></td>
							<th scope>Patient Email</th>
							<td><?php  echo $row['PatientEmail'];?></td>
						</tr>
						<tr>
							<th scope>Patient Mobile Number</th>
							<td><?php  echo $row['PatientContno'];?></td>
							<th>Patient Address</th>
							<td><?php  echo $row['PatientAdd'];?></td>
						</tr>
						<tr>
							<th>Patient Gender</th>
							<td><?php  echo $row['PatientGender'];?></td>
							<th>Patient Age</th>
							<td><?php  echo $row['PatientAge'];?></td>
						</tr>
						<tr>
							<th>Patient Medical History(if any)</th>
							<td><?php  echo $row['PatientMedhis'];?></td>
							<th>Patient Reg Date</th>
							<td><?php  echo $row['CreationDate'];?></td>
						</tr>
					<?php }?>
				</table>
				<?php
				$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");
				?>
				<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<tr align="center">
						<th colspan="8" >Medical History</th>
					</tr>
					<tr>
						<th>#</th>
						<th>Blood Pressure</th>
						<th>Weight</th>
						<th>Blood Sugar</th>
						<th>Body Temprature</th>
						<th>Medical Prescription</th>
						<th>Visit Date</th>
					</tr>
					<?php
					while ($row=mysqli_fetch_array($ret)) {
						?>
						<tr>
							<td><?php echo $cnt;?></td>
							<td><?php  echo $row['BloodPressure'];?></td>
							<td><?php  echo $row['Weight'];?></td>
							<td><?php  echo $row['BloodSugar'];?></td>
							<td><?php  echo $row['Temperature'];?></td>
							<td><?php  echo $row['MedicalPres'];?></td>
							<td><?php  echo $row['CreationDate'];?></td>
						</tr>
						<?php $cnt=$cnt+1;} ?>
					</table>
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