<?php 

include 'config.php';

session_start();

error_reporting(0);
// session builds when the customer successfully sign-in
if (isset($_POST['login'])) {
	$user_email = $_POST['u-email'];
	$user_password = md5($_POST['u-pass']);
	// echo $user_password;

	$sql = "SELECT * FROM customers WHERE c_email='$user_email' AND c_pass='$user_password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
    // echo $user_password;
	$row = mysqli_fetch_assoc($result);
    $_SESSION['c-username']=$row['c_username'];
    $_SESSION['useremail']=$row['c_email'];
	header("Location: home.php");
	} 
	else {
        // header("Location: home.php");
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

// destroyes the session as the customer clicks sign-out

elseif (isset($_SESSION['c-username'])) {
	$sql = mysqli_query($conn, "TRUNCATE temp_cart");
    session_destroy();
    header("Location: home.php");
}

?>