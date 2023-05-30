<?php
session_start();
$isLoggedIn = false;
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $isLoggedIn = true;
}
$servername = "localhost";
$username = "ecommercepage";
$password = "ecommerce";
$dbname = "ecommercedb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM productsinsale";
$result = $conn->query($sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home page</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <a href="#"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <ul class="pages">
                <li><a href="index.php">Home</a></li>
                <li><a href="#about-us-section-id">About Us</a></li>
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
                SPORTCHEK
            </div>
            <div class="title">
                <i>
                "Unleash your potential with top-notch gear."</i>
            </div>
        </div>
    </header>
    <main>
    <?php
   
        if ($isLoggedIn) {
            echo '
            <div class="zbritjet-ofertat">
                <div class="sales-title">
                    Products in sale
                </div>
                <div class="featured-dishes-container">
                    <div class="scroll-container">';
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Retrieve the values from the row
                            $name = $row["name"];
                            $description = $row["description"];
                            $price = $row["price"];
                            $image_url = $row["image_url"];
                            $id = $row["id"];
                    
                            // Echo the data in the desired format
                            echo '<div class="scroll-item">';
                            echo '<div class="dish-image-container" style="background-image: url(\'' . $image_url . '\');"></div>';
                            echo '<p >Product in sale</p>';
                            echo '<h2><a href="product.php?id='.$id.'" class="prsaletitle">' . $name . '</a></h2>';
                            echo '<p>' . $description . '</p>';
                            echo '<div class="salebutton"><input id="featured-dishes-price" type="button" value="$' . $price . '"></div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No products found.";
                    }        
        echo ' </div>
                </div>
            </div>';
        }
        ?>
        <style>.scroll-container {
    width: 85%;
    margin: 0px 60px;
    
}
    .prsaletitle {
        color: black;
        margin-left: 80px;
           }
    .salebutton {
        margin-left: 130px;
    }
</style>
        <div class="about-us-section" id="about-us-section-id">
    <div class="about-us-title">
        About Us
    </div>
    <div class="about-content">
        <p>Welcome to SPORTCHEK, your ultimate destination for all your sporting needs. We are passionate about sports and dedicated to providing high-quality sports equipment, apparel, and accessories to athletes of all levels.</p>
        <p>At SPORTCHEK, we understand the importance of having the right gear to excel in your chosen sport. Whether you're a professional athlete, an enthusiastic amateur, or just starting your sporting journey, we have everything you need to elevate your performance and enjoy the game to the fullest.</p>
    </div>
</div>
<style>
    
  
.about-us-section {
    background-color: #bab1b1;
    padding: 20px;
    margin: 40px auto;
    max-width: 800px;
}

.about-us-title {
    font-size: 30px;
    margin-bottom: 20px;
    text-align: center;
}

.about-content {
    font-size: 16px;
    line-height: 1.5;
    margin-left: 20px;
    margin-right: 20px;
}

.info-section .title {
    height: 100px;
}


</style>
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
</style>

</body>

</html>


<?php 
$conn->close();
?>