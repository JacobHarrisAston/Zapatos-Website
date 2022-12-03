<?php 

$server = "localhost";
$user = "u-220036425";
$pass = "HwJSeyEaUSOPIbR";
$database = "u_220036425_db";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>