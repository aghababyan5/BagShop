<?php 

include '../Model/model.php';

if (isset($_GET['cat_id'])) {
	$_SESSION['cat_id'] = $_GET['cat_id'];
}

$all_products = $model_user->get_product($_SESSION['cat_id']);
$all_cats = $model_user->get_categories();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="../Assets/CSS/products.css">
	<title>Title</title>
	<style>
		#categories .navbar {
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
	
	<main class="main">
		<h1 class="heading" align="center">Продукты</h1>	
		<div class="line_div">
			<hr class="line_hr">
		</div>
		<?php for ($i = 0; $i < count($all_products); $i++) { ?>
			<div class="products_block_container">
				<div class="product_img_container">
					<img class="product_img" src="../Assets/Images/<?=$all_products[$i]['image']?>"/> 
				</div>
				<div class="product_content_container">
					<div class="product_desc">
						<h2><?=$all_products[$i]['name']?></h2>
						<p class="vendor_code prod_heading">Артикул: 0<?=$all_products[$i]['id']?></p>
						<h2 class="about_prod_heading prod_heading">О ТОВАРЕ</h2>
						<p class="prod_info"><?=$all_products[$i]['description']?></p>
						<h2 class="return_heading prod_heading">ПОЛИТИКА ВОЗВРАТА</h2>
						<p class="prod_info">Важно, что закон о защите прав потребителей дает нам право на возврат покупки, сделанной дистанционно, в течение 7 дней со дня получения покупки (или в течение 3 месяцев, если покупатель не был предупрежден о 7-дневном сроке). При этом, в законе нет разграничений на определенные категории товаров, как это зачастую бывает при покупках в офлайн магазинах.</p>
					</div>
					<div class="product_to_card" id="<?=$all_products[$i]['id']?>">
						<div class="prod_price_container">
							<p class="prod_price" name="prod_price"><?=$all_products[$i]['price']?></p>
							<span>$</span>
						</div>
						<button class="btn_add_to_card">Добавить в корзину</button>
					</div>
				</div>
			</div>
		<?php } ?>
	</main>

	<script type="text/javascript" src="../../Admin/jquery-3.4.1.min.js"></script>

	<script>
		$(document).ready(function(){
			$('.btn_add_to_card').click(function(){
				let id = $(this).parents('div').attr('id');
				let final_price = $(this).siblings('.prod_price_container').find('.prod_price').html();
				$.ajax({
					url: '../Controller/add_to_card.php',
					method: 'post',
					dataType: 'json',
					data: {
						final_price,
						id,
						action: 'add'
					},
					success: function(res) {
						if (!res.success) {
							location.href = '../UserLogin.php';
						} else {
							console.log(res);
						}
					}
				})
			});
		});
	</script>

	<?php
		include "footer.html";
	?>

	<script type="text/javascript" src="../Assets/JS/products.js"></script>
	<script type="text/javascript" src="../Assets/JS/header.js"></script>
</body>
</html>