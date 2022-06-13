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
  <title>Admin  | Dashboard</title>
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
  <?php include('include/header.php');?>
  <div class="tile_count">
    <div class="row">
      <?php

      $result = mysqli_query($con,"SELECT * FROM users ");
      $num_rows = mysqli_num_rows($result);
      $total_users = htmlentities($num_rows);

      $result1 = mysqli_query($con,"SELECT * FROM doctors ");
      $num_rows1 = mysqli_num_rows($result1);
      $total_doctors = htmlentities($num_rows1);

      $sql= mysqli_query($con,"SELECT * FROM appointment");
      $num_rows2 = mysqli_num_rows($sql);
      $total_appointments = htmlentities($num_rows2);

      $result = mysqli_query($con,"SELECT * FROM tblpatient ");
      $num_rows = mysqli_num_rows($result);
      $total_patients = htmlentities($num_rows);

      $sql= mysqli_query($con,"SELECT * FROM tblcontactus where  IsRead is null");
      $num_rows22 = mysqli_num_rows($sql);
      $total_queries = htmlentities($num_rows22);

      ?>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
        <div class="count"><?php echo $total_users; ?></div>
        <a href="manage-users.php">
          <span class="count_bottom">View all users</span>
        </a>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user-md"></i> Total Doctors</span>
        <div class="count"><?php echo $total_doctors; ?></div>
        <a href="manage-doctors.php">
          <span class="count_bottom">View all doctors</span>
        </a>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-list-alt"></i> Total Appointments</span>
        <div class="count"><?php echo $total_appointments; ?></div>
        <a href="appointment-history.php">
          <span class="count_bottom">View all appointments</span>
        </a>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Patients</span>
        <div class="count"><?php echo $total_patients; ?></div>
        <a href="manage-patient.php">
          <span class="count_bottom">View all patients</span>
        </a>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-copy"></i> Total Queries</span>
        <div class="count green"><?php echo $total_queries; ?></div>
        <a href="read-query.php">
          <span class="count_bottom">View all queries</span>
        </a>
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