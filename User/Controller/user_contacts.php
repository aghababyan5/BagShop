<?php

session_start();
include '../Model/model.php';

$name = $_POST['cont_name'];
$email = $_POST['cont_email'];
$tel = $_POST['cont_tel'];
$msg = $_POST['cont_msg'];

if (empty($name) || empty($email) || empty($tel) || empty($msg)) {
   $_SESSION['message'] = "Есть пустые поля";
   header('location:http://Bagshop/index.php#contacts_sec');
} else {
   $_SESSION['message'] = "Вашы данные и сообщение отправлены успешно!";
   $model_user->add_user_contacts($name, $email, $tel, $msg);
   header('location:http://Bagshop/index.php#contacts_sec');
}


?>