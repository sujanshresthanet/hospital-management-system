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
	<link href="../assets/css/custom.css" rel="stylesheet">
</head>
<body class="nav-md">
	<?php
	$page_title = 'Doctor | Manage Patients';
	$x_content = true;
	?>
	<?php include('include/header.php');?>
	<div class="row">
		<div class="col-md-12">
			<form role="form" method="post" name="search">

				<div class="form-group">
					<label for="doctorname">
						Search by Name/Mobile No.
					</label>
					<input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
				</div>

				<button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
					Search
				</button>
			</form>
			<?php
			if(isset($_POST['search']))
			{

				$sdata=$_POST['searchdata'];
				?>
				<h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>

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
						$sql=mysqli_query($con,"select * from tblpatient where PatientName like '%$sdata%'|| PatientContno like '%$sdata%'");
						$num=mysqli_num_rows($sql);
						if($num>0){
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

									<a href="edit-patient.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></a> || <a href="view-patient.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>

								</td>
							</tr>
							<?php
							$cnt=$cnt+1;
						} } else { ?>
							<tr>
								<td colspan="8"> No record found against this search</td>

							</tr>

							<?php }} ?></tbody>
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