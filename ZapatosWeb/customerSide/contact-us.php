<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact Us</title>
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
            <li><a href="about-us.php">About us</a></li>
            <li><a href="contact-us.php" class="active">Contact us</a></li>
        </ul>
    </div>

    <!---HTML code for the banner--->
    <div class="banner">
        <div class="discount">
            <h1>ZAPATOS XMAS SALE</h1>
            <h2>20% OFF</h2>
        </div>
    </div>

    <section class="contact">
        <div class="contact-form">
            <h1>How can we help?</h1>
            <p>Contact us through filling out the form below or alternatively browse through a range
                of FAQ (Frequently Asked Questions) provided.
            </p>
            <form action="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First name</span>
                        <input type="text" placeholder="Enter your first name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Second name</span>
                        <input type="text" placeholder="Enter your second name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" required>
                    </div>
                </div>
                <div class="Priority-rating">
                    <input type="radio" name="priority" id="option-1">
                    <input type="radio" name="priority" id="option-2">
                    <input type="radio" name="priority" id="option-3">
                    <span class="priority-title">Select a priority rating below:</span>
                    <div class="category">
                        <label for="option-1">
                            <span class="option one"></span>
                            <span class="priority">Low-----------------------------------------------------------------------------------------------------------</span>
                        </label>
                        <label for="option-2">
                            <span class="option two"></span>
                            <span class="priority">Medium--------------------------------------------------------------------------------------------------------------</span>
                        </label>
                        <label for="option-3">
                            <span class="option three"></span>
                            <span class="priority">High</span>
                        </label>
                    </div>
                </div>
                <span class="priority-title">Select the appropriate category:</span>
                <select name="Category" id="Category">
                    <option value="">Please choose a topic...</option>
                    <option value="1">Order enquiry</option>
                    <option value="2">Product enquiry</option>
                    <option value="3">Administration</option>
                    <option value="4">Job vacancies</option>
                    <option value="1">Other</option>
                </select>
                <textarea name="" id="" cols="30" rows="10" placeholder="Your message..." required> </textarea>
                <div class="button">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </section>

    <section class="FAQS">
        <h2 class="title">FAQs</h2>
        <div class="FAQ">
            <div class="questions">
                <h3>Where is my order?</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
            </div>
            <div class="answer">
                <p>
                    Sign into your Zapatos account through the sign in/register link located in the top right hand
                    corner of the page.
                    Then check your order history and use the "track my order" feature to see the latest update of your
                    delivery.
                </p>
            </div>
        </div>
        <div class="FAQ">
            <div class="questions">
                <h3>Something is missing from my order</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
            </div>
            <div class="answer">
                <p>
                    At certain times we are unable to send all of the items that you have ordered.
                    If this is the case, we will send you an email letting you know of any items that are missing from
                    your order. <br> <br>
                    Please note that we will provide a full refund for any items that have not been sent. <br> <br>
                    If you have not received communication that an item was not available and not received your full
                    refund after 5 working days, then please contact us through the form above.
                </p>
            </div>
        </div>
        <div class="FAQ">
            <div class="questions">
                <h3>When will a product be back in stock?</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
            </div>
            <div class="answer">
                <p>
                    We cannot provide specific dates for when products out of stock will become available again. We try
                    our best to
                    have as many products as possible readily available and are constantly replenishing stock.
                </p>
            </div>
        </div>
        <div class="FAQ">
            <div class="questions">
                <h3>What payment methods do you accept?</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
            </div>
            <div class="answer">
                <p>
                    Zapatos accepts a wide range of payment types, if you are unsure whether your payment method is
                    compatible see the list below
                    or go through the buying a product process. <br> <br>
                    We accept Paypal, Apple pay, Direct Debit cards, Credit cards. <br> <br>
                    We are also working hard to introduce Klarna to our site.
                </p>
            </div>
        </div>
        <script> const FAQS = document.querySelectorAll(".FAQ");

            FAQS.forEach(FAQ => {
                FAQ.addEventListener("click", () => {
                    FAQ.classList.toggle("active");
                });
            }); </script>
    </section>
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