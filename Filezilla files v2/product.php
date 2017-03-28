<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>La Galerie Patisserie</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
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

		<script>
			window.onscroll = function() {
				var x = document.getElementById("cover").height;
				var y = document.getElementById("mainnav").height;
				y = 2 * y;
				if (document.body.scrollTop > x || document.documentElement.scrollTop > x) {

					document.getElementById("coverround").style = "padding-bottom:150px";
					document.getElementById("mainnav").className = "navbar navbar-fixed-top";
				} else {
					document.getElementById("coverround").style = "padding-bottom:0px";
					document.getElementById("mainnav").className = "navbar navbar-default";
				}
			};
		</script>
		
		<?php
			
			$id = $_GET['id2'];
			require_once ("database.php");
			$db = new Database();
			
			
			
			$sql2 = "SELECT * FROM PRODUCTS WHERE PRODUCT_ID = ". $id ."";
			$sql3 = mysqli_query($conn, $sql2);
			$row = mysqli_fetch_array($sql3, MYSQL_ASSOC);
			
			$catID =  $row['CATEGORY_ID'];
			
			$sql = "SELECT CATEGORY_NAME FROM CATEGORIES WHERE CATEGORY_ID = ". $catID ."";
			$sql1 = mysqli_query($conn, $sql);
			$row2 = mysqli_fetch_array($sql1, MYSQL_ASSOC);
			
			$Result = '
					<div class = "container">
						<div class = "row">
							<div class = "col-xs-3 col-lg-4">
								<img class="first-slide center-block" src="'. $row['PICTURE'] .'">
							</div>
			
							<div class="col-xs-8 col-lg-4">
								<h1 class="center-block" style="color:white; font-size: 35px">'. $row['PRODUCT_NAME'] .'</h1>
								<br>
								<br>
								<p style="color:white;">'. $row['DESCRIPTION'] .'</p>
								<br>
								<h4 style="color:white;">€'. $row['PRICE'] .'</h4>
								<button id="cart">Add to cart</button>
								<input id="fff" name="quantity" type="number" value="1" onchange="calculateTotal()"/>
							</div>
							<div class="col-xs-6 col-lg-4">
								<h2 id="totp" style="color:white;">TOTAL PRICE: €'. $row['PRICE'] .'</h2>
								<br>
								<br>
								<li style="color: white">
								<a style = "color:yellow" href="cakes.php?varname='. $row['CATEGORY_ID'] .'"><strong><u> '. $row2['CATEGORY_NAME'] .'</u></strong></a></li>
							</div>
						</div>
					</div>
				';
			echo $Result;
			echo '
				<script>
					var price ='. $row['PRICE'] .';
					var total_price = '. $row['PRICE'] .';
			
					function calculateTotal(){
						total_price = price*document.getElementById("fff").value;
						var a = total_price.toFixed(2);
				document.getElementById("totp").innerHTML="TOTAL PRICE: €"+a;
			}
			</script>
			';
		?>
		<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/login.js"></script>
	</body>
</html>
