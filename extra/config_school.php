<?php
	$servername = "localhost";
	$username = "f035064f";
	$password = "f035064f";
	$dbname = "f035064f";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>