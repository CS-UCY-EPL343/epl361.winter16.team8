<?php
	require_once("database.php");
	echo "update_customer.php ! <br>";
	$db=new Database();
	
	if(isset ($_POST['namebtn'])){
		echo "update_customer! <br>";
		$name = $_POST['namedb'];
	}
	
	$db -> updateName($name);
	$db -> closeConnection();
//	echo '<script>
//			window.location.href = "infoForm.php"
//		  </script>
//	';
	
?>	