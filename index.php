<?php
  include 'config/config.php';
  include 'lib/Database.php';
  include 'helper/Formate.php';
  include 'include/header.php';
  include 'include/navbar.php';
  include 'include/slider.php';
?>

<?php
  $db = new Database();
  $fm = new Formate();
?>
<!-- pagination -->
  <?php
    $per_page = 2;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $start_from = ($page-1) * $per_page;
  ?>
<!-- pagination -->
<?php
  $sql = "select * from posts limit $start_from, $per_page";
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
                <img class="img-fluid" src="admin/img/upload/<?php echo $result['image'] ?>" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i><?php echo $result['author'] ?></a></li>
                  <li><a href="#"><i class="ti-notepad"></i><?php echo $fm->formatDate($result['date']); ?></a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="post.php?id=<?php echo $result['id'] ?>">
                  <h3><?php echo $result['title']; ?>  </h3>
                </a>
                <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                <p>
                  <?php echo $fm->textShorten($result['content'], 450) ?>
                </p>
                <a class="button" href="post.php?id=<?php echo $result['id'] ?>">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
    <?php } ?> <!--end while loopc-->
      <!-- pagenition start -->
      <?php
        $q = "select * from posts";
        $data = $db->select($q);
        $total_rows = mysqli_num_rows($data);
        $total_page = ceil($total_rows / $per_page);
      ?>
      <div class="row">
              <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          <?php echo "<li class='page-item'>
                              <a href='index.php?page=1' class='page-link' aria-label='Previous'>
                                  <span aria-hidden='true'>
                                      <i class='ti-angle-left'></i>
                                  </span>
                              </a>
                          </li>" ?>

                          <?php

                            for ($i=1; $i <= $total_page; $i++) {
                              if ($page == $i) {

                                $active = 'active';

                              }else {
                                $active = '';
                              }
                              echo "<li class='page-item $active'><a href='index.php?page=$i' class='page-link'>$i</a></li>";
                            }
                          ?>

                          <?php echo "<li class='page-item'>
                              <a href='index.php?page=$total_page' class='page-link' aria-label='Next'>
                                  <span aria-hidden='true'>
                                      <i class='ti-angle-right'></i>
                                  </span>
                              </a>
                          </li>" ?>
                      </ul>
                  </nav>
              </div>
            </div>
            <!-- pagination end -->
  <?php }else { //else satement
    header("Location:404.php");
  } ?> <!-- end for loop -->

          </div>
<!-- sidebar -->
<!-- footer -->
<?php
  include 'include/sidebar.php';
  include 'include/footer.php';
?>
