<?php
	session_start();
	include "connect.php";
	
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
	$name = (isset($_GET["name"])) ? $_GET["name"] : 0;

	$sql = "SELECT * FROM `products` WHERE `hotel` !='' AND `name`= '{$name}'";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

		$data = "";
		while($row = $result->fetch_assoc())
			$data .= sprintf('
		
				<div class="coli">
					
					<div class="rowi">
				
						<b>%s</b>
						<hr>
						<h3>от %s p.</h3>
						<input type="hidden" value="%s" name="name">
						%s
						%s
					</div>
					
					
				</div>
			',    $row["hotel"], $row["price"], $row["name"], 
			($role == "admin") ? '
		
				<p><a href="update.php?id='.$row["product_id"].'" class="text-small">Редактировать</a></p>
				<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="asset/controllers/delete_product.php?id='.$row["product_id"].'" class="text-small">Удалить</a></p>
			
		' : '',
		($role == "guest") ? '
		<a href="order.php?name='. $row["name"] .'" style="-webkit-text-stroke: 0.7px #27386D; 
		color: #fff;font-family: Montserrat Alternates;	">Забронировать</a>
		
		' : '');

	if($data == "")
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';

?>
<?php
	$menu = '
	
	<div class="logo">
	<a href="index.php">
	<img src="asset/img/Treloo-blue.svg" title="тур" alt="img"></a>

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

	
		<div class="content">
	
		<div class="rowi" id="products">
				<?= $data ?>
				
			</div>

		</div>
	
	
	<?php
	include "footer.php";
?>
		