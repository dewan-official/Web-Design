<?php 
	require_once '../func/get.inc.php';
	$obj = new getinfo();
	$data = $obj->getAlldata("newpost","*");
	echo json_encode($data);
?>