  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <?php
            $query = "SELECT * FROM title_slogan WHERE id=1";
            $titledata = $db->select($query);
            if ($titledata) {
              while ($tdata = $titledata->fetch_assoc()) { ?>

          <a class="navbar-brand logo_h" style="width: 250px" href="index.php"><img src="admin/<?php echo $tdata['logo']; ?>" alt="logo"></a>

              <?php } } ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">

            <?php
              $path = $_SERVER['SCRIPT_FILENAME'];
              $currentpage = basename($path, '.php');

            ?>
              <li class="nav-item <?php if($currentpage == 'index'){echo 'active';} ?>"><a class="nav-link" href="index.php">Home</a></li>

        <?php
            $query = "SELECT * FROM pages";
            $pages = $db->select($query);
            if ($pages) {
              while ($page =  $pages->fetch_assoc()) { ?>

              <li class="nav-item <?php if(isset($_GET['pageid']) && $_GET['pageid'] == $page['id']) {echo 'active';} ?>"><a class="nav-link" href="page.php?pageid=<?php echo $page['id'] ?>"><?php echo $page['title']; ?></a></li>

            <?php }} ?>
            <li class="nav-item <?php if($currentpage == 'contact'){echo 'active';} ?>"><a class="nav-link" href="contact.php">Contact Us</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right navbar-social">
            <?php
              $query = "SELECT * FROM socials WHERE id=1";
              $datas = $db->select($query);
              if($query){
                while ($social = $datas->fetch_assoc()) { ?>

              <li><a target="_blank" href="<?= $social['fb']; ?>"><i class="ti-facebook"></i></a></li>
              <li><a target="_blank" href="<?= $social['twi']; ?>"><i class="ti-twitter-alt"></i></a></li>
              <li><a target="_blank" href="<?= $social['ins']; ?>"><i class="ti-instagram"></i></a></li>
              <li><a target="_blank" href="<?= $social['pin']; ?>"><i class="ti-pinterest"></i></a></li>

              <?php }} ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <main class="site-main">
