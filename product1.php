<?php
session_start();

$productId = $_GET['id']; // Retrieve the product ID from the URL

// Connect to the database and fetch the product data based on the ID
$servername = "localhost";
$username = "ecommercepage";
$password = "ecommerce";
$dbname = "ecommercedb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM products WHERE id = '$productId'";
$result = mysqli_query($conn, $query);

if ($result) {
    $productData = mysqli_fetch_assoc($result);
    // Use the product data to display the details on the product.php page
    // For example:
    echo "<h1>".$productData['name']."</h1>";
    echo "<p>".$productData['description']."</p>";
    echo "<p>Price: ".$productData['price']."</p>";
    echo "<p> URL:" .$productData['image_url']."</p>";
} else {
    echo "Query execution failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
