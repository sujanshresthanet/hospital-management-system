<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reg Users | View Medical History</title>

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
<body class="nav-md">
	<?php
	$page_title = 'Users | Medical History';
	$x_content = true;
	?>
	<?php include('include/header.php');?>
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">View <span class="text-bold">Medical History</span></h5>

			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Patient Name</th>
						<th>Patient Contact Number</th>
						<th>Patient Gender </th>
						<th>Creation Date </th>
						<th>Updation Date </th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$uid=$_SESSION['id'];
					$sql=mysqli_query($con,"select tblpatient.* from tblpatient join users on users.email=tblpatient.PatientEmail where users.id='$uid'");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
					{
						?>
						<tr>
							<td class="center"><?php echo $cnt;?>.</td>
							<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
							<td><?php echo $row['PatientContno'];?></td>
							<td><?php echo $row['PatientGender'];?></td>
							<td><?php echo $row['CreationDate'];?></td>
							<td><?php echo $row['UpdationDate'];?>
						</td>
						<td>

							<a href="view-medhistory.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>

						</td>
					</tr>
					<?php
					$cnt=$cnt+1;
				}?></tbody>
			</table>
		</div>
	</div>
	<?php include('include/footer.php');?>
	<!-- jQuery -->
	<script src="vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="vendors/nprogress/nprogress.js"></script>
	<!-- Chart.js -->
	<script src="vendors/Chart.js/dist/Chart.min.js"></script>
	<!-- gauge.js -->
	<script src="vendors/gauge.js/dist/gauge.min.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="vendors/iCheck/icheck.min.js"></script>
	<!-- Skycons -->
	<script src="vendors/skycons/skycons.js"></script>
	<!-- Flot -->
	<script src="vendors/Flot/jquery.flot.js"></script>
	<script src="vendors/Flot/jquery.flot.pie.js"></script>
	<script src="vendors/Flot/jquery.flot.time.js"></script>
	<script src="vendors/Flot/jquery.flot.stack.js"></script>
	<script src="vendors/Flot/jquery.flot.resize.js"></script>
	<!-- Flot plugins -->
	<script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
	<script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
	<script src="vendors/flot.curvedlines/curvedLines.js"></script>
	<!-- DateJS -->
	<script src="vendors/DateJS/build/date.js"></script>
	<!-- JQVMap -->
	<script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
	<script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
	<script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="vendors/moment/min/moment.min.js"></script>
	<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="assets/js/custom.min.js"></script>
</body>
