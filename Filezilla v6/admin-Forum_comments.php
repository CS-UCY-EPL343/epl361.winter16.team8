<?php
//Author:Stephanie Nicolaou
	session_start(); 
	require_once("database.php");
	echo "admin-Forum_comments.php ! <br>";
	$db=new Database();
	
	$email = $_SESSION['email']; 
	   
	if(isset ($_POST['submit_ForumComments'])){
		echo "submit_ForumComments! <br>";
		$PostTitle = $_POST['PostTitle'];
		echo $PostTitle." <br>";
		$message = $_POST['message'];
		echo $message." <br>";
		$FORUM_ID= $_GET['id'];
		echo $FORUM_ID." <br>";
		echo $email;
	}
	
	$db -> putForumComment($PostTitle,$message,$FORUM_ID,$email,$conn);
	$db -> closeConnection();
	echo '<script>
			window.location.href = "Forum.php"
		 </script>';
	
?>	