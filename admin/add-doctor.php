<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
	$docname=$_POST['docname'];
	$docaddress=$_POST['clinicaddress'];
	$docfees=$_POST['docfees'];
	$doccontactno=$_POST['doccontact'];
	$docemail=$_POST['docemail'];
	$password=md5($_POST['npass']);
	$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
	if($sql)
	{
		echo "<script>alert('Doctor info added Successfully');</script>";
		echo "<script>window.location.href ='manage-doctors.php'</script>";

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Add Doctor</title>

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
	<script type="text/javascript">
		function valid()
		{
			if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
			{
				alert("Password and Confirm Password Field do not match  !!");
				document.adddoc.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>


	<script>
		function checkemailAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data:'emailid='+$("#docemail").val(),
				type: "POST",
				success:function(data){
					$("#email-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error:function (){}
			});
		}
	</script>
</head>
<body class="nav-md">
	<?php
	$page_title = 'Add Doctor';
	$x_content = true;
	?>
	<?php include('include/header.php');?>

	<div class="row">
		<div class="col-md-12">

			<div class="row margin-top-30">
				<div class="col-lg-8 col-md-12">
					<div class="panel panel-white">
						<div class="panel-body">

							<form role="form" name="adddoc" method="post" onSubmit="return valid();">
								<div class="form-group">
									<label for="DoctorSpecialization">
										Doctor Specialization
									</label>
									<select name="Doctorspecialization" class="form-control" required="true">
										<option value="">Select Specialization</option>
										<?php $ret=mysqli_query($con,"select * from doctorspecilization");
										while($row=mysqli_fetch_array($ret))
										{
											?>
											<option value="<?php echo htmlentities($row['specilization']);?>">
												<?php echo htmlentities($row['specilization']);?>
											</option>
										<?php } ?>

									</select>
								</div>

								<div class="form-group">
									<label for="doctorname">
										Doctor Name
									</label>
									<input type="text" name="docname" class="form-control"  placeholder="Enter Doctor Name" required="true">
								</div>


								<div class="form-group">
									<label for="address">
										Doctor Clinic Address
									</label>
									<textarea name="clinicaddress" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true"></textarea>
								</div>
								<div class="form-group">
									<label for="fess">
										Doctor Consultancy Fees
									</label>
									<input type="text" name="docfees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
								</div>

								<div class="form-group">
									<label for="fess">
										Doctor Contact no
									</label>
									<input type="text" name="doccontact" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
								</div>

								<div class="form-group">
									<label for="fess">
										Doctor Email
									</label>
									<input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
									<span id="email-availability-status"></span>
								</div>




								<div class="form-group">
									<label for="exampleInputPassword1">
										Password
									</label>
									<input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
								</div>

								<div class="form-group">
									<label for="exampleInputPassword2">
										Confirm Password
									</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
								</div>



								<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
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
	<!-- start: FOOTER -->
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
