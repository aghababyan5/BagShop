<?php

session_start();
include '../Model/model.php';

if (!isset($_SESSION['admin'])) {
  header('location:../admin_login.php');
  die;
}

$all = $model->get_user_messages();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Assets/CSS/user_msgs.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Админка</title>
  <style>
    .navbar li:last-child {
      background-color: #594f8d;
    }

    #navbar_messages {
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
        <li><a href="http://bagshop/admin/view/home.php" id="navbar_cats"><i class="fa fa-list" aria-hidden="true"></i>Категории продуктов</a></li>
        <li><a href="http://bagshop/admin/view/newsletter.php" id="navbar_newsletter"><i class="fa fa-inbox" aria-hidden="true"></i>Рассылка</a></li>
        <li><a href="http://bagshop/admin/view/user_msgs.php" id="navbar_messages"><i class="fa fa-comments" aria-hidden="true"></i>Сообщения</a></li>
      </ul>
    </div>

    <div class="main">

      <div class="subheading_container">
        <p class="subheading">Тут можно прочитать все отправленные сообщения пользователей:</p>
      </div>

      <div class="data_container">
          <table class="user_msgs" cellspacing="0">
            <tr class="table_headings">
              <th class="table_heading">Имя</th>
              <th class="table_heading">Эл. адрес</th>
              <th class="table_heading">Телефон</th>
              <th class="table_heading">Сообщение</th>
            </tr>
            <?php for ($i = 0; $i < count($all); $i++) { ?>
              <tr class="table_data">
                <td class="user_data"><?=$all[$i]['name']?></td>
                <td class="user_data"><?=$all[$i]['email']?></td>
                <td class="user_data"><?=$all[$i]['tel']?></td>
                <td class="user_data"><?=$all[$i]['message']?></td>
              </tr>
            <?php } ?>
          </table>
      </div>

    </div>
      
  </div>
</body>
</html>