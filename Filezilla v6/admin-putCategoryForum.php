<?php
//Author:Stephanie Nicolaou
	require_once("database.php");
	echo "admin-putCategoryForum.php ! <br>";
	$db=new Database();
	
		
	if(isset ($_POST['submit_Forum'])){
		echo "submit_Forum! <br>";
		$PTitle = $_POST['PTitle'];
		echo $PTitle." <br>";
		$edit = $_POST['edit'];
		echo $edit." <br>";
	}
	
	$db -> putForum($PTitle,$edit,$conn);
	$db -> closeConnection();
	
?>	