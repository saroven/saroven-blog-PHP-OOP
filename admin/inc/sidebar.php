<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $uname; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="nav" id="home">
          <a href="/" target="_blank">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li class="nav" id="dashboard">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
      <?php $userole = Session::get('role_id'); ?>
      <?php if ($userole == 1) { ?>
        <li class="treeview nav" id="users">
          <a href="#">
            <i class="fa  fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="nav" id="add-user"><a href="adduser.php"><i class="fa fa-plus"></i> Add</a></li>
            <li class="nav" id="view-user"><a href="viewuser.php"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li>
        <li class="treeview nav" id="site-option">
          <a href="#">
            <i class="fa  fa-cogs"></i>
            <span>Site Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="nav" id="title"><a href="titleslogan.php"><i class="fa fa-circle-o"></i> Title & Slogan</a></li>
            <li class="nav" id="social"><a href="social.php"><i class="fa fa-circle-o"></i> Social Media</a></li>
            <li class="nav" id="footer"><a href="footeroption.php"><i class="fa fa-circle-o"></i> Footer Texts</a></li>
          </ul>
        </li>
        <li class="treeview nav" id="page">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="nav" id="add-page"><a href="addpage.php"><i class="fa fa-plus"></i> Add Page</a></li>

          <?php
            $query = "SELECT * FROM pages";
            $pages = $db->select($query);
            if ($pages) {
              while ($page =  $pages->fetch_assoc()) { ?>

            <li class="nav" id="page-<?php echo $page['id']; ?>"><a href="page.php?id=<?php echo $page['id']; ?>"><i class="fa fa-circle"></i> <?php echo $page['title']; ?></a></li>

          <?php }} ?>

          </ul>
        </li>
        <li class="treeview nav" id="category">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Catagory Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="nav" id="add-category"><a href="addcategory.php"><i class="fa fa-plus"></i> Add Category</a></li>
            <li class="nav" id="view-category"><a href="viewcategory.php"><i class="fa fa-square"></i> View Categories</a></li>
          </ul>
        </li>
        <li class="treeview nav" id="post">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Post Option</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="nav" id="add-post"><a href="addpost.php"><i class="fa fa-plus"></i> Add Post</a></li>
            <li class="nav" id="view-post"><a href="viewpost.php"><i class="fa fa-square"></i> View Posts</a></li>
          </ul>
        </li>
      <?php }elseif ($userole == 2) {
        echo "editor";
      }elseif ($userole == 3) {
        echo "Author";
      } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
