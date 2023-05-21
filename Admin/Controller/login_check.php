<?php

session_start();
include "../Model/model.php";

if (!isset($_POST["btn_enter"])) {
	header('location:../index.php');
	die;
}
	
if (empty($_POST["admLogin"]) || empty($_POST["admPassword"])) {
	$_SESSION['message'] = "Empty login or password";
	header("location:../index.php");
	die; 
}

$login = $_POST['admLogin'];
$pass = $_POST['admPassword'];

$count = $model->admin($login, $pass);

if ($count > 0) { 
	$_SESSION['admin'] = $login;
	header('location:../View/home.php');
	die;
} else {
	$_SESSION['message'] = 'Wrong login or password';
	header('location:../index.php');
}

?>