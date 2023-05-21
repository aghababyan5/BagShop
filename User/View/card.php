<?php 

session_start();
include '../Model/model.php';

if (!isset($_SESSION['user_id'])) {
	$_SESSION['message'] = 'Сначала войдите в систему.';
	header('location:../UserLogin.php');
	die;
}

$user_id = $_SESSION['user_id'];
$all_cats = $model_user->get_categories();
$all_card_items = $model_user->get_card_items($user_id);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Assets/CSS/card.css">
	<title>Card</title>
	<style>
      .fa-shopping-cart {
			color: white;
		}

		.footer {
			position: absolute;
         bottom: 0;
		}		
	</style>
</head>
<body>

   <div class="header_container"></div>

	<header>
		<div class="logo"><a href="http://Bagshop/index.php"><span id="header_logo_left">ЮЖНЫЙ</span><span id="header_logo_right">ПОЛЮС</span></a></div>
		<nav>
			<ul class="navbar_ul">
				<div class="menu_bar">
					<li><a href="http://Bagshop/index.php" class="navbar" id="home">ГЛАВНАЯ</a></li>
					<li id="categories"><a href="#" class="navbar">КАТЕГОРИИ</a>
						<ul class="dropdown">   
							<?php for ($i = 0; $i < count($all_cats); $i++) { ?>
								<li><a href="http://Bagshop/User/View/products.php?cat_id=<?= $all_cats[$i]['id'] ?>"><?= $all_cats[$i]['name'] ?></a></li>
							<?php } ?>
						</ul> 
					</li>
					<li><a href="http://Bagshop/index.php#contacts_sec" class="navbar" id="contacts">КОНТАКТЫ</a></li>
					<li><a href="http://Bagshop/User/View/card.php"><i class="fa fa-shopping-cart navbar" aria-hidden="true"></i></a></li>
				</div>
				<div class="reg_btns">
					<li class="user_icon"><i class="fa fa-user" aria-hidden="true"></i>
						<ul class="reg_ul">
							<li><a href="http://Bagshop/User/View/regform.php" class="reg" id="signup">РЕГИСТРАЦИЯ</a></li>
							<li><a href="http://Bagshop/User/UserLogin.php" class="reg" id="signin">ВОЙТИ</a></li>
							<li><a href="http://Bagshop/User/Controller/logout.php" class="reg" id="logout">ВЫЙТИ</a></li>
						</ul>
					</li>
				</div>
			</ul>
		</nav>
	</header>
	
	<h1 class="heading" align="center">Моя корзина</h1>

	<main class="main">
		<div class="product_details">
			<h3 class="prod_heading">Товары в корзине</h3>
			<hr class="hr">
			<?php for ($i = 0; $i < count($all_card_items); $i++) { ?>
				<div class="product" id="<?=$all_card_items[$i]['product_id']?>">
					<div class="product_info">
						<img class="img" src="../Assets/Images/<?=$all_card_items[$i]['image']?>" alt="Product image"> 
						<div class="product_name_price">
							<p><?=$all_card_items[$i]['name']?></p>
							<span class="prod_price"><?=$all_card_items[$i]['price']?></span>
						</div>
					</div>
					<div class="quant_price">
						<div class="quantity_container">
							<div class="quantity_container_child">
								<button class="minus">&#8722;</button>
								<span class="quantity"><?=$all_card_items[$i]['quantity']?></span>	
								<button class="plus">+</button>
							</div>
						</div>
						<div class="price_container">
							<span class="final_price"><?=$all_card_items[$i]['final_price']?></span>
							<button class="delete_btn">&#x2716;</button>	
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="order_details">
			<h3 class="prod_heading">Детали заказа</h3>
			<hr class="hr">
			<div class="total_container">
				<span>Итого</span>
				<span class="total"></span>
			</div>
			<div class="order_btn">
				<button class="order">Оформить заказ</button>
			</div>
			<div class="safe_order"><i class="fa fa-lock" aria-hidden="true"></i>Безопасный заказ</div>
		</div>
	</main>

	<?php
		if (!count($all_card_items)) {
			echo '<p class="empty_card_msg" align="center">Ваша корзина пустая</p>;
					<script type="text/javascript">
						let main = document.querySelector(".main")
						main.style.display = "none"
					</script>';
		}
	?>

	<script type="text/javascript" src="../../Admin/jquery-3.4.1.min.js"></script>
	<script>
		$(function() {

			function totalCalc() {
				let total = $('.total');
				let finalPriceAll = $('.final_price');
				let sum = 0;
				for (let i = 0; i < finalPriceAll.length; i++) {
					sum += parseInt(finalPriceAll[i].textContent);
				}
				total.html(sum);
			}

			totalCalc();

			$('.plus').click(function() {
				let price = $(this).closest('.product').find('.prod_price').html();
				let quant = $(this).siblings('.quantity').html();
				let finalPrice = $(this).closest('.quant_price').find('.final_price').html();
				let productId = $(this).closest('.product').attr('id');
				quant++;
				$(this).siblings('.quantity').html(quant);
				$(this).closest('.quant_price').find('.final_price').html(quant * price);

				totalCalc();

				$.ajax({
					url: '../Controller/add_to_card.php',
					method: 'POST',
					data: {
						price,
						finalPrice,
						quant, 
						productId, 
						action: 'update'
					},
					success: function() {	
						// location.reload();	
					}
				});
			});

			$('.minus').click(function() {
				let price = $(this).closest('.product').find('.prod_price').html();
				let quant = $(this).siblings('.quantity').html();
				let finalPrice = $(this).closest('.quant_price').find('.final_price').html();
				let productId = $(this).closest('.product').attr('id');
				if (quant > 1) {
					quant--;
					$(this).siblings('.quantity').html(quant);
					$(this).closest('.quant_price').find('.final_price').html(quant * price);

					totalCalc();

					$.ajax({
						url: '../Controller/add_to_card.php',
						method: 'POST',
						data: {
							price,
							finalPrice,
							quant, 
							productId, 
							action: 'update'
						},
						success: function() {	
							// location.reload();	
						}
					});
				}
			});
			
			$('.delete_btn').click(function() {
				let id = $(this).closest('.product').attr('id');
				$.ajax({
					url: '../Controller/add_to_card.php',
					method: 'POST',
					data: {
						id,
						action: 'delete'
					},
					success: function() {
						location.reload();	
					}
				})
			});

			$('.order').click(function() {
				$('.order').html('Заказ оформлен');
				$('.order').css({
					'opacity': '.7',
					'color': 'rgb(107, 54, 48)'
				});
				$('.order').attr('disabled', '');
				$.ajax({
					url: '../Controller/add_to_card.php',
					method: 'POST',
					data: {
						action: 'order'
					},
					success: setTimeout(function() {
						location.reload();
					}, 2000)
				})
			})
		
		});

	</script>

	<?php
		include "footer.html";	
	?>

	<script type="text/javascript" src="../Assets/JS/card.js"></script>
	<script type="text/javascript" src="../Assets/JS/header.js"></script>
</body>
</html>