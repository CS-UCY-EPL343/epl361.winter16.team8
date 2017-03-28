<?php session_start();
	require ('database.php');
	
	if(isset($_POST['cart'])){
		$id = $_POST['id'];
		$qty = $_POST['fff'];
		$email = $_SESSION['email'];
		
		$sql = "SELECT * FROM CART WHERE EMAIL = \"".$email."\" AND PRODUCT_ID = ".$id;
		$query = mysqli_query($conn, $sql);
		if ($query -> num_rows != 0){
			$row = mysqli_fetch_array($query, MYSQL_ASSOC);
			$qty2 = $row['QUANTITY'];
			$sql = "UPDATE CART SET QUANTITY=".($qty+$qty2) ." WHERE EMAIL = \"".$email."\" AND PRODUCT_ID = ".$id;
			$query = mysqli_query($conn, $sql);
		}
		else {
			$sql = "INSERT INTO CART (EMAIL,PRODUCT_ID,QUANTITY) VALUES(\"".$email."\",".$id.",".$qty.")";
			$query = mysqli_query($conn, $sql);
		}
		
	}
	echo '<script>window.location = "Categories.php" ;</script>';
?>