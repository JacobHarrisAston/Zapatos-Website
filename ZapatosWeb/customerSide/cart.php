<?php
include 'config.php';
session_start();
error_reporting();

if(isset($_POST['empty'])){
    $sql = mysqli_query($conn,"TRUNCATE temp_cart");
    echo "<script>alert('Item(s) from the cart are removed!')</script>";
    }

if(isset($_POST['confirm'])){
    if(isset($_SESSION['c-username'])){
        $sql1 = mysqli_query($conn, "SELECT * FROM temp_cart");
        if ($sql1->num_rows > 0){
            
            while($row=$sql1->fetch_assoc()){
                $article = $row['article'];
                $size = $row['temp_size'];
                $quantity = $row['temp_quantity'];
                $type = $row['temp_type'];
                $cost = $row['temp_cost'];
                $c_username=$_SESSION['c-username'];
                $sql2 = "INSERT INTO orders(article_no, c_username, size, quantity, type, cost) 
                        VALUES ('$article','$c_username','$size','$quantity','$type', '$cost')";
                $result=mysqli_query($conn,$sql2);

            }
            
            header('Location:orderConfirm.php');
            $sql1=mysqli_query($conn, "TRUNCATE temp_cart");
        }
        else{
            echo "<script>alert('The shopping cart is empty!')</script>";
        }
    }
    else{
        echo "<script>alert('Please Sign-Up or Login to place an order!')</script>";
        // header("Location: cart.php");
		
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSheet.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style type="text/css">
 

</style>
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
       <div class="small_container cart_page">
       <form action="cart.php" method="post">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
                include 'config.php';
                error_reporting(0);
                $sql = "SELECT * FROM temp_cart";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while($row=$result->fetch_assoc()):?>
            <tr>
            <td>
                <div class="cart_info">
                <div>
                <?php
                    if($row['temp_type']=="male"):?>
                        <img src="c-img/men-shoes/<?php echo $row['article']?>.png">
                <?php
                    elseif($row['temp_type']=="female"):?>
                        <img src="c-img/women-shoes/<?php echo $row['article']?>.png">
                <?php
                    elseif($row['temp_type']=="kids"):?>
                        <img src="c-img/kids-shoes/<?php echo $row['article']?>.png">
                <?php endif  ?>  

                            <small><p>article no.<?php echo $row['article']?></p></small>
                            <small><p>size: <?php echo $row['temp_size']?></p></small>
                            <small><p>Type: <?php echo $row['temp_type']?></p></small>
                            <small><p>Cost(per pair incl. VAT): £99.00</p></small>
                            <br>
                    </div>

                </div>

                </td>
                <td><?php echo $row['temp_quantity']?></td>
                <td>£<?php echo $row['temp_cost']?>.00</td>
            </tr>
            <?php endwhile?>
            <?php    }?>
            
        </table>
        <div class="total">
            <table>
               <tr>
                    <td><h5>Total:</h5></td>
                    <?php
                    $sql= "SELECT SUM(temp_cost) FROM temp_cart";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)):?> 
                    <td><h5>£<?php echo round($row['SUM(temp_cost)'],2)?></h5></td>
                    <?php endwhile ?>
                </tr>
                <tr>
                    <td><h5>Discount(20%):</h5></td>
                    <?php
                    $sql= "SELECT SUM(temp_cost) FROM temp_cart";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)):?> 
                    <td><h5>£<?php echo round(($row['SUM(temp_cost)']*0.2),2)?></h5></td>
                    <?php endwhile ?>
                    
                </tr>
                <tr>
                    <td><h4>Total To Pay:</h4></td>
                    <?php
                    $sql= "SELECT SUM(temp_cost) FROM temp_cart";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)):?> 
                    <td><h4>£<?php echo round((($row['SUM(temp_cost)'])-(($row['SUM(temp_cost)'])*0.2)),2)?></h4></td>
                    <?php endwhile ?>
                </tr>
        </table>
        </div>
        <button class="cart_button" type="submit" name="empty">EMPTY THE CART</button>
        </form>
        

       </div>
        <div class="billing">
            <form action="cart.php" method="post" class="payment_details">
                <h1>Payment Details</h1>
                <div class="first-row">
                    <div class="card_name">
                        <h3>Name on the card</h3>
                        <div class="input-field">
                            <input type="text" required="required">
                        </div>
                    </div>
                    <div class="cvv">
                        <h3>CVV</h3>
                        <div class="input-field">
                            <input type="password" required="required">
                        </div>
                    </div>
                </div>
                <div class="second-row">
                    <div class="card-number">
                        <h3>Card Number</h3>
                        <div class="input-field">
                            <input type="number" required="required">
                        </div>
                    </div>
                </div>
                <div class="third-row">
                    <h3>Card Expiry</h3>
                    <div class="selection">
                        <div class="date">
                            <select name="months" id="months">
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="Jun">Jun</option>
                                <option value="Jul">Jul</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                              </select>
                              <select name="years" id="years">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                              </select>
                        </div>
                        <div class="cards">
                            <img src="c-img/mc.png" alt="">
                            <img src="c-img/vi.png" alt="">
                            <img src="c-img/amex.jpg" alt="">
                        </div>
                    </div>    
                </div>
                <h1>Delivery Details</h1>
                <div class="full_name">
                    <h3>Full Name</h3>
                    <div class="input-field">
                        <input type="text" required="required">
                    </div>
                </div>
                <div class="address">
                    <h3>First line of Address</h3>
                    <div class="input-field">
                        <input type="text" required="required">
                    </div>
                </div>
                <div class="first-row">
                    <div class="City">
                        <h3>City/Province</h3>
                        <div class="input-field">
                            <input type="text" required="required">
                        </div>
                    </div>
                    <div class="postcode">
                        <h3>PostCode</h3>
                        <div class="input-field">
                            <input type="text" required="required">
                        </div>
                    </div>
                </div>
                <button type="submit" class="cart_button" name="confirm">CONFIRM ORDER</button>
            </form>
        </div><br><br>
        

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