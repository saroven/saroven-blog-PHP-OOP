<?php
  // Session::checkSession();
  ?>

<?php
  include 'helper/functions.php';
  include 'lib/Session.php';
  include 'config/config.php';
  include 'lib/Database.php';
  include 'helper/Formate.php';
?>
<?php
  $db = new Database();
  $fm = new Formate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog - Home</title>
	<link rel="icon" href="assets/img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/linericon/style.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
