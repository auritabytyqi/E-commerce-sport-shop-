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

$sort = "";

// Check if a sorting option is selected
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];

    // Modify the SQL query based on the sorting option
    switch ($sort) {
        case "asc":
            $query = "SELECT * FROM products ORDER BY price ASC";
            break;
        case "desc":
            $query = "SELECT * FROM products ORDER BY price DESC";
            break;
        default:
            $query = "SELECT * FROM products";
    }
} else {
    $query = "SELECT * FROM products";
}

$result = mysqli_query($conn, $query);
$html = "";

while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<a href=\"product.php\" class=\"product-link\">";
    $html .= "<img src=".$row['image_url']." alt=\"Product 1\" class=\"product-image\">";
    $html .= "<div class=\"product-info\">";
    $html .= "<h3 class=\"product-name\">".$row['name']." <span>".$row['description']."</span></h3>";
    $html .="<p class=\"product-price\">".$row['price']."</p>";
    $html .= "</div></a>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/shop_style.css" />
    <title>Shop</title>
    <script>
        // JavaScript function to handle sorting
        function sortProducts(sortType) {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('sort', sortType);
            window.location.search = urlParams.toString();
        }
    </script>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="#"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <ul class="pages">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signUp.php">Sign Up</a></li>

            </ul>
            <div class="button">
                <a href="cart.php">cart</a>
            </div>
        </nav>
        <div class="info-section">
            <div class="title">
                Shop
            </div>
        </div>
    </header>
    <main>
        <div class="shop-filters">
            <div class="search-products">
                <input type="search" size="30" placeholder="&#128269; Search product..." />
                <button onclick="sortProducts('desc')">Sort descending</button>
                <button onclick="sortProducts('asc')">Sort ascending</button>
           
            </div>
            <div class="filter-products">
                <select id="filter-select" width="20" name="filter-select">
                    <option value="default">Filter</option>
                    <option value="price-ascending">Price <span>&#9650;</span></option>
                    <option value="price-descending">Price <span>&#9660;</span></option>
                    <option value="category">Category</option>    
                </select>
            </div>
            <div class="date-time">
                <span><input type="date"/></span>
                <span>---</span>
                <span><input type="date"/></span>
            </div>
        </div>

        <div class="product-container">
        <?php echo $html; ?>
        </div>

    </main>
    <footer>
        <div>

        </div>
    </footer>
</body>

</html>