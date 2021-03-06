<?php

  //set headers to NOT cache a page
  // header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  // header("Pragma: no-cache"); //HTTP 1.0
  // header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  // Date in the past
  //or, if you DO want a file to cache, use:
  // header("Cache-Control: max-age=2592000");
//30days (60sec * 60min * 24hours * 30days)



header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


  include '../helper/functions.php';
  include '../lib/Session.php';
  Session::checkSession();
  ?>
  <?php
  include '../config/config.php';
  include '../lib/Database.php';
  include '../helper/Formate.php';

?>

<?php
  $db = new Database();
  $fm = new Formate();
  $uname = Session::get('name');
  $urole = Session::get('role_id');

?>

<?php
  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Session::destroy();
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

  <!-- jQuery 3 -->
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Blog</b>Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <?php if (Session::get('role_id') == 1 || Session::get('role_id') == 2) {?>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <?php
                $query = "SELECT * FROM contacts WHERE status=0 ORDER BY id DESC";
                $msg = $db->select($query);
                $count = '';
                if ($msg) {
                  $count = mysqli_num_rows($msg);
                }

              ?>
              <span class="label label-success"><?php echo $count; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- start message -->
                  <?php 
                    $query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 4";
                    $messages = $db->select($query);
                    if ($messages) {
                      $i = 0;
                      while ($message = $messages->fetch_assoc()) {
                          $i++;
                    ?>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $message['name']; ?>
                        <small><i class="fa fa-clock-o"></i> <?php echo $fm->timeago($message['date']);?></small>
                      </h4>
                      <p><?php echo $fm->textShorten($message['text']); ?></p>
                    </a>
                  </li>

                  <?php } } ?>
                  
                  <!-- end message -->

                </ul>
              </li>
              <li class="footer"><a href="inbox.php">See All Messages</a></li>
            </ul>
          </li>
        <?php } ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $uname; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $uname; ?> - <?php if ($urole == 1) {echo "Admin";}elseif ($urole == 2) {echo "Editor";}else{echo "Author";} ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="changepassword.html" class="btn btn-default">Change Password</a>
                  </div>

                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="row">
                  <div class="col-xs-4">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="col-xs-4">
                  <?php if (Session::get('role_id') == 1 || Session::get('role_id') == 2): ?>
                  <a href="inbox.php" class="btn btn-default btn-flat">Inbox</a>
                  <?php endif ?>
                </div>
                <div class="col-xs-4">
                  <a href="?action=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
