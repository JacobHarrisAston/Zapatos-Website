<?php
@include 'config.php';
session_start();

if(isset($_GET['id'])){
  $iddel=$_GET['id'];
  if($iddel[0]=='m'){
  $delete= mysqli_query($conn,"DELETE FROM `men_items` WHERE `article_no` = '$iddel'");
  header('Location:availibility.php');
  }elseif(isset($_GET['id'])){
  if($iddel[0]=='w'){
    $delete= mysqli_query($conn,"DELETE FROM `women_items` WHERE `article_no` = '$iddel'");
    header('Location:availibility.php');
  }else{
      if($iddel[0]=='k'){
        $delete= mysqli_query($conn,"DELETE FROM `kids_items` WHERE `article_no` = '$iddel'");
        header('Location:availibility.php');
}}}} 
  ?>