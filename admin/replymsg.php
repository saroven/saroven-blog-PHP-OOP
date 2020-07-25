<?php
include 'inc/header.php';
include 'inc/sidebar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $subject = $fm->validation($_POST['subject']);
      $toemail = $fm->validation($_POST['email']);
      $fromemail = $fm->validation($_POST['fromemail']);
      $text = $fm->validation($_POST['text']);

      $subject = mysqli_real_escape_string($db->link, $subject);
      $toemail = mysqli_real_escape_string($db->link, $toemail);
      $fromemail = mysqli_real_escape_string($db->link, $fromemail);
      $text = mysqli_real_escape_string($db->link, $text);

      $errn= '';
      $errs= '';
      $errte= '';
      $errfe= '';
      $errm= '';

      if (empty($subject)) {
        $errs = 'Subject Can not be empty!';
      }
      if (!filter_var($toemail, FILTER_VALIDATE_EMAIL)) {
        $erre = 'Invalid Email!';
      }
      if (!filter_var($fromemail, FILTER_VALIDATE_EMAIL)) {
        $erre = 'Invalid Email!';
      }
      if (empty($text)) {
        $errm = 'Message Can not be empty!';
      }else{

        $headers = "From: $fromemail";

        $sendmail = mail($toemail, $subject, $text, $headers);

          if ($sendmail) {
            $_SESSION['success'] = "Message Send successfull.";
          }else {
            $_SESSION['error'] = "Something went wrong! Please try again.";
          }
      }
    } 

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM contacts WHERE id='$id'";
    $result = $db->select($query);
    $contact = $result->fetch_assoc();

}else{
    $_SESSION['error'] = 'Something went wrong! please try again.';
    goToUrl('inbox.php');
}


?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Reply Message
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <?php include '../helper/message.php'; ?>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" action="replymsg.php?id=<?php echo $contact['id']; ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="<?php echo $contact['name'] ?>" class="form-control" id="name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Email">To:</label>
                                <?php
                                if (isset($errte)) {
                                  echo "<span style='color:red'>$errte</span>";
                                }
                               ?>
                                <input type="txt" name="email" value="<?php echo $contact['email'] ?>" class="form-control" id="Email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fromEmail">From:</label>
                                <?php
                                if (isset($errfe)) {
                                  echo "<span style='color:red'>$errfe</span>";
                                }
                               ?>
                                <input type="email" name="fromemail" class="form-control" id="Email" >
                            </div>
                            <div class="form-group">
                                <label for="sub">Subject:</label>
                                <?php
                                if (isset($errs)) {
                                  echo "<span style='color:red'>$errs</span>";
                                }
                               ?>
                                <input type="sub" name="subject" class="form-control" id="Email" >
                            </div>
                            <div class="form-group">
                                <label for="">Message:</label>
                                <?php
                                if (isset($errm)) {
                                  echo "<span style='color:red'>$errm</span>";
                                }
                               ?>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" name="text" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                                
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php
        include 'inc/footer.php';

        ?>
        <!-- CK Editor -->
        <script src="bower_components/ckeditor/ckeditor.js"></script>
        <script>
            $(function () {

                // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('editor1')

                })
            </script>
