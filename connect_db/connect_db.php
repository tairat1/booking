<?php
		$hostname_sone = "localhost";
		$database_sone = "booking";
		$username_sone = "root";
		$password_sone = "";
		$conn = mysqli_connect($hostname_sone, $username_sone, $password_sone, $database_sone) or trigger_error(mysqli_connect_errno(),E_USER_ERROR); 
		mysqli_set_charset($conn, "utf8");
		date_default_timezone_set("Asia/Bangkok");

?>