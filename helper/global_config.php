<?php 
	$base_url = $base_url = "http://localhost:8000";
	function goToError($url){
		$url = $base_url."/404.php";
    	echo "<script> location.href='".$url."'; </script>";
	}
 ?>