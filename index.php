<?php 

session_start();
include 'User/Model/model.php'; 

$all = $model_user->get_categories();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="Admin/Assets/CSS/HomepageStyles.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
      <title>Bagshop</title>
      <style>
         #home {
            color: white;
         }
      </style>
   </head>

   <body>

      <header>
         <div class="logo"><a href="http://Bagshop/index.php"><span id="header_logo_left">ЮЖНЫЙ</span><span id="header_logo_right">ПОЛЮС</span></a></div>
         <nav>
            <ul class="navbar_ul">
               <div class="menu_bar">
                  <li><a href="http://Bagshop/index.php" class="navbar" id="home">ГЛАВНАЯ</a></li>
                  <li id="categories"><a id="cats_btn" class="navbar">КАТЕГОРИИ</a>
                     <ul class="dropdown_cats">   
                        <?php for ($i = 0; $i < count($all); $i++) { ?>
                           <li><a href="http://Bagshop/User/View/products.php?cat_id=<?= $all[$i]['id'] ?>"><?= $all[$i]['name'] ?></a></li>
                        <?php } ?>
                     </ul> 
                  </li>
                  <li><a class="navbar" id="contacts">КОНТАКТЫ</a></li>
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

      <section class="adventure_sec1">
         <h2 class="head_text">ПРИГОТОВЬТЕСЬ</h2>
         <h2 class="head_text">К ПРИКЛЮЧЕНИЮ</h2>
         <button class="angle-down"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
      </section>  

      <section class="newprods_sec2" id="newprods_sec2">
         <div class="sec2_divs" id="newprods_text_div">
            <h2 id="newprods_text" align="center" style="margin-bottom: 25px;">ОГРОМНЫЙ АССОРТИМЕНТ<br /> ПРОДУКТОВ</h2>
            <h4 id="newprods_to_store">ОБЯЗАТЕЛЬНО НАЙДЁТЕ ЧТО-НИБУДЬ НА ВАШ ВКУС</h4>
         </div>
         <div class="sec2_divs" id="newprods_pic"></div> 
      </section>
      
      <section class="cats_menu_sec3">
         <div class="cats_divs" id="cat1_div">
            <a href="User/View/products.php?cat_id=24"><div class="cats_divs_overlay">НЕБОЛЬШИЕ РЮКЗАКИ</div></a>
         </div>
         <div class="cats_divs" id="cat2_div">
            <a href="User/View/products.php?cat_id=25"><div class="cats_divs_overlay">СУМКИ</div></a>
         </div>
         <div class="cats_divs" id="cat3_div">
            <a href="User/View/products.php?cat_id=26"><div class="cats_divs_overlay">БОЛЬШИЕ РЮКЗАКИ</div></a>
         </div>
      </section>

      <section class="about_sec">
         <div class="about_text">
            <h3 class="about_heading">О НАС</h3>
            <p class="about_info">Имея многолетний опыт работы в оффлайне, в 2009 году нашей командой было принято решение попробовать свои силы в сфере торговли через интернет. Конечно же, были ошибки, из которых делались выводы. С годами накопился багаж опыта, который сейчас позволяет нам довести все процессы до автоматизма.
            За годы  работы мы постарались максимально подробно изучить все запросы, просьбы, пожелания наших потребителей. При этом делаем ставку на наличие товара и его доступность. Любой товар будет в доставлен к Вам в кратчайшие сроки.</p>
         </div>
      </section>

      <section class="contacts_sec" id="contacts_sec">
         <div class="contacts_container">
            <div class="contacts_form">
               <form action="User/Controller/user_contacts.php" method="post">
                  <input class="contacts_inps" type="text" name="cont_name" placeholder="Имя"><br />
                  <input class="contacts_inps" type="email" name="cont_email" placeholder="Эл. почта"><br />
                  <input class="contacts_inps" type="tel" name="cont_tel" placeholder="Телефон"><br />
                  <textarea id="cont_msg" name="cont_msg" rows="5" placeholder="Добавьте сообщение..."></textarea><br />
                  <div class="contacts_submit_div">
                     <button type="submit" class="contacts_submit">Отправить</button>  
                  </div>

                  <?php
                     if (isset($_SESSION['message'])) {
                        echo '<div id="msg_box">' . $_SESSION['message'] . '</div>';
                     }
                     unset($_SESSION['message']);
                  ?>
               </form>
            </div>
            <div class="contacts_text">
               <h2 class="contacts_heading">КОНТАКТЫ</h2>
               <p class="contacts_parag">Если у Вас есть какие то предложения, жалобы, или что-нибудь ещё, оставьте свои контакты и текстовое сообщение, мы обязательно рассмотрим ваше сообщение как можно скорее. Рады помочь!) </p>
               <p class="contacts_tel">Телефон: +374 (96) 99-99-99</p>
            </div>
         </div>
      </section>

      <section class="newsletter" id="newsletter">
         <h2 class="newsletter_header">ПОДПИШИТЕСЬ НА РАССЫЛКУ</h2>
         <h4 class="newsletter_subheader">И УЗНАВАЙТЕ НОВОСТИ ПЕРВЫМИ</h4>
         <div class="newsletter_form">
            <form action="User/Controller/newsletter.php" method="post">
               <input type="email" name="newsletter_inp" id="newsletter_inp" placeholder="Добавьте эл. почту*" required><br />
               <button class="newsletter_btn">ПОДТВЕРДИТЬ</button>

               <?php
                  if (isset($_SESSION['message_2'])) {
                     echo '<div id="msg_box_2">' . $_SESSION['message_2'] . '</div>';
                  }
                  unset($_SESSION['message_2']);
               ?>
            </form>
         </div>
      </section>

      <?php
         include "User/View/footer.html";
      ?>
            
      <script src="Admin/jquery-3.4.1.min.js"></script>
      <script src="User/Assets/JS/homepage.js"></script>
      <script src="User/Assets/JS/header.js"></script>
   </body>
</html>