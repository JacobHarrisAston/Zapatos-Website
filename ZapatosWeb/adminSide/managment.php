<?php
@include 'config.php';

session_start();

$sessionName = $_SESSION['name'];
$sql = "SELECT * from admins WHERE a_username = '$sessionName'";
    $sqlquery = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($sqlquery);

if (!isset($_SESSION['name'])){
  header("location: admin-sign.php");
  exit();
}
$sessionName=$_GET['id'];
    //$sessionName=$_GET['id'];
    $adminid=$_GET['type'];
    $product = "SELECT *from admins WHERE a_username = '$sessionName'";
    $prodquery = mysqli_query($conn, $product);
    $row=mysqli_fetch_array($prodquery);



if (isset($_POST['update'])){
  $newusername = $_POST['username'];
  $newuseremail = $_POST['useremail'];
  $newpassword = ($_POST['password1']);

  
  $samename = "SELECT * from admins WHERE a_username = '$newusername'";
  $samequery = mysqli_query($conn, $samename);
  $samerow=mysqli_fetch_array($samequery);
  

  if ($newusername=='' or $newuseremail=='' or $newpassword==''){
    header('Location:Admine.php');
    echo"<script>alert('No details changed.')</script>";
    exit();
  }elseif($samerow){
    echo"<script>alert('This username is already taken, try again.')</script>";
  }
  else{
  
    $sql = "UPDATE `admins` SET `a_id` = '".$adminid."', `a_email` = '".$newuseremail."', `a_pass` = '".$newpassword."', `a_username` = '".$newusername."' WHERE `a_username`= '$sessionName'";
    $result_query = mysqli_query($conn,$sql);
    $_SESSION['name'] =$newusername;
    session_start();
  }
    //$_SESSION['name'] =$row['a_username'];
    //$sessionName = $_SESSION['name'];

    if($result_query){
   
    echo "Details changes successfully";
    header('Location:admin.php');
  }else{
    header('Location:admin.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>

<link id="admineStyle" href="adminStyle.css" rel="stylesheet"/>
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />


<meta charset="utf-8" />
    <title>

    </title>
    <body>
  </head>

  <!----------------------- Start Top NavBar Menu ----------------------------------->
  <div id="main" class="topbar">
    <ul>
      <div class="dropdown">
      <li>    
        <a href=""><button class="dropbtn"><img src="img/user.png" width="25" height="25"><i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="adminlogout.php"><img src="img/logout.png" width="25" height="25">Signout </a>
          <a href="managment.php?id=<?=$_SESSION['name'];?>&type=<?=$row['a_id'];?>"><img src="img/editing.png" width="25" height="25">Edit profile</a>
        </div>
      </div>
        </a></li>
        <div class="dropdown">
      <li><a href=""><button  class="dropbtn"><img src="img/world.png"  width="25" height="25"><i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="#"><img src="img/united-kingdom.png" width="25" height="25">English(UK)</a>
        <a href="#"><img src="img/united-states.png" width="25" height="25">English(USA)</a>
      </div>
    </div> </a></li>
      
      <li><a><button class="openbtn" onclick="openNav()"><img src="img/menu.png" width="25" height="25"></button></a></li>
  
  
    </ul>
  </div>


 
<!-------------------------End Top NavBar Menu-------------------------------------------->





  <!----------------------------Start Side NavBar Menu ------------------------------------>
 

  <div id="mySidebar" class="sidebar">
    <a href="" class="closebtn" onclick="closeNav()"><img src="img/close.png" width="25" height="25"></a>
    <img src="img/logo.png" class="logo"  width="85%" height="85" >
    <br>
    <hr class="horizontal light mt-0 mb-2">
    <img src="img/dashboard.png"  width="25" height="25" style="float:left"> 
   <a href="admin.php" style="text-decoration: none ;"><i class="fa fa-fw fa-home" style="float: right;"></i> Dashboard</a>
    <br>
    <img src="img/add-user.png" width="25px" height="25" style="float:left">  
    <a href="availibility.php" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i> Availability </a>
    <br>
    <img src="img/shoe-shop.png" width="25px" height="25" style="float:left">  
    <a href="product.php" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i>Add Products</a>
    <br>
    <img src="img/orders-icon.png" width="25px" height="25" style="float:left">  
    <a href="orders.php" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i>Orders</a>
    <br>

   
      <h6>Account Management</h6>
    <img src="img/logout.png" width="25px" height="25" style="float:left">  
    <a href="adminlogout.php" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i> Sign out</a>
    <br>
    <img src="img/logout.png" width="25px" height="25" style="float:left">  
    <a href="managment.php?id=<?=$_SESSION['name'];?>&type=<?=$row['a_id'];?>" style="text-decoration: none ;"><i class="fa fa-fw fa-wrench" style="float: rigth;"></i> Edit profile</a>
    <br>

    </div>


    

   <!----------------------------------------------- End Side NavBar Menu ----------------------------------------------------------->








<!---------------------------------------------- Start Butoton Script ------------------------------------------------------------------------>
   <script>

    function openNav() {
      document.getElementById("mySidebar").style.width = "180px";


    }
    
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    
    }
    </script>
<!----------------------------------------------  End Butoton Script ------------------------------------------------------------------------>





<!--------------------------------------------------- Form Starts --------------------------------------------------------------------------------------->

<form action="" method="post">
 <!--  <?php
  $currentuser = $_SESSION['name'];
  $sql = "SELECT * FROM admins WHERE a_username = '$currentuser'";
  
  $result = mysqli_query($conn, $sql);
  if($result){
    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_array($result)){
        ?> -->
        <div class="Content">
    <div class="product-content">
    <div class="PContent">
        <label for="name">Name</label>
        <input type="text" placeholder="Name" id="name" name="username" value="<?php echo $row['a_username']?>" pattern="[a-zA-Z'-'\s]*" required  
        oninvalid="this.setCustomValidity('Enter Name Here Please')" oninput="this.setCustomValidity('')">
        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email" name="useremail" value="<?php echo $row['a_email']?>" pattern="A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required 
        oninvalid="this.setCustomValidity('Enter Email Here Please')" oninput="this.setCustomValidity('')">
        <!-- <label for="phone">Phone Number</label><br>
      <input id="phone" placeholder="Phone Number" type="tel" name="phone"   required 
        oninvalid="this.setCustomValidity('Enter phone number Here Please')" oninput="this.setCustomValidity('')">
        <br> -->
    <label for="dropdown">Country</label>
    <br>
    
      <div id="dropdown"></div><br>
        <label for="password">Password</label>
        <input type="password" placeholder="Create new password" name="password1" value="<?php echo ($row['a_pass'])?>" id="password" required    
        oninvalid="this.setCustomValidity('Enter Password  Here Please')" oninput="this.setCustomValidity('')">
        <label for="cpassword">Confirm Password</label>
        <input class="cp" type="password" placeholder="Repeat new password" name="password2"  id="cpassword" required 
            onkeyup="Validate()"
            oninvalid="this.setCustomValidity('Enter Same Password  Here Please')" oninput="this.setCustomValidity('')">
        <br>
        <input type="checkbox" onclick="myFunction()">Show Password

        <!-- <?php
      }
    }
  }
  ?> -->


    

        <!----------------------------Script----------------------------->
     <script>
