<?php
	include 'HuntDBI.php';
	
	$params = $_GET;

	$obj = new HuntDBI();
	
	$obj->getGame($params["gamename"]);
	
?>