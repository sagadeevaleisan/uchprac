<!--подключение-->
<?php
	include "asset/controllers/check_admin.php";
	include "connect.php";

	$sql = "SELECT * FROM `products` WHERE `product_id`=".$_GET["id"];
	$product = $connect->query($sql)->fetch_assoc();



	include "header.php";
?>

	<main>
		<div class="content">
			
			<div class="head">Изменить товара</div>
			<form enctype="multipart/form-data" action="asset/controllers/update_product.php" method="POST">
				<input type="hidden" name="id" value="<?= $product["product_id"] ?>">
				<input  name="image" value="<?= $product["image"] ?>">
				<input type="text" placeholder="Название" name="name" value="<?= $product["name"] ?>" required>
				
				<button>Изменить</button>
			</form>

		</div>
	</main>



