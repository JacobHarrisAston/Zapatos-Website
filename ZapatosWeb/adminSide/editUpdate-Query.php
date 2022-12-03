<?php
include 'config.php';

if (isset($_POST['edit-submit'])){

$PName =$_POST['PName'];
$PGender =$_POST['PGender'];
$PColor =$_POST['PColor'];

$PCurrency = $_POST['currency-field'];
$Pdetails =$_POST['Pdetails'];
$artic_no = $_POST['artical-number'];
$product_status = true;

$imagefile = $_FILES['Pimage']['name'];
$tempimage = $_FILES['Pimage']['tmp_name'];}


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
  	move_uploaded_file($tempimage,"./img/$imagefile");
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