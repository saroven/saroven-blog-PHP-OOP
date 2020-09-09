<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../helper/permission_check.php';
?>


<?php
    if (isset($_GET['delcat']) && $_GET['delcat'] !== null) {
        $id = $_GET['delcat'];

        $q = "SELECT * FROM categories WHERE id='$id'";
        $data = $db->select($q);
        if ($data) {
            $query = "DELETE FROM categories WHERE id='$id'";
            $result = $db->delete($query);
            if ($result) {
                $_SESSION['success'] = 'Deleted Successfull.';
            }else{
                $_SESSION['error'] = 'Delete Operation Failed!';
            }
        }else{
            $_SESSION['error'] = 'Something went wrong!';
        }
    }

 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Categories
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
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
                        <h3 class="box-title">Category Lists</h3>
                        <div class="pull-right"><a href="addcategory.php" class="btn btn-primary">Add Category</a></div>
                    </div>
                    <!-- /.box-header -->
                    <?php include '../helper/message.php'; ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sorial No.</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                        <?php
                            $query = "SELECT * FROM categories ORDER BY id DESC";
                            $category = $db->select($query);
                            if ($category) {
                                $i = 0;
                                while ($result = $category->fetch_assoc()) {
                                    $i++;
                         ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['title']; ?></td>
                                    <td>
                                        <a href="editcategory.php?id=<?php echo $result['id']; ?>">Edit</a>
                                    <?php if (Session::get('role_id') == 1) {?>
                                         | <a onclick="return confirm('Are You Sure?')" href="viewcategory.php?delcat=<?php echo $result['id']; ?>">Delete</a>
                                     <?php } ?>
                                    </td>
                                </tr>

                            <?php } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sorial No.</th>
                                    <th>Catagory Name</th>
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

      nav_highlight('category','view-category');

    });
  </script>

<?php
    include 'inc/footer.php';
 ?>

