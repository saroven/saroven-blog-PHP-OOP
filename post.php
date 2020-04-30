<?php
  include 'include/header.php';
  include 'include/navbar.php';
?>

<?php
    if (!isset($_GET['id']) || $_GET['id'] == null) {
        header("Location: 404.php");
    }else {
        $id = $_GET['id'];
    }

    $query = "select * from posts where id=$id";
    $post = $db->select($query);
    if ($post) {
        while ($result = $post->fetch_assoc()) { ?>
  <!--================ Hero sm Banner start =================-->
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>
              <?php echo $result['title']; ?>
            </h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Post Details</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm Banner end =================-->

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
                <img class="img-fluid" src="admin/img/upload/<?php echo $result['image'] ?>" alt="">
                <a href="#"><h4><?php echo $result['title']; ?></h4></a>
                <div class="user_details">
                  <div class="float-left">
                    <a href="#">Lifestyle</a>
                    <a href="#">Gadget</a>
                  </div>
                  <div class="float-right mt-sm-0 mt-3">
                    <div class="media">
                      <div class="media-body">
                        <h5><?php echo $result['author']; ?></h5>
                        <p><?php echo $fm->formatDate($result['date']); ?></p>
                      </div>
                      <div class="d-flex">
                        <img width="42" height="42" src="img/blog/user-img.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>

                <?php echo $result['content']; ?>

               <div class="news_d_footer flex-column flex-sm-row">
                 <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4 people like this</a>
                 <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>06 Comments</a>
                 <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-dribbble"></i></a>
               <a href="#"><i class="fab fa-behance"></i></a>
             </div>
               </div>
              </div>
              <!-- end while loop -->


          <div class="navigation-area">
             <!-- Related post  -->
          <div class="related-posts">
            <h2>Related Posts</h2> <br>
            <?php
                $catid = $result['cat'];
                $postid = $result['id'];
                $query_related  =  "SELECT * FROM posts
                                    WHERE id NOT IN($postid)
                                    AND cat=$catid
                                    ORDER BY rand() LIMIT 3";

                $related_post = $db->select($query_related);

            ?>
            <div class="row">
            <?php
            if ($related_post) {
                while ($related = $related_post->fetch_assoc()) {
            ?>

              <div class="col-md-4">
                <a href="post.php?id=<?php echo $related['id'] ; ?>"><img src="admin/img/upload/<?php echo $related['image'] ; ?>" alt="Related Article" class="img-responsive img-thumbnail"><span class="text-dark"><?php echo $related['title'] ; ?></span></a>
              </div>
                <?php } } else {
                    echo '<h7 class="ml-3"> No Related Post Available </h7>';
                    } ?>

            </div>

          </div>
          <!-- end if statement -->
          <?php } } else { header("Location: 404.php"); } ?>

                </div>
                <div class="comments-area">
                    <h4>05 Comments</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c1.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c2.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Elsie Cunningham</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c3.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Annie Stephens</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c4.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Maria Luna</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c5.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Ina Hayes</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form>
                        <div class="form-group form-inline">
                          <div class="form-group col-lg-6 col-md-6 name">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 email">
                            <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <a href="#" class="button submit_btn">Post Comment</a>
                    </form>
                </div>
        </div>

        <!-- Start Blog Post Siddebar -->
<?php
  include 'include/sidebar.php';
  include 'include/footer.php';
?>
