<?php
require_once "mvc/core/config.php";
function getGet($key) {
	$value = '';
	if(isset($_GET[$key])) {
		$value = $_GET[$key];
	}
	return trim($value);
}

function getPost($key) {
	$value = '';
	if(isset($_POST[$key])) {
		$value = $_POST[$key];
	}
	return trim($value);
}

function getRequest($key) {
	$value = '';
	if(isset($_REQUEST[$key])) {
		$value = $_REQUEST[$key];
	}
	return trim($value);
}

function getCookie($key) {
	$value = '';
	if(isset($_COOKIE[$key])) {
		$value = $_COOKIE[$key];
	}
	return trim($value);
}



function executeResultU($sql) {
	$data = null;

	//open connection
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	$resultset = mysqli_query($conn, $sql);
	if($resultset){
		$data = mysqli_fetch_array($resultset, 1);
		//close connection
		mysqli_close($conn);
	}
	return $data;
}

function getUserSession($noSession = 0){
	if(isset($_SESSION['user']) && $noSession==0) {
		return $_SESSION['user'];
	}
}

function changeSession($key, $newvalue) {
	$_SESSION["$key"] = $newvalue;
}

function fixUrl($photo, $rootPath = "http://localhost/SPhone/public/images/") {
	if(stripos($photo, 'http://') !== false || stripos($photo, 'https://') !== false) {
	} else {
		$photo = $rootPath.$photo;
	}

	return $photo;
}
