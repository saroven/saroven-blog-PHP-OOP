<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Posts
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


                        <h3 class="box-title">Post Lists</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Post Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT posts.*, categories.title AS cattitle, users.name FROM posts
                                     INNER JOIN categories ON posts.cat = categories.id
                                     INNER JOIN users ON posts.author = users.id
                                     ORDER BY posts.title DESC";
                                    $result = $db->select($query);
                                ?>
                                    <?php if ($result) {
                                        $i =0;
                                        while ($post = $result->fetch_assoc()) {
                                            $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $post['title']; ?></td>
                                        <td><?php echo $fm->textShorten($post['content'], 150); ?></td>
                                        <td><?php echo $post['cattitle']; ?></td>
                                        <td><img src="<?php echo $post['image']; ?>" alt="" height="40px" width="60px;"></td>   
                                        <td><?php echo $post['name']; ?></td>
                                        <td><?php echo $post['tags']; ?></td>
                                        <td><?php echo $fm->formatDate($post['date']); ?></td>
                                        <td><a href="editpost.php?id=<?php echo $post['id'] ?>">Edit</a>
                                         |
                                        <a onclick="return confirm('Are you sure?');" href="?deletepost=<?php echo $post['id']; ?>">Delete</a></td>
                                    </tr>
                                        <?php }} ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Post Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Tags</th>
                                    <th>Date</th>
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

      nav_highlight('post','view-post');

    });
  </script>

<?php
    include 'inc/footer.php';
?>
