	<?php
	require_once("database.php");
	echo "admin-product.php ! <br>";
	$db=new Database();
	
		
	if(isset ($_POST['submit_cake'])){
		echo "product-submit! <br>";
		$title = $_POST['title'];
		echo $title." <br>";
		$message = $_POST['message'];
		echo $message." <br>";
		$category = $_POST['category'];
		echo $category." <br>";
		$price = $_POST['price'];
		echo $price." <br>";
		$picture = $_POST['fileToUpload'];
		echo $picture." <br>";
		$weight = $_POST['weight'];
		echo $weight." <br>";;
	}
	
	$db -> putProduct($title, $message, $category, $price, $picture, $weight);
	$db -> closeConnection();
	
?>	