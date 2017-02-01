<?php require('connect.php'); ?>

<?php
	
	$sql = "SELECT NAME,SURNAME,EMAIL
			FROM customer";
	$result = mysqli_query($conn,$sql);
	
	if (mysqli_num_rows($result)>0){
		while ($row = mysqli_fetch_assoc($result)){
			echo "NAME: " . $row["NAME"] . "<br>SURNAME: " . $row["SURNAME"] . "<br>EMAIL: " . $row["EMAIL"] . "<br><br>";
		}
	}
	else{
		echo "No results!";		//for debugging purposes
	}
?>