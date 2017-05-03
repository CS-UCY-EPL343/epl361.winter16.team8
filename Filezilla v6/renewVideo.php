<?php

//$comm = $_GET['comm'];

session_start();
require_once ("database.php");
$db = new Database();

    if(isset ($_POST['submit-Video'])){
        $PostTitle = $_POST['PostTitle'];
        echo $PostTitle." <br>";
		$video_id = $_POST['video_id'];
		echo $video_id." <br>";
		 $description = $_POST['description'];
        echo $description." <br>";
		 $ingredients = $_POST['ingredients'];
        echo $ingredients." <br>";
		 $execution = $_POST['execution'];
        echo $execution." <br>";
	}
	
	$db -> renewVideo($PostTitle,$video_id,$description,$ingredients,$execution,$conn);
	$db -> closeConnection();
	echo '<script>
            window.location.href = "videos.php"
		  </script>';
?>