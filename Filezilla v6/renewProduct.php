<?php

//$comm = $_GET['comm'];

session_start();
require_once ("database.php");
$db = new Database();

    if(isset ($_POST['submit_prod_update1'])){
        $id = $_POST['idprod'];
        //echo $id." <br>";
		$titlos = $_POST['name'];
		//echo $titlos." <br>";
		$description = $_POST['description'];
		//echo $description." <br>";
		$price = $_POST['price'];
		//echo $price." <br>";
		$choose = $_POST['choose'];
		//echo $choose." <br>";
	}
	
	$db -> renewProduct($id,$titlos,$description, $price, $choose,$conn);
	$db -> closeConnection();
	echo '<script>
            window.location.href = "product.php?id2='.$id.'"
		  </script>';
?>