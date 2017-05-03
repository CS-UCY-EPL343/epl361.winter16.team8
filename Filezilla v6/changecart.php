<?php

	session_start();
	require_once 'database.php';
	
	$email = $_SESSION['email'];
	$id = $_GET['tochange'];
	$qty = $_GET['qty'];
	
	
	
	$sql = "UPDATE CART SET QUANTITY=$qty WHERE EMAIL='$email' AND PRODUCT_ID=$id";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	echo $sql;
	echo "<script>window.location = \"cart.php\" ;</script>";
	
 ?>