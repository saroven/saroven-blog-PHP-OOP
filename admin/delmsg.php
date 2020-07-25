 <?php
 include '../helper/functions.php';
 include '../lib/Session.php';
 Session::checkSession();


 include '../config/config.php';
 include '../lib/Database.php';

 $db = new Database;

$id= $_GET['msgid'];

if (isset($_GET['msgid']) && $_GET['msgid'] != '') {

	$query = "SELECT * FROM contacts WHERE id = $id";

    $result = $db->select($query);

    if ($result) {
        $query = "DELETE FROM contacts WHERE id = $id";

        $response = $db->delete($query);
        if ($response) {
            $_SESSION['success'] = "Deleted successfully.";
            goToUrl('inbox.php');
        }else{
            $_SESSION['error'] = "Faild to delete! Please try again.";
            goToUrl('inbox.php');
        }
        
    }else {
        $_SESSION['error'] = "Page Not Found.";
        goToUrl('inbox.php');
    }
}else {
    $_SESSION['error'] = "Something went wrong! Please try again.";
    goToUrl('inbox.php');

}
