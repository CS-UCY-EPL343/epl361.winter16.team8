<?php

session_start();
require_once ("database.php");
$db = new Database();

    if(isset ($_POST['submit-category'])){
        $id = $_POST['com_id'];
        //echo $id." <br>";
		$message = $_POST['comment'];
		//echo $titlos." <br>";
	}
	
	$db -> renewComment($id,$message,$conn);
	$db -> closeConnection();
	echo '<script>
            window.location.href = "Forum.php"
		  </script>';
?>