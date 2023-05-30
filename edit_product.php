<?php
// Database credentials
$servername = "localhost";
$username = "ecommercepage";
$password = "ecommerce";
$dbname = "ecommercedb";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the product ID from the query string
$product_id = $_GET["id"];

// Fetch the product data from the database
$sql = "SELECT * FROM products WHERE id = '$product_id'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $product_name = $row["name"];
    $product_description = $row["description"];
    $product_price = $row["price"];
    $product_category = $row["category_id"];
    $product_image = $row["image_url"];
} else {
    echo "Product not found.";
    $conn->close();
    exit();
}

// Update product form submission
if (isset($_POST["update_product"])) {
    $new_product_name = $_POST["product_name"];
    $new_product_description = $_POST["product_description"];
    $new_product_price = $_POST["product_price"];
    $new_product_category = $_POST["product_category"];
    $new_product_image = $_POST["product_image"];

    // Update product in the database
    $sql = "UPDATE products SET name = '$new_product_name', description = '$new_product_description', price = '$new_product_price', category_id = '$new_product_category', image_url = '$new_product_image' WHERE id = '$product_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Product updated successfully!");</script>';
        // Redirect back to the product list page
        echo '<script>window.location.href = "adminPage.php";</script>';
    } else {
        echo '<script>alert("Error updating product: ' . $conn->error . '");</script>';
    }
}

// Fetch all categories
$sql = "SELECT id, name FROM categories";
$result = $conn->query($sql);
$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[$row["id"]] = $row["name"];
    }
}

// Close the database connection
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        

body {
    margin: 0;
    box-sizing: border-box;
}

header {
    background-color: #fff;
    background-image: url("./../images/background.jpg");
    height: 7vw;
    background-repeat: no-repeat;
    background-size: cover;
    box-sizing: border-box;
    opacity: 0.9;
    margin: 0px 0px 15px 0px;
}
nav {
    display: flex;
    align-items: center;
    background-color: #0b1a0e;
    opacity: 1;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    width: inherit;
    height: 7vw;
    margin: 0px 0px 15px 0px;
}
.logo img {
    height: 70px;
    margin-left: 25px;
}

.button a {
    display: none;
}

.quote {
    font-family: "sans-serif";
    color: #fff;
    margin: 0px 0px 0px 380px;
    font-size: 25pt;
}

h1 {
        color: white;
        background-color: #10331a;
        padding: 10px;
        margin: 0;
        margin: 0px 50px;
    }

    form {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin: 20px 50px;
    }

    form:first-of-type {
        border-bottom: 1px solid white;
        padding-bottom: 10px;
        margin-bottom: 20px;
        margin-left: 35px;
    }

    form:last-of-type {
        border-bottom: 1px solid white;
        padding-bottom: 10px;
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select {
        display: block;
        margin-bottom: 10px;
        padding: 5px;
        border: 1px solid black;
        border-radius: 1px;
        width: 300px;
        height: 40px;
        margin-left: 15px;
    }

    input[type="submit"] {
        background-color: # ;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-right: 15px;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }

    .prod{
        margin-top: 5px;
    }

    .update{
        height: 40px;
        width: 140px;
        background-color: #9e5b09;
        border: none;
        border-radius: 1px;
        color: #fff;
        margin-left: 10px;
    }

    </style>

</head>
<body>
<header>
        <nav>
           
            <div class="quote">
                SPORTCHECK ADMINISTRATION PAGE 
            </div>
        </nav>
        <div class="info-section">
            
            <div class="location">

            </div>
        </div>
    </header>
    <h1>Edit Product</h1>
    <form method="POST">
        <input type="text" name="product_name" placeholder="Product Name" value="<?php echo $product_name; ?>" required>
        <textarea name="product_description" placeholder="Product Description" required><?php echo $product_description; ?></textarea>
        <input type="number" step="0.01" name="product_price" placeholder="Product Price" value="<?php echo $product_price; ?>" required>
        <select name="product_category" required class="prod">
            <?php foreach ($categories as $category_id => $category_name): ?>
                <option value="<?php echo $category_id; ?>" <?php if ($category_id == $product_category) echo "selected"; ?>><?php echo $category_name; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="product_image" placeholder="Product Image URL" value="<?php echo $product_image; ?>" required>
        
    
    <button type="submit" name="update_product" class="update">Update Product</button>
    </form>
</body>
</html>
<?php 
$conn->close() ?>