<?php 
	if (Session::get('role_id') == 3 || Session::get('role_id') == false) {
		$_SESSION['error'] = "You don't have permission to view this page! ";
		goToUrl('index.php');
	}
 ?>