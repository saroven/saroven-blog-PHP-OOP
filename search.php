<?php
  include 'include/header.php';
  include 'include/navbar.php';
?>
<?php
    if (!isset($_GET['q']) || $_GET['q'] == null) {
        header("Location: 404.php");
    }else {
        $search = $_GET['q'];
    }

  $sql = "SELECT * FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
  $post = $db->select($sql);
?>
<section class="blog-post-area section-margin mt-4">
      <div class="container">
          <h2>Search Result for: <?php echo $search; ?></h2>
        <div class="row">
          <div class="col-lg-8">
  <?php if ($post) { ?>

    <?php while ($result = $post->fetch_assoc()) { ?>

            <div class="single-recent-blog-post">
              <div class="thumb">
                <img class="img-fluid" src="admin/<?php echo $result['image'] ?>" alt="">
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
            <?php } }else { //else satement
    echo "<h2> No Post Found </h4>";
  } ?> <!-- end for loop -->
          </div>



<?php
  include 'include/sidebar.php';
  include 'include/footer.php';
?>
