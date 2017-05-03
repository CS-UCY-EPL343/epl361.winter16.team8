<?php

    session_start();
    require_once ("database.php");
    $db = new Database();
	
	$x = $_SESSION['searchCrit'];

	$sql12 = "SELECT * FROM PRODUCTS WHERE LOWER (PRODUCT_NAME) LIKE LOWER (\"%". $x ."%\")";
	$sql21 = mysqli_query($conn, $sql12);
	$rowcount = $sql21 -> num_rows;
	$count = 0;
	while ($count < $rowcount) {
		$rowAd = mysqli_fetch_array($sql21, MYSQL_ASSOC);

		$loopResult = '
				<div class="container">
					<div class="row">
						<div class="col-xs-3 col-lg-4">
							<img id="picture" center-block" src="'. $rowAd['PICTURE'] .'">
						</div>
						<!---->
						<div class="col-xs-8 col-lg-4">
							<h1 id="name" class="center-block" >'. $rowAd['PRODUCT_NAME'] .'</h1>
					<br>
					<br>
					<p >
						'. $rowAd['DESCRIPTION'] .'
					</p>
					<br>	
							<h4 id="price"  >Price: €'. $rowAd['PRICE'] .'</h4>
							
							
						</div>
						<div class="col-xs-6 col-lg-4">
							<br>
							<br>
							
								<a class="btn btn-primary" href="product.php?id2='. $rowAd['PRODUCT_ID'] .'" role="button">Click for more information</a>
							
						</div>
					</div>
				</div>

				<hr style="border-color:black">		
		';
		echo $loopResult;
		$count = $count + 1;
	}

?>