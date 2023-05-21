<?php
    include '../Model/model.php';
    session_start();

    if(isset($_GET['cat_id'])){
        $_SESSION["cat_id"] = $_GET["cat_id"];
    }

    $all = $model->get_product($_SESSION['cat_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/admin_product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Админка</title>
    <style>
        .navbar li:first-child{
            background-color: #594f8d;
        }

        #navbar_cats {
          color: white;
        }
    </style>
</head>
<body>

    <div class="heading_container">
        <h1>Добро пожаловать, <?=$_SESSION['admin']?>!</h1>
    </div>
    
    <div class="content">

        <div class="nav_container">
            <ul class="navbar">
                <li><a href="http://bagshop/admin/View/home.php" id="navbar_cats"><i class="fa fa-list" aria-hidden="true"></i>Категории продуктов</a></li>
                <li><a href="http://bagshop/admin/view/newsletter.php" id="navbar_newsletter"><i class="fa fa-inbox" aria-hidden="true"></i>Рассылка</a></li>
                <li><a href="#" id="navbar_messages"><i class="fa fa-comments" aria-hidden="true"></i>Сообщения</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="form">
                <form action="../Controller/add_product.php"  method="post" enctype="multipart/form-data">
                    <input class="text_inps" type="text" name="name" placeholder="Имя продукта">
                    <input class="text_inps" type="text" name="desc" placeholder="Описание">
                    <input class="text_inps" type="text" name="price" placeholder="Цена">
                    <input class="inp_file" type="file" name="img">
                    <button class="add_btn" name="action" value="add">Добавить продукт</button>
                </form>
            </div>
            

            <div class="table">
                <table>
                    <tr>
                        <th class="prod_headings">Имя</th>
                        <th class="prod_headings">Фото</th>
                        <th class="prod_headings">Описание</th>
                        <th class="prod_headings">Цена</th>
                        <th class="prod_headings">Обновить</th>
                        <th class="prod_headings">Удалить</th>
                    </tr>
                    <?php for ($i = 0; $i < count($all); $i++) { ?>
                        <tr id="<?=$all[$i]['id']?>">
                            <td class="prod_data prod_name" align="center" contenteditable><?=$all[$i]['name']?></td>        
                            <td class="prod_data prod_img" align="center"><img src="../Assets/Images/<?=$all[$i]['image']?>" alt="" width="100px" height="100px"></td>
                            <td class="prod_data prod_desc" align="center"><p class="td_desc" contenteditable><?=$all[$i]['description']?></p></td>
                            <td class="prod_data prod_price" align="center"><p contenteditable class="p_price"><?=$all[$i]['price']?></p></td>
                            <td class="prod_data prod_upd" align="center"><button class="prod_btns btn_upd">Обновить</button></td>
                            <td class="prod_data prod_del" align="center"><button class="prod_btns btn_del">Удалить</button></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            
        </div>

    </div>

    <!-- Scripts -->
    <script src="../jquery-3.4.1.min.js"></script>
    <script>
    	$(document).ready(function() {
    		$('.btn_upd').click(function() {
    			let self = $(this).parents('tr');
    			let id = self.attr('id');
    			let name = self.find('.prod_name').text();
    			let desc = self.find('.td_desc').text();
    			let price = self.find('.p_price').text();
    			$.ajax({
    				url: "../Controller/add_product.php",
    				method: "post",
    				data: {
    					name,
    					desc, 
    					price,
    					id,
    					action: "update"
    				},
    				success: function() {
    					location.reload();
    				}
    			})
    		})

    		$('.btn_del').click(function(){
    			let id = $(this).parents('tr').attr('id');
    			$.ajax({
    				url: '../Controller/add_product.php',
    				method: 'post',
    				data: {
    					id,
    					action: 'delete',
    				},
    				success: function() {
    					location.reload();
    				}, 
    			})
    		})
    	})
    </script>

</body>
</html>