<?php
session_start();

// Connect to the specified database
$servername = "localhost";
$username = "ecommercepage";
$password = "ecommerce";
$dbname = "ecommercedb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

$html = ""; // Initialize an empty variable to store the HTML code

while ($row = mysqli_fetch_assoc($result)) {
   
    $html .=  " <a href="."#\""." class=\"product-link\"".">"."adasd</a>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your HTML Page</title>
</head>
<body>
    <!-- Your other HTML code here -->
    
    <!-- Display the HTML generated inside the loop -->
    <div >
       
        <?php echo $html; ?>
    </div>
    
    <!-- More HTML code -->
</body>
</html>