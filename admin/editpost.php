<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
    if (isset($_GET['id']) && $_GET['id'] != null) {
        $id = $_GET['id'];
        $query = "SELECT * FROM posts WHERE id='$id'";
        $result = $db->select($query);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $db->link->real_escape_string($_POST['title']);
            $category = $db->link->real_escape_string($_POST['category']);
            $date = $db->link->real_escape_string($_POST['date']);
            $tags = $db->link->real_escape_string($_POST['tags']);
            $content = $db->link->real_escape_string($_POST['content']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "assets/upload/".$unique_image;

            if ($title == "" || $category == "" || $content == "" || $date == "" || $tags == "") {
                $_SESSION['error'] = "Field can not be empty!";
            }elseif(empty($file_name)){
                $_SESSION['error'] = "Please select any image!";
            }elseif ($file_size >1048567) {
                $_SESSION['error'] = "Image Size should be less then 1MB!";
            } elseif (in_array($file_ext, $permited) === false) {
                    $permite = implode(', ', $permited);
                    $_SESSION['error'] = "You can upload only:- $permite";
                } else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $userid = $_SESSION['userid'];
                    $query = "INSERT INTO posts(cat, title, content, image, author, tags, date) VALUES('$category', '$title', '$content', '$uploaded_image', '$userid', '$tags', '$date')";
                    $inserted_rows = $db->insert($query);
                    if ($inserted_rows) {
                        $_SESSION['success'] = "Post Inserted Successfully.";
                    }else {
                        $_SESSION['error'] = "Post Not Inserted!";
                    }
                }
            }

    }else{
        $_SESSION['error'] = "Something went wrong! please try again.";
        goToUrl('viewpost.php');
    }
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Update Post
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <?php include '../helper/message.php'; ?>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                <?php while ($post = $result->fetch_assoc()) { ?>
                    <form role="form" action="addpost.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>" id="title" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select Category</option>

                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $result = $db->select($query);
                                    while ($cat = $result->fetch_assoc()) { ?>

                                        <option <?php if ($cat['id'] == $post['cat']) { echo 'selected'; } ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></option>

                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date" value="<?php echo $post['date']; ?>" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Image</label><br>
                                    <img src="<?php echo $post['image']; ?>" height="100px" width="200px" alt="">
                                    <input type="file" class="form-control" name="image" id="">
                                </div>
                                <div class="form-group">
                                    <label for="image">Content</label>
                                    <div class="box box-info">
                                        <div class="box-body pad">
                                            <textarea id="editor1" name="content" rows="10" cols="80"><?php echo $post['content']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" name="tags" value="<?php echo $post['tags']; ?>" class="form-control" id="tags" placeholder="Enter Tags">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                <?php } ?>
                    </div>
                    <!-- /.box -->
                </div>


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <script type="text/javascript">
            $(function() {

                nav_highlight('post','view-post');

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
