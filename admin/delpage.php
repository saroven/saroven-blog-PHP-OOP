<?php
 include '../helper/functions.php';
 include '../lib/Session.php';
 Session::checkSession();
 include '../helper/permission_check.php';
 ?>
 <?php
 include '../config/config.php';
 include '../lib/Database.php';

 $db = new Database;


if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $query = "SELECT * FROM pages WHERE id='$id'";
    $result = $db->select($query);
    if ($result) {
        $query = "DELETE FROM pages WHERE id='$id'";

        $response = $db->delete($query);
        if ($response) {
            $_SESSION['success'] = "Deleted successfully.";
            goToUrl('/admin/');
        }else{
            $_SESSION['error'] = "Faild to delete! Please try again.";
            goToUrl('/admin/');
        }
        
    }else {
        $_SESSION['error'] = "Page Not Found.";
        goToUrl('/admin/');
    }
}else {
    $_SESSION['error'] = "Something went wrong! Please try again.";
    goToUrl('/admin/');

}
