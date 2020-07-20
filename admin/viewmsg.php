<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>

<?php
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
        Read Mail
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a>

      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body no-padding">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="inbox.php"><i class="fa fa-inbox"></i> Inbox</a></li>
          <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
          <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
          <li><a href="#"><i class="fa fa-filter"></i> Junk</a>
          </li>
          <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
      </ul>
  </div>
  <!-- /.box-body -->
</div>
<!-- /. box -->

</div>
<!-- /.col -->
<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Read Mail</h3>

      <div class="box-tools pull-right">
        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
    </div>
</div>
<!-- /.box-header -->
<div class="box-body no-padding">
  <div class="mailbox-read-info">
    <h3><?php echo $contact['subject']; ?></h3>
    <h5>From: <?php echo $contact['email']; ?> <br>
      <span class="mailbox-read-time pull-right"><?php echo $fm->formatDate($contact['date']); ?></span></h5>
  </div>
  <!-- /.mailbox-read-info -->

      <!-- /.mailbox-controls -->
    <div class="mailbox-read-message">
        <h5>Sender Name: <?php echo $contact['name']; ?></h5> <hr>
        <?php echo $contact['text']; ?>
    </div>
        <!-- /.mailbox-read-message -->
    </div>
    <!-- /.box-body -->

<!-- /.box-footer -->
<div class="box-footer">
  <div class="pull-right">
    <a href="replymsg.php?id=<?php echo $contact['id'] ?>" class="btn btn-default"><i class="fa fa-reply"></i> Reply</a>
    <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
</div>
<button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
</div>
<!-- /.box-footer -->
</div>
<!-- /. box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'inc/footer.php';
?>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {

        //data table
        // $('#example1').DataTable()
        
      // nav highlight function

      // nav_highlight('category','add-category');

  });
</script>
})
</script>
