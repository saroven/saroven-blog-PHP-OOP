<?php
include 'include/header.php';
include 'include/navbar.php';


if (isset($_GET['id']) && $_GET['id'] != null) {
    $id = $_GET['id'];
    $query = "SELECT * FROM pages WHERE id='$id'";
    $result = $db->select($query);
    if ($result) {
        $page = $result->fetch_assoc();
    }else {
        // data not found in the database
        goToUrl('/404.php');
    }
}else{
    //id not found in the url
    goToUrl('/404.php');
}

?>
<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-recent-blog-post">
                    <h1><?php echo $page['title']; ?></h1>
                    <hr>
                    <!-- <div class="thumb">
                        <img class="img-fluid" src="img/blog/blog1.png" alt="">
                    </div> -->
                    <div class="details mt-20">
                        <?php echo $page['content']; ?>
                    </div>
                </div>

            </div>


<?php
include 'include/sidebar.php';
include 'include/footer.php';
?>
