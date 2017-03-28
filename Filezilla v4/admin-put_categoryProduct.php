<?php
	require_once("database.php");
	echo "admin-put_categoryProduct.php ! <br>";
	$db=new Database();
	
	if(isset ($_POST['submit-category'])){
		echo "category-submit! <br>";
		$PostTitle = $_POST['PostTitle'];
		echo $PostTitle." <br>";
		$choose = $_POST['choose'];
		$choose1;
	if ($choose == 'Category') {
		$choose1 = '1';
	} else if ($choose == 'Super Category') {
		$choose1 = 'NULL';
	}
		echo $choose . " " . $choose1 . "<br>";
		$imgUrl = $_POST['imgUrl'];
		echo $imgUrl." <br>";
		
	}
	
	$db -> putCategory($PostTitle, $choose, $imgUrl);
	$db -> closeConnection();
	
?>	