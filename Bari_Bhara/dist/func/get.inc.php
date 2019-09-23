<?php
	require_once 'main.inc.php';
	class getinfo extends main{
		
		function getdata($tablename, $select, $colname , $value){
			$sql = "SELECT ".$select." FROM ".$tablename." WHERE ".$colname."=".$value;
			$conn = $this->re_conn();
			$result = mysqli_query($conn, $sql);
			$data = mysqli_fetch_assoc($result);
			if($result == true) {
				return $data;
			} else {
				// header("Location: ../index.php?Failed!");
				// exit();
			}
		}
		function getlimitdata($tablename, $select, $colname , $value){
			$sql = "SELECT ".$select." FROM ".$tablename." WHERE ".$colname."=".$value;
			$conn = $this->re_conn();
			$result = mysqli_query($conn, $sql);
			$data = mysqli_fetch_all($result);
			if($result == true) {
				return $data;
			} else {
				// header("Location: ../index.php?Failed!");
				// exit();
			}
		}
		function getAlldata($tablename, $select){
			$sql = "SELECT ".$select." FROM ".$tablename;
			$conn = $this->re_conn();
			$result = mysqli_query($conn, $sql);
			$data = mysqli_fetch_all($result);
			if($result == true) {
				return $data;
			} else {
				// header("Location: ../index.php?Failed!");
				// exit();
			}
		}
		function countrow($tablename, $select, $colname , $value) {
			$sql = "SELECT ".$select." FROM ".$tablename." WHERE ".$colname."=".$value;
			$conn = $this->re_conn();
			$result = mysqli_query($conn, $sql);
			$rows = sizeof(mysqli_fetch_all($result));
			if($result == true) {
				return $rows;
			} else {
				return 0;
			}
		}
	}
?>