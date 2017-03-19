<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">

			<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
			Remove this if you use the .htaccess -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<title>La Galerie | Forum Services</title>
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

			<?php
				$cat = $_GET['id'];

				require_once ("database.php");
				$db = new Database();
				
				$sql = "SELECT * FROM FORUM_COMMENTS WHERE FORUM_ID = ". $cat ." AND APPROVED = 1";
				$sql1 = mysqli_query($conn, $sql);
				$rowcount = $sql1 -> num_rows;
				
				
				$sql4 = "SELECT * FROM FORUM WHERE FORUM_ID = ". $cat ."";
				$sql5 = mysqli_query($conn, $sql4);
				$row3 = mysqli_fetch_array($sql5, MYSQL_ASSOC);
				
				echo '
					<p class="lead" style="font-size: 40px; text-align:center; color:white; ">'. $row3['TITLE'] .'</p>
					<hr>
				
					<div style="display:block;text-align:left">
						<h2><span style="color:rgb(255,255,255)">Members</span></h2>
				
						<br>
						<div id="divActivites" name="divActivites" style="border:thin">
				
					';
				
				$count = 0;
						
				while ($count < $rowcount){
							
					$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
					
					$sql2 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"".$row['EMAIL']."\"";
					
					$sql3 = mysqli_query($conn, $sql2);
					$row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);
					
					$loopResult = '
						<div style="display:inline-block;vertical-align:top;color:rgb(255,255,255)"> <img align="left" src="pictures/pareas1.png" border="0" width="100" height= "110"> </a>  '. $row2['NAME'] .'   '. $row2['SURNAME'] .'
						';
					$loopRes = '
						<p style="border:5px; border-style:double; border-color:rgb(226,191,95); padding: 1em; color: white;width: 50%">'. $row['COMMENT'] .'</p>
						<br><br>
						';
							
					echo $loopResult;
					$vip = $row2['ISVIP'];
					
					if ($vip == "1"){
						$mem = '
								<br>
								VIP Member
								</div>
								<br><br>
						';
					}
					else{
						$mem = '
								<br>
								Member
								</div>
								<br><br>
						';
					}
					echo $mem;
					echo $loopRes;
					$count = $count + 1;
				}
			?>

			<br><br><br><br><br>
			<!-- Submit/Return Buttons-->
			<div class="form-group">
				<div class="col-md-12 text-center">
					<a class="btn btn-primary btn-lg" type="submit" href="ForumSubmit.php">Submit New Post</a>
					<a class="btn btn-primary btn-lg" type="submit" href="Forum.php">Return to Discussions</a>
				</div>
			</div>
			<br><br> <br><br>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		</body>
	</html>
