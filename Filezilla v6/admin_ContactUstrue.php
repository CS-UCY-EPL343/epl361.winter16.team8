<?php
//Author:Stephanie Nicolaou
	session_start(); 
	require_once("database.php");
	echo "admin-ContactUs.php ! <br>";
	$db=new Database();
	
	$email = $_SESSION['email'];
	$sql12 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $email ."\"";
	$sql21 = mysqli_query($conn, $sql12);
	$rowAd = mysqli_fetch_array($sql21, MYSQL_ASSOC);
	
	if(isset ($_POST['submit'])){
		echo "ContactUs-submit! <br>";
		$message = $_POST['message'];
		echo $message." <br>";
	}
	
	$db -> putContactUs($message,$rowAd['EMAIL'],$rowAd['NAME'], $rowAd['SURNAME'],$rowAd['COUNTRY'],$rowAd['CITY'],$conn);
	$db -> closeConnection();
	echo '<script>
		window.location.href = "laGalerie.php"
		  </script>';
	
	 
	
?>	