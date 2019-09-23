<?php
	require_once 'https://indehiscent-towels.000webhostapp.com/func/main.inc.php';
	$obj = new main();
	$conn = $obj->re_conn();
	$sql = "SELECT * FROM user_login";
	$result = mysql_query($conn, $sql);
	$data = mysqli_fetch_all($result);
	echo "<pre>";
	print_r($dara);
?>