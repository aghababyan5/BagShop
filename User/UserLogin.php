<?php 
   session_start();
   if (isset($_SESSION['error'])) {
      echo ($_SESSION['error']);
      unset($_SESSION['error']);
   }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="Assets/CSS/UserLoginStyles.css">
   <title>Document</title>
</head>
<body>

   <div class="container">
      <div class="content">
         <div class="logo">
            <span class="leftside_logo">ЮЖНЫЙ</span><span class="rightside_logo">ПОЛЮС</span>
         </div>
         <div class="heading">
            <span class="heading_hello">Привет,</span>
            <span class="heading_welcome">хорошего дня!</span>
         </div>
         
         <div class="form">
            <form action="../User/Controller/UserLoginCheck.php" method="POST">
               <input class="inp" type="text" name="userLogin" placeholder="Логин"><br>
               <input class="inp" type="password" name="userPassword" placeholder="Пароль"><br>
               <div class="checkbox_div">
                  <input type="checkbox" name="inp_check" class="checkbox" id="checkbox"><br>
                  <label for="checkbox">Соглашаться с использованием файлов куки.</label>
               </div>
               <div class="submit_div">
                  <button type="submit" class="submit_btn">Войти</button>
               </div>
            </form>
         </div>
         

         <div class="content_ending">
            <div>Наши соцсети</div>
            <div>
               <a href="http://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
               <a href="http://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
               <a href="http://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
         </div>
         <div class="signin_question" align="center">Нет аккаунта? <a href="View/regform.php">Зарегистрироваться</a></div>

         <?php 
            if (isset($_SESSION['message'])) {
               echo '<div id="msg" align="center">' . $_SESSION['message'] . '</div>';
            }
            unset($_SESSION['message']);
         ?>         
      </div>
      <div class="image_block"></div>
   </div>

</body>
</html>