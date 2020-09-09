<?php


include 'inc/header.php';
include 'inc/sidebar.php';
include '../helper/permission_check.php';
    
if (isset($_GET['seen']) && $_GET['seen'] != '') {

    $id = $_GET['seen'];
    $query = "UPDATE contacts SET status = 1 WHERE id = $id;";

    $result = $db->update($query);
    if ($result) {
        $_SESSION['success'] = 'Moved to seen message';
    }else{
        $_SESSION['error'] = 'Something Went Wrong!';
    }
}

if (isset($_GET['unseen']) && $_GET['unseen'] != '') {

    $id = $_GET['unseen'];
    $query = "UPDATE contacts SET status = 0 WHERE id = $id;";

    $result = $db->update($query);
    if ($result) {
        $_SESSION['success'] = 'Moved to Unseen message';
    }else{
        $_SESSION['error'] = 'Something Went Wrong!';
    }
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
        <li><a href="inbox.php"><i class="fa fa-inbox"></i> Inbox
          <span class="label label-primary pull-right">12</span></a></li>
          <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
          <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
          <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
          </li>
          <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
      </ul>
  </div>
  <!-- /.box-body -->
</div>

</div>
<!-- /.col -->
<div class="col-md-9">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box">
            <div class="box-header">
                <?php include '../helper/message.php';?>
                <h3 class="box-title">Unseen Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Sender Name</th>
                            <th>Subject</th>
                            <th>Sender Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM contacts WHERE status=0 ORDER BY id DESC";
                        $contact = $db->select($query);
                        if ($contact) {
                            $i = 0;
                            while ($result = $contact->fetch_assoc()) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['subject']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $fm->textShorten($result['text']); ?></td>
                                    <td><?php echo $fm->formatDate($result['date']);?></td>
                                    <td><a href="viewmsg.php?id=<?php echo $result['id'] ?>">View</a> | <a href="replymsg.php?id=<?php echo $result['id'] ?>">Reply</a> | <a href="?seen=<?php echo $result['id'] ?>">Seen</a> | <a onclick="confirm('Are you sure ?')"; href="delmsg.php?msgid=<?php echo $result['id'] ?>">Delete</a></td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Serial No.</th>
                                <th>Sender Name</th>
                                <th>Subject</th>
                                <th>Sender Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
         <div class="box">
            <div class="box-header">
                <?php include '../helper/message.php';?>
                <h3 class="box-title">Seen Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Sender Name</th>
                            <th>Subject</th>
                            <th>Sender Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM contacts WHERE status=1 ORDER BY id DESC";
                        $contact = $db->select($query);
                        if ($contact) {
                            $i = 0;
                            while ($result = $contact->fetch_assoc()) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['subject']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $fm->textShorten($result['text']); ?></td>
                                    <td><?php echo $fm->formatDate($result['date']);?></td>
                                    <td><a href="viewmsg.php?id=<?php echo $result['id'] ?>">View</a> | <a href="replymsg.php?id=<?php echo $result['id'] ?>">Reply</a> | <a href="?unseen=<?php echo $result['id'] ?>">Unseen</a> | <a onclick="confirm('Are you sure ?')" href="delmsg.php?msgid=<?php echo $result['id'] ?>">Delete</a></td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Serial No.</th>
                                <th>Sender Name</th>
                                <th>Subject</th>
                                <th>Sender Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
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
        $('#example1').DataTable()
        
      // nav highlight function

      // nav_highlight('category','add-category');

  });
</script>
})
</script>
