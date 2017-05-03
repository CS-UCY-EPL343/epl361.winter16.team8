<?php

session_start();
require_once ("database.php");
$db = new Database();

    if(isset ($_POST['submit-category'])){
        $id = $_POST['com_id'];
        //echo $id." <br>";
		$titlos = $_POST['PostTitle'];
		//echo $titlos." <br>";
	}
	
	$db -> renewForum($id,$titlos,$conn);
	$db -> closeConnection();
	echo '<script>
            window.location.href = "Forum.php"
		  </script>';
?>