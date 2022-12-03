<?php
include 'config.php'; 
session_start();



    $article=$_GET['id'];
	$Gender =$_GET['type'];
    if($Gender=="male"){
      $product = "SELECT *from men_items WHERE article_no = '$article'";
      $prodquery = mysqli_query($conn, $product);
      $row=mysqli_fetch_array($prodquery);
    }
    elseif($Gender=="female"){
      $product = "SELECT *from women_items WHERE article_no = '$article'";
      $prodquery = mysqli_query($conn, $product);
      $row=mysqli_fetch_array($prodquery);
    }
    else{
      $product = "SELECT *from kids_items WHERE article_no = '$article'";
      $prodquery = mysqli_query($conn, $product);
      $row=mysqli_fetch_array($prodquery);
    }


if (isset($_POST['submit'])){

$PName =$_POST['PName'];
$PGender =$_POST['PGender'];
$PColor =$_POST['PColor'];

$PCurrency = $_POST['currency-field'];
$Pdetails =$_POST['Pdetails'];
$artic_no = $_POST['artical-number'];
$product_status = true;

$imagefile = $_FILES['Pimage']['name'];
$tempimage = $_FILES['Pimage']['tmp_name'];

// if ($PName=='' or $PGender=='' or $PColor=='' or $PCurrency='' or $imagefile=='' or $Pdetails=''){
//   echo"Script>alert('Please fill in all the fields')</script>";
//   exit();
// }
// else{
//   	move_uploaded_file($tempimage,"./img/$imagefile");
 	if($PGender=='male'){
    $insert_prod= "UPDATE `men_items` SET `article_no`='".$artic_no."',`product_name`='".$PName."',`type`='".$PGender."',`colour`='".$PColor."',`description`='".$Pdetails."',`cost`='".$PCurrency."',`photo`= '".$imagefile."' WHERE `article_no` = '$artic_no'";
   $result_query = mysqli_query($conn,$insert_prod);}
	header("Location:availibility.php");}

   elseif($PGender=='female'){
    $insert_prod= "UPDATE `women_items` SET `article_no`='".$artic_no."',`product_name`='".$PName."',`type`='".$PGender."',`colour`='".$PColor."',`description`='".$Pdetails."',`cost`='".$PCurrency."',`photo`= '".$imagefile."' WHERE `article_no` = '$artic_no'";
    $result_query = mysqli_query($conn,$insert_prod);}
	header("Location:availibility.php");}

  elseif($PGender=='kids'){
    $insert_prod= "UPDATE `kids_items` SET `article_no`='".$artic_no."',`product_name`='".$PName."',`type`='".$PGender."',`colour`='".$PColor."',`description`='".$Pdetails."',`cost`='".$PCurrency."',`photo`= '".$imagefile."' WHERE `article_no` = '$artic_no'";   
    $result_query = mysqli_query($conn,$insert_prod);}
	header("Location:availibility.php");}

  else{
    echo"Script>alert('There is a problem with the form!')</script>";
  }

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>

<link id="admineStyle" href="adminStyle.css" rel="stylesheet"/>

<meta charset="utf-8" />
    <title>
Edit Product
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
          <button type="button" class="btn" style="background-color: #98BDFF; " > <a href="adminlogout.php"><img src="img/logout.png" width="25" height="25">Signout </a></button>
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






<!---------------------------------------------------  Product Form  -------------------------------------------------------------------------------------->

   

     // editproduct.php?id=<?echo $article?      
        
