<?php

session_start();
include '../Model/model.php';

$email = $_POST['newsletter_inp'];

$_SESSION['message_2'] = "Ваш Email отправлен успешно!";
$model_user->newsletter($email);
header('location:http://Bagshop/index.php#newsletter');

?>