<?php
	// $base_url = $base_url = "http://localhost:8000/";
	// function goToError($url){
	// 	$url = $base_url."/404.php";
    // 	echo "<script> location.href='".$url."'; </script>";
	// }
	function goToUrl($url)
	{
		// $url = $base_url + $url;
		echo "<script> location.href='".$url."'; </script>";
		exit();
	}
	function success($text)
	{
		echo "<div class='alert alert-success alert-dismissible'>
	    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	    <h4><i class='icon fa fa-check'></i> Success</h4>$text</div>";

	}
	function failed($text)
	{
		echo "<div class='alert alert-danger alert-dismissible'>
	    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	    <h4><i class='icon fa fa-check'></i> Success</h4>$text</div>";

	}
 ?>
