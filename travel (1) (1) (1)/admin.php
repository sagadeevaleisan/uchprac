<!--подключение-->
<?php
	include "asset/controllers/check_admin.php";
	include "connect.php";

	$sql = "SELECT * FROM `orders`  ORDER BY `created_at` DESC";
	$result = $connect->query($sql);
	$orders = "";
	while($row = $result->fetch_assoc()) {
		$adv = ($row["status"] == "Новый") ? '
			<form action="asset/controllers/confirm_order.php" class="w100" method="POST">
				<input type="hidden" value="'.$row["order_id"].'" name="id" />
				<button>Подтвердить завку</button>
			</form>
			<h3 class="text-center">Отменить заявку</h3>
			<form action="asset/controllers/cancel_order.php" class="w100" method="POST">
				<input type="hidden" value="'.$row["order_id"].'" name="id" />
				<textarea placeholder="Причина отмены" name="reason" required></textarea>
				<button style="margin:0">Отменить заявку</button>
			</form>
		' : '';
		$adv = ($row["status"] == "Отменённый") ? '
			<h3 class="text-center">Причина отмены:</h3>
			<p class="reason">'.$row["reason"].'</p>
		' : $adv;
		$orders .= sprintf('
			<div class="col text-left">
				<h2>Заявка %s</h2>
				<p>Дата отправки: <b>%s</b></p>
				<p>Дата прилёта: <b>%s</b></p>
				<p>ФИО: <b>%s %s</b></p>
				<p>Статус заказа: <b>%s</b></p>
				<p>Телефон: <b>%s</b></p>
				<p>Email: <b>%s</b></p>
				<p>Кол-во взрослых пассажиров: <b>%s</b></p>
				<p>Кол-во детей: <b>%s</b></p>
				<p>Номер отеля: <b>%s</b></p>
				<input type="hidden" value="%s" name="order_id" />
				%s
				<p class="text-small text-right">%s</p>
			</div>
		', $row["number"], $row["arrival"],  $row["departure"],$row["first_name"], $row["last_name"], $row["status"], $row["phone"], $row["email"],$row["adults"], $row["children"], $row["room_pref"], $row["order_id"], $adv, $row["created_at"]);
	}
	if(!$orders)
		$orders = '<h3 class="text-center">Заявки отсутствуют</h3>';

	include "header.php";
?>

	<main>
		<!--общий контейнер-->
		<div class="content">
			 

			<div class="head">Добавить вакансию.</div>
			<form enctype="multipart/form-data" action="asset/controllers/add_product.php" method="POST">
			
				<input type="text" placeholder="Название" name="name" required>
				<input type="file" name="image" required>
				<button>Добавить</button>
				</div>
			</form>

			<div class="head" style="margin-bottom: 10px" style="display:flex;justify-content:space-between;">Заказы
			
				<span onclick="filter.filter('all', 'admin')">Все</span> |
				<span onclick="filter.filter('Новый', 'admin')">Новые</span> |
				<span onclick="filter.filter('Подтверждённый', 'admin')">Подтверждённые</span> |
				<span onclick="filter.filter('Отменённый', 'admin')">Отменённые</span> 
			</div>
			<div class="row at" id="orders">
				<?= $orders ?>
			</div>
		</div>
		<?php
		include "footer.php";
		?>
	</main>

	<script>filter.orders()</script>
