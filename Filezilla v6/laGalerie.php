<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>La Galerie | Welcome</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
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
		<style>
		hr {
    		display: block;
    		height: 1px;
    		border: 0;
    		border-top: 1px solid #000;
    		margin: 1em 0;
    		padding: 0; 
		}
	</style>

	</head>
	<body>
		<!--script src="js/login.js"></script-->
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

		<!-- Marketing messaging and featurettes
		================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container" id = "container1" name = "container1"
				<div class="row row-offcanvas row-offcanvas-right">
					<div class="col-xs-12 col-xs-12" >
						<div class="jumbotron" align="left">
							<div class="row">
		<div class="container marketing">

			<!-- START THE FEATURETTES -->

			<div class="row featurette">
				<div class="col-md-7">
					<h2 class="featurette-heading" > About us and our patisserie.</h2>
					<p class="lead" style="font-size: 16px; text-align: justify ">
						<i> Sweets are a favorite treat not only for children but also for adults. <strong>La Galerie by Galactica Patisserie</strong> offers its guests an endless variety of the most delicious and exclusive cakes, cupcakes and exquisite fluffy macarons.
						At any time, you can taste and buy these masterpieces of pastry which will please anyone, even the most demanding tastes.
						The unique cupcakes are decorated with delicious caps of light cream or frosting and these exclusive recipes are created by using the latest technology.
						Cupcakes gained popularity in the United States at the beginning of the 19th century. The bright, juicy and incredibly tasty and stylish cupcakes from La Galerie by Galactica Patisserie are the ones that no one can resist.
						The pastry shop can make customized cupcakes with baby figurines, flowers, company logo, etc.
						Especially popular among customers are the macarons (famous French pastry made of egg whites, powdered sugar and crushed almonds). Macarons consist of two halves and the filling of cream or jam between them. This original and easy dessert already managed to conquer the hearts of sweets around the world. A variety of tastes and design and their small size make this dessert popular in many banquets.
						Galerie by Galactica Patisserie has also achieved great success in the manufacture of exclusive wedding cakes in Cyprus.</i>
					</p>
					<hr>
					<h3 class="featurette-heading">What attracts customers to our Patisserie?</h3>
					<p class="lead" style="font-size: 16px; text-align: justify" >
						<i> Of course, the main factor is the quality of products. All cakes and pastries are hand-made by an experienced team of confectioners. Each of the employees of the company thoroughly performs the work entrusted to them, creating a new masterpiece.
						When making wedding cakes, the client is involved in all the steps of the creation and of the main wedding table decorations; the final stage is free tasting and the final changes.</i>
					</p>
				</div>
				<div class="col-md-5">
					<img class="featurette-image img-responsive center-block" src = "pictures/store.jpg"
					data-src="holder.js/500x500/auto" alt="Generic placeholder image">
				</div>
			</div>

			<hr class="featurette-divider">

			<!-- /END THE FEATURETTES -->
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

		
		<!-- /.container -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
