<?php
	include "../../connect.php";

	$id = $_GET["id"];

	$sql = "SELECT * FROM `products` WHERE `product_id`=".$id;
	$product = $connect->query($sql)->fetch_assoc();

	if($product["count"] <= 0)
		return header("Location:../../cart.php?message=Товар отсутствует");
		$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
		if($role == "guest")
$sql = sprintf("SELECT * FROM `orders` WHERE `product_id`='%s'", $id);
	if($order = $connect->query($sql)->fetch_assoc())
		$connect->query(sprintf("UPDATE `orders` SET `count`='%s' WHERE `order_id`='%s'", ++$order["count"], $order["order_id"]));
	else
		$connect->query(sprintf("INSERT INTO `orders`(`product_id`,  `count`) VALUES('%s',  '%s')", $product["product_id"], 1));

	$connect->query(sprintf("UPDATE `products` SET `count`='%s' WHERE `product_id`='%s'", --$product["count"], $product["product_id"]));

	return header("Location:../../cart.php?message=Товар добавлен в корзину");
