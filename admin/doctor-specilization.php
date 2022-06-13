<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$sql=mysqli_query($con,"insert into doctorspecilization values('".$_POST['doctorspecilization']."')");
	$_SESSION['msg']="Doctor Specialization added successfully !!";
}
if(isset($_GET['del']))
{
	mysqli_query($con,"delete from doctorspecilization where id = '".$_GET['id']."'");
	$_SESSION['msg']="data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Doctor Specialization</title>
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
	$page_title = 'Admin | Add Doctor Specialization';
	$x_content = true;
	?>
	<?php include('include/header.php');?>
	<div class="row">
		<div class="col-md-12">
			<div class="row margin-top-30">
				<div class="col-lg-6 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Doctor Specialization</h5>
						</div>
						<div class="panel-body">
							<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
							<?php echo htmlentities($_SESSION['msg']="");?></p>
							<form role="form" name="dcotorspcl" method="post" >
								<div class="form-group">
									<label for="doctorspecilization">
										Doctor Specialization
									</label>
									<input id="doctorspecilization" type="text" name="doctorspecilization" class="form-control" required = "required" placeholder="Enter Doctor Specialization">
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
		<div class="col-lg-12 col-md-12">
			<div class="panel panel-white">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt-5">
			<h5 class="over-title">Manage <span class="text-bold">Docter Specialization</span></h5>
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Specialization</th>
						<th class="hidden-xs">Creation Date</th>
						<th>Updation Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql=mysqli_query($con,"select * from doctorspecilization");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
					{
						?>
						<tr>
							<td class="center"><?php echo $cnt;?>.</td>
							<td class="hidden-xs"><?php echo $row['specilization'];?></td>
							<td><?php echo $row['creationDate'];?></td>
							<td><?php echo $row['updationDate'];?>
						</td>
						<td >
							<div class="visible-md visible-lg hidden-sm hidden-xs">
								<a href="edit-doctor-specialization.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
								<a href="doctor-specilization.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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