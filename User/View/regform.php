<?php
   session_start();   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../Assets/CSS/UserRegStyles.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@300;500&display=swap" rel="stylesheet">
   <title>Registration</title>
</head>
<body>

   <div class="container">
      <div class="heading" align="center">ДОБРО ПОЖАЛОВАТЬ!</div>

      <div id="form">
         <form action="../Controller/UserRegCheck.php" method="POST">
            <input type="text" placeholder="Имя *" name="name"><br>
            <input type="text" placeholder="Имя пользователя *" name="username"><br>
            <input type="email" placeholder="Эл. почта *" name="email"><br>
            <input type="password" placeholder="Пароль *" name="password"><br>
            <input type="password" placeholder="Подтвердите пароль *" name="conf_password"><br>
            <div class="ask_signin" align="center">Есть аккаунт? <a href="../UserLogin.php">Войти</a></div>
            <div class="submit_btn">
               <button type="submit" name="register" class="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
            </div>
         </form>
      </div>

         <?php 
            if (isset($_SESSION['message'])) {
               echo '<div id="msg" align="center">' . $_SESSION['message'] . '</div>';
            }
            unset($_SESSION['message']);
         ?>

   </div>
   
</body>
</html>
