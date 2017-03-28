<?php session_start() ?>
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
				
				//----------------------------------------------------------
	$email = $_SESSION['email'];
	//echo $email;
	$sql12 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $email ."\"";
	$sql21 = mysqli_query($conn, $sql12);
	$rowAd = mysqli_fetch_array($sql21, MYSQL_ASSOC);
	
$IsAdmin =$rowAd['ISADMIN'];
	
//echo $rowAd['ISADMIN'];
/*
if ( $rowAd['ISADMIN']==1){
$loopResult1 = '		
	<p>
	<button type="button" id= "myBtn" class="btn btn-primary btn-lg btn-block" data-target="#myModal">Add Forum &raquo;</button>

		<div id ="myModal" class="modal">
			<div class="modal-content">
				<h2 align="center"><strong>Sumbit Forum</strong></h2>
				<div class = "row">
					<div  class="col-xs-12">
					<div class="form-group">
						<label class="col-md-3 control-label" for="email">Post Title:</label>
						<div class="col-md-9">
							<input id="PostTitle" name="PostTitle" type="text" placeholder="Insert Post Title" class="form-control">
						</div>
						
					<!-- Message body -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Description:</label>
						<div class="col-md-9">
							<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="10"></textarea>
						</div>
					</div>
					
					
						
					<div class="form-group">
						<form action="FileUploader.php" method="post" enctype="multipart/form-data">	
						<label class="col-md-3 control-label" for="message">Select image to upload:</label>
						<div class="col-md-9">
							<input type="file" name="fileToUpload" id="fileToUpload">
						</div>	
					<!-- Post Button -->
					<div class="form-group">
						<div class="col-md-9 text-right">
							<button type="submit" name = "submit" class="btn btn-primary btn-lg">
								Post to Forum
							</button>
							<a class="btn btn-primary btn-lg" type="submit" href="Forum.php">Cancel</a>
							</form>
					</div>
							
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</p>
	';
		
	echo $loopResult1;
		
	echo '<script>
	// Get the modal
	var modalAdd = document.getElementById("myModal");

	// Get the button that opens the modal
	var btnAdd = document.getElementById("myBtn");


	// Get the <span> element that closes the modal
	var spanAdd = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btnAdd.onclick = function() {
		modalAdd.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modalAdd.style.display = "none";
	}

 </script>';
	
}
*/				
				
				//-------------------------------------
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
