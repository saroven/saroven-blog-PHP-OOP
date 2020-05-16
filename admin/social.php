<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php
    $query = "SELECT * FROM socials WHERE id=1";
    $result = $db->select($query);
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fb = $fm->validation($_POST['fb']);
        $twi = $fm->validation($_POST['twi']);
        $ins = $fm->validation($_POST['ins']);
        $pin = $fm->validation($_POST['pin']);
        $fb = $db->link->real_escape_string($fb);
        $twi = $db->link->real_escape_string($twi);
        $ins = $db->link->real_escape_string($ins);
        $pin = $db->link->real_escape_string($pin);

        $query = "UPDATE socials
                SET fb = '$fb',
                twi = '$twi',
                ins = '$ins',
                pin = '$pin'
                WHERE id=1";
        $update = $db->update($query);
        if ($update) {
            $_SESSION['success'] = 'Updated successfully.';
            goToUrl('social.php');
        }else{
            $_SESSION['error'] = 'Faild to update! Please try again.';
        }
    }
?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Update Social Links
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <?php include '../helper/message.php' ?>
                            <!-- form start -->
                            <?php if ($result) {
                                while ($social = $result->fetch_assoc()) { ?>
                            <form role="form" method="post" action="social.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" value="<?php echo $social['fb'] ?>" name="fb" class="form-control" id="facebook" placeholder="Facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" value="<?php echo $social['twi'] ?>" name="twi" class="form-control" id="twitter" placeholder="Twitter">
                                    </div>
                                    <div class="form-group">
                                        <label for="Instagram">Instagram</label>
                                        <input type="text" value="<?php echo $social['ins'] ?>" name="ins" class="form-control" id="Instagram" placeholder="Instagram">
                                    </div>
                                    <div class="form-group">
                                        <label for="pinterest">Pinterest</label>
                                        <input type="text" value="<?php echo $social['pin'] ?>" name="pin" class="form-control" id="pinterest" placeholder="pinterest">
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <?php      } } ?>
                        </div>
                        <!-- /.box -->
                    </div>


                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

    <script type="text/javascript">
    $(function() {

      nav_highlight('site-option','social');

    });
  </script>
<?php
    include 'inc/footer.php';
 ?>
