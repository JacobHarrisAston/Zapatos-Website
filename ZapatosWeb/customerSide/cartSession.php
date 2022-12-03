<?php
    include 'config.php';

    session_start();
    error_reporting(0);

    if(isset($_POST['addItem'])){

        $type = $_POST['type'];
        $size = $_POST['size'];
        $quantity= $_POST['quantity'];
        $temp_item= $_POST['article'];
    
    	if($type=="male"){

            $sql1 = mysqli_query($conn,"SELECT * FROM men_items WHERE article_no = '$temp_item'");
            $row= mysqli_fetch_array($sql1);
            $cost = $row['cost']*$quantity;
          
        }
        elseif($type=="female"){
            $sql2 = mysqli_query($conn,"SELECT * FROM women_items WHERE article_no = '$temp_item'");
            $row= mysqli_fetch_array($sql2);
            $cost = $row['cost']*$quantity;
        }
        if($type=="kids"){
            $sql2 = mysqli_query($conn,"SELECT * FROM kids_items WHERE article_no = '$temp_item'");
            $row= mysqli_fetch_array($sql2);
            $cost = $row['cost']*$quantity;
        }

        $sql = mysqli_query($conn,"INSERT INTO temp_cart(article,temp_size,temp_quantity,temp_cost,temp_type) VALUES ('$temp_item','$size','$quantity','$cost','$type')");
        
        if($sql){    
            echo "<script>alert('ITEM(S) ADDED SUCCESSFULLY TO THE CART')</script>";
            if($type == "male"){
            header('Location:men.php');}
            elseif($type == "female"){
            header('Location:women.php');}
            elseif($type == "kids"){
            header('Location:kids.php');}
        }

        else{
            echo "error in mysql query";
        }

        
    }

    if(isset($_POST['empty'])){
        $sql = mysqli_query($conn,"TRUNACTE temp_cart");
        }
    
?>