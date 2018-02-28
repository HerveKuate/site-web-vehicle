<?php
	$servername = "mysql-saikyouzero.alwaysdata.net";
	$username = "122969";
	$password = "megaman&saikyou21";
	$dbname = "saikyouzero_db";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>