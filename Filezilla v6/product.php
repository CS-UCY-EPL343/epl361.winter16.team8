<?php session_start() ?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>La Galerie Patisserie | Product view</title>

		<!-- Bootstrap -->
		<link href="css/modal.css" rel="stylesheet">
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
	<body>
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
		<div class="container" id = "container1" name = "container1"
				<div class="row row-offcanvas row-offcanvas-right">
					<div class="col-xs-12 col-xs-12" >
						<div class="jumbotron" align="left">
							<div class="row">
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
			echo '
					<div class = "container">
						<div class = "row">
							<div class = "col-xs-6 col-lg-4">
								<img class="first-slide center-block img-responsive" src="'. $row['PICTURE'] .'">
							</div>
			
							<div class="col-xs-6 col-lg-4">
								<h2 class="center-block" style="padding-left:30px">'. $row['PRODUCT_NAME'] .'</h1>
								<br>
								<br>
								<p style = "font-size:15px;padding-left:30px">'. $row['DESCRIPTION'] .'</p>
								<br>
								<h4 style = "font-size:20px;padding-left:30px">€'. $row['PRICE'] .'</h4>';
								
			if($_SESSION['islogin']==true){					
			echo '				<form action="addCartBtn.php" method="post" role="form" style = "padding-left:30px">
									<input type="hidden" name="id" value='.$id.'>
									<input id="cart" type="submit" name="cart" value="Add to cart" />
									<input id="fff" name="fff" type="number" value="1" onchange="calculateTotal()"/>
								</form>';
			}
			else {
				echo '			<form action="SignUp.php" style = "padding-left:30px">
									<input id="cart" type="submit" value="Login" />
								</form>';
			}
			
			echo 		'	</div>
							<div class="col-xs-6 col-lg-4">
								<li >
								<a style = "color:blue" href="cakes.php?varname='. $row['CATEGORY_ID'] .'"><strong><u> '. $row2['CATEGORY_NAME'] .'</u></strong></a></li>
							</div>
						</div>
					</div>
				';
				
				$email = $_SESSION['email'];
			$sql12 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $email ."\"";
			$sql21 = mysqli_query($conn, $sql12);
			$rowAd = mysqli_fetch_array($sql21, MYSQL_ASSOC);
			if($rowAd['ISADMIN']==true){
				echo '
					<p style = "text-align:right; padding-right:60px;">
                 	<a class="btn btn-md btn-primary" style="background-color:red;float:right" href="deleteProduct.php?comm='.$row['PRODUCT_ID'].'" role="button"> Delete product &#9747</a>
					<button type="button" id= "myBtn" class="btn btn-md btn-primary" style="background-color:green" data-target="#myModal">Edit product</button>
	
		<div id ="myModal" class="modal">
			<div class="modal-content">
				<h2 align="center"><strong>Edit Details of product</strong></h2>
				<form action="renewProduct.php" method="post" id = "submit_prod_update"  name = "submit_prod_update" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<div class="col-md-9">
									<input id="idprod" name="idprod" type="hidden" class="form-control" value = "'.$row['PRODUCT_ID'].'">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="title">Current Title:</label>
								<div class="col-md-9">
									<input id="name" name="name" type="text" placeholder="'. $row['PRODUCT_NAME'] .'" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="description">Current Description:</label>
								<div class="col-md-9">
									<input id="description" name="description" type="text" placeholder="'. $row['DESCRIPTION'] .'" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="price">Current Price:</label>
								<div class="col-md-9">
									<input id="price" name="price" type="number" placeholder="'. $row['PRICE'] .'" class="form-control" step = "0.01">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label " for="choose">Choose new category if you want</label>
									<select id="choose" name="choose" class="form-control">
										<option value=""></option>';
										$sql123 = "SELECT * FROM CATEGORIES WHERE SUPER_CATEGORY IS NOT NULL";
										$sql321 = mysqli_query($conn, $sql123);
										$countOfCats = 0;
										$rowcountOfCats = $sql321 -> num_rows;
										
										while ($countOfCats < $rowcountOfCats){
											$rowCats = mysqli_fetch_array($sql321, MYSQL_ASSOC);
											$loopResult1 .= '<option value="'.$rowCats['CATEGORY_ID'].'">'. $rowCats['CATEGORY_NAME'] .'</option>';
											$countOfCats = $countOfCats + 1;
										}
										
$loopResult1 .= '
									</select>
							</div>	
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit_prod_update1" class="btn btn-primary btn-lg">
										Update product
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="product.php?id2='.$row['PRODUCT_ID'].'">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div></p>
				';
				echo $loopResult1;
			}
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
			echo '<script>
	// Get the modal
	var modalAdd = document.getElementById("myModal");

	// Get the button that opens the modal
	var btnAdd = document.getElementById("myBtn");


	// Get the <span> element that closes the modal
	var spanAdd = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btnAdd.onclick = function() {
		modalAdd.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modalAdd.style.display = "none";
	}

 </script>';
		?>
		</div>
		</div>
		</div>
		</div>
		</div>
<footer class="col-lg-12">
			<p class="pull-right">
				<a href="#" style="color:white;">Back to top</a>
			</p>
			<p style="color:white;">
				&copy; 2016 La Galerie Patisserie by Galactica &middot; <a href="privacypolicy.htm" style="color:white;">Privacy</a> &middot; <a href="terms.htm" style="color:white;">Terms</a>
			</p>
		</footer>
		<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/login.js"></script>
	</body>
</html>
