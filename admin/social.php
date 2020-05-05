<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Update Social Links
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
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" placeholder="Facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" id="twitter" placeholder="Twitter">
                                    </div>
                                    <div class="form-group">
                                        <label for="LinkedIn">LinkedIn</label>
                                        <input type="text" class="form-control" id="linkedin" placeholder="LinkedIn">
                                    </div>
                                    <div class="form-group">
                                        <label for="Instagram">Instagram</label>
                                        <input type="text" class="form-control" id="Instagram" placeholder="Instagram">
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

      nav_highlight('site-option','social');

    });
  </script>
<?php 
    include 'inc/footer.php';
 ?>