<form action="" method="post" enctype="multipart/form-data">

    <div class="Content">
    <div class="product-content">
    <div class="PContent">
        <h2> Edit Product here</h2>

            <label for="PName">Product-Name:</label>
            <input type="text" id="Product-Name" name="PName" value="<?php echo $row['product_name']?>" minlength="5" required placeholder="Enter Name"
            oninvalid="this.setCustomValidity('Enter Product Name Here')" oninput="this.setCustomValidity('')"/>

             <br>

            <P>Product-Gender:</P>
            <?php
                if($article[0]=="m"):?>
                <input type="radio" id="Male" name="PGender" value="male" checked="checked" required>
                <label for="Male">Male</label><br>
                <input type="radio" id="Female" name="PGender" value="Female" required>
                <label for="Female">Female</label><br>
                <input type="radio" id="Kids" name="PGender" value="Kids" required>
                <label for="Kids">Kids</label><br>
            <?php
                elseif($article[0]=="w"):?>
                  <input type="radio" id="Male" name="PGender" value="male"  required>
                  <label for="Male">Male</label><br>
                  <input type="radio" id="Female" name="PGender" value="female" checked="checked" required>
                  <label for="Female">Female</label><br>
                  <input type="radio" id="Kids" name="PGender" value="kids" required>
                  <label for="Kids">Kids</label><br>
            <?php
                elseif($article[0]=="k"):?>
                    <input type="radio" id="Male" name="PGender" value="male" required>
                    <label for="Male">Male</label><br>
                    <input type="radio" id="Female" name="PGender" value="female"   required>
                    <label for="Female">Female</label><br>
                    <input type="radio" id="Kids" name="PGender" value="kids" checked="checked" required>
                    <label for="Kids">Kids</label><br>
            <?php  endif?>



            <label for="PColor">Product-Color:</label>
            <div class="search_categories" >
            <div class="select" >
            <select class="search_categories" id="color" value="<?php echo $row['colour']?>" name="PColor" required
            oninvalid="this.setCustomValidity('Pick Product Color Here')" oninput="this.setCustomValidity('')">
            <?php
            if($row['colour']=="red"):?>
                <option value=" ">Select Color:</option>
                <option value="red" selected>Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="brown">Brown</option>
                <option value="orange">Orange</option>
            <?php
                elseif($row['colour']=="blue"):?>
                <option value=" ">Select Color:</option>
                <option value="red" >Red</option>
                <option value="blue" selected>Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="brown">Brown</option>
                <option value="orange">Orange</option>
            <?php
            elseif($row['colour']=="green"):?>
                <option value=" ">Select Color:</option>
                <option value="red" >Red</option>
                <option value="blue" >Blue</option>
                <option value="green" selected>Green</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="brown">Brown</option>
                <option value="orange">Orange</option>
            <?php
            elseif($row['colour']=="yellow"):?>
                <option value=" ">Select Color:</option>
                <option value="red" >Red</option>
                <option value="blue" >Blue</option>
                <option value="green">Green</option>
                <option value="yellow" selected>Yellow</option>
                <option value="pink">Pink</option>
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="brown">Brown</option>
                <option value="orange">Orange</option>
                <?php
            elseif($row['colour']=="pink"):?>
                <option value=" ">Select Color:</option>
                <option value="red" >Red</option>
                <option value="blue" >Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="pink" selected>Pink</option>
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="brown">Brown</option>
                <option value="orange">Orange</option>
                <?php
            elseif($row['colour']=="white"):?>
                <option value=" ">Select Color:</option>
                <option value="red" >Red</option>
                <option value="blue" >Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
                <option value="white" selected>White</option>
                <option value="black">Black</option>
                <option value="brown">Brown</option>
                <option value="orange">Orange</option>
                <?php
            elseif($row['colour']=="black"):?>
                <option value=" ">Select Color:</option>
                <option value="red" >Red</option>
                <option value="blue" >Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
                <option value="white">White</option>
                <option value="black" selected>Black</option>
                <option value="brown">Brown</option>
                <option value="orange">Orange</option>
                <?php
            elseif($row['colour']=="brown"):?>
                <option value=" ">Select Color:</option>
                <option value="red" >Red</option>
                <option value="blue" >Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="brown" selected>Brown</option>
                <option value="orange">Orange</option>
            <?php
            elseif($row['colour']=="orange"):?>
                <option value=" ">Select Color:</option>
                <option value="red" >Red</option>
                <option value="blue" >Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="brown" >Brown</option>
                <option value="orange" selected>Orange</option>
            <?php endif?>

            </select>
          </div>
        </div>
  <br>
  <label for="currency-field">Enter Amount:</label>
    
  <input type="float" name="currency-field" id="currency-field" value="<?php echo $row['cost']?>"  data-type="currency" required="required" placeholder="£1,000,000.00">
    

<label for="artical-number">Artical Number:</label>
<input type="text" name="artical-number" id="artical-number" value="<?php echo $row['article_no']?>" required placeholder="Artical-number" 
oninvalid="this.setCustomValidity('Please wrigth artical-number')" oninput="this.setCustomValidity('')">
  <label for="PColor">Product-image:</label>
  <input class="custom-file-input" type="file" id="Product-image" name="Pimage" value="<?php echo $row['photo']?>" onchange="loadFile(event)" accept="img/png,img/jpg" required 
  oninvalid="this.setCustomValidity('Please Upload image')" oninput="this.setCustomValidity('')">
  <img href= "Team_Project/img"id="display-img"></img>
  <br>
  <label for="Pdetails">Product-details:</label>

  <textarea id="Product-details" name="Pdetails" value = "<?php echo $row['description']?>"  rows="4" cols="50" minlength="10" required 
  oninvalid="this.setCustomValidity('Enter Product details Here')" oninput="this.setCustomValidity('')"><?php echo $row['description']?></textarea>
<p id="count_result">Total chracters : 0 </p>

  <input type="Submit" value="Update product" name="submit">
    </div>
    
 
    </div>
    
    </div>
    
 
</form>




<!---------------------------------------------------  Product Form  -------------------------------------------------------------------------------------->

<!--------------------------------------------------- Start Count/currency Script  -------------------------------------------------------------------------------------->
<script>
let myText = document.getElementById("Product-details");
myText.addEventListener("input", ()=> {
  let count = (myText.value).length;
  document.getElementById("count_result").textContent = `Total chracters: ${count}`;
});

    document.querySelectorAll('[pattern-invalid-message]')
    .forEach(input => {
        input.oninvalid = function(event) {
            let invalidMessage = event.target.getAttribute('pattern-invalid-message');
            if (invalidMessage) {
                event.target.setCustomValidity(invalidMessage);
            }
        }
    })

    var currencyInput = document.querySelector('input[type="currency"]')
var currency = 'GBP' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

 // format inital value
onBlur({target:currencyInput})

// bind event listeners
currencyInput.addEventListener('focus', onFocus)
currencyInput.addEventListener('blur', onBlur)


function localStringToNumber( s ){
  return Number(String(s).replace(/[^0-9.-]+/g,""))
}

function onFocus(e){
  var value = e.target.value;
  e.target.value = value ? localStringToNumber(value) : ''
}

function onBlur(e){
  var value = e.target.value

  var options = {
      maximumFractionDigits : 2,
      currency              : currency,
      style                 : "currency",
      currencyDisplay       : "symbol"
  }
  
  e.target.value = (value || value === 0) 
    ? localStringToNumber(value).toLocaleString(undefined, options)
    : ''
}
  
</script>

<!---------------------------------------------------  End Count/currency Script  -------------------------------------------------------------------------------------->

<!---------------------------------------------- Start FileUpload Script ------------------------------------------------------------------------>
<script>

/* should preview img to the web site img folder  */
var loadFile = function(event) {
    var output = document.getElementById('display-img');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };


</script>
<!----------------------------------------------  End FileUpload Script ------------------------------------------------------------------------>


  </body>
</html>