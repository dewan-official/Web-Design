<?php
	require_once '../func/insert.inc.php';
	require_once 'update.inc.php';
	$sent = new work();
	$upsent = new updateProfile();
	if(isset($_POST['signup'])){
		$sent->registation($_POST);
	} else if(isset($_POST['login'])){
		$sent->login($_POST);
	} else if(isset($_POST['editname'])) {
		$upsent->editUserName($_POST);
	} else if(isset($_POST['edituserjob'])) {
		$upsent->editUserJob($_POST);
	} else if(isset($_POST['edituserphone'])) {
		$upsent->editUserPhone($_POST);
	} else if(isset($_POST['editUserGender'])) {
		$upsent->editUserGender($_POST);
	} else if(isset($_POST['edituserdob'])) {
		$upsent->edituserdob($_POST);
	} else if(isset($_POST['edituserCaddress'])) {
		$upsent->edituserCaddress($_POST);
	} else if(isset($_POST['edituserPaddress'])) {
		$upsent->edituserPaddress($_POST);
	} else if(isset($_FILES['proImg'])) {
		$upsent->editUserImg($_FILES);
	} else if(isset($_POST['newpost'])) {
		$upsent->newPostEntry($_POST,$_FILES);
	} else if(isset($_POST['edittitle'])) {
		$upsent->editTitle($_POST);
	} else if(isset($_POST['editrent'])) {
		$upsent->editRent($_POST);
	} else if(isset($_POST['editTypeOfRent'])) {
		$upsent->editTypeOfRent($_POST);
	} else if(isset($_POST['editTypeOfArea'])) {
		$upsent->editTypeOfArea($_POST);
	} else if(isset($_POST['editSize'])) {
		$upsent->editSize($_POST);
	} else if(isset($_POST['editTerms'])) {
		$upsent->editTerms($_POST);
	} else if(isset($_POST['editFacilities'])) {
		$upsent->editFacilities($_POST);
	} else if(isset($_POST['editDescription'])) {
		$upsent->editDescription($_POST);
	} else if(isset($_POST['editPostName'])) {
		$upsent->editPostName($_POST);
	} else if(isset($_POST['editPhoneNumber'])) {
		$upsent->editPhoneNumber($_POST);
	}  else if(isset($_POST['editPostAddress'])) {
		$upsent->editPostAddress($_POST);
	} else {
		header("Location: ../index.php?file=notExsist");
		exit();
	}
?>