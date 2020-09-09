
<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../helper/permission_check.php';
 ?>
<?php
    $query = "SELECT * FROM footer WHERE id=1";
    $footerdata = $db->select($query);
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // data validation
        $copyright = $fm->validation($_POST['copyright']);
        $about = $fm->validation($_POST['about']);

        // check for mysql injection
        $copyright = $db->link->real_escape_string($copyright);
        $about = $db->link->real_escape_string($about);

        $query = "UPDATE footer
                SET
                copyright = '$copyright',
                about = '$about'
                WHERE id=1";
        $update = $db->update($query);
        if ($update) {
            $_SESSION['success'] = 'Updated successfully.';
            goToUrl('footeroption.php');
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
            Update Footer Texts
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <?php if($footerdata){
                    while ($footer = $footerdata->fetch_assoc()) { ?>
                <form role="form" method="post" action="footeroption.php">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="copyright">Copyright Text</label>
                            <input type="text" value="<?= $footer['copyright']; ?>" name="copyright" class="form-control" id="copyright" placeholder="Enter Copyright Text">
                        </div>
                        <div class="form-group">
                            <label for="copyright">About Us</label>
                            <textarea name="about" id="about-us" class="form-control" cols="30" rows="10"><?= $footer['about']; ?></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php    }} ?>
            </div>

            <!-- /.box -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(function() {

      nav_highlight('site-option','footer');

    });
  </script>

<?php
    include 'inc/footer.php';
 ?>
