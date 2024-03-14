<?php
	include "../../connect.php";

	$sql = sprintf("INSERT INTO `orders`(`order_id`, `number`, `status`, `arrival`, `departure`, `first_name`, `last_name`, `phone`, `email`, `adults`, `children`, `room_pref`) VALUES(NULL, '%s','%s', '%s', '%s', '%s', '%s', '%s', '%s','%s', '%s', '%s')",
	rand(1000000000, 2000000000),'Новый', $_POST["arrival"], $_POST["departure"], $_POST["first_name"], $_POST["last_name"], $_POST["phone"], $_POST["email"], $_POST["adults"], $_POST["children"], $_POST["room_pref"]
	);
	if(!$connect->query($sql))
		return die("Ошибка добавления данных: ". $connect->error);

	return header("Location:../../index.php?message=Вы зарегистрировались");