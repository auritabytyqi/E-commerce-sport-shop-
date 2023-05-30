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

// Function to get the last category ID
function getLastCategoryId($conn) {
    $sql = "SELECT id FROM categories ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["id"];
    }
    return 0;
}

// Add category form submission
if (isset($_POST["add_category"])) {
    $category_name = $_POST["category_name"];
    $last_id = getLastCategoryId($conn);
    $new_id = $last_id + 1;

    // Insert category into the database
    $sql = "INSERT INTO categories (id, name) VALUES ('$new_id', '$category_name')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Category added successfully!");</script>';
    } else {
        echo '<script>alert("Error adding category: ' . $conn->error . '");</script>';
    }
    
}

// Add product form submission
if (isset($_POST["add_product"])) {
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $product_price = $_POST["product_price"];
    $product_category = $_POST["product_category"];
    $product_image = $_POST["product_image"];

    // Insert product into the database
    $sql = "INSERT INTO products (name, description, price, category_id, image_url) VALUES ('$product_name', '$product_description', '$product_price', '$product_category', '$product_image')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Product added successfully!");</script>';
    } else {
        echo '<script>alert("Error adding product: ' . $conn->error . '");</script>';
    }
    
}

// Delete product
if (isset($_GET["delete_product"])) {
    $product_id = $_GET["delete_product"];

    // Delete product from the database
    $sql = "DELETE FROM products WHERE id = '$product_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Product deleted successfully!");</script>';
    } else {
        echo '<script>alert("Error deleting product: ' . $conn->error . '");</script>';
    }
    
}

// Delete category
if (isset($_GET["delete_category"])) {
    $category_id = $_GET["delete_category"];

    // Delete category and associated products from the database
    $sql = "DELETE FROM categories WHERE id = '$category_id'";
    if ($conn->query($sql) === TRUE) {
        // Also delete products of the deleted category
        $sql = "DELETE FROM products WHERE category_id = '$category_id'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Category and associated products deleted successfully!");</script>';
        } else {
            echo '<script>alert("Error deleting associated products: ' . $conn->error . '");</script>';
        }
        
    } else {
        echo "Error deleting category: " . $conn->error;
    }
}

// Update product
if (isset($_POST["update_product"])) {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $product_price = $_POST["product_price"];
    $product_category = $_POST["product_category"];
    $product_image = $_POST["product_image"];

    // Update product in the database
    $sql = "UPDATE products SET name = '$product_name', description = '$product_description', price = '$product_price', category_id = '$product_category', image_url = '$product_image' WHERE id = '$product_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Product updated successfully!");</script>';
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
    <title>Admin Panel</title>
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
    margin: 0px 0px 0px 280px;
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
        margin-left: 100px;
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
        background-color: #9e5b09;
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

    .url{
        width: 280px;
        margin-right: 10px;
    }

    .selectc{
        margin-top: 5px;
    }


    table {
        width: 92%;
        border-collapse: collapse;
        margin: 20px 50px;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #ddd;
    }

    img {
        max-width: 50px;
        max-height: 50px;
    }

    a {
        text-decoration: none;
        color: #333;
    }

    .logOut a{
        color: #fff;
        margin-left: 180px;
        font-size: 13pt;
    }


    </style>

</head>
<body>
    <header>
        <nav>
           
            <div class="quote">
                SPORTCHECK ADMINISTRATION PAGE 
            </div>
            <span class="logOut"><a href="logout.php">Log Out</a></span>
        </nav>
        <div class="info-section">
            
            <div class="location">

            </div>
        </div>
    </header>

    <h1>Add Category</h1>
    <form method="POST">
        <input type="text" name="category_name" placeholder="Category Name" required>
        <input type="submit" name="add_category" value="Add Category">
    </form>

    <h1>Add Product</h1>
    <form method="POST">
        <input type="text" name="product_name" placeholder="Product Name" required>
        <textarea name="product_description" placeholder="Product Description" required></textarea>
        <input type="number" step="0.01" name="product_price" placeholder="Product Price" required>
        <select name="product_category" required class="selectc">
            <?php foreach ($categories as $id => $name): ?>
                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="product_image" placeholder="Product Image URL"  class="url" required>
        <input type="submit" name="add_product" value="Add Product">
    </form>

    <h1>Product List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all products with category names
            $sql = "SELECT products.id, products.name, products.description, products.price, categories.name AS category_name, products.image_url FROM products INNER JOIN categories ON products.category_id = categories.id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["category_name"] . "</td>";
                    echo "<td><img src='" . $row["image_url"] . "' alt='Product Image'></td>";
                    echo "<td><a href='?delete_product=" . $row["id"] . "'>Delete</a> | <a href='edit_product.php?id=" . $row["id"] . "'>Edit</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No products found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h1>Category List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all categories
            $sql = "SELECT id, name FROM categories";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td><a href='?delete_category=" . $row["id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No categories found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php 
$conn->close();
?>
