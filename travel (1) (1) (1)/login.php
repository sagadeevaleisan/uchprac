<!--подключение-->
<?php
	session_start();
	include "connect.php";


	include "header.php";
?>

	<main>
<div class="forms">
			
			<form action="asset/controllers/login.php" method="POST">
				<input type="text" placeholder="Логин" name="login" required><br>
				<input type="password" placeholder="Пароль" name="password" required> <br>
				<button>Войти</button>
			</form>
		
		</div>
	</main>

	<script src="asset/scripts/slider.js"></script>

