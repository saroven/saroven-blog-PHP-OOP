<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Site Title & Slogan
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
                <form role="form" method="post" action="titleslogan.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Website Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="sologan">Website Sologan</label>
                            <input type="text" class="form-control" id="sologan" placeholder="Sologan">
                        </div>
                        <div class="form-group">
                            <label for="logo">Website Logo</label> <br>
                            <img src="assets/upload/logo.png" alt="website logo" style="padding: 20px; height:70px; width:150px">
                            <input type="file" class="form-control" id="logo">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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

      nav_highlight('site-option','title');

    });
  </script>
 <?php
    include 'inc/footer.php';
  ?>
