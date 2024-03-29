<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>La Galerie | Personal Information</title>
		<meta name="description" content="">
		<meta name="author" content="User">

		<meta name="viewport" content="width=device-width initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link href="css/signin.css" rel="stylesheet">
		<link href="css/signup.css" rel="stylesheet">
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
			}
		</style>
	</head>

	<body onload="isLogin()">
		<script src="js/login.js"></script>
		<div id="coverround" style="padding-bottom:0px">
			<a href="laGalerie.php"><img id="cover" class="img-responsive" alt="cover" src="pictures/cover.jpg"
			height="100%" width="100%"></a>
		</div>
		<div id="mainnav" class="navbar navbar-default">
			<div class="container-fluid">

				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#myNavbar">
								<span class="icon-bar"></span><span class="icon-bar"></span><span
								class="icon-bar"></span>
							</button>
							<a href="laGalerie.php"> <img class="img-rounded" alt="logo"
							src="pictures/logo.jpg" width="100" height="100"> </a>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav">
								<li>
									<a href="Announcements.php">Announcements </a>
								</li>

								<li class="dropdown">
									<a class="dropdown-toggle"
									data-toggle="dropdown" href="Categories.php">Categories <span
									class="caret"></span></a>
									<ul class="dropdown-menu">
										<li>
											<a href="birthdaycake.php">Birthday Cakes</a>
										</li>
										<li>
											<a href="weddingCakes.php">Wedding Cakes</a>
										</li>
										<li>
											<a href="christeningCakes.php">Christening Cakes</a>
										</li>
										<li>
											<a href="#">...</a>
										</li>
									</ul>
								</li>

								<li>
									<a href="videos.php">Videos <span
									class="glyphicon glyphicon-film"></span></a>
								</li>
								<li>
									<a href="Forum.php">Forum <span
									class="glyphicon glyphicon-pencil"></span></a>
								</li>

								<li>
									<a href="cityCenter.php">Find a Store <span
									class="glyphicon glyphicon-globe"></span></a>
								</li>

								<li>
									<a href="ContactUs.php"> Contact Us <span
									class="glyphicon glyphicon-phone-alt"></span></a>
								</li>

							</ul>

							<div id="signup" class="nav navbar-nav navbar-right btn-group-vertical" role="group">

								<li align="right">
									<a href="SignUp.php"> Sign Up/Login <span
									class="glyphicon glyphicon-user"></span></a>

									<form class="navbar-form navbar-right btn-group-vertical" role="group">
										<div class="form-group">
											<input type="text" class="form-control"
											placeholder="Search...">
										</div>
										<a href="Search"><span class="glyphicon glyphicon-search"></span></a>
									</form>
								</li>

							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>

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

		<!----------------------------------------------------------------------------------------------------------->
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12">
									<h4> Personal Information </h4>
									<hr>
									<br>
									<table style="width:100%">
										<tr id="a">
										<?php require_once("js/Inform.php") ?>
										<!--	<th>Firstname</th> -->
										<td>Name</td>
										<td id ="x" style="color: #888888";>Name</td>
										<td>
										<button type="button" onclick="isInform()">
											Edit
										</button></td>
										</tr>
										<tr id="b">
											<td>Surname</td>
											<td id="xx" style="color: #888888";>Surname</td>
											<td>
											<button type="button" onclick="Surname()">
												Edit
											</button></td>
										</tr>
										<tr id="c">
											<td>Date of birth</td>
											<td id ="xxx" style="color: #888888";>Date of birth</td>
											<td>
											<button type="button" onclick="Dod()">
												Edit
											</button></td>
										</tr>
										<tr id="d">
											<td>Sex</td>
											<td  id ="ab" style="color: #888888";>Male</td>
											<td>
											<button type="button" onclick="Sex()">
												Edit
											</button></td>
										</tr>
										<tr id="e">
											<td>Address</td>
											<td id ="ba" style="color: #888888";>Address</td>
											<td>
											<button type="button" onclick="Address()">
												Edit
											</button></td>
										</tr>
										<tr id="f">
											<td>City</td>
											<td id="bb" style="color: #888888";>City</td>
											<td>
											<button type="button" onclick="City()">
												Edit
											</button></td>
										</tr>
										<tr id="g">
											<td>Postal Code</td>
											<td id="bc" style="color: #888888";>Postal Code</td>
											<td>
											<button type="button" onclick="Code()">
												Edit
											</button></td>
										</tr>
										<tr id="h">
											<td>Mobile Number</td>
											<td id="cc" style="color: #888888";>+357</td>
											<td>
											<button type="button" onclick="Number()">
												Edit
											</button></td>
										</tr>
										<tr id="i">
											<td>email</td>
											<td id= "cd" style="color: #888888";>email</td>
											<td>
											<button type="button" onclick="Email()">
												Edit
											</button></td>
										</tr>
										<tr id="j">
											<td>password</td>
											<td id= "dd" style="color: #888888";>************</td>
											<td>
											<button type="button" onclick="Password()">
												Edit
											</button></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
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
		</div>
		<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/register.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>
