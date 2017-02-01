<?php require('connect.php'); ?>
<?php
	
	$sql = "INSERT INTO customer (EMAIL,NAME,SURNAME,PASSWORD,DOB,SEX,ADDRESS,CITY,POSTAL_CODE,MOBILE,ISVIP)
	VALUES ('aggourakiA@cs.ucwhy.ac.cy.com','rafaeel','jackson','en1MISTIKO!',date('1822-03-25'),'M','En Ikserw 18, eeee','Kapou Magika',11892,999999998,true)";
	
	if (mysqli_query($conn,$sql)){
		echo "added succesfully!";
	}
	else{
		echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
	}
?>