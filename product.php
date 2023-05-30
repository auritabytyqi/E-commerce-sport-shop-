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

if (is_numeric($productId)) {
    // If $productId is an integer, use the query for "products" table
    $query = "SELECT * FROM products WHERE id = '$productId'";
} else {
    // If $productId is not an integer, use the query for "productsinsale" table
    $query = "SELECT * FROM productsinsale WHERE id = '$productId'";
}

$result = mysqli_query($conn, $query);

if ($result) {
    $productData = mysqli_fetch_assoc($result);
    // Use the product data to display the details on the product.php page
    // For example:
    $productName = $productData['name'];
    $productDescription = $productData['description'];
    $productPrice = $productData['price'];
    $productURL = $productData['image_url'];
} else {
    echo "Query execution failed: " . mysqli_error($conn);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/product_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Product</title>
    <script>
  // Function to increase the count value
  function increaseCount() {
    var countElement = document.querySelector(".count-value");
    var count = parseInt(countElement.innerText);
    count++;
    countElement.innerText = count;
  }

  // Function to decrease the count value
  function decreaseCount() {
    var countElement = document.querySelector(".count-value");
    var count = parseInt(countElement.innerText);
    if (count > 0) {
      count--;
      countElement.innerText = count;
    }
  }
  function submitRating() {
    // Get the selected rating value
    const rating = document.querySelector('input[name="stars"]:checked').value;

    // Display the selected rating in the console
    console.log('Stars selected:', rating);

    // Show an alert
    alert('Thank you for your review!');
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
    </header>
    <main>
        <div class="product-main-image">
        <?php echo "<img src=\"".$productURL."\"/>" ?>
        </div>
        <div class="product-content">
            <div class="product-title">
                <?php echo $productName ?>
            </div>
            <form class="rating" onsubmit="event.preventDefault(); submitRating();">
                <label>
                  <input type="radio" name="stars" value="1" />
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="stars" value="2" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="stars" value="3" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>   
                </label>
                <label>
                  <input type="radio" name="stars" value="4" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="stars" value="5" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                
              </form>
              <hr style="margin: 2% 5%;">
              <div class="price-color">
                <div class="price">
                    $  <?php echo $productPrice ?>
                </div>
              </div>
              <hr style="margin: 2% 5%;">
              <div class="product-description"> <?php echo $productDescription ?></div>
              <hr style="margin: 2% 70% 2% 5%;">
              <div class="cart-quantity">
                <input type="button" value="Add To Cart" class="add-to-cart"/>
                <div class="quantity">
  <span>Count: <span class="count-value">0</span></span>
  <input type="button" class="button-minus" value="-" onclick="decreaseCount()"/>
  <input type="button" class="button-plus" value="+" onclick="increaseCount()"/>
</div>
              </div>
        </div>
    </main>
    <div class="comments">
        <hr style="margin: 0 1%;">
        <div class="comments-title">
            Comments
        </div>
        <div class="comments-container">
            <div class="comment">
                <div class="circle"></div>
                <div class="user-info">
                    <div class="user-name">PERSON #1</div>
                    <div class="date-time"><output type="datetime-local">22/06/2023 -- 14:56</output></div>
                    <div class="rate"><button class="likes"><i class="fa fa-heart"></i></button><span>15 likes</span></div>
                </div>
                <div class="comment-content">
                    Morbi lorem ante, pulvinar id justo eu, molestie condimentum libero. Sed vestibulum lobortis nulla, et ullamcorper libero tempus sit amet. Curabitur viverra nibh eget pellentesque fermentum. In ac lectus et dolor hendrerit rutrum. Donec imperdiet enim ac enim ultricies sodales. Donec mauris ante, aliquam vel accumsan eu, tincidunt vitae lacus. Fusce ultricies nisl quis velit auctor varius. Pellentesque vitae urna consequat, ultricies sapien vel, pulvinar mauris.
                    Morbi lorem ante, pulvinar id justo eu, molestie condimentum libero. Sed vestibulum lobortis nulla, et ullamcorper libero tempus sit amet. Curabitur viverra nibh eget pellentesque fermentum. In ac lectus et dolor hendrerit rutrum. Donec imperdiet enim ac enim ultricies sodales. Donec mauris ante, aliquam vel accumsan eu, tincidunt vitae lacus. Fusce ultricies nisl quis velit auctor varius. Pellentesque vitae urna consequat, ultricies sapien vel, pulvinar mauris.
                </div>
            </div>
            <div class="comment">
                <div class="circle"></div>
                <div class="user-info">
                    <div class="user-name">PERSON #1</div>
                    <div class="date-time"><output type="datetime-local">22/06/2023 -- 14:56</output></div>
                    <div class="rate"><button class="likes"><i class="fa fa-heart"></i></button><span>15 likes</span></div>
                </div>
                <div class="comment-content">
                    Morbi lorem ante, pulvinar id justo eu, molestie condimentum libero. Sed vestibulum lobortis nulla, et ullamcorper libero tempus sit amet. Curabitur viverra nibh eget pellentesque fermentum. In ac lectus et dolor hendrerit rutrum. Donec imperdiet enim ac enim ultricies sodales. Donec mauris ante, aliquam vel accumsan eu, tincidunt vitae lacus. Fusce ultricies nisl quis velit auctor varius. 
                </div>
            </div>
            <div class="comment">
                <div class="circle"></div>
                <div class="user-info">
                    <div class="user-name">PERSON #1</div>
                    <div class="date-time"><output type="datetime-local">22/06/2023 -- 14:56</output></div>
                    <div class="rate"><button class="likes"><i class="fa fa-heart"></i></button><span>15 likes</span></div>
                </div>
                <div class="comment-content">
                    Morbi lorem ante, pulvinar id justo eu, molestie condimentum libero. Sed vestibulum lobortis nulla, et ullamcorper libero tempus sit amet. Curabitur viverra nibh eget pellentesque fermentum. In ac lectus et dolor hendrerit rutrum. Donec imperdiet enim ac enim ultricies sodales. Donec mauris ante, aliquam vel accumsan eu, tincidunt vitae lacus. Fusce ultricies nisl quis velit auctor varius. 
                </div>
            </div>
            <div class="comment">
                <div class="circle"></div>
                <div class="user-info">
                    <div class="user-name">PERSON #1</div>
                    <div class="date-time"><output type="datetime-local">22/06/2023 -- 14:56</output></div>
                    <div class="rate"><button class="likes"><i class="fa fa-heart"></i></button><span>15 likes</span></div>
                </div>
                <div class="comment-content">
                    Morbi lorem ante, pulvinar id justo eu, molestie condimentum libero. Sed vestibulum lobortis nulla, et ullamcorper libero tempus sit amet. Curabitur viverra nibh eget pellentesque fermentum. In ac lectus et dolor hendrerit rutrum. Donec imperdiet enim ac enim ultricies sodales. Donec mauris ante, aliquam vel accumsan eu, tincidunt vitae lacus. Fusce ultricies nisl quis velit auctor varius. 
                </div>
            </div>
            <div class="comment">
                <div class="circle"></div>
                <div class="user-info">
                    <div class="user-name">PERSON #1</div>
                    <div class="date-time"><output type="datetime-local">22/06/2023 -- 14:56</output></div>
                    <div class="rate"><button class="likes"><i class="fa fa-heart"></i></button><span>15 likes</span></div>
                </div>
                <div class="comment-content">
                    Morbi lorem ante, pulvinar id justo eu, molestie condimentum libero. Sed vestibulum lobortis nulla, et ullamcorper libero tempus sit amet. Curabitur viverra nibh eget pellentesque fermentum. In ac lectus et dolor hendrerit rutrum. Donec imperdiet enim ac enim ultricies sodales. Donec mauris ante, aliquam vel accumsan eu, tincidunt vitae lacus. Fusce ultricies nisl quis velit auctor varius. 
                </div>
            </div>
            <div class="comment">
                <div class="circle"></div>
                <div class="user-info">
                    <div class="user-name">PERSON #1</div>
                    <div class="date-time"><output type="datetime-local">22/06/2023 -- 14:56</output></div>
                    <div class="rate"><button class="likes"><i class="fa fa-heart"></i></button><span>15 likes</span></div>
                </div>
                <div class="comment-content">
                    Morbi lorem ante, pulvinar id justo eu, molestie condimentum libero. Sed vestibulum lobortis nulla, et ullamcorper libero tempus sit amet. Curabitur viverra nibh eget pellentesque fermentum. In ac lectus et dolor hendrerit rutrum. Donec imperdiet enim ac enim ultricies sodales. Donec mauris ante, aliquam vel accumsan eu, tincidunt vitae lacus. Fusce ultricies nisl quis velit auctor varius. 
                </div>
            </div>
        </div>
        <div class="add-comment">
            <input type="submit" value="+"/>
        </div>
    </div>
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

footer div {
    background-color: #ccc;
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


<?php mysqli_close($conn); ?>