<?php session_start();
	if ($_SESSION['islogin']==true){
		echo "<script>window.location = \"laGalerie.php\" ;</script>";
	}
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<title>La Galerie | Sign up/Login</title>

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
		<!--script src="js/login.js"></script-->

		<script>
			window.fbAsyncInit = function() {
				FB.init({
					appId : '201980533584656',
					xfbml : true,
					version : 'v2.8'
				});
			}; ( function(d, s, id) {
					var js,
					    fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) {
						return;
					}
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_US/sdk.js";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
		</script>

		<div id="fb-root"></div>
		<script>
			( function(d, s, id) {
					var js,
					    fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id))
						return;
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=201980533584656";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
		</script>
		<div id="coverround" style="padding-bottom:0px">
			<a href="laGalerie.php"><img id="cover" class="img-responsive" alt="cover" src="pictures/cover.jpg"
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

		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-4">
									<a href="#" class="active" id="login-form-link">Login</a>
								</div>
								<div class="col-xs-4">
									<a href="#" id="register-form-link">Register</a>
								</div>
								<div class="col-xs-4">
									<a href="#" id="registerfb-form-link">Register with Facebook</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="login-form" action="register.php" method="post" role="form" style="display: block;">
										<div class="form-group">
											<input type="email" name="Email_Address" id="email_address" tabindex="1" class="form-control" placeholder="Email Address" required>
										</div>
										<div class="form-group">
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" id="login-submit" name="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="text-center">
														<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
													</div>
												</div>
											</div>
										</div>
									</form>
									<form id="register-form" action="register.php" method="post" role="form" style="display: none;">
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Name &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="text" name="Name" id="Name" tabindex="1" class="form-control" placeholder="Name" value="" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Surname &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="text" name="Surname" id="Surname" tabindex="2" class="form-control" placeholder="Surname" value="" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Date of Birth &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<table>
												<tr>
													<td><select id="Year_of_birth" name="Year_of_birth" class="form-control" onchange="dayControl()" required>
														<?php
														echo '<option value="" placeholder="YYYY">(YEAR)</option>';
														$y = date('Y');
														for ($i = $y; $i >= 1930; $i--) {
															echo "<option value='$i'>$i</option>";
														}
														?>
													</select></td>
													<td><select id="Month_of_birth" name="Month_of_birth" class="form-control" onchange="dayControl()" required>
														<?php
														echo '<option value="" placeholder="MM">(MONTH)</option>';
														echo "<option value='1'>January</option>
																<option value='2'>February</option>
																<option value='3'>March</option>
																<option value='4'>April</option>
																<option value='5'>May</option>
																<option value='6'>June</option>
																<option value='7'>July</option>
																<option value='8'>August</option>
																<option value='9'>September</option>
																<option value='10'>October</option>
																<option value='11'>November</option>
																<option value='12'>December</option>";
														?>
													</select></td>
													<td><select id="Day_of_birth" name="Day_of_birth" class="form-control" required>
														<?php
														echo '<option value="">(DAY)</option>';
														for ($i = 1; $i < 32; $i++) {
															echo "<option value='$i'>$i</option>";
														}
														?>
													</select></td>
												</tr>
											</table>
											<script>
												function dayControl() {
													var month = document.getElementById("Month_of_birth").value;
													if (month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12) {
														var day="";
														day+='<option value="">(DAY)</option>';
														var i=0;
														for (i=1;i<=31;i++){
															day+='<option value="'+i+'">'+i+'</option>';
														}
														document.getElementById("Day_of_birth").innerHTML=day;
													}
													else if (month == 4 || month == 6 || month == 9 || month == 11) {
														var day="";
														day+='<option value="">(DAY)</option>';
														var i=0;
														for (i=1;i<=30;i++){
															day+='<option value="'+i+'">'+i+'</option>';
														}
														document.getElementById("Day_of_birth").innerHTML=day;
													}
													else if (month == 2) {
														var d=28;
														var y = document.getElementById("Year_of_birth").value;
														if (y%4==0 && y%100!=0){
															d++;
														}
														var day="";
														day+='<option value="">(DAY)</option>';
														var i=0;
														for (i=1;i<=d;i++){
															day+='<option value="'+i+'">'+i+'</option>';
														}
														document.getElementById("Day_of_birth").innerHTML=day;
													}
												}
											</script>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="name"> Sex &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<select id="SEX" name="SEX" class="form-control" required>
												<option value=""></option>
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Address &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="text" name="Address" id="Address" tabindex="4" class="form-control" placeholder="Address" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Country &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="text" name="Country" id="Country" tabindex="5" class="form-control" placeholder="Country" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> City &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="text" name="City" id="City" tabindex="5" class="form-control" placeholder="City" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Postal Code &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="number" name="Postal_Code" id="Postal_Code" tabindex="6" class="form-control" placeholder="Postal Code" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Mobile Number &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="number" name="Mobile_Number" id="Mobile_Number" tabindex="7" class="form-control" placeholder="Mobile Number" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Email address &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="email" name="email" id="email" tabindex="8" class="form-control" placeholder="Email Address" value="" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Password &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="password" name="password" id="password" tabindex="9" class="form-control" placeholder="Password" required>
										</div>
										<div class="form-group">
											<label class="col-md-12 control-label" for="name"> Confirm password &nbsp;<p style = "float:left;color:red;font-size:15px"> * &nbsp;</p></label>
											<input type="password" name="confirm_password" id="confirm_password" tabindex="10" class="form-control" placeholder="Confirm Password" required>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="register-submit" id="register-submit" tabindex="11" class="form-control btn btn-register" value="Register Now">
												</div>
											</div>
										</div>
									</form>
									<!--?php
									function registered() {
									$name = document . getElementById("Name") . value;
									$surname = document . getElementById("Surname") . value;
									$dob = document . getElementById("Date of birth") . value;
									$sex = document . getElementById("SEX") . value;
									$address = document . getElementById("Address") . value;
									$city = document . getElementById("City") . value;
									$pc = document . getElementById("Postal Code") . value;
									$mp = document . getElementById("Mobile Number") . value;
									$email = document . getElementById("email") . value;
									$password = document . getElementById("password") . value;
									if ($sex == "Male") {
									$sex = 'M';
									} else {
									$sex = 'F';
									}
									//alert('Your information are:\n\n' + 'Name: ' + name + '\nSurname: ' + surname + "\nDate of Birth: " + dob + '\nSex: ' + sex + '\nAddress: ' + address + '\nCity: ' + city + '\nPostal Code: ' + pc + '\nMobile Number: ' + mp + '\nEmail: ' + email + '\n\nDatabase not yet integrated to save these values!');
									$dobtable = explode('-', $dob);
									if (check_customer($email, $name, $surname, $dobtable[0], $dobtable[1], $dobtable[2], $sex, $address, $city, $pc, $mp, $password)) {
									$sql = "INSERT INTO customer (EMAIL,NAME,SURNAME,PASSWORD,DOB,SEX,ADDRESS,CITY,POSTAL_CODE,MOBILE,ISVIP)
									VALUES (" . $email . "," . $name . "," . $surname . "," . $password . ",date('" . $dobtable[0] . "-" . $dobtable[1] . "-" . $dobtable[2] . "')," . $sex . "," . $address . "," . $city . "," . $pc . "," . $mp . ",false)";

									if (mysqli_query($conn, $sql)) {
									echo "added succesfully!";
									} else {
									echo("ERROR: " . $sql . " " . mysqli_error($conn));
									}
									}
									}
									?-->
									<form id="registerfb-form" method="post" role="form" style="display: none;">

										<script>
											// This is called with the results from from FB.getLoginStatus().
											function statusChangeCallback(response) {
												console.log('statusChangeCallback');
												console.log(response);
												// The response object is returned with a status field that lets the
												// app know the current login status of the person.
												// Full docs on the response object can be found in the documentation
												// for FB.getLoginStatus().
												if (response.status === 'connected') {
													// Logged into your app and Facebook.
													testAPI();
												} else if (response.status === 'not_authorized') {
													// The person is logged into Facebook, but not your app.
													document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
												} else {
													// The person is not logged into Facebook, so we're not sure if
													// they are logged into this app or not.
													document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
												}
											}

											// This function is called when someone finishes with the Login
											// Button.  See the onlogin handler attached to it in the sample
											// code below.
											function checkLoginState() {
												FB.getLoginStatus(function(response) {
													statusChangeCallback(response);
												});
											}


											window.fbAsyncInit = function() {
												FB.init({
													appId : '201980533584656',
													cookie : true, // enable cookies to allow the server to access
													// the session
													xfbml : true, // parse social plugins on this page
													version : 'v2.8' // use graph api version 2.8
												});

												// Now that we've initialized the JavaScript SDK, we call
												// FB.getLoginStatus().  This function gets the state of the
												// person visiting this page and can return one of three states to
												// the callback you provide.  They can be:
												//
												// 1. Logged into your app ('connected')
												// 2. Logged into Facebook, but not your app ('not_authorized')
												// 3. Not logged into Facebook and can't tell if they are logged into
												//    your app or not.
												//
												// These three cases are handled in the callback function.

												FB.getLoginStatus(function(response) {
													statusChangeCallback(response);
												});

											};

											// Load the SDK asynchronously
											( function(d, s, id) {
													var js,
													    fjs = d.getElementsByTagName(s)[0];
													if (d.getElementById(id))
														return;
													js = d.createElement(s);
													js.id = id;
													js.src = "//connect.facebook.net/en_US/sdk.js";
													fjs.parentNode.insertBefore(js, fjs);
												}(document, 'script', 'facebook-jssdk'));

											// Here we run a very simple test of the Graph API after login is
											// successful.  See statusChangeCallback() for when this call is made.
											function testAPI() {
												console.log('Welcome!  Fetching your information.... ');
												FB.api('/me', function(response) {
													console.log('Successful login for: ' + response.name);
													document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
												});
											}
										</script>

										<!--
										Below we include the Login Button social plugin. This button uses
										the JavaScript SDK to present a graphical Login button that triggers
										the FB.login() function when clicked.
										-->
										<div align = "center">
											<button onclick="createPopup()" class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></button>
											<script>
												function createPopup() {
													alert('Hello');
												}
											</script>

											<a href="javascript:createPopup();"><img src="pictures/facebook-login-blue.png" class="img-responsive" /></a>

											<!--script>
											function error() {
											alert('Facebook not yet integrated in our website!');
											window.location.href = "laGalerie.php";
											}
											</script-->

										</div>
										<div id="status"></div>

										<!--FB LIKE AND SHARE
										<!--div
										class="fb-like"
										data-share="true"
										data-width="450"
										data-show-faces="true"></div-->
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

		<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/register.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
