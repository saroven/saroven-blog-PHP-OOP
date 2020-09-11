 <!--================Hero Banner start =================-->
<?php  
   $sql = "SELECT * FROM posts LIMIT 4";
    $posts = $db->select($sql);
  ?>
 <section>
      <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
        <?php if ($posts != false) {
          while ($post = $posts->fetch_assoc()) { ?>

          <div class="card blog__slide text-center">
            <a href="post.php?id=<?php echo $post['id'] ?>">
              <div class="blog__slide__img">
                <img class="card-img rounded-0 img-responsive" src="admin/<?php echo $post['image'] ?>" alt="">
              </div>
              <div class="blog__slide__content">
                <h2><?php echo $post['title']; ?></h2>
              </div>
            </a>
          </div>

        <?php } } ?>
        </div>
      </div>
    </section>
    <!--================Hero Banner end =================-->
