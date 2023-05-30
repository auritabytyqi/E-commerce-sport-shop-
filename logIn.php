<?php 
session_start();

if(isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
  }

  $err = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'utils/databaseConnection.php';

    $email = $_POST['email'];
	$password = $_POST['password'];

    $emailExistsQuery = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
	$emailExistsQuery->bind_param("s", $email);
	$emailExistsQuery->execute();
	$result = $emailExistsQuery->get_result();

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            if ($user['isStaff'] == 'yes') {
                header("Location: adminPage.php");
                exit();
            } else {
                header("Location: index.php");
                $_SESSION['logged_in'] = true;
                exit();
            }
        } else {
            $err = "Authentication error";
        }
    }
    else {
        $err = "Authentication error";
    }

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/logIn_style.css" />
    <title>Sign Up</title>
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
                <li><a href="logout.php">Log out</a></li>
            </ul>
            <div class="button">
                <a href="cart.php">cart</a>
            </div>
        </nav>
        <div class="info-section">
            <div class="circle"></div>
            <div class="title">
                Log In
            </div>
            <form method="post" action="logIn.php">
                <div class="form-item" >
                    <div class="form-icon" style="background: url(./images/email.png);"></div>
                    <div class="form-input">
                        <input type="text" name="email" placeholder="Email"/>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon" style="background: url(./images/password.png);"></div>
                    <div class="form-input">
                        <input type="text" name="password" placeholder="Password"/>
                    </div>
                </div>
                <span class="error"><?php echo $err;?></span>
                <div class="form-item" >
                    <input type="submit" value="Log In" style="width: 45%; height: 100%; margin-left: 28%; background-color: rgb(228, 160, 65); border: 1px solid black;"/> 
                </div>
            </form>
        </div>
    </header>
    <footer>
  <div class="footer-container">
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

.footer-container {
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
    include 'utils/databaseConnection.php';
  $conn->close();
?>