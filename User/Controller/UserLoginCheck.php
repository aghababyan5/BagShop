<?php

session_start();
include '../Model/model.php';

$username = $_POST['userLogin'];
$password = $_POST['userPassword'];

$count = $model_user->userLogin($username, $password);

if (empty($username) || empty($password)) {
   $_SESSION['message'] = "Есть пустые поля";
   header('location:../UserLogin.php');   
} else if ($count > 0) {
   header('location:../../index.php');
} else {
   $_SESSION['message'] = 'Неверный логин или пароль';
   header('location:../UserLogin.php');
}

if (isset($_POST['inp_check'])) {
   setcookie('user_id', $username['id'], time() + (86400 * 30), '/');
   setcookie('user_email', $username['email'], time() + (86400 * 30), '/');
}

$_SESSION['user_id'] = $count['id'];
$_SESSION['user_email'] = $count['email'];

?>