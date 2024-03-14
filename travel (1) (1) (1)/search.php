<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "travel";
$conn = new mysqli($servername, $username, $password, $dbname);

// Получение списка товаров из базы данных
if ($_SERVER["REQUEST_METHOD"] == "GET") {
 $search_query = $_GET["q"];
 $sql = "SELECT * FROM products WHERE name LIKE 
'%$search_query%' AND `hotel` !='' " ;
 $result = $conn->query($sql);

}

?>
<!--подключение-->
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


 <?php while ($row = $result->fetch_assoc()) { ?>
<section class="search">
  <div class="coli">
  <div class="rowi">
				
      
 <input type="hidden" value="%s" name="name"> 
   <p><a href=""> <?php echo $row["name"]; ?></a></p>
    <hr>
   <p> <?php echo $row["hotel"]; ?></p>
  
   <h4> от <?php echo $row["price"]; ?> р.</h4>
   <a href="order.php" style="-webkit-text-stroke: 0.7px rgba(2, 48, 192, 1); 
		color: #fff;font-family: Montserrat Alternates;	">Забронировать</a>
</div>
 </div>
</section>
 <?php
 }?>