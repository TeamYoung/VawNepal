<?php
	$host = "localhost";
	$db_name = "vawnepal_db";
	$username = "root";
	$password = "toor";

	try {
		$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	}
	catch(PDOException $exception){ //to handle connection error
		echo "Connection error: " . $exception->getMessage();
	}
?>