<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="wid th=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/CSS/AdminLoginStyles.css">
	<title></title>
</head>
<body>

		<div class="box">
			<img src="Assets/Images/admin-logo.png" alt="admin-logo" width="130px" height="130px">
			<h1>WELCOME</h1>

			<div class="form">
				<form action="Controller/login_check.php" method="post">
					<input type="text" name="admLogin" placeholder="Username"><br>
					<input type="password" name="admPassword" placeholder="Password"><br>
					<div class="btn">
						<button name="btn_enter" value="enter" type="submit">Login</button>
					</div>
				</form>	
			</div>

			<div id="msg_box">
         	<?php 
					session_start();
         	   if (isset($_SESSION['message'])) {
         	      echo '<div id="msg">' . $_SESSION['message'] . '</div>';
         	   }
         	   unset($_SESSION['message']);
         	?>
   		</div>
		</div>
	
</body>
</html>