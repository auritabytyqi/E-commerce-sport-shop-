<?php
	$servername = "localhost";
	$username = "ecommercepage";
	$password = "ecommerce";
	$dbname = "ecommercedb";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>