<?php 

session_start();
include '../Model/model.php';

$action = $_POST['action'];

if ($action == 'add') {
	if (!isset($_SESSION['user_id'])) {
		echo json_encode(['success' => false]);
		die;
	}
	$id = $_POST['id'];
	$user_id = $_SESSION['user_id'];
	$final_price = $_POST['final_price'];
	$model_user->add_to_card($user_id, $id, '1', $final_price);
	echo json_encode(['success' => true]);
}

if ($action == 'update') {
	$quant = $_POST['quant'];
	$finalPrice = $_POST['price'] * $quant;
	$id = $_POST['productId'];
	$model_user->update_card_item($quant, $id, $finalPrice);
}

if ($action == 'delete') {
	$id = $_POST['id'];
	$model_user->delete_from_card($id);
}

if ($action == 'order') {
	$user_id = $_SESSION['user_id'];
	$model_user->add_to_order($user_id);
	$model_user->clear_cart();
}

?>