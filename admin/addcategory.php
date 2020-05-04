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
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $title = $_POST['title'];                      
                        $title = mysqli_real_escape_string($db->link, $title);
                        if (empty($title)) {
                        failed('Field must not be empty!');
                      }else {
                        $query = "INSERT INTO categories(title) VALUES('$title')";
                        $result = $db->insert($query);
                        if ($result) {
                            success('Category Inserted Succecssfully.');
                        }else{
                            failed('Category Not Inserted');
                        }
                      }
                  }
                 ?>
                <!-- form start -->
                <form role="form" action="" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="category">Category Name</label>
                            <input type="text" name="title" class="form-control" id="category" placeholder="Enter Category Name">
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

<?php
    include 'inc/footer.php';
 ?>
       