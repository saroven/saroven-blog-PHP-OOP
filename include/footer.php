
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
</main>

  <!--================ Start Footer Area =================-->
  <footer class="footer-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-5  col-md-4 col-sm-6">
        <?php
          $query = "SELECT * FROM footer WHERE id=1";
          $footerdata = $db->select($query);
          if($query){
            while ($foo = $footerdata->fetch_assoc()) { ?>
          <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
              <?php echo $foo['about']; ?>
            </p>
          </div>
        <?php }} ?>
        </div>
        <div class="col-lg-5  col-md-4 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>Stay update with our latest</p>
            <div class="" id="mc_embed_signup">

              <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="form-inline">

                <div class="d-flex flex-row">

                  <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                    required="" type="email">


                  <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                  <div style="position: absolute; left: -5000px;">
                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                  </div>

                  <!-- <div class="col-lg-4 col-md-4">
                        <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                      </div>  -->
                </div>
                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
        <?php
              $query = "SELECT * FROM socials WHERE id=1";
              $datas = $db->select($query);
              if($query){
                while ($social = $datas->fetch_assoc()) { ?>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <div class="single-footer-widget">
            <h6>Follow Us</h6>
            <p>Let us be social</p>
            <div class="footer-social d-flex align-items-center">
              <a target="_blank" href="<?= $social['fb']; ?>">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a target="_blank" href="<?= $social['twi']; ?>">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" href="<?= $social['ins']; ?>">
                <i class="fab fa-instagram"></i>
              </a>
              <a target="_blank" href="<?= $social['pin']; ?>">
                <i class="fab fa-pinterest"></i>
              </a>
            </div>
          </div>
        </div>
        <?php }} ?>
      </div>
<?php
    $query = "SELECT * FROM footer WHERE id=1";
    $footerdata = $db->select($query);
    if($query){
      while ($foo = $footerdata->fetch_assoc()) { ?>
      <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
        <p class="footer-text m-0">
          Copyright &copy; <?= $foo['copyright']; ?>
          <!-- <script>document.write(new Date().getFullYear());</script>All rights reserved -->
        <!-- | This template is made with   <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank"> Colorib</a> -->
        | Blog site developed by <a href="https://facebook.com/sarovenbd" target="_blank">Mohammad Shah Alam</a>

          </p>
      </div>
      <?php } } ?>
    </div>
  </footer>
  <!--================ End Footer Area =================-->

  <script src="assets/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="assets/js/mail-script.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
