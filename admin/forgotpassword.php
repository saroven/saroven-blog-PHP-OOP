<?php
  include '../lib/Session.php';
  Session::checkLogin();
  ?>

  <?php
  include '../config/config.php';
  include '../lib/Database.php';
  include '../helper/Formate.php';
  $db = new Database();
  $fm = new Formate();

 ?>



<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $fm->validation($_POST['email']);
      $email = mysqli_real_escape_string($db->link, $email);

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid Email!';
      }else{
      $query = "SELECT * FROM users WHERE email= '$email'";
      $mailcheck = $db->select($query);
      if ($mailcheck != false) {
          while ($data = $mailcheck->fetch_assoc()) {
            $userid = $data['id'];
            $username = $data['name'];
          }
          $text = substr($email, 0,3);
          $rand = rand(10000, 99999);
          $newpass = $text.$rand;
          $password = md5($newpass);
          $query ="UPDATE users SET
                  password = '$password'
                  WHERE id = '$userid'";

            $updated_rows = $db->update($query);
            if ($updated_rows) {
              $to = $email;
              $from = "blog@gmail.com";
              $headers = "From: $from\n";
              $headers .= "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
              $subjct = "Your Password";
              $message = "Hello, $username\n your new password is: '$newpass'\n Thank You";
              $sendmail = mail($to, $subjct, $message, $headers);

              $_SESSION['success'] = "Please check your email for new password.";
            }else {
              $_SESSION['error'] = "Something Went Wrong!";
            }

    }else{
      $_SESSION['error'] = 'Email does not exist!';
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog | Forgot Password</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Blog</b></a>
  </div>

  <?php include '../helper/message.php';?>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>


    <form action="forgotpassword.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Request New Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="login.php">Login</a><br>
    <a href="signup.php">Register a new account</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
