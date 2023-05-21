<?php

session_start();
include '../Model/model.php';

$action = $_POST['action'];

if ($action == 'add') {
	$cat_id = $_SESSION['cat_id'];
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$img = $_FILES['img']['name'];
	move_uploaded_file($_FILES['img']['tmp_name'], "../Assets/Images/$img");
	$model->add_product($cat_id, $name, $price, $desc, $img);
	header('location:../View/product.php');
}

if ($action == 'update') {
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$id = $_POST['id'];
	$model->update_product($name, $desc, $price, $id);
}

if ($action == 'delete') {
	$id = $_POST['id'];
	$model->delete_product($id);
}

?>