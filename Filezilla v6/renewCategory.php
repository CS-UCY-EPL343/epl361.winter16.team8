<?php

//$comm = $_GET['comm'];

session_start();
require_once ("database.php");
$db = new Database();

    if(isset ($_POST['submit-category'])){
        $PostTitle = $_POST['PostTitle'];
        echo $PostTitle." <br>";
		$com_id = $_POST['com_id'];
		echo $com_id." <br>";
	}
	
	$db -> renewCat($PostTitle,$com_id,$conn);
	$db -> closeConnection();
	echo '<script>
            window.location.href = "Categories.php"
		  </script>';
?>