<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/product_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Product</title>
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
    </header>
    <main>
        <div class="product-main-image">
            <img src="images/trainers3.jpg" />
            <div class="product-small-images">
                <div><img src="images/trainers.jpg" /></div>
                <div><img src="images/trainers2.jpg" /></div>
                <div><img src="images/trainers3.jpg" /></div>
            </div>
        </div>
        <div class="product-content">
            <div class="product-title">
                PRODUCT TITLE
            </div>
            <form class="rating">
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
                    $ 1232
                </div>
                <div class="select-colors">
                    <select id="filter-select"  name="filter-select">
                        <option value="default"> Select Color</option>
                        <option value="color">Blue </option>
                        <option value="color">Yellow</option>    
                    </select>
                </div>
              </div>
              <hr style="margin: 2% 5%;">
              <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus euismod volutpat. Donec quis arcu finibus, mollis purus ac, suscipit nisi. Etiam dapibus maximus lectus eget elementum. Donec dictum, ipsum ut iaculis aliquet, mi ligula pellentesque nunc, non porta risus mi aliquam purus.  Phasellus ac scelerisque urna. Sed at libero vitae nulla vulputate sodales at at justo. Suspendisse suscipit dui dui, et malesuada ante tincidunt vel. </div>
              <hr style="margin: 2% 70% 2% 5%;">
              <div class="cart-quantity">
                <input type="button" value="Add To Cart" class="add-to-cart"/>
                <div class="quantity">
                    <span>Count: 3</span>
                    <input type="button" value="-"/>
                    <input type="button" value="+"/>
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
        <div>

        </div>
    </footer>
</body>

</html>