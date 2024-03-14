<?php
	session_start();
	if(!isset($_SESSION["role"]))
		return header("Location:../../index.php?message=Вы не авторизованы");