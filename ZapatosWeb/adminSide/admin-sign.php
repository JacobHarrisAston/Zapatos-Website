<?php
@include 'config.php';
 session_start();
$msg="";
if (isset($_POST['login'])){
  //$username = $_POST['name'];
  $email = $_POST['email'];
  $password = ($_POST['password']); //password hashed

  /* if ( !isset($_POST['email'], $_POST['password']) ) {
  // Could not get the data that should have been sent.
   exit('Please fill both the email and password fields!');
    } */

    $sql = mysqli_query($conn, "SELECT * FROM admins WHERE a_email = '$email' && a_pass = '$password'");
    $result = mysqli_num_rows($sql);
    if ($result>0){
      $row=mysqli_fetch_assoc($sql);
      $_SESSION['name'] =$row['a_username'];
      $_SESSION['email'] =$row['a_email'];  
      header("Location:admin.php");
    }
    else{
      ?>
      <div class="error">
        <h1> Oops.. your details are incorrect</h1>
    </div>
      <?php
    }

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>

<link id="admineStyle" href="sign.css" rel="stylesheet"/>

<meta charset="utf-8" />
    <title>Sign-In
    </title>
  </head>
    <body>

    <div class="background">
   <div class="shape"></div>
    <div class="shape"></div>
   </div>
    <form action="admin-sign.php" method="post"> 
        <h3>Login Here</h3>
<!--   <label for="name">Name</label>
   <input type="text" name="name" placeholder="Name" name="name" id="name" pattern="[a-zA-Z'-'\s]*" required
   oninvalid="this.setCustomValidity('Enter Name Here Please')" oninput="this.setCustomValidity('')"> -->
   <label for="email">Email</label>
   <input type="text" name="email" placeholder="Email"  name="email" id="email" pattern="A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required
   oninvalid="this.setCustomValidity('Enter Email Here Please')" oninput="this.setCustomValidity('')">
   <label for="password">Password</label>
   <input type="password" name="password" placeholder="password" name="password" id="password" required
   oninvalid="this.setCustomValidity('Enter Password Here Please')" oninput="this.setCustomValidity('')">
   <input type="checkbox" onclick="myFunction()">Show Password
<script>
    function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<input type="submit" class="btn-2" value="Login" name="login">
   <!-- <button class="btn-2">Log In</button> --><div class="social">
    <p>Do you want to <a href="register.php"> Register?</a></p>
   </div> </form>
   </body> </html> 