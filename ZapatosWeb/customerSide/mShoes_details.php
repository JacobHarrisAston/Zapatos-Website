<?php
    if(isset($_GET['ID'])){
        // require_once'
        include 'config.php';
        $ID = mysqli_real_escape_string($conn ,$_GET['ID']);
        session_start();
        $_SESSION['article-no']=$ID;

        $sql = "SELECT * FROM men_items where article_no='$ID'";
        $result= mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <li><a href="home.php" class="active">Home</a></li>
            <li><a href="men.php">Men</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="about-us.php">About us</a></li>
            <li><a href="contact-us.php">Contact us</a></li>
        </ul>
    </div>

    <!---Banner--->
    <div class="banner">
        <div class="discount">
            <h1>ZAPATOS XMAS SALE</h1>
            <h2>20% OFF</h2>
        </div>
    </div>



    <!---NOT NEEDED, Just pushing the page down for an example until other pages are developed--->


    <main>
        <div class="flex-container">
            <div class="big_img"><img src="c-img/men-shoes/<?php echo $row['photo']?>"></div>
            <div class="details">
                
                <div class="product_name"><h1><?php echo $row['product_name']?></h1></div>
                <div class="article_no"><h3><?php echo $row['article_no']?></h3></div><br>
                <div class="gender"><p><?php echo $row['type']?><p></div>
                <div class="colour"><p><?php echo $row['colour']?><p></div>
                <div class="prize"><h3><?php echo $row['cost']?>.00</h3></div>    

                <form action="cartSession.php" method="post" class="form_details">
                    <div class="size">
                        
                        <label for="size">Choose your size </label>
                        <select name="size" id="cars">
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                          </select>
                    </div>  

                      <div class="quantity">

                        <label for="quantity">Quantity </label>
                        <input type="number" id="quantity" name="quantity" min="1" max="10" value="1">
                        <input type="hidden" name="type" value="male"></input>
                        <input type="hidden" name="article" value="<?php echo $row['article_no']?>"></input>
                    
                    </div>
                    <div class="buttons">
                        <button class="cart_button" type="submit" name="addItem">+Add to Cart</button>
                    </div>
                  </form>
                  <div><a href="cart.php"><button class="checkout">CHECKOUT</button></a></div>
            
            </div>  
            <div class="description"> <p><?php echo $row['description']?></p></div>
          </div>

    </main>

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