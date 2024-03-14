<?php
	include "check_admin.php";
	include "../../connect.php";

	$image = "asset/controllers/img". time() ."_". $_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"], "../../".$image);

	$connect->query(sprintf("INSERT INTO `products`(`name`, `image`) VALUES('%s', '%s')", $_POST["name"],   $image));

	return header("Location:../../admin.php?message=Товар добавлен");