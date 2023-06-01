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

$userid = null;
if(isset($_SESSION['user'])) {
    $userid = $_SESSION['user']['id'];
  }


$typeOfProduct = "products";
// Check if a sorting option is selected
if($userid !== null){
    $query = "SELECT * 
    FROM `cart_products`
    JOIN products ON cart_products.product_id = ".$typeOfProduct.".id
    JOIN users ON cart_products.user_id = users.id  WHERE user_id = ".$userid."";
}
else {
    $query = "SELECT * 
FROM `cart_products`
JOIN products ON cart_products.product_id = ".$typeOfProduct.".id
JOIN users ON cart_products.user_id = users.id  WHERE user_id = ".null."";
}


$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/cart_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Cart</title>
    <script>
        function deleteFromCart($id){
            <?php 
                $querydel = "DELETE FROM cart_products WHERE `cart_products`.`id` = ".$id."";
                mysqli_query($conn, $querydel);
             ?>
        }

        function payWithCash(){
            
alert("Payment was successful: payWithCash");
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
        <div class="cart-title">
            Your cart
            <hr/>
        </div>
        <div class="products-container">
        <?php 
          if($result){
            $count = 0;
            $total = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $count = $count +1;
                $productName = $row['name'];
                $price = $row['price'];
                $description= $row['description'];
                $url = $row['image_url'];
                $id = $row['id'];
                $total = $total + $price;
                echo  '<div class="product">
                <div class="product-image">
                  <img src="'. $url .'"/>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        '.$productName .'
                    </div>
                    <div class="product-description">
                    '.$description.'
                    </div>
                    <div class="product-price">
                        '. $price.'
                    </div>
                </div>
                <div class="product-widgets">
                      <div class="delete">
                        <button><svg fill="rgb(228, 160, 65)" width="30px" height="30px"
                            viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg" stroke="#000000"'."stroke-width=\"0\" onclick=\"deleteFromCart(".$id.")\">".' <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M 11.6406 14.6641 L 13.1406 48.9062 C 13.2578 51.8359 15.0156 53.4297 17.8984 53.4297 L 38.125 53.4297 C 41.0078 53.4297 42.7656 51.8359 42.8828 48.9062 L 44.3828 14.6641 L 47.0781 14.6641 C 48.0391 14.6641 48.8125 13.8672 48.8125 12.9063 C 48.8125 11.9453 48.0391 11.1250 47.0781 11.1250 L 37.4453 11.1250 L 37.4453 7.7734 C 37.4453 4.5625 35.3125 2.5703 32.2891 2.5703 L 23.6640 2.5703 C 20.6406 2.5703 18.5313 4.5625 18.5313 7.7734 L 18.5313 11.1250 L 8.9453 11.1250 C 8.0078 11.1250 7.1875 11.9453 7.1875 12.9063 C 7.1875 13.8672 8.0078 14.6641 8.9453 14.6641 Z M 21.7187 7.7734 C 21.7187 6.4375 22.7031 5.5000 24.1094 5.5000 L 31.8672 5.5000 C 33.2969 5.5000 34.2813 6.4375 34.2813 7.7734 L 34.2813 11.1250 L 21.7187 11.1250 Z M 35.6172 48.6484 C 34.7031 48.6484 34.0703 47.8516 34.0938 46.8906 L 35.0547 19.7031 C 35.1016 18.7656 35.7813 17.9922 36.625 17.9922 C 37.4922 17.9922 38.1953 18.7422 38.1719 19.7031 L 37.1172 46.9141 C 37.0938 47.9219 36.4844 48.6484 35.6172 48.6484 Z M 20.4062 48.6484 C 19.5391 48.6484 18.9297 47.9219 18.9062 46.9141 L 17.8516 19.7031 C 17.8281 18.7187 18.5313 17.9922 19.3984 17.9922 C 20.2422 17.9922 20.9453 18.7656 20.9687 19.7031 L 21.9297 46.8906 C 21.9531 47.8516 21.3203 48.6484 20.4062 48.6484 Z M 29.6172 46.8906 C 29.6172 47.8516 28.8672 48.6484 28.0234 48.6484 C 27.1797 48.6484 26.4297 47.8516 26.4297 46.8906 L 26.4297 19.7031 C 26.4297 18.7656 27.1797 17.9922 28.0234 17.9922 C 28.8672 17.9922 29.6406 18.7656 29.6406 19.7031 Z">
                                </path>
                            </g>
                        </svg></button>
                    </div>
                    <style>
                    svg {
                        margin-left:  240%;
                    }
                    </style>
                </div>
            </div>';
            }
        }
          ?>
           </div>
        <hr style="margin-left: 7%;"/>
        <div class="total">
            <div class="total-values">
                <div class="total-products">
                    Numri total i produkteve: <?php echo $count?>
                </div>
                <div class="total-price">
                    Totali: $<?php echo $total?>
                </div>
            </div>
        </div>
        <div class="pagesa">
            <div class="pagesa-title"> Payment
            <hr/>
            </div>
            <div class="pagesa-cash"> Pay with Cash
                <div>
                    <input type="text" placeholder="Full Name"/>
                    <input type="text" placeholder="Address"/>
                    <input type="tel" placeholder="Telephone"/>
                    <button class="finish-payment" onclick="payWithCash()">Finish</button>
                </div>
            </div>
            <div class="pagesa-cash"> Pay with PayPal
                <div>
                <button id="paypal-button">Pay with PayPal</button>

                </div>
            </div>

    <script>
        function loadPayPalSDK() {
            var scriptTag = document.createElement('script');
            scriptTag.src = 'https://www.paypal.com/sdk/js?client-id=AXgJ5Nm72vb8rEqZtAYwaPMmXQ2Qgb6U3alMFyaYaxW8n_s9XN3ujOR7W0UTbadqn0WctvCBzWXdxoBU&currency=USD';
            document.head.appendChild(scriptTag);
            window.location.href = 'https://developer.paypal.com/home';
        }

        var paypalButton = document.getElementById('paypal-button');
        paypalButton.addEventListener('click', loadPayPalSDK);
    </script>

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

.pagesa-title {
    width: 88vw;
    height: 8%;
    font-size: 42px;
    margin: 3% 0 0 5%;
    padding-left: 3%;
}

.pagesa-cash {
    width: 88vw;
    height: 8%;
    font-size: 32px;
    margin: 3% 0 0 5%;
    padding-left: 3%;
}


.pagesa-title hr {
    margin-left: -2%;
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
mysqli_close($conn);
?>