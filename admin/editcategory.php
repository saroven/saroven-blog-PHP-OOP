<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Category
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
                <?php
                    if (isset($_GET['id']) && !empty($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM categories WHERE id='$id'";
                        $result = $db->select($query);
                        $category = $result->fetch_assoc();

                    }else{
                        $_SESSION['error'] = 'Something went wrong! please try again.';
                        goToUrl('viewcategory.php');
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $title = $_POST['title'];
                        $title = $db->link->real_escape_string($title);
                        if (empty($title)) {
                        failed('Field must not be empty!');
                      }else {
                            $query = "UPDATE categories SET title = '$title' WHERE id='$id'";
                            $result = $db->update($query);
                            if ($result) {
                                $_SESSION['success'] = 'Category Updated Successfull';
                                goToUrl('viewcategory.php');
                            }else{
                                failed('Category Not Updated!');
                            }
                        }
                    }
                 ?>
                <!-- form start -->
                <form role="form" action="" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="category">Category Name</label>
                            <input type="hidden" name="catid" value="<?php echo $category['id']; ?>">
                            <input type="text" name="title" value="<?php echo $category['title']; ?>" class="form-control" id="category" placeholder="Enter Category Name">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
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
