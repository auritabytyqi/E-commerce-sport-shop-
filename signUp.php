<?php
session_start();

if(!is_null($_SESSION['user'])) {
  header("Location: index.php");
  exit();
}

include 'utils/databaseConnection.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $zip_code = $_POST['zip_code'];
    $phone_number = $_POST['phone_number'];
    $terms_and_conditions=$_POST['terms_and_conditions'];
}

$validData = 1;

    if($first_name == null || $first_name == '') {
      $first_nameErr = 'First name cannot be empty';
      $validData = 0;
    }
    if($last_name == null || $last_name == '') {
      $last_nameErr = 'Last name cannot be empty';
      $validData = 0;
    }
    if($city == null || $city == '') {
      $cityErr = 'City cannot be empty';
      $validData = 0;
    }
    if($address == null || $address == '') {
      $addressErr = 'Address cannot be empty';
      $validData = 0;
    }
    if($country == null || $country == '') {
      $countryErr = 'Country cannot be empty';
      $validData = 0;
    }
    if($zip_code == null || $zip_code == '') {
      $zipErr = 'Zip code cannot be empty';
      $validData = 0;
    }
    if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
      $emailErr = 'The email you provided is not a valid email';
      $validData = 0;
    }
    if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
      $passwordErr = "The password should have at least one digit and be at least 8 characters long";
      $validData = 0;
    }
    if (preg_match("/^\+\d{1,3}\s?\(\d{3}\)\s?\d{3}-\d{4}$/", $phoneNumber)) {
        $phone_numberErr = "The phone number isn't in the correct format";
        $validData = 0;
    }
    if (isset($terms_and_conditions)) {
        $terms_and_conditionsErr = "You must agree to the terms and conditions in order to register";
        $validData = 0;
    }

    $emailExistsQuery = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $emailExistsQuery->bind_param("s", $email);
    $emailExistsQuery->execute();
    $result = $emailExistsQuery->get_result();

    if(mysqli_num_rows($result) == 1) {
        $emailErr = 'The email you provided is already registered';
        $validData = 0;
    }
  
    if($validData == 1) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, city, address, country, zip_code, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("sssssssss", $first_name, $last_name, $email, $password, $city, $address, $country, $zip_code, $phone_number);
        if ($query->execute()) {
            header("Location: login.php?registered=true");
            die();
        }
        else {
            $err = "Something went wrong!";
        }
    }
    else {
        $err = "Something went wrong!";
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/signUp_style.css" />
    <title>Sign Up</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="#"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <!-- <ul class="pages">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signUp.php">Sign Up</a></li>

            </ul> -->
            <div class="button">
                <a href="cart.php">cart</a>
            </div>
        </nav>
        <div class="info-section">
            <div class="circle"></div>
            <div class="title">
                Sign Up
            </div>
            <span class="error"><?php echo $err;?></span>
            <form method="post" action="signUp.php">
                <div class="form-item" >
                    <div class="form-icon"></div>
                    <div class="form-input">
                        <input type="text" name="first_name" placeholder="First Name"/>
                        <span class="error"><?php echo $first_nameErr;?></span>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon"></div>
                    <div class="form-input">
                        <input type="text" name="last_name" placeholder="Last Name"/>
                        <span class="error"><?php echo $last_nameErr;?></span>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon"></div>
                    <div class="form-input">
                        <input type="text" name="address" placeholder="Address"/>
                        <span class="error"><?php echo $addressErr;?></span>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon"></div>
                    <div class="form-input">
                        <input type="text" name="city" placeholder="City"/>
                        <span class="error"><?php echo $cityErr;?></span>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon"></div>
                    <div class="form-input">
                        <input type="text" name="zip_code" placeholder="Zip Code"/>
                        <span class="error"><?php echo $zip_codeErr;?></span>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon"></div>
                    <div class="form-input">
                        <input type="text" name="country" placeholder="Country"/>
                        <span class="error"><?php echo $countryErr;?></span>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon" style="background: url(./images/email.png);"></div>
                    <div class="form-input">
                        <input type="text" name="email" placeholder="Email"/>
                        <span class="error"><?php echo $emailErr;?></span>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon" style="background: url(./images/phone.png);"></div>
                    <div class="form-input">
                        <input type="text" name="phone_number" placeholder="Telephone Number"/>
                        <span class="error"><?php echo $phone_numberErr;?></span>
                    </div>
                </div>
                <div class="form-item" >
                    <div class="form-icon" style="background: url(./images/password.png);"></div>
                    <div class="form-input">
                        <input type="text" name="password" placeholder="Password"/>
                        <span class="error"><?php echo $passwordErr;?></span>
                    </div>
                </div>
                <div class="form-item" style="margin-left: 10%;">
                    <input type="checkbox" name="terms_and_conditions"/> I agree to the Terms & Conditions
                    <span class="error"><?php echo $terms_and_conditionsErr;?></span>
                </div>
                <div class="form-item" >
                    <input type="submit" value="Sign Up" style="width: 45%; height: 100%; margin-left: 28%; background-color: rgb(228, 160, 65); border: 1px solid black;"/> 
                </div>
            </form>
        </div>
    </header>
    <footer>
        <div>

        </div>
    </footer>
</body>
</html>