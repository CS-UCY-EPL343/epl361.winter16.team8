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
		$name = $_POST['name'];
		echo $name." <br>";
		$surname = $_POST['surname'];
		echo $surname." <br>";
		$country = $_POST['country'];
		echo $country." <br>";
		$town = $_POST['town'];
		echo $town." <br>";
		$email = $_POST['email'];
		echo $email." <br>";
	}
	
	$db -> putContactUsFalse($message,$name,$surname,$country, $email,$town,$conn);
	$db -> closeConnection();
	echo '<script>
			window.location.href = "laGalerie.php"
		  </script>';
	
	 
	
?>	