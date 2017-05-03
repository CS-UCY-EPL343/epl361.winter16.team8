	<?php
	//Author:Stephanie Nicolaou
	session_start(); 
	require_once("database.php");
	echo "admin-announcements.php ! <br>";
	$db=new Database();
	
	$email = $_SESSION['email'];    
	if(isset ($_POST['submit_announcements'])){
		echo "announcements-submit! <br>";
		$titlos = $_POST['titlos'];
		echo $titlos." <br>";
		$FORUMID = 1;
		echo $FORUMID." <br>";
		$message = $_POST['message'];
		echo $message." <br>";
		$picture = "pictures/announcment(1).jpg";
		echo $picture." <br>";
		$approved = 1;
		echo $email;
	}
	
	$db -> putAnnouncements($titlos,$FORUMID,$email, $message,$picture, $approved,$conn);
	$db -> closeConnection();
	echo '<script>
		window.location.href = "Announcements.php"
		  </script>';
	
?>	