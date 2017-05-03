<?php session_start() ?>
	<html lang="en">
		<head>
			<meta charset="utf-8">

			<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
			Remove this if you use the .htaccess -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<title>La Galerie | Forum Services</title>
			<meta name="viewport" content="width=device-width; initial-scale=1.0">
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
					background-repeat: repeat-y;
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
<div class="container" id = "container1" name = "container1"
				<div class="row row-offcanvas row-offcanvas-right">
					<div class="col-xs-12 col-xs-12" >
						<div class="jumbotron" align="left">
							<div class="row">
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
	

				
				//-------------------------------------
				echo '
					<p class="lead" style="font-size: 40px; text-align:center; ">'. $row3['TITLE'] .'</p>
					<hr>
				
					<div style="display:block;text-align:left">
						<h2><span >Members</span></h2>
						<hr>
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
						<div style="display:inline-block;vertical-align:top;"> <img align="left" src="pictures/pareas1.png" border="0" width="100" height= "110"> </a>  '. $row2['NAME'] .'   '. $row2['SURNAME'] .'
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

					if ($IsAdmin == 1){
						if ($_SESSION['email'] == $row['EMAIL']){
							$loopRes = '
							<a class="btn btn-lg btn-primary" style="background-color:red;float:right" href="deleteCommForum.php?comm='.$row['COMMENT_ID'].'" role="button"> Delete &#9747</a>
							<button type="button" id= "myBtn'.$row['COMMENT_ID'].'" class="btn btn-lg btn-primary" style="background-color:green;float:right" data-target="#myModal">Edit </button>
					 <div id ="myModal'.$row['COMMENT_ID'].'" class="modal">	
			<div class="modal-content">
				<h2 align="center"><strong>Edit comment</strong></h2>
				<form action="renewComm.php" method="post" id = "submit_category"  name = "submit_category" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<div class="col-md-9">
									<input id="com_id" name="com_id" type="hidden" class="form-control" value = "'.$row['COMMENT_ID'].'">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="comment">Comment:</label>
								<div class="col-md-9">
									<input id="comment" name="comment" type="text" placeholder="'. $row['COMMENT'] .'" class="form-control">
								</div>
							</div>
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit-category" class="btn btn-primary btn-lg">
										Update comment
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="showForum.php?id='.$row['FORUM_ID'].'">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
								<p style="border:5px; border-style:double; border-color:rgb(226,191,95); padding: 1em;width: 60%; font-size:13px">'. $row['COMMENT'] .'
								
								</p>
								<br><br>
							';
							echo $loopRes;
							echo '<script>
	// Get the modal
	var modalAdd'.$row['COMMENT_ID'].' = document.getElementById("myModal'.$row['COMMENT_ID'].'");

	// Get the button that opens the modal
	var btnAdd'.$row['COMMENT_ID'].' = document.getElementById("myBtn'.$row['COMMENT_ID'].'");


	// Get the <span> element that closes the modal
	var spanAdd'.$row['COMMENT_ID'].' = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btnAdd'.$row['COMMENT_ID'].'.onclick = function() {
		modalAdd'.$row['COMMENT_ID'].'.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modalAdd'.$row['COMMENT_ID'].'.style.display = "none";
	}

 </script>';
						}
						else{
							$loopRes11 = '
							<a class="btn btn-lg btn-primary" style="background-color:red;float:right" href="deleteCommForum.php?comm='.$row['COMMENT_ID'].'" role="button"> Delete &#9747</a>
							<p style="border:5px; border-style:double; border-color:rgb(226,191,95); padding: 1em;width: 60%; font-size:13px">'. $row['COMMENT'] .'
							</p>
							<br><br>
						';
						echo $loopRes11;
						}

					}
					else{
						if ($_SESSION['email'] == $row['EMAIL']){
							$loopRes = '
							<button type="button" id= "myBtn'.$row['COMMENT_ID'].'" class="btn btn-lg btn-primary" style="background-color:green;float:right" data-target="#myModal">Edit </button>
					 <div id ="myModal'.$row['COMMENT_ID'].'" class="modal">	
			<div class="modal-content">
				<h2 align="center"><strong>Edit comment</strong></h2>
				<form action="renewComm.php" method="post" id = "submit_category"  name = "submit_category" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<div class="col-md-9">
									<input id="com_id" name="com_id" type="hidden" class="form-control" value = "'.$row['COMMENT_ID'].'">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="comment">Comment:</label>
								<div class="col-md-9">
									<input id="comment" name="comment" type="text" placeholder="'. $row['COMMENT'] .'" class="form-control">
								</div>
							</div>
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit-category" class="btn btn-primary btn-lg">
										Update comment
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="showForum.php?id='.$row['FORUM_ID'].'">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
								<p style="border:5px; border-style:double; border-color:rgb(226,191,95); padding: 1em;width: 60%; font-size:13px">'. $row['COMMENT'] .'
								
								</p>
								<br><br>
							';
							echo $loopRes;
							echo '<script>
	// Get the modal
	var modalAdd'.$row['COMMENT_ID'].' = document.getElementById("myModal'.$row['COMMENT_ID'].'");

	// Get the button that opens the modal
	var btnAdd'.$row['COMMENT_ID'].' = document.getElementById("myBtn'.$row['COMMENT_ID'].'");


	// Get the <span> element that closes the modal
	var spanAdd'.$row['COMMENT_ID'].' = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btnAdd'.$row['COMMENT_ID'].'.onclick = function() {
		modalAdd'.$row['COMMENT_ID'].'.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modalAdd'.$row['COMMENT_ID'].'.style.display = "none";
	}

 </script>';
						}else{
							$loopRes = '
								<p style="border:5px; border-style:double; border-color:rgb(226,191,95); padding: 1em;width: 50%; font-size:13px">'. $row['COMMENT'] .'
							
								</p>
								<br><br>
							';
							echo $loopRes;
						}
					}
	
					$count = $count + 1;
				}
			

			echo '<br><br><br><br><br>
			<!-- Submit/Return Buttons-->
			<div class="form-group">
				<div class="col-md-12 text-center">
					<a class="btn btn-primary btn-lg" type="submit" href="ForumSubmit.php?id='.$cat.'">Submit New Post</a>
					<a class="btn btn-primary btn-lg" type="submit" href="Forum.php">Return to Discussions</a>
				</div>
			</div>
			<br><br> <br><br>';
			?>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		</body>
	</html>
