<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "loginuser");
	define("DB_PASS", "secretpassword");
	define("DB_NAME", "login2015");

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	if (mysqli_connect_errno()) {
		die("Database connection failed " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");		
	}
?>