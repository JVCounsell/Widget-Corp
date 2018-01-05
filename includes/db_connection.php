<?php

	define("DB_SERVER", "localhost");
	define("DB_USER", "user");
	define("DB_PASS", "testpassword");
	define("DB_NAME", "widget_corp");

	//1.Connect
	
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	//test connection
	if (mysqli_connect_errno()){
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}
?>