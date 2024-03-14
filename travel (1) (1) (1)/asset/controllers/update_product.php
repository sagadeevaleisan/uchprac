<?php
	include "check_admin.php";
	include "../../connect.php";

		$image = $_POST["image"];

	$connect->query(sprintf("UPDATE `products` SET `name`='%s', `image`='%s' 
	WHERE `product_id`='%s'", $_POST["name"], $image, $_POST["id"]));

	return header("Location:../../catalog.php");
