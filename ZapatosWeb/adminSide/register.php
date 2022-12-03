<?php
@include 'config.php'; 

if (isset($_POST['submit'])){
  $username =$_POST['name'];
  $email = $_POST['email'];
  $password = ($_POST['password']); //password hashed
  $cpassword = ($_POST['cpassword']); 

  $err = array();

  $us = "SELECT a_username from admins WHERE a_username='$username'";
  $usquery = mysqli_query($conn,$us);

  $em = "SELECT a_username from admins WHERE a_username='$username'";
  $emquery = mysqli_query($conn,$em);

  $p = "SELECT a_username from admins WHERE a_username='$username'";
  $pquery = mysqli_query($conn,$p);

  if(empty($username)){
    $err['u'] = "Username required";
  }else if(mysqli_num_rows($usquery)>0){
    $err['u']= "Username has been taken";
  }

  if(empty($email)){
    $err['e'] = "email required";
  }else if(mysqli_num_rows($emquery)>0){
    $err['e']= "Account with this email exists";
  }

  if(empty($password)){
    $err['p'] = "password required";
  }else if(mysqli_num_rows($pquery)>0){
    $err['p']= "Choose another password";
  }

  if(empty($cpassword)){
    $err['cp'] = "Please re-enter password";
  }

  if(count($err)==0){
    $insert = "INSERT INTO admins(a_email, a_username, a_pass) VALUES ('$email', '$username', '$password')";
    mysqli_query($conn,$insert);
    if($insert){
    header('location:admin-sign.php');
    }else{
      echo"<script>alert('Something went wrong, try again.')</script>";

    }
  }

  };
      
  ?>


<!DOCTYPE html>
<html lang="en">
  <head>

<link id="admineStyle" href="sign.css" rel="stylesheet"/>

<meta charset="utf-8" />
    <title>

    </title>
  </head>
    <body>

  <div class="background">
   <div class="shape"></div>
    <div class="shape"></div>
  </div>
    <form action="" method="post"> 
        <h3>Register Here</h3>
        <?php
        if(isset($error)){
          foreach($error as $error){
            echo '<span class="error">'.$error.'</span>';

          };
        };
        ?>
   <label for="name">Username</label>
   <input type="text" placeholder="Create userame" name="name" id="name" pattern="[a-zA-Z'-'\s]*"  
   oninvalid="this.setCustomValidity('Enter Name Here Please')" oninput="this.setCustomValidity('')">
   <p class="err"> <?php if(isset($err['u'])) echo $err['u']; ?></p>
   <label for="email">Email</label>
   <input type="text" placeholder="Email or Phone" name="email" id="email" pattern="A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"  
   oninvalid="this.setCustomValidity('Enter Email Here Please')" oninput="this.setCustomValidity('')">

   <p class="err"> <?php if(isset($err['e'])) echo $err['e']; ?></p>
   
   <div id="dropdown"></div><br>
   <div class="input-container">
     <div class="input-group">
     <label for="password">Password</label>
     <input type="password" placeholder="Create New Password" name="password" id="password"   required 
     oninvalid="this.setCustomValidity('Enter Password  Here Please')" oninput="this.setCustomValidity('')">

     </div>
     <div class="pass-strength">
     <div class="strength-precent"><span></span></div>
     <br>
     <span class="strength-label">Strength</span>
     </div>
   </div>

     </span>

   <p class="err"> <?php if(isset($err['p'])) echo $err['p']; ?></p>
   <label for="cpassword">Confirm Password</label>
   <input class="cp" type="password" placeholder="Re-Enter Password" name="cpassword" id="cpassword"  
   onkeyup="Validate()"
   oninvalid="this.setCustomValidity('Enter Same Password  Here Please')" oninput="this.setCustomValidity('')">
   <p class="err"> <?php if(isset($err['cp'])) echo $err['cp']; ?></p>
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
function ansValidation(ev) {
    ev.preventDefault


    var passValue = document.getElementById("password").value
    var confpassValue = document.getElementById("cpassword").value
 if(passValue !== confpassValue) {
       window.alert("Passwords do not match!")
    }
}



const passInput =document.querySelector(" .input-group input");
const passLabel = document.querySelector(" .strength-label");

passInput.addEventListener("input", handlePassInput);
toggleIcon.addEventListener("click", togglePassInput);

function handlePassInput (e) {
if (passInput .value. length = 0) {
passLabel.innerHTML = "Strength";
addClass();
} else if (passInput. value. length <= 4) {
passLabel.innerHTML = "Weak";
addClass("weak");
} else if (passInput.value. length <= 7) {
passLabel.innerHTML = "Not Bad"
addClass("average");
 } else {
passLabel.innerHTML = "Strong";
addClass("strong");
}
}

function addClass(className) {
percentBar.classList.remove("weak");
 percentBar.classList.remove("average");
 percentBar.classList.remove("strong");
if (className) {
percentBar.classList.add(className);
}}
</script>

<input type="submit" name="submit" onclick="ansValidation(event)" value="Register"> <div class="social">
  <p>Do you want to <a href="admin-sign.php"> Login?</a></p>
  </div> 
</form>
  </body> </html>