<?php
	include_once('../lib/database.php');
	
	if(!$_SESSION['username']){
		header("location:/");
	}
?>