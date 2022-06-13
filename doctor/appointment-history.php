<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['cancel']))
{
	mysqli_query($con,"update appointment set doctorStatus='0' where id ='".$_GET['id']."'");
	$_SESSION['msg']="Appointment canceled !!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor | Appointment History</title>

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
</head>
<body class="nav-md">
	<?php
	$page_title = 'Doctor  | Appointment History';
	$x_content = true;
	?>
	<?php include('include/header.php');?>

	<div class="row">
		<div class="col-md-12">

			<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
			<?php echo htmlentities($_SESSION['msg']="");?></p>
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th class="hidden-xs">Patient  Name</th>
						<th>Specialization</th>
						<th>Consultancy Fee</th>
						<th>Appointment Date / Time </th>
						<th>Appointment Creation Date  </th>
						<th>Current Status</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$sql=mysqli_query($con,"select users.fullName as fname,appointment.*  from appointment join users on users.id=appointment.userId where appointment.doctorId='".$_SESSION['id']."'");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
					{
						?>

						<tr>
							<td class="center"><?php echo $cnt;?>.</td>
							<td class="hidden-xs"><?php echo $row['fname'];?></td>
							<td><?php echo $row['doctorSpecialization'];?></td>
							<td><?php echo $row['consultancyFees'];?></td>
							<td><?php echo $row['appointmentDate'];?> / <?php echo
							$row['appointmentTime'];?>
						</td>
						<td><?php echo $row['postingDate'];?></td>
						<td>
							<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
							{
								echo "Active";
							}
							if(($row['userStatus']==0) && ($row['doctorStatus']==1))
							{
								echo "Cancel by Patient";
							}

							if(($row['userStatus']==1) && ($row['doctorStatus']==0))
							{
								echo "Cancel by you";
							}



							?></td>
							<td >
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
									{ ?>


										<a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
									<?php } else {

										echo "Canceled";
									} ?>
								</div>
							</td>
						</tr>

						<?php
						$cnt=$cnt+1;
					}?>


				</tbody>
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
</html>