<?php
include 'config.php';

if (isset($_POST['submit'])) {
	$username = $_POST['c-username'];
	$email = $_POST['c-email'];
	$password = md5($_POST['c-pass']);
	$cpassword = md5($_POST['c-con-pass']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM customers WHERE c_email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = mysqli_query($conn,"INSERT INTO customers (c_email, c_pass, c_username)
					VALUES ('$email', '$password', '$username')");
			// $result = mysqli_query($conn, $sql);
			if ($sql) {
				echo "<script>alert('Customer Registration Successful!.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
                // header("Location: home.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Account associated with the email already exists!')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer Register</title>
    <link rel="stylesheet" href="styleSheet.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

    <!---HTML code for the top bar--->
    <div class="header">
        <div class="logo">
            <img src="c-img\logo.png" width="200" height="100froo" alt="logo">
        </div>
        <div class="topNav">
            <ul>
            <?php
                    include 'config.php';
                    error_reporting(0);
                    session_start();
                    if (isset($_SESSION['c-username'])) :?>
                        <li><a href="c-dashboard.php"><i class="fa fa-user" style="font-size:22px"><?php echo $_SESSION['c-username']?></i></a></li>
                        <li><a href="loginSession.php"><i class="fas fa-sig-nout" style="font-size:22px">Signout</i></a></li>
                <?php 
                    else :?>
                        <li><label for="click" class="click-me">Sign in</label></li>
                        <li><a href="c-register.php">Register</a></li>
                <?php endif?>
                <li><a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:22px"></i></a></li>
            </ul>
        </div>
    </div>
    
    <!----Sign in popup---->
    <div class="center">
        <input type="checkbox" id="click">
        <div class="content">
            <div class="text">
                SIGN IN TO ZAPATOS...
            </div>
            <label for="click" id="times">x</label>
            <form action='loginSession.php' method='post'>
                <label for="username"><i class="fas fa-envelope"></i> Email</label>
                <input type="text" placeholder="Email" id="user-email" name='u-email' required/>

                <label for="password"><i class="fas fa-key"></i> Password</label>
                <input type="password" placeholder="Password" id="user-password" name='u-pass' required/>
                <button name='login' id="sign-in-button">Sign In</button>
                <h4><a href='c-register.php'>Don't have an account?</a></h4>
            </form>
        </div>
    </div>
    
    <!---HTML code for the nav bar--->
    <div class="navbar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="men.php">Men</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="about-us.php">About us</a></li>
            <li><a href="contact-us.php" class="active">Contact us</a></li>
        </ul>
    </div>

    <!---Banner--->
    <div class="banner">
        <div class="discount">
            <h1>ZAPATOS XMAS SALE</h1>
            <h2>20% OFF</h2>
        </div>
    </div>


    <!---Register page--->
    <div class="register-page-text">
        <h1>REGISTER WITH ZAPATOS TODAY!</h1>
        <h3>GAIN ACCESS TO 20% OFF, ORDERING PRODUCTS AND MORE....</h3>
        <div class="message">
            <h3>Passwords must contain the following:</h3>
            <p id="upper-case" class="invalid">Uppercase letter</p>
            <p id="lower-case" class="invalid">Lowercase letter</p>
            <p id="random-number" class="invalid">Random number</p>
            <p id="min-length" class="invalid">Min 6 characters</b></p>
        </div>
    </div>
    <div class="register-container">
        <div class="register-img">
            <img src="c-img\register-icon.jpg" id="register-logo">
        </div>
        <div class="register-text">
            <form action="c-register.php" method="post">
                <label for="username"><i class="fas fa-envelope"></i> Email</label>
                <input type="text" placeholder="Email" id="user-email" name="c-email" required />

                <label for="username"><i class="fas fa-user"></i> Username</label>
                <input type="text" placeholder="Username" id="user-name" name="c-username" required />

                <label for="password"><i class="fas fa-key"></i> Password</label>
                <input type="password" name="c-pass" onChange="onChange()" placeholder="Password" id="psw"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="this.setCustomValidity('Must contain 6 letters or special characters')" required />

                <label for="password"><i class="fas fa-key"></i> Confirm password:</label>
                <input type="password" name="c-con-pass" onChange="onChange()" placeholder="Password" id="psw"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                <button name="submit" id="register-button">Create account</button>
            </form>
        </div>
    </div>
    <script>
        var userInput = document.getElementById("psw");
        var letter = document.getElementById("lower-case");
        var capital = document.getElementById("upper-case");
        var number = document.getElementById("random-number");
        var length = document.getElementById("min-length");

        userInput.onkeyup = function () {
            var upperCaseLetters = /[A-Z]/g;
            if (userInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            var lowerCaseLetters = /[a-z]/g;
            if (userInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            var numbers = /[0-9]/g;
            if (userInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            if (userInput.value.length >= 6) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
        
        function onChange() {
            const password = document.querySelector('input[name=password]');
            const confirm = document.querySelector('input[name=confirm]');
            if (confirm.value === password.value) {
                confirm.setCustomValidity('');
            } else {
                confirm.setCustomValidity('Passwords do not match');
            }
        }
    </script>
    <footer>
        <div class="footer-container">
            <div class="footer-top">
                <div class="footer-columntop">
                    <h1>HAVE ANY QUESTIONS?</h1>
                    <p>Feel free to contact us as your feedback is valuable to us.</p>
                    <a href="contact-us.php"><button type="button">Contact Us</button></a>
                </div>
            </div>
            <div class="footer-main">
                <div class="footer-column">
                    <h3 class="heading">QUICK LINKS</h3>
                    <a href="home.php" class="footer-link">Home</a>
                    <a href="about-us.php" class="footer-link">About</a>
                   
                    <a href="contact-us.php" class="footer-link">Contact</a>
                </div>
                <div class="footer-column">
                    <h3 class="heading">EXTRA LINKS</h3>
                    <a href="#" class="footer-link">Login</a>
                    <a href="c-register.php" class="footer-link">Register</a>
                    <a href="cart.php" class="footer-link">Basket</a>
                    <a href="c-dashboard.php" class="footer-link">Orders</a>
                </div>
                <div class="footer-column">
                    <h3 class="heading">CONTACT INFO</h3>
                    <!--<img src="phone.png" alt="Phone icon">-->
                    <a href="#" class="footer-link">
                        <span class="material-icons md-18">phone</span>+1 23 456-7890</a>
                    <a href="#" class="footer-link">
                        <span class="material-icons md-18">phone</span>+111-222-3333</a>
                    <a href="#" class="footer-link">
                        <span class="material-icons md-18">email</span>Zapatos@outlook.com</a>
                    <a href="#" class="footer-link">
                        <span class="material-icons md-18">room</span>Birmingham, England</a>
                </div>
                <div class="footer-column">
                    <h3 class="heading">FOLLOW US</h3>
                    <a href="https://www.facebook.com/" class="footer-link">Facebook
                        <a href="https://www.twitter.com/" class="footer-link">Twitter</a>
                        <a href="https://www.instagram.com/" class="footer-link">Instagram</a>
                        <a href="https://www.linkedin.com/" class="footer-link">LinkedIn</a>
                </div>
            </div>
    </footer>
</body>

</html>