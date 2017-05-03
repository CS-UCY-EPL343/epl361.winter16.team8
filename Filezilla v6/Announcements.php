<!DOCTYPE html>
<html lang="en">
	<head>
		<title>La Galerie | Announcements</title>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--link rel="stylesheet" href="css/w3.css">
		<!--	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"> -->
		<!--GRAMMATOSIRA-->
		<link href="css/modal.css" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<style>
			.w3-sidenav a {
				font-family: "Roboto", sans-serif
			}
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
	<body class="w3-content">
		<script src="js/login.js"></script>
		<div id="coverround" style="position:relative;z-index:100;">
			<a href="laGalerie.php"><img id="cover" class="img-responsive" alt="cover" src="pictures/cover.jpg"
			height="100%" width="100%"></a>
		</div>

		<?php
			require("navbar.php");
		?>
		<script>
			function extraScroll(a) {
				document.getElementById(a).scrollIntoView();
				window.scrollBy(0, -100);
			}


			window.onscroll = function() {
				var x = document.getElementById("cover").height;
				var y = document.getElementById("mainnav").height;
				y = 2 * y;
				if (document.body.scrollTop > x || document.documentElement.scrollTop > x) {
					document.getElementById("coverround").style = "padding-bottom:150px";
					document.getElementById("mainnav").className = "navbar navbar-fixed-top";
					document.getElementById("dates").style = "background:rgb(210, 210, 210); border:1px solid rgb(210, 210, 210); padding-left: 40px; position:fixed;";

				} else {
					document.getElementById("coverround").style = "padding-bottom:0px;position:relative;z-index:100";
					document.getElementById("mainnav").className = "navbar navbar-default";
					document.getElementById("mainnav").style = "z-index:100;";
					document.getElementById("dates").style = "background:rgb(210, 210, 210); border:1px solid rgb(210, 210, 210); padding-left: 40px; position:fixed;";
				}
			};
		</script>
<div class="container" id = "container1" name = "container1"
				<div class="row row-offcanvas row-offcanvas-right">
					<div class="col-xs-12 col-xs-12" >
						<div class="jumbotron" align="left">
							<div class="row">
	<p class="lead" style="font-size: 40px; text-align:center; ">Announcements</p>
					<hr>
		<div>

			<div class="blog-post">
				<!--h2 id="2016" style="color:white;"><b>2016</b></h2>
				<hr-->

				<?php
				require ("put_Announcements.php");
				?>
			</div>
		</div>
		<!-- FOOTER -->
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
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
