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
$query = "SELECT * FROM products";

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    // Append the category filter to the existing query
    $query .= " INNER JOIN categories ON products.category_id = categories.id WHERE categories.id = '$category'";
}

// Check if a sorting option is selected
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];

    // Modify the SQL query based on the sorting option
    switch ($sort) {
        case "asc":
            $query .= " ORDER BY price ASC";
            break;
        case "desc":
            $query .= " ORDER BY price DESC";
            break;
        default:
            // No need to modify the query further
    }
}


$result = mysqli_query($conn, $query);
$html = "";
$product_category = "";

if ($result) {
while ($row = mysqli_fetch_assoc($result)) {
    $product_category = $row["category_id"];
    $productId = $row['id']; 
    $html .= "<a href=\"#\" onclick=\"goToProduct($productId)\" class=\"product-link\">";
    $html .= "<img src=".$row['image_url']." alt=\"Product 1\" class=\"product-image\">";
    $html .= "<div class=\"product-info\">";
    $html .= "<h3 class=\"product-name\">".$row['name']." </h3>";
    $html .="<p class=\"product-price\">".$row['price']."</p>";
    $html .= "</div></a>";
}
}
else {
    echo "Query execution failed: " . mysqli_error($conn);
}

$sql = "SELECT id, name FROM categories";
$result = $conn->query($sql);
$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[$row["id"]] = $row["name"];
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Shop</title>
    <script>
        function sortProducts(sortType) {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('sort', sortType);
            window.location.search = urlParams.toString();
        }
        function filterByCategory() {
        const category = document.getElementById('category_select').value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('category', category);
        window.location.search = urlParams.toString();
    }
    function goToProduct(productId) {
        window.location.href = "product.php?id=" + productId;
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
                <li><a href="index.php#about-us-section-id">About Us</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="#contact-id">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signUp.php">Sign Up</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
              <div class="button">
                <a href="cart.php">cart</a>
            </div>
            <style>
               .button a{
                    color: #000;
                    margin: 10px 5px 10px 0px;
                }
                
                
            </style>
        </nav>
        <div class="info-section">
            <div class="title">
                Shop
            </div>
        </div>
    </header>
    <main>
        <div class="shop-filters">
          
              
       <label> Sort descending: </label> <button onclick="sortProducts('desc')"><span id="dsc-button" class="fa fa-chevron-down down-arrow"></span></button>
       <label> Sort ascending: </label>      <button onclick="sortProducts('asc')"><span id="asc-button" class="fa fa-chevron-up up-arrow"></span></button>
                <select name="product_category" required class="prod"  id="category_select" onchange="filterByCategory()">
    <?php foreach ($categories as $category_id => $category_name): ?>
        <option value="<?php echo $category_id; ?>" <?php if ($category_id == $product_category) echo "selected"; ?>>
            <?php echo $category_name; ?>
        </option>
    <?php endforeach; ?>
</select>
           
          
        </div>

        <div class="product-container">
        <?php echo $html; ?>
        </div>

    </main>
    <footer>
  <div class="container">
    <p>&copy; 2023 SPORTCHEK. All rights reserved.</p>
    <p>Address: 123 Main Street, City, State</p>
    <p id="contact-id">Phone: 123-456-7890 | Email: info@sportchek.com</p>
  </div>
</footer>
<style>footer {
  background-color: #ccc;
  padding: 20px;
  text-align: center;
}

.container {
  max-width: 800px;
  margin: 0 auto;
}

p {
  margin: 10px 0;
}

.shop-filters {
    height: 30px;
    margin-bottom: 30px;
}

.shop-filters button{
    width: 50px;
}

.shop-filters select{
    width: 200px;
}
</style>
</body>

</html>