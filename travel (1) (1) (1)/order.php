<?php
	session_start();
	include "connect.php";



?><!--подключение-->
<?php
	$menu = '
	
	<div class="logo">
	<a href="index.php">
	<img src="asset/img/Treloo-blue.svg" alt="img"></a>

			<form class="search" method="get" action="search.php">
 <input type="text" name="q" placeholder="Поиск" required  style="width: 250px; ">
</form>
</div>
	<div class="men">
	<a href="index.php">Главная</a>
		<a href="catalog.php">Выбрать тур</a>
			%s
		</div>
	
	';
	$m = '';
	if(isset($_SESSION["role"])) {
		$m .= ($_SESSION["role"] == "admin") ? '<li><a href="admin.php">Заявки</a></li>' : '';
		$m .= '<li><a href="asset/controllers/logout.php">Выход</a></li>';
	} 
	$menu = sprintf($menu, $m);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="байкал, шри-ланка, черное море, абхазия, грузия, travel, забронировать">
	<meta name="description" content="Treloo - туристическое агенство, бронирование туров, дешёвые туры">
	<title>Treloo - туристическое агенство</title>

	<link rel="stylesheet" href="asset/css/style2.css">
	<link rel="stylesheet" href="asset/css/st.css">
	<script src="asset/js/script.js"></script>

	<script>
		let role = "<?= (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest" ?>";
	</script>
</head>
<body>
<button onclick="topFunction()" id="myBtn" title="Вверх">Вверх</button> 
	<header>

		
				<?= $menu ?>
			
	
	</header>



	<main>
		
	<form class="hotel-reservation-form" method="post" action="asset/controllers/order.php">
			<h1><i class="far fa-calendar-alt"></i>Забронировать </h1>
			<div class="fields">
				<!-- Input Elements -->
	<div>
		
	</div>
				<div class="wrapper">
	<div>
		<label for="arrival">Дата отправки</label>
		<div class="field">
			<input id="arrival" type="date" name="arrival" required>
		</div>
	</div>
	<div class="gap"></div>
	<div>
		<label for="departure">Дата отлёта</label>
		<div class="field">
			<input id="departure" type="date" name="departure" required>
		</div>
	</div>

</div>

<div class="wrapper">
	
<div>
		<label for="first_name">Имя</label>
		<div class="field">
			<i class="fas fa-user"></i>
			<input id="first_name" type="text" name="first_name"  required>
		</div>
	</div>
	<div class="gap"></div>
	<div>
		<label for="last_name">Фамилия</label>
		<div class="field">
			<i class="fas fa-user"></i>
			<input id="last_name" type="text" name="last_name"  required>
		</div>
	</div>
</div>
<label for="phone">Телефон</label>
<div class="field">
	<i class="fas fa-phone"></i>
	<input id="phone" type="tel" name="phone" required>
</div>
<label for="email">Email</label>
<div class="field">
	<i class="fas fa-envelope"></i>
	<input id="email" type="email" name="email"  required>
</div>


<div class="wrapper">
	<div>
		<label for="adults">Кол-во пассажиров</label>
		<div class="field">
			<select id="adults" name="adults" required>
				<option disabled selected value="">--</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				
			</select>
		</div>
	</div>
	<div class="gap"></div>
	<div>
		<label for="children">Кол-во детей</label>
		<div class="field">
			<select id="children" name="children" required>
				<option disabled selected value="">--</option>
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
		</div>
	</div>
</div>


<label for="room_pref">Категория номера</label>
<div class="field">
	<select id="room_pref" name="room_pref" required>
		<option disabled selected value="">--</option>
		<option value="Standard">Стандарт</option>
		<option value="Deluxe">Комфорт</option>
		<option value="Suite">Люкс</option>
	</select>
</div>

<input type="submit" value="ОПЛАТИТЬ">
			</div>
		</form>

<!--	<div class="forms">

			<div class="head" id="register">Регистрация</div>
			<form action="asset/controllers/order.php" method="POST">
				<input type="text" name="name" value='<?= $data ?>'>
				<input type="text" placeholder="Имя" name="names" pattern="[а-яА-ЯёЁ\s\-]+" required>
				<input type="text" placeholder="Фамилия" name="surname" pattern="[а-яА-ЯёЁ\s\-]+" required>
				<input type="text" placeholder="Отчество" name="patronymic" pattern="[а-яА-ЯёЁ\s\-]+" required >
				<input type="tel" placeholder="Телефон" name="phone" pattern = "7[0-9]{10}" minlength="11" maxlength="11"  required>
				<input type="email" placeholder="Email" name="email" required>
				
				<div class="part">
					<input type="checkbox" name="rules" required >
					Согласие с обработкой данных
				</div>
				<button >Отправить</button>
			</form>

		</div>
		
	</main>
-->	
</body>
</html>
<!--подключение к футеру-->	

<?php
		include "footer.php";

		?>



