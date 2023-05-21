<?php 

class Model {
	public function __construct() {
		$this->conn = mysqli_connect("localhost", "root", "", "bagshop");

		if (!$this->conn) {
			die(mysqli_connect_error($this->conn));
		}
	}

	public function __destruct() {
		mysqli_close($this->conn);
	}

	public function user($name, $username, $email, $password) {
		$query = "INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES (NULL, '$name', '$username', '$email', '$password')";
		mysqli_query($this->conn, $query);
	}

	public function userLogin($username, $pass) {
		$query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$pass'";
		$res = mysqli_query($this->conn, $query);
		if (mysqli_num_rows($res) > 0) {
			return mysqli_fetch_assoc($res);
		}
	}

	public function get_categories() {
		$query = "SELECT * FROM `categories`";
		$res = mysqli_query($this->conn, $query);
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}	

	public function get_product($cat_id) {
		$query = "SELECT * FROM `products` WHERE `cat_id` = '$cat_id'";
		$res = mysqli_query($this->conn, $query);
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}

	public function add_to_card($user_id, $prod_id, $quantity, $final_price) {
		$query = "INSERT INTO `card` VALUES(null, '$user_id', '$prod_id', '$quantity', '$final_price')";
		$res = mysqli_query($this->conn, $query);
		$query1 = "SELECT * FROM `card` WHERE `user_id` = '$user_id' AND `product_id` = '$prod_id'";
		$res1 = mysqli_query($this->conn, $query1);
	}

	public function get_card_items($user_id) {
		$query = "SELECT `name`, `price`, `image`, `quantity`, `description`, card.id, `product_id`, `final_price` FROM `card` JOIN `products` ON `product_id` = products.id WHERE `user_id` = '$user_id'";
		$res = mysqli_query($this->conn, $query);
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}

	public function update_card_item($quant, $id, $finalPrice) {
		$query = "UPDATE `card` SET `quantity` = '$quant', `final_price` = '$finalPrice' WHERE `product_id` = '$id'";
		$res = mysqli_query($this->conn, $query);
	}

	public function delete_from_card($id) {
		$query = "DELETE FROM `card` WHERE `product_id` = '$id'";	
		$res = mysqli_query($this->conn, $query);
	}

	public function add_to_order($user_id){
		$query = "SELECT * FROM `card` WHERE `user_id`='$user_id'";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res, MYSQLI_ASSOC);
		// return $result;
		foreach ($result as $row) {
			$prod_id = $row['product_id'];
			$quantity = $row['quantity'];
			$final_price = $row['final_price'];
			$query = "INSERT INTO `order_items` VALUES (null, '$user_id', '$prod_id','$quantity', '$final_price')";
			$res = mysqli_query($this->conn, $query);
		}
	}

	public function clear_cart() {
		$query = "TRUNCATE `card`";
		$res = mysqli_query($this->conn, $query);
	}

	public function add_user_contacts($name, $email, $tel, $msg) {
		$query = "INSERT INTO `user_contacts` VALUES(null, '$name', '$email', '$tel', '$msg')";
		$res = mysqli_query($this->conn, $query);
	}

	public function newsletter($email) {
		$query = "INSERT INTO `newsletter` VALUES(null, '$email')";
		$res = mysqli_query($this->conn, $query);
	}
}

$model_user = new Model();

?>