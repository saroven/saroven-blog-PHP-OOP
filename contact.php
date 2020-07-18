<?php
  include 'include/header.php';
  include 'include/navbar.php';
 ?>
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $fm->validation($_POST['name']);
      $subject = $fm->validation($_POST['subject']);
      $email = $fm->validation($_POST['email']);
      $text = $fm->validation($_POST['text']);

      $name = mysqli_real_escape_string($db->link, $name);
      $subject = mysqli_real_escape_string($db->link, $subject);
      $email = mysqli_real_escape_string($db->link, $email);
      $text = mysqli_real_escape_string($db->link, $text);

      $errn= '';
      $errs= '';
      $erre= '';
      $errm= '';

      if (empty($name)) {
        $errn = 'Name Can not be empty!';
      }
      if(!filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS)){
        $errn = 'Invalid Name';
      }
      if (empty($subject)) {
        $errs = 'Subject Can not be empty!';
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erre = 'Invalid Email!';
      }
      if (empty($text)) {
        $errm = 'Message Can not be empty!';
      }else{

          $query = "INSERT INTO contacts(name, subject, email, text) VALUES('$name', '$subject', '$email', '$text')";
          $inserted_rows = $db->insert($query);

          if ($inserted_rows) {
            $_SESSION['success'] = "Message Send successfull.";
          }else {
            $_SESSION['error'] = "Something went wrong! Please try again.";
          }
      }
    }
 ?>


  <!--================ Hero sm banner start =================-->
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Contact Us</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm banner end =================-->
<div class="container">
  <?php include 'helper/message.php'; ?>
</div>
  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>California United States</h3>
              <p>Santa monica bullevard</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <form action="contact.php" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <?php
                    if (isset($errn)) {
                      echo "<span style='color:red'>$errn</span>";
                    }
                   ?>
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                </div>
                <div class="form-group">
                  <?php
                    if (isset($errs)) {
                      echo "<span style='color:red'>$errs</span>";
                    }
                   ?>
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                </div>
                <div class="form-group">
                  <?php
                    if (isset($erre)) {
                      echo "<span style='color:red'>$erre</span>";
                    }
                   ?>
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                  <?php
                    if (isset($errm)) {
                      echo "<span style='color:red'>$errm</span>";
                    }
                   ?>
                    <textarea class="form-control different-control w-100" name="text" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

<?php
  include 'include/footer.php';
?>
