<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About Us</title>
    <link rel="stylesheet" href="styleSheet.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
            <li><a href="about-us.php" class="active">About us</a></li>
            <li><a href="contact-us.php" >Contact us</a></li>
        </ul>
    </div>

    <!---Banner--->
    <div class="banner">
        <div class="discount">
            <h1>ZAPATOS XMAS SALE</h1>
            <h2>20% OFF</h2>
        </div>
    </div>

    <!---Heading--->
    <div class="typing">
        <div class="typing">
            <div class="typed-out">
                Meet the <span>Zapatos</span> team...
            </div>
            <p>We are a group of 8 university students studying at Aston University undertaking BSc Computer Science/BSc
                Cyber Security degrees.<br> We have been tasked with creating a website
                for our own brand with front end and back end technologies incorporated. </p>
            <p>View the profile icons below to see a full list of our front end, back end, and design team members!</p>

        </div>
    </div>
    <Team-profiles>
        <div class="profile-container">
            <div class="team-main">
                <div class="team-content">
                    <div class="pic">
                        <img src="c-img/01.jpg">
                    </div>
                    <div class="team-content-box">
                        <h3 class="title">Brayden</h3>
                        <h4>Front end developer</h4>
                    </div>
                </div>
            </div>   
            <div class="team-main">
                <div class="team-content">
                    <div class="pic">
                        <img src="c-img/02.jpg">
                    </div>
                    <div class="team-content-box">
                        <h3 class="title">Sijan</h3>
                        <h4>Front end developer</h4>
                    </div>
                </div>
            </div>
            <div class="team-main">
                <div class="team-content">
                    <div class="pic">
                        <img src="c-img/03.jpg">
                    </div>
                    <div class="team-content-box">
                        <h3 class="title">Hamam</h3>
                        <h4>Front end admin developer</h4>
                    </div>
                </div>
            </div>    
            <div class="team-main">
                <div class="team-content">
                    <div class="pic">
                        <img src="c-img/04.jpg">
                    </div>
                    <div class="team-content-box">
                        <h3 class="title">Jacob</h3>
                        <h4>Front end admin developer</h4>
                    </div>
                </div>
            </div> 
            <div class="team-main">
                <div class="team-content">
                    <div class="pic">
                        <img src="c-img/05.jpg">
                    </div>
                    <div class="team-content-box">
                        <h3 class="title">Haseena</h3>
                        <h4>Back end developer</h4>
                    </div>
                </div>
            </div>    
            <div class="team-main">
                <div class="team-content">
                    <div class="pic">
                        <img src="c-img/06.jpg">
                    </div>
                    <div class="team-content-box">
                        <h3 class="title">M Arham</h3>
                        <h4>Back end developer</h4>
                    </div>
                </div>
            </div>   
            <div class="team-main">
                <div class="team-content">
                    <div class="pic">
                        <img src="c-img/07.jpg">
                    </div>
                    <div class="team-content-box">
                        <h3 class="title">Hafsa</h3>
                        <h4>Designer</h4>
                    </div>
                </div>
            </div>     
            <div class="team-main">
                <div class="team-content">
                    <div class="pic">
                        <img src="c-img/08.jpg">
                    </div>
                    <div class="team-content-box">
                        <h3 class="title">Sayyeda</h3>
                        <h4>Designer</h4>
                    </div>
                </div>
            </div>       
        </div>            
                
    </Team-profiles>
 <!---HTML code for the entire footer--->
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