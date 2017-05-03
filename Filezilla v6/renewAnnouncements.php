<?php

//$comm = $_GET['comm'];

session_start();
require_once ("database.php");
$db = new Database();

    if(isset ($_POST['submit-announcements'])){
        $PostTitle = $_POST['PostTitle'];
        echo $PostTitle." <br>";
		$comment = $_POST['comment'];
		echo $comment." <br>";
		$com_id = $_POST['com_id'];
		echo $com_id." <br>";
		
	}
	
	$db -> renewAnnouncement($PostTitle,$comment,$com_id,$conn);
	$db -> closeConnection();
	echo '<script>
          window.location.href = "Announcements.php"
		  </script>';
?>