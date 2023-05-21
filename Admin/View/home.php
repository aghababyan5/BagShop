<?php

session_start();
include '../Model/model.php';

if (!isset($_SESSION['admin'])) {
  header('location:../admin_login.php');
  die;
}
    
$all = $model->get_categories();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../Assets/CSS/admin_homepage.css">
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
          <li><a href="http://bagshop/admin/view/user_msgs.php" id="navbar_messages"><i class="fa fa-comments" aria-hidden="true"></i>Сообщения</a></li>
        </ul>
      </div>

      <div class="main">

        <div class="upper_container">
          <div class="input_container">
            <div class="input_label_container">
              <label class="input_label" for="new_cat_inp">Добавьте новую категорию:</label>
              <input type="text" id="new_cat_inp">
            </div>

            <button id="btn_add">Добавить</button>
          </div>
        </div>
        
        <div class="table_container">
          <table class="cats_table">
            <tr>
              <th class="cat_headings">Название</th>
              <th class="cat_headings">Обновить</th>
              <th class="cat_headings">Удалить</th>
            </tr>
            <?php for ($i = 0; $i < count($all); $i++) { ?>
              <tr id="<?= $all[$i]['id'] ?>">
                <td contenteditable="true" id="cat_name"><?= $all[$i]['name'] ?></td>
                <td><button class="cat_btns btn_upd">Обновить</button></td>
                <td><button class="cat_btns btn_del">Удалить</button></td>
                <td><a href="product.php?cat_id=<?= $all[$i]['id'] ?>" class="show_btn">Покaзать</a></td>
              </tr>
            <?php } ?>
          </table>
        </div>
        
      </div>

    </div>

  <!-- Scripts -->
  <script type="text/javascript" src="../jquery-3.4.1.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#btn_add').click(function(){
        let name = $('#new_cat_inp').val();
        $.ajax({
          url: '../Controller/add_cat.php',
          method: 'post',
          data: {
            name,
            action: 'add',
          },
          success: function() {  
              location.reload();
          }
        });
      });

      $(".btn_upd").click(function(){ 
        let id = $(this).parents("tr").attr("id");
        let name = $(this).parent().prev().text();
        $.ajax({
          url: '../Controller/add_cat.php',
          method: 'post',
          data: {
            name,
            id,
            action: 'update',
          },
          success: function() {
            location.reload();
          },
        });
      });

      $(".btn_del").click(function(){
        let id = $(this).parents("tr").attr("id");
        $.ajax({
          url: '../Controller/add_cat.php',
          method: 'post',
          data: {
            id,
            action: 'delete',
          },
          success: function() {
            location.reload();
          },
        });
      });
    });

</script>
</body>
</html>