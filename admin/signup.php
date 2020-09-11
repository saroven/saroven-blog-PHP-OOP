<?php 
include '../config/config.php';
include '../lib/Database.php';
include '../helper/Formate.php';
include '../lib/Session.php';
Session::checkLogin();

$fm = new Formate();
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fm->validation($_POST['name']);
    $fm->validation($_POST['email']);
    $fm->validation($_POST['gender']);
    $fm->validation($_POST['birthday']);

    $name = $db->link->real_escape_string($_POST['name']);
    $email = $db->link->real_escape_string($_POST['email']);
    $gender = $db->link->real_escape_string($_POST['gender']);
    $password = $db->link->real_escape_string($_POST['password']);
    $cpassword = $db->link->real_escape_string($_POST['cpassword']);
    $birthday = date('Y-m-d',  strtotime($_POST['birthday']));

    if ($name == "" || $email == "" || $gender == "" || $birthday == "" || $password == "" || $cpassword == "") {
            $_SESSION['error'] = "Field can not be empty!";
          }else{
            $query = "SELECT * FROM users WHERE email= '$email'";
            $mailcheck = $db->select($query);
            if ($mailcheck) {
            $_SESSION['error'] = "Email Already exist! Try difrent one.";
        
    }
          }

    $query = "SELECT * FROM users WHERE email= '$email'";
    $mailcheck = $db->select($query);
    if ($mailcheck) {
        $_SESSION['error'] = "Email Already exist! Try diffrent one.";
        
    }else{
      if ($password == $cpassword) {
        $password = md5($password);
        $query = "INSERT INTO users(name, email, gender, birthday, password) VALUES('$name', '$email', '$gender', '$birthday', '$password')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
            $_SESSION['success'] = "Registration Successfull. Please login";
        }else {
            $_SESSION['error'] = "Something Went Wrong! Please try again.";
        }
      }else{
        $_SESSION['error'] = "Password and Confirm password not matched !";
      }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="assets/index2.html"><b>Blog</b>SignUp</a>
  </div>
    <?php include '../helper/message.php'; ?>
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="signup.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="name" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="gender" id="Gender" class="form-control" style="-o-appearance: none;-ms-appearance: none;-webkit-appearance: none;-moz-appearance: none;appearance: none;">
        <option value="">Select Gender</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
        </select>
        <span><i class="fa fa-user form-control-feedback"></i></span>
      </div>
      <div class="form-group has-feedback">            
        <input type="text" placeholder="Birth Date" name="birthday" class="form-control" id="datepicker">
        <span><i class="fa fa-calendar form-control-feedback"></i></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="cpassword" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<!--     <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <a href="login.php" class="text-center">Login</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
    //Date picker
      $('#datepicker').datepicker({
          autoclose: true
      });
  });
</script>

</body>
</html>
