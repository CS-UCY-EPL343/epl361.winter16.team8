<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">

			<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
			Remove this if you use the .htaccess -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

			<title>La Galerie | 3D Cakes for Boys</title>
			<meta name="description" content="">
			<meta name="author" content="stephanie">

			<meta name="viewport" content="width=device-width; initial-scale=1.0">
			
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

			<style>
				body, h1, h2, h3, h4, h5, h6, .w3-wide {
					font-family: "Montserrat", sans-serif;
				}
				body {
					background-color: rgb(25, 25, 25);
					background-image: linear-gradient(rgba(0,0,0,0.60),rgba(0,0,0,0.60)), url("pictures/askisi1.jpg");
					background-repeat: no-repeat;
					background-size: 100% 100%;
					background-attachment: fixed;
					margin-right: 10px;
					margin-left: 10px;
				}
			</style>
		</head>

		<body onload="isLogin()">
			<script src="js/login.js"></script>
			<div id="coverround" style="padding-bottom:0px">
				<a href="laGalerie.php"><img id="cover" class="img-responsive" alt="cover" src="pictures/cover.jpg"
				height="100%" width="100%"></a>
			</div>

			<?php
				require("navbar.php");
			?>

			<div class = "col-xs-12">
				<div class = "container">

					<?php
						$id = $_GET['varname'];
						require_once ("database.php");
						$db = new Database();
			
						$sql2 = "SELECT CATEGORY_NAME FROM CATEGORIES WHERE CATEGORY_ID = ". $id ."";
						$sql3 = mysqli_query($conn, $sql2);
						$row = mysqli_fetch_array($sql3, MYSQL_ASSOC);
			
						echo '
							<h2 align="center"  style="color:white;"><a href="Categories.php">
							<span class="glyphicon glyphicon-arrow-left"></span></a> '. $row['CATEGORY_NAME'] .'</h2>';
			
						$sql = "SELECT * FROM PRODUCTS WHERE CATEGORY_ID = ". $id ."";
						$sql1 = mysqli_query($conn, $sql);
						$rowcount = $sql1 -> num_rows;
			
						$count = 0;
			
						while ($count < $rowcount){
							$row2 = mysqli_fetch_array($sql1, MYSQL_ASSOC);
							$loopResult = '
								<div class="col-sm-4">
									<div align="center">
										<a tabindex="-1" href="product.php?id2='.$row2['PRODUCT_ID'].'" style="color:white;"> <img class="img-responsive" src="'. $row2['PICTURE'].'" /> View details</a>
									</div>
								</div>
								';
							echo $loopResult;
							$count = $count + 1;
						}
					?>
				</div>
			</div>
			<footer>
				<p class="pull-right">
					<a href="#" style="color:white;">Back to top</a>
				</p>
				<p style="color:white;">
					&copy; 2016 La Galerie Patisserie by Galactica &middot; <a href="#" style="color:white;">Privacy</a> &middot; <a href="#" style="color:white;">Terms</a>
				</p>
			</footer>
			<script
			src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="js/bootstrap.min.js"></script>
		</body>
	</html>
