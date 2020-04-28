<?php
  include 'config/config.php';
  include 'lib/Database.php';
  include 'include/header.php';
  include 'include/navbar.php';
  include 'include/slider.php';
?>

<?php
  $db = new Database();
?>

<?php
  $sql = "select * from posts";
  $post = $db->select($sql);
?>
    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
  <?php if ($post) { ?>

    <?php while ($result = $post->fetch_assoc()) { ?>

            <div class="single-recent-blog-post">
              <div class="thumb">
                <img class="img-fluid" src="img/blog/blog4.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-notepad"></i><?php echo $result['date']; ?></a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="post.php?id=<?php echo $result['id'] ?>">
                  <h3><?php echo $result['title']; ?>  </h3>
                </a>
                <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                <p><?php echo $result['content'] ?></p>
                <a class="button" href="post.php?id=<?php echo $result['id'] ?>">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
    <?php } ?> //end while loop

  <?php }else { //else satement
    header("Location:404.php");
  } ?> //end for loop

            <div class="row">
              <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-left"></i>
                                  </span>
                              </a>
                          </li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Next">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-right"></i>
                                  </span>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
            </div>
          </div>
<!-- sidebar -->
<!-- footer -->
<?php
  include 'include/sidebar.php';
  include 'include/footer.php';
?>
