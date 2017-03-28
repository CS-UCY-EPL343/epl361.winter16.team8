<?php session_start();
require_once('database.php');
$id = $_GET['todelete'];
$email = $_SESSION['email'];
$sql = "DELETE  
		FROM CART
		WHERE EMAIL = \"".$email."\" AND PRODUCT_ID = \"".$id."\"";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
echo "<script>window.location = \"cart.php\" ;</script>";
?>