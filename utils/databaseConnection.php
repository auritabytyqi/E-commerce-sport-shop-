<?php
	// Connect to the specified database
	$servername = "localhost";
	$username = "db";
	$password = "password";
	$dbname = "ecommercedatabase";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>