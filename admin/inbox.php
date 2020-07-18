<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
 ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        View Messages
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
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Message Lists</h3>
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
                                                $query = "SELECT * FROM contacts ORDER BY id DESC";
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
                                                <td><a href="viewmsg.php?msgid=<?php echo $result['id'] ?>">View</a> | <a href="replymsg.php?msgid=<?php echo $result['id'] ?>">Reply</a> | <a href="?seen=<?php echo $result['id'] ?>">Seen</a> | <a href="deletemsg.php?msgid=<?php echo $result['id'] ?>">Delete</a></td>
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
                    </div>


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
