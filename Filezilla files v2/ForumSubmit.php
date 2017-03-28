<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">

			<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
			Remove this if you use the .htaccess -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<title>La Galerie | Forum Submit</title>

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
					margin-left: 10px;
					margin-right: 10px;
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
			<div>
				<h1 style="text-align:center;"><p class="lead" style="font-size: 40px; text-align:center; color:white; ">Submit your comments</p></h1>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="well well-sm">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Name:</label>
									<div class="col-md-9">
										<input id="name" name="name" type="text" placeholder="Your name" class="form-control">
									</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Your E-mail:</label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control">
									</div>
								</div>

								<!-- Header input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Post Title:</label>
									<div class="col-md-9">
										<input id="PostTitle" name="PostTitle" type="text" placeholder="Insert Post Title" class="form-control">
									</div>
								</div>

								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Your message:</label>
									<div class="col-md-9">
										<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="10"></textarea>
									</div>
								</div>

								<!-- Post Button -->
								<div class="form-group">
									<div class="col-md-12 text-right">
										<button type="submit" class="btn btn-primary btn-lg">
											Post to forum
										</button>
										
										<a class="btn btn-primary btn-lg" type="submit" href="Forum.php">Return to Discussions</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

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
