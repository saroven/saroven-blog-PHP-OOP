<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../helper/permission_check.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Users
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
                        <?php include '../helper/message.php';?>


                        <h3 class="box-title">User Lists</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Birth Date</th>
                                    <th>Role</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM users ORDER BY id DESC";
                                    $result = $db->select($query);
                                ?>
                                    <?php if ($result) {
                                        $i =0;
                                        while ($user = $result->fetch_assoc()) {
                                            $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['email']; ?></td>

                                        <?php $gender = $user['gender']; ?>

                                        <td><?php if ($gender == 1) {echo "Male";}elseif ($gender == 2) {echo "Female";}elseif($gender == 3) {echo "Other";} ?></td>
                                        <td><?php echo $fm->formatDate($user['birthday']); ?></td>

                                        <?php $role = $user['role_id']; ?>
                                        <td><?php if ($role == 1) {echo "Admin";}elseif ($role == 2) {echo "Editor";}elseif($role == 3) {echo "Author";} ?></td>
                                        <?php $status = $user['status']; ?>
                                        <td><?php if ($status == 1) {echo "Active";}else {echo "Deactive"; } ?></td>
                                        <td><a href="edituser.php?id=<?php echo $user['id'] ?>">Edit</a>
                                         |
                                        <a onclick="return confirm('Are you sure?');" href="deleteuser.php?id=<?php echo $user['id']; ?>">Delete</a></td>
                                    </tr>
                                        <?php }} ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                   <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Birth Date</th>
                                    <th>Role</th>
                                    <th>status</th>
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

<script type="text/javascript">
    $(function() {

      nav_highlight('users','view-user');

    });
  </script>

<?php
    include 'inc/footer.php';
?>
