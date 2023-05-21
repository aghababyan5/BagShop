<?php

session_start();
include '../../User/Model/model.php';

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$conf_password = $_POST['conf_password'];

if ($password === $conf_password && $password !== "" && $conf_password !== "") {
   $model_user -> user($name, $username, $email, $password);
   $_SESSION['message'] = 'Вы зарегистрировались успешно!';
   header('location:../../User/UserLogin.php');
} else {
   $_SESSION['message'] = 'Пароли не совподяют';
   header('location:../../User/View/regform.php');
}

if (!$name || !$username || !$email || !$password || !$conf_password) {
   $_SESSION['message'] = "Есть пустые поля";
   header('location:../View/regform.php');
}

// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    $_SESSION['message'] = 'Invalid eMail';
//    header('location:../View/regform.php');
// }

?>