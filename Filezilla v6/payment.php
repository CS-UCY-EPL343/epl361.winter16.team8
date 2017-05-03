<?php session_start(); 
	if ($_SESSION['islogin']==false){
		echo "<script>window.location = \"laGalerie.php\" ;</script>";
	}
	require_once ("database.php");
	$sql = "SELECT * FROM CART WHERE EMAIL = \"".$_SESSION['email']."\"";
	$query = mysqli_query($conn, $sql);
	if ($query->num_rows==0){
		echo "<script>window.location = \"cart.php\" ;</script>";
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>LaGalerie | Checkout</title>
		<meta name="description" content="">
		<meta name="author" content="gpapan">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
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
		<script src="js/login.js"></script>

		<div id="coverround" style="padding-bottom:0px">
			<a href="laGalerie.html"><img id="cover" class="img-responsive" alt="cover" src="pictures/cover.jpg"
			height="100%" width="100%"></a>
		</div>

		<?php
		require ("navbar.php");
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

		<!----------------------------------------------------------------------------------------------------------->
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12">
									<h1> Checkout</h1>
									<hr>
									<br>
									<div id="mainContent" tabindex="-1" role="main" class="row">
										<div class="left-section col-xs-6">
											<div id="alert-page" class="xo-alert skin-large" aria-live="polite"></div>
											<div id="payment-methods-ctr" class="top-lvl-module" data-module-id="4065">
												<h2 class="section-title">Pay with</h2>
												<hr>
												<div class="pmt-mthds module">
													<fieldset>
														<br>
														<div class="pmt-mthd" data-pmt-id="PAYPAL" data-action-type="expandWallet" data-selected-pmt="true" data-incentive-dialog-id="incentive-dialog-data" data-click-id="7302">
															<div class="pmt-mthd-l v-align2col pointer">
																<div class="rdo-col-l v-align2col">
																	<input name="pmtMthd" id="PAYPAL" data-first-clickable="true" aria-label="Opens PayPal login window Select a payment option" type="radio" disabled>
																	<label class="pmt-label" for="PAYPAL" style = "color:red"><span class="cc-icon mr8"></span>Log in to PayPal *(Not available yet)</label>
																</div>
															</div>
														</div>
														<div class="pmt-mthd selected" data-pmt-id="CC" data-action-type="expandWallet" data-selected-pmt="true" data-incentive-dialog-id="incentive-dialog-data" data-click-id="7302">
															<div class="pmt-mthd-l v-align2col pointer">
																<div class="rdo-col-l v-align2col">
																	<input name="pmtMthd" id="CC" data-first-clickable="true" aria-label="JCC Select a payment option" type="radio" disabled>
																	<label class="pmt-label" for="CC" style = "color:red"><span class="cc-icon mr8"></span>Log in to JCC *(Not available yet)</label>
																</div>
															</div>
														</div>
														<div class="pmt-mthd selected" data-pmt-id="del" data-action-type="expandWallet" data-selected-pmt="true" data-incentive-dialog-id="incentive-dialog-data" data-click-id="7302">
															<div class="pmt-mthd-l v-align2col pointer">
																<div class="rdo-col-l v-align2col">
																	<input name="pmtMthd" id="del" data-first-clickable="true" aria-label="JCC Select a payment option" checked="checked" type="radio">
																	<label class="pmt-label" for="del"><span class="cc-icon mr8"></span>Payment upon delivery</label>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="right-rail col-xs-6 right-rail-toppadding">
											<div class="right-rail-content" style="position: relative; top: 0px;">
												<div id="cart-summary-ctr" data-module-id="4067" data-disabled-cta-msg="{&quot;ADD_ADDRESS&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;Enter your postage details and select Add&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;},&quot;ADD_CARD&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;Enter your card details and select Done. You can review these details before completing checkout.&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;},&quot;COMPLETE_ADDRESS_DETAILS&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;To finalise your postage details, select Add&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;},&quot;COMPLETE_CARD_DETAILS&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;To finalise your card details, select Done. You can review the information before completing checkout.&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;},&quot;ADD_BIRTHDATE&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;Enter your date of birth and select Done&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;},&quot;PAYPAL_VALIDATION&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;Log in to PayPal to use voucher codes&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;},&quot;NO_PAYMENT_METHOD&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;Select a payment option&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;},&quot;EDIT_CARD&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;Enter your card details and select Done. You can review these details before completing checkout.&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;},&quot;EDIT_ADDRESS&quot;:{&quot;model&quot;:{&quot;errors&quot;:[{&quot;severity&quot;:&quot;ERROR&quot;,&quot;title&quot;:&quot;To finalise your postage details, select Save&quot;,&quot;htmlTitle&quot;:false,&quot;id&quot;:0}]},&quot;className&quot;:&quot;page-alert--high&quot;,&quot;ariaLabel&quot;:&quot;High Priority&quot;}}">
													<h2 class="section-title access-aid">Cart Summary</h2>
													<hr>
													<div id="cart-details" class="row"></div>
													<div class="cart-order" align="center">
														<head>
															<style>
																table, th, td {
																	border-collapse: collapse;
																	text-align: left;
																	background-color: #f1f1c1;
																	tr: nth-child(even)   {
																	background-color: #dddddd;
																}
															</style>
														</head>
														<body>
															<?php
															require_once ('addPayment.php');
															?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<form action="addHistory.php">
										<button type="submit" id="cta-btn" class="btn btn--primary xo-btn" data-click-id="7707" data-disabled-click-id="8104" data-disabled="false">
											Confirm
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

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
		<script src="js/register.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>