<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../helper/permission_check.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $db->link->real_escape_string($_POST['title']);
    $content = $db->link->real_escape_string($_POST['content']);

    if ($title == ""|| $content == "") {

        $_SESSION['error'] = "Field can not be empty!";

    }else{
            $query = "INSERT INTO pages(title, content) VALUES('$title', '$content')";
            $inserted_rows = $db->insert($query);

            if ($inserted_rows) {
                $_SESSION['success'] = "Page created successfully.";
            }else {
                $_SESSION['error'] = "Faild to create new page!";
            }
        }
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Add Page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <?php include '../helper/message.php'; ?>

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" action="addpage.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Page Title">
                            </div>
                            <div class="form-group">
                                <label for="image">Content</label>
                                <div class="box box-info">
                                    <div class="box-body pad">
                                        <textarea id="editor1" name="content" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
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

                nav_highlight('page','add-page');

            });
        </script>

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
