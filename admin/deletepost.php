<?php
    include '../helper/functions.php';
    include '../lib/Session.php';
    Session::checkSession();
  ?>
  <?php

    include '../config/config.php';
    include '../lib/Database.php';

?>

<?php
  $db = new Database();
?>



<?php
    if (isset($_GET['id']) && $_GET['id'] != null) {
        $id = $_GET['id'];
        $query = "SELECT * FROM posts WHERE id = '$id'";
        $result = $db->select($query);
        if($result) {
            while ($data = $result->fetch_assoc()) {
                $img_path = $data['image'];
                unlink($img_path);
            }

            $query = "DELETE FROM posts WHERE id = '$id'";
            $del = $db->delete($query);

            if ($del) {
                $_SESSION['success'] = 'Post deleted successfull.';
                goToUrl('viewpost.php');
            }else{
                $_SESSION['error'] = "Something went wrong! Plase try again.";
                goToUrl('viewpost.php');
            }

        }else{
            $_SESSION['error'] = "Something went wrong! Plase try again.";
            goToUrl('viewpost.php');
        }
    }else{
        $_SESSION['error'] = "Something went wrong! Plase try again.";
        goToUrl('viewpost.php');
    }
?>
