<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';

    $query = "SELECT * FROM title_slogan WHERE id=1";
    $result = $db->select($query);
 ?>

<?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $fm->validation($_POST['title']);
            $slogan = $fm->validation($_POST['slogan']);
            $title = $db->link->real_escape_string($title);
            $slogan = $db->link->real_escape_string($slogan);

            // image upload
            $permited  = array('png');
            $file_name = $_FILES['logo']['name'];
            $file_size = $_FILES['logo']['size'];
            $file_temp = $_FILES['logo']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $image_name = 'logo'.'.'.$file_ext;
            $uploaded_image = "assets/upload/".$image_name;


            if ($title == "" || $slogan == "") {
                $_SESSION['error'] = "Field can not be empty!";
                // goToUrl('editpost.php');
            }else {
                if (!empty($file_name)) {

                    // check for file size
                    if ($file_size >1048567) {
                        $_SESSION['error'] = "Image Size should be less then 1MB!";
                    }elseif (in_array($file_ext, $permited) === false) {
                            $permite = implode(', ', $permited);
                            $_SESSION['error'] = "You can upload only:- $permite";
                        } else{
                            move_uploaded_file($file_temp, $uploaded_image);

                            $query ="UPDATE title_slogan SET
                                    title = '$title',
                                    slogan = '$slogan',
                                    logo = '$uploaded_image'
                                    WHERE id =1";

                            $updated_rows = $db->update($query);
                            if ($updated_rows) {
                                $_SESSION['success'] = "Data Updated Successfully.";
                            }else {
                                $_SESSION['error'] = "Data Not Updated!";
                            }
                        }
                    }else {
                        $query ="UPDATE title_slogan SET
                                    title = '$title',
                                    slogan = '$slogan'
                                    WHERE id =1";

                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                            $_SESSION['success'] = "Data Updated Successfully.";
                            goToUrl('titleslogan.php');
                        }else {
                            $_SESSION['error'] = "Data Not Updated!";
                        }
                    }

                }
            }


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

            <?php include '../helper/message.php' ?>

            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
       <?php  if ($result) {

        while ($data = $result->fetch_assoc()) { ?>

                <form role="form" method="post" action="titleslogan.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Website Title</label>
                            <input type="text" value="<?php echo $data['title']; ?>" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="sologan">Website Sologan</label>
                            <input type="text" name="slogan" value="<?php echo $data['slogan']; ?>" class="form-control" id="sologan" placeholder="Sologan">
                        </div>
                        <div class="form-group">
                            <label for="logo">Website Logo</label> <br>
                            <img src="<?php echo $data['logo']; ?>" alt="website logo" style="padding: 20px; height:70px; width:150px">
                            <input type="file" class="form-control" id="" name="logo">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
        <?php } }?>
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
