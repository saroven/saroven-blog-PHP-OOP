<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Post
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
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Post Title">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                <option value="1">One</option>
                                <option value="2">two</option>
                                <option value="3">three</option>
                                <option value="4">four</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" class="form-control" name="image" id="">
                        </div>
                        <div class="form-group">
                            <label for="image">Content</label>
                            <div class="box box-info">
                                <div class="box-body pad">
                                    <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
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