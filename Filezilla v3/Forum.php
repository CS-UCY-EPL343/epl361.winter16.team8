<?php session_start() ?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">

			<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
			Remove this if you use the .htaccess -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<title>La Galerie | Forum</title>
			<meta name="description" content="">
			<meta name="viewport" content="width=device-width; initial-scale=1.0">
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
					background-repeat: repeat-y;
					background-size: 100% 100%;
					background-attachment: fixed;
					margin-left:10px;
					margin-right:10px;
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
		
			<p class="lead" style="font-size: 40px; text-align:center; color:white; "> Forums </p>

			<!--- TESTING --->
			<div role="main" id="yui_3_17_2_1_1479409776212_118">
				<span id="maincontent"></span><h2 id="yui_3_17_2_1_1479409776212_117"><p class="lead" style="font-size: 30px; text-align:center; color:white; ">News forum</p></h2>
				<div id="intro" class="box generalbox">
					<div class="no-overflow">
						<i><p class="lead" style="font-size: 20px; text-align:center; color:white; ">General news and announcements</p></i>
					</div>
				</div>

				<table cellspacing="0" class="forumheaderlist">
					<thead>
						<tr>
							<th class="header discussionsubscription" scope="col"><span class="preload-subscribe">&nbsp;</span><span class="preload-unsubscribe">&nbsp;</span></th>
						</tr>
					</thead>
					<tbody>
						<?php
							require("putForums.php");
						?>
					</tbody>
				</table>
				<div class="paging"></div>
			</div>


			<br><br><br><br><br><br><br><br>
			<!-- FOOTER -->
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
			<script src="js/bootstrap-select.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</body>
	</html>
