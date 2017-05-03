<?php session_start() ?>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>La Galerie | City Center Map</title>
		<meta name="description" content="">
		<meta name="author" content="Andreas Costi">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
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
		<script src="js/login.js"></script>

		<div id="coverround" style="padding-bottom:0px">
			<a href="laGalerie.php"><img id="cover" class="img-responsive" alt="cover" src="pictures/cover.jpg"
			height="110%" width="100%"></a>
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

		<div class="col-lg-12">
			<p style="color:white;">
				<strong>Location: </strong><i>Arch. Makariou III, Mesa Geitonia</i>
				<br>
				<strong>City: </strong><i>Limassol</i>
				<br>
				<strong>Country: </strong><i>Cyprus</i>
				<br>
				<strong>Postal Code: </strong><i>4003</i>
				<br>
				<strong>Telephone Number:</strong><i> +00357 25750665</i>
			</p>
			<style>
				#map_canvas{
					background: transparent url("pictures/ajax-loading.gif") no-repeat center center;
				}
			</style>
			<div class="span8" id = "map_canvas">
				<iframe width="60%" height="350vh" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2033.3060805611267!2d33.04435532875578!3d34.697662173971835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5a8940ada8188c8a!2sGalactika!5e0!3m2!1sen!2sus!4v1479220575972"></iframe>
			</div>
			</script>

			<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
			<!-- FOOTER -->
			<footer class="col-lg-12">
			<p class="pull-right">
				<a href="#" style="color:white;">Back to top</a>
			</p>
			<p style="color:white;">
				&copy; 2016 La Galerie Patisserie by Galactica &middot; <a href="privacypolicy.htm" style="color:white;">Privacy</a> &middot; <a href="terms.htm" style="color:white;">Terms</a>
			</p>
		</footer>
		</div>

		<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
