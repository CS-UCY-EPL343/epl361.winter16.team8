<?php session_start(); ?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<title>La Galerie | Notifications</title>

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">		
        <link href="css/signin.css" rel="stylesheet">
		<link href="css/signup.css" rel="stylesheet">

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

        <div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-2">
									<a href="#" class="active" id="admin-form-link">Admins</a>
								</div>
								<div class="col-xs-2">
									<a href="#" id="comments-form-link">Pending Comments</a>
								</div>
								<div class="col-xs-2">
									<a href="#" id="users-form-link">Users</a>
								</div>
                                <div class="col-xs-2">
									<a href="#" id="vipusers-form-link">VIP Users</a>
								</div>
                                <div class="col-xs-2">
									<a href="#" id="contact-form-link">Contacted Us</a>
								</div>
                                <div class="col-xs-2">
									<a href="#" id="orders-form-link">Pending Orders</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="admin-form" role="form" style="display: block;">
										<?php
                                            require("bringAdmins.php");
                                        ?>
									</form>
									<form id="comments-form" role="form" style="display: none;">
										<?php
                                            require("bringComments.php");
                                        ?>
									</form>
									<form id="users-form" role="form" style="display: none;">
                                        <?php
                                            require("bringUsers.php");
                                        ?>
									</form>
                                    <form id="vipusers-form" role="form" style="display: none;">
                                         <?php
                                            require("bringVIP.php");
                                        ?>
									</form>
                                    <form id="contact-form" role="form" style="display: none;">
                                        
									</form>
                                    <form id="orders-form" role="form" style="display: none;">
                                        
									</form>
								</div>
							</div>
						</div>
					</div>
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
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/notifications.js"></script>
    
    </body>
</html>