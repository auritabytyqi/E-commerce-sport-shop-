<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/shop_style.css" />
    <title>Shop</title>
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
            <a href="#" class="product-link">
                <img src="images/box.jpg" alt="Product 1" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$10.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/gloves.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/pingpong.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/football1.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                   <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/baseball.jpg" alt="Product 1" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$10.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/trainers.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                   <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/basketball.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                   <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/trainers2.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                   <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/box1.jpg" alt="Product 1" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$10.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/football.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                   <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/gloves2.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                   <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/trainers3.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                   <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
            <a href="#" class="product-link">
                <img src="images/tennis.jpg" alt="Product 2" class="product-image">
                <div class="product-info">
                   <h3 class="product-name">PRODUCT <span>Product descrip...</span></h3>
                    <p class="product-price">$15.00</p>
                </div>
            </a>
        </div>

    </main>
    <footer>
        <div>

        </div>
    </footer>
</body>

</html>