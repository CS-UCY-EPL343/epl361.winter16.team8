<?php
//Author:Stephanie Nicolaou
	require_once("database.php");
	echo "admin-videos.php ! <br>";
	$db=new Database();
	
	if(isset ($_POST['submit-video'])){
		echo "submit-video! <br>";
		$PostTitle = $_POST['PostTitle'];
		echo $PostTitle." <br>";	
		$link = $_POST['imgUrl'];

		$regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
		$matches;
		$matched = preg_match($regExp, $link, $matches, PREG_OFFSET_CAPTURE);
		print_r($matches);
		echo "<br>". $matches[2][0] ."<br>";
		//echo $link." <br>";
		$newlink = "https://www.youtube.com/embed/" . $matches[2][0];
		echo "<br>". $newlink ."<br>";

		$description = $_POST['description'];
		echo $description." <br>";
		$ingredients = $_POST['ingredients'];
		echo $ingredients."<br";
		$message = $_POST['message'];
		echo $message . "<br>";
	}
	
	$db -> putVideo($PostTitle,$newlink,$description,$ingredients,$message,$conn);
	$db -> closeConnection();
	echo '<script>
		window.location.href = "videos.php"
		  </script>';
	
	
?>

