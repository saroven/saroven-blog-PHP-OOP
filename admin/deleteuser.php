<?php
    include '../helper/functions.php';
    include '../lib/Session.php';
    Session::checkSession();
    include '../helper/permission_check.php';
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
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $db->select($query);
        if($result == '') {
            $_SESSION['error'] = "User not found!";
            goToUrl('viewuser.php');

            }else{
                $query = "DELETE FROM users WHERE id = '$id'";
                $del = $db->delete($query);

                if ($del) {
                    $_SESSION['success'] = 'User deleted successfull.';
                    goToUrl('viewuser.php');
                }else{
                    $_SESSION['error'] = "Something went wrong! Plase try again.";
                    goToUrl('viewuser.php');
                }
            }

        }else{
            $_SESSION['error'] = "Something went wrong! Plase try again.";
            goToUrl('viewuser.php');
        } ?>
