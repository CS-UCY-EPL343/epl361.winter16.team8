<?php session_start() ;
	if ($_SESSION['islogin']==false){
		echo "<script>window.location = \"laGalerie.php\" ;</script>";
	}
?>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>La Galerie | Cart</title>
		<meta name="description" content="">
		<meta name="author" content="Andreas Costi">

		<meta name="viewport" content="width=device-width initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" href="css/styles.css">

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
			}
		</style>
	</head>

	<body>
		<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/login.js"></script>
		<div>

			<div id="coverround" style="padding-bottom:0px">
				<a href="laGalerie.php"><img id="cover" class="img-responsive" alt="cover" src="pictures/cover.jpg"
				height="100%" width="100%"></a>
			</div>

			<?php
	require_once ('navbar.php');
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
			<!------------------------------------------------------------------------------------------------------------------->

			<?php
	require_once ("addCart.php");
			?>

			

			<!-- FOOTER -->
			<footer class="col-lg-12">
			<p class="pull-right">
				<a href="#" style="color:white;">Back to top</a>
			</p>
			<p style="color:white;">
				&copy; 2016 La Galerie Patisserie by Galactica &middot; <a href="privacypolicy.htm" style="color:white;">Privacy</a> &middot; <a href="terms.htm" style="color:white;">Terms</a>
			</p>
		</footer>

			<!-- /.container -->
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>