function ansValidation(ev) {
    ev.preventDefault
    // there is no input named name
    //var nameValue = document.getElementById("name").value

    var passValue = document.getElementById("password").value
    var confpassValue = document.getElementById("cpassword").value
 if(passValue !== confpassValue) {
       window.alert("Passwords do not match!")
    }
}

         function myFunction() {
       var x = document.getElementById("password");
       if (x.type === "password") {
         x.type = "text";
       } else {
         x.type = "password";
       }
     }
    
     var countries = [
    { "text": "Afghanistan", "value": "AF" },
    { "text": "Åland Islands", "value": "AX" },
    { "text": "Albania", "value": "AL" },
    { "text": "Algeria", "value": "DZ" },
    { "text": "American Samoa", "value": "AS" },
    { "text": "Andorra", "value": "AD" },
    { "text": "Angola", "value": "AO" },
    { "text": "Anguilla", "value": "AI" },
    { "text": "Antarctica", "value": "AQ" },
    { "text": "Antigua and Barbuda", "value": "AG" },
    { "text": "Argentina", "value": "AR" },
    { "text": "Armenia", "value": "AM" },
    { "text": "Aruba", "value": "AW" },
    { "text": "Australia", "value": "AU" },
    { "text": "Austria", "value": "AT" },
    { "text": "Azerbaijan", "value": "AZ" },
    { "text": "Bahamas", "value": "BS" },
    { "text": "Bahrain", "value": "BH" },
    { "text": "Bangladesh", "value": "BD" },
    { "text": "Barbados", "value": "BB" },
    { "text": "Belarus", "value": "BY" },
    { "text": "Belgium", "value": "BE" },
    { "text": "Belize", "value": "BZ" },
    { "text": "Benin", "value": "BJ" },
    { "text": "Bermuda", "value": "BM" },
    { "text": "Bhutan", "value": "BT" },
    { "text": "Bolivia", "value": "BO" },
    { "text": "Bosnia and Herzegovina", "value": "BA" },
    { "text": "Botswana", "value": "BW" },
    { "text": "Bouvet Island", "value": "BV" },
    { "text": "Brazil", "value": "BR" },
    { "text": "British Indian Ocean Territory", "value": "IO" },
    { "text": "Brunei Darussalam", "value": "BN" },
    { "text": "Bulgaria", "value": "BG" },
    { "text": "Burkina Faso", "value": "BF" },
    { "text": "Burundi", "value": "BI" },
    { "text": "Cambodia", "value": "KH" },
    { "text": "Cameroon", "value": "CM" },
    { "text": "Canada", "value": "CA" },
    { "text": "Cape Verde", "value": "CV" },
    { "text": "Cayman Islands", "value": "KY" },
    { "text": "Central African Republic", "value": "CF" },
    { "text": "Chad", "value": "TD" },
    { "text": "Chile", "value": "CL" },
    { "text": "China", "value": "CN" },
    { "text": "Christmas Island", "value": "CX" },
    { "text": "Cocos (Keeling) Islands", "value": "CC" },
    { "text": "Colombia", "value": "CO" },
    { "text": "Comoros", "value": "KM" },
    { "text": "Congo", "value": "CG" },
    { "text": "Congo, The Democratic Republic of the", "value": "CD" },
    { "text": "Cook Islands", "value": "CK" },
    { "text": "Costa Rica", "value": "CR" },
    { "text": "Cote D'Ivoire", "value": "CI" },
    { "text": "Croatia", "value": "HR" },
    { "text": "Cuba", "value": "CU" },
    { "text": "Cyprus", "value": "CY" },
    { "text": "Czech Republic", "value": "CZ" },
    { "text": "Denmark", "value": "DK" },
    { "text": "Djibouti", "value": "DJ" },
    { "text": "Dominica", "value": "DM" },
    { "text": "Dominican Republic", "value": "DO" },
    { "text": "Ecuador", "value": "EC" },
    { "text": "Egypt", "value": "EG" },
    { "text": "El Salvador", "value": "SV" },
    { "text": "Equatorial Guinea", "value": "GQ" },
    { "text": "Eritrea", "value": "ER" },
    { "text": "Estonia", "value": "EE" },
    { "text": "Ethiopia", "value": "ET" },
    { "text": "Falkland Islands (Malvinas)", "value": "FK" },
    { "text": "Faroe Islands", "value": "FO" },
    { "text": "Fiji", "value": "FJ" },
    { "text": "Finland", "value": "FI" },
    { "text": "France", "value": "FR" },
    { "text": "French Guiana", "value": "GF" },
    { "text": "French Polynesia", "value": "PF" },
    { "text": "French Southern Territories", "value": "TF" },
    { "text": "Gabon", "value": "GA" },
    { "text": "Gambia", "value": "GM" },
    { "text": "Georgia", "value": "GE" },
    { "text": "Germany", "value": "DE" },
    { "text": "Ghana", "value": "GH" },
    { "text": "Gibraltar", "value": "GI" },
    { "text": "Greece", "value": "GR" },
    { "text": "Greenland", "value": "GL" },
    { "text": "Grenada", "value": "GD" },
    { "text": "Guadeloupe", "value": "GP" },
    { "text": "Guam", "value": "GU" },
    { "text": "Guatemala", "value": "GT" },
    { "text": "Guernsey", "value": "GG" },
    { "text": "Guinea", "value": "GN" },
    { "text": "Guinea-Bissau", "value": "GW" },
    { "text": "Guyana", "value": "GY" },
    { "text": "Haiti", "value": "HT" },
    { "text": "Heard Island and Mcdonald Islands", "value": "HM" },
    { "text": "Holy See (Vatican City State)", "value": "VA" },
    { "text": "Honduras", "value": "HN" },
    { "text": "Hong Kong", "value": "HK" },
    { "text": "Hungary", "value": "HU" },
    { "text": "Iceland", "value": "IS" },
    { "text": "India", "value": "IN" },
    { "text": "Indonesia", "value": "ID" },
    { "text": "Iran, Islamic Republic Of", "value": "IR" },
    { "text": "Iraq", "value": "IQ" },
    { "text": "Ireland", "value": "IE" },
    { "text": "Isle of Man", "value": "IM" },
    { "text": "Israel", "value": "IL" },
    { "text": "Italy", "value": "IT" },
    { "text": "Jamaica", "value": "JM" },
    { "text": "Japan", "value": "JP" },
    { "text": "Jersey", "value": "JE" },
    { "text": "Jordan", "value": "JO" },
    { "text": "Kazakhstan", "value": "KZ" },
    { "text": "Kenya", "value": "KE" },
    { "text": "Kiribati", "value": "KI" },
    { "text": "Korea, Democratic People'S Republic of", "value": "KP" },
    { "text": "Korea, Republic of", "value": "KR" },
    { "text": "Kuwait", "value": "KW" },
    { "text": "Kyrgyzstan", "value": "KG" },
    { "text": "Lao People'S Democratic Republic", "value": "LA" },
    { "text": "Latvia", "value": "LV" },
    { "text": "Lebanon", "value": "LB" },
    { "text": "Lesotho", "value": "LS" },
    { "text": "Liberia", "value": "LR" },
    { "text": "Libyan Arab Jamahiriya", "value": "LY" },
    { "text": "Liechtenstein", "value": "LI" },
    { "text": "Lithuania", "value": "LT" },
    { "text": "Luxembourg", "value": "LU" },
    { "text": "Macao", "value": "MO" },
    { "text": "Macedonia, The Former Yugoslav Republic of", "value": "MK" },
    { "text": "Madagascar", "value": "MG" },
    { "text": "Malawi", "value": "MW" },
    { "text": "Malaysia", "value": "MY" },
    { "text": "Maldives", "value": "MV" },
    { "text": "Mali", "value": "ML" },
    { "text": "Malta", "value": "MT" },
    { "text": "Marshall Islands", "value": "MH" },
    { "text": "Martinique", "value": "MQ" },
    { "text": "Mauritania", "value": "MR" },
    { "text": "Mauritius", "value": "MU" },
    { "text": "Mayotte", "value": "YT" },
    { "text": "Mexico", "value": "MX" },
    { "text": "Micronesia, Federated States of", "value": "FM" },
    { "text": "Moldova, Republic of", "value": "MD" },
    { "text": "Monaco", "value": "MC" },
    { "text": "Mongolia", "value": "MN" },
    { "text": "Montserrat", "value": "MS" },
    { "text": "Morocco", "value": "MA" },
    { "text": "Mozambique", "value": "MZ" },
    { "text": "Myanmar", "value": "MM" },
    { "text": "Namibia", "value": "NA" },
    { "text": "Nauru", "value": "NR" },
    { "text": "Nepal", "value": "NP" },
    { "text": "Netherlands", "value": "NL" },
    { "text": "Netherlands Antilles", "value": "AN" },
    { "text": "New Caledonia", "value": "NC" },
    { "text": "New Zealand", "value": "NZ" },
    { "text": "Nicaragua", "value": "NI" },
    { "text": "Niger", "value": "NE" },
    { "text": "Nigeria", "value": "NG" },
    { "text": "Niue", "value": "NU" },
    { "text": "Norfolk Island", "value": "NF" },
    { "text": "Northern Mariana Islands", "value": "MP" },
    { "text": "Norway", "value": "NO" },
    { "text": "Oman", "value": "OM" },
    { "text": "Pakistan", "value": "PK" },
    { "text": "Palau", "value": "PW" },
    { "text": "Palestinian Territory, Occupied", "value": "PS" },
    { "text": "Panama", "value": "PA" },
    { "text": "Papua New Guinea", "value": "PG" },
    { "text": "Paraguay", "value": "PY" },
    { "text": "Peru", "value": "PE" },
    { "text": "Philippines", "value": "PH" },
    { "text": "Pitcairn", "value": "PN" },
    { "text": "Poland", "value": "PL" },
    { "text": "Portugal", "value": "PT" },
    { "text": "Puerto Rico", "value": "PR" },
    { "text": "Qatar", "value": "QA" },
    { "text": "Reunion", "value": "RE" },
    { "text": "Romania", "value": "RO" },
    { "text": "Russian Federation", "value": "RU" },
    { "text": "RWANDA", "value": "RW" },
    { "text": "Saint Helena", "value": "SH" },
    { "text": "Saint Kitts and Nevis", "value": "KN" },
    { "text": "Saint Lucia", "value": "LC" },
    { "text": "Saint Pierre and Miquelon", "value": "PM" },
    { "text": "Saint Vincent and the Grenadines", "value": "VC" },
    { "text": "Samoa", "value": "WS" },
    { "text": "San Marino", "value": "SM" },
    { "text": "Sao Tome and Principe", "value": "ST" },
    { "text": "Saudi Arabia", "value": "SA" },
    { "text": "Senegal", "value": "SN" },
    { "text": "Serbia and Montenegro", "value": "CS" },
    { "text": "Seychelles", "value": "SC" },
    { "text": "Sierra Leone", "value": "SL" },
    { "text": "Singapore", "value": "SG" },
    { "text": "Slovakia", "value": "SK" },
    { "text": "Slovenia", "value": "SI" },
    { "text": "Solomon Islands", "value": "SB" },
    { "text": "Somalia", "value": "SO" },
    { "text": "South Africa", "value": "ZA" },
    { "text": "South Georgia and the South Sandwich Islands", "value": "GS" },
    { "text": "Spain", "value": "ES" },
    { "text": "Sri Lanka", "value": "LK" },
    { "text": "Sudan", "value": "SD" },
    { "text": "Suriname", "value": "SR" },
    { "text": "Svalbard and Jan Mayen", "value": "SJ" },
    { "text": "Swaziland", "value": "SZ" },
    { "text": "Sweden", "value": "SE" },
    { "text": "Switzerland", "value": "CH" },
    { "text": "Syrian Arab Republic", "value": "SY" },
    { "text": "Taiwan, Province of China", "value": "TW" },
    { "text": "Tajikistan", "value": "TJ" },
    { "text": "Tanzania, United Republic of", "value": "TZ" },
    { "text": "Thailand", "value": "TH" },
    { "text": "Timor-Leste", "value": "TL" },
    { "text": "Togo", "value": "TG" },
    { "text": "Tokelau", "value": "TK" },
    { "text": "Tonga", "value": "TO" },
    { "text": "Trinidad and Tobago", "value": "TT" },
    { "text": "Tunisia", "value": "TN" },
    { "text": "Turkey", "value": "TR" },
    { "text": "Turkmenistan", "value": "TM" },
    { "text": "Turks and Caicos Islands", "value": "TC" },
    { "text": "Tuvalu", "value": "TV" },
    { "text": "Uganda", "value": "UG" },
    { "text": "Ukraine", "value": "UA" },
    { "text": "United Arab Emirates", "value": "AE" },
    { "text": "United Kingdom", "value": "GB" },
    { "text": "United States", "value": "US", synonym: ['USA','United States of America'] },
    { "text": "United States Minor Outlying Islands", "value": "UM" },
    { "text": "Uruguay", "value": "UY" },
    { "text": "Uzbekistan", "value": "UZ" },
    { "text": "Vanuatu", "value": "VU" },
    { "text": "Venezuela", "value": "VE" },
    { "text": "Viet Nam", "value": "VN" },
    { "text": "Virgin Islands, British", "value": "VG" },
    { "text": "Virgin Islands, U.S.", "value": "VI" },
    { "text": "Wallis and Futuna", "value": "WF" },
    { "text": "Western Sahara", "value": "EH" },
    { "text": "Yemen", "value": "YE" },
    { "text": "Zambia", "value": "ZM" },
    { "text": "Zimbabwe", "value": "ZW" }
];
 
for (var i = 0; i < countries.length; i++) {
    countries[i].image = 'https://cdn.jsdelivr.net/npm/svg-country-flags@1.2.10/svg/' + countries[i].value.toLowerCase() + '.svg';
}
 
jSuites.dropdown(document.getElementById('dropdown'), {
    data: countries,
    autocomplete: true,
    multiple: true,
    width: '100%',

});



     </script>
     <!----------------------------Script----------------------------->

  <input type="Submit" onclick="ansValidation(event)" name="update" value="Update">
    </div>
 
    </div>
    </div>
</form>

<!--------------------------------------------------- Form ends --------------------------------------------------------------------------------------->

</body>
</html>