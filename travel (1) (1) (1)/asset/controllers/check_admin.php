<?php
	include "check.php";

	if($_SESSION["role"] != "admin")
		return header("Location:../../admin.php");