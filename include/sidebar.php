<!-- Start Blog Post Siddebar -->
<div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="single-sidebar-widget__title">Search Post</h4>

                  <form action="search.php" method="get">
                    <div class="form-group mt-30">
                      <div class="col-autos">
                        <input type="text" name="q" class="form-control" id="inlineFormInputGroup" placeholder="Search Keyword" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Search Keyword'">
                      </div>
                    </div>
                    <button class="bbtns d-block mt-20 w-100">Search</button>
                  </form>
                </div>

                <div class="single-sidebar-widget post-category-widget">
                  <h4 class="single-sidebar-widget__title">Catgory</h4>
                  <ul class="cat-list mt-20">
                  <?php $query = "select * from categories";
                  $category = $db->select($query);
                  if ($category) {
                      while ($cat = $category->fetch_assoc()) { ?>
                    <li>
                      <a href="posts.php?category=<?php echo $cat['id']; ?>" class="d-flex justify-content-between">
                        <p><?php echo $cat['title']; ?></p>
                        <!-- <p>(03)</p> -->
                      </a>
                    </li>
                    <?php }} else { ?>
                      <li>
                      <a href="#" class="d-flex justify-content-between">
                        <p>No Category Found! </p>
                      </a>
                    </li>
                    <?php }?>
                  </ul>
                </div>

                <div class="single-sidebar-widget popular-post-widget">
                  <h4 class="single-sidebar-widget__title">Recent Post</h4>
                  <div class="popular-post-list">

                  <?php $query = "select * from posts limit 5";
                  $post = $db->select($query);
                  if ($post) {
                      while ($data = $post->fetch_assoc()) { ?>
                    <div class="single-post-list">
                      <div class="thumb">
                        <img class="card-img rounded-0" src="admin/img/upload/<?php echo $data['image'] ?>" alt="">
                        <ul class="thumb-info">
                          <li><a href="#"><?php echo $data['author']; ?></a></li>
                          <!-- <li><a href="#">date</a></li> -->
                        </ul>
                      </div>
                      <div class="details mt-20">
                        <a href="blog-single.html">
                          <h6><?php echo $data['title']; ?></h6>
                        </a>
                      </div>
                    </div>

                    <?php }} else { ?>

                      <p>No Category Found! </p>

                    <?php }?>
                  </div>
                </div>

                  <div class="single-sidebar-widget tag_cloud_widget">
                    <h4 class="single-sidebar-widget__title">Popular Post</h4>
                    <ul class="list">
                      <li>
                          <a href="#">project</a>
                      </li>
                      <li>
                          <a href="#">love</a>
                      </li>
                      <li>
                          <a href="#">technology</a>
                      </li>
                      <li>
                          <a href="#">travel</a>
                      </li>
                      <li>
                          <a href="#">software</a>
                      </li>
                      <li>
                          <a href="#">life style</a>
                      </li>
                      <li>
                          <a href="#">design</a>
                      </li>
                      <li>
                          <a href="#">illustration</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <!-- End Blog Post Siddebar -->
