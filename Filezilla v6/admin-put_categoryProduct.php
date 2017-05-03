<?php
//Author:Stephanie Nicolaou
	require_once("database.php");
	echo "admin-put_categoryProduct.php ! <br>";
	$db=new Database();
	
	if(isset ($_POST['submit-category'])){
		echo "category-submit! <br>";
		$PostTitle = $_POST['PostTitle'];
		echo $PostTitle." <br>";
		$choose1 = $_POST['choose'];
		echo $choose1 . "<br>";
		$imgUrl = $_POST['imgUrl'];
		echo $imgUrl." <br>";
		
	}
	
	$db -> putCategory($PostTitle, $choose1, $imgUrl, $conn);
	$db -> closeConnection();
	echo '<script>
			window.location.href = "Categories.php"
		  </script>
	';
	
?>	