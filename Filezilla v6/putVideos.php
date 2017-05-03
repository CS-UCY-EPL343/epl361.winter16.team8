<?php
session_start();
require_once ("database.php");
$db = new Database();


$sql = "SELECT * FROM VIDEOS";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

	$email = $_SESSION['email'];
	
	$sql12 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $email ."\"";
	$sql21 = mysqli_query($conn, $sql12);
	$rowAd = mysqli_fetch_array($sql21, MYSQL_ASSOC);
	
$IsAdmin =$rowAd['ISADMIN'];
	
//echo $rowcount . "<br><br>";
$count = 0;

$x .= '<div class="container" id = "container1" name = "container1"
				<div class="row row-offcanvas row-offcanvas-right">
					<div class="col-xs-12 col-xs-12" >
						<div class="jumbotron" align="center">
							<p style="font-size: 35px">
								<strong>Welcome to our video section</strong>
							</p>
							<p style = "font-size: 16px">
								Here you can view our recipes that were presented in various TV shows and easily do them yourself.
							</p>
							<div class="row">';
echo $x;

if ( $rowAd['ISADMIN']==1){
	
$loopResult1 = '		
	<p>
	<button type="button" id= "myBtn" class="btn btn-primary btn-lg btn-block" data-target="#myModal">Add Videos &raquo;</button>
	
		<div id ="myModal" class="modal">
			<div class="modal-content">
				<span class="close">x</span>
				<h2 align="center"><strong>Submit Video</strong></h2>
					<form action="admin-videos.php" method="post" id = "submit-video"  name = "submit-video" enctype="multipart/form-data">	
						<div class = "row">
							<div  class="col-xs-12">
								<div class="form-group">
								<label class="col-md-3 control-label" for="email">Post Video Title:</label>
									<div class="col-md-9">
										<input id="PostTitle" name="PostTitle" type="text" placeholder="Insert Video Title" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="description">Description:</label>
									<div class="col-md-9">
										<textarea rows="4" cols="50" class="form-control" id="description" name="description" placeholder="Please enter the description here..." rows="10"></textarea>
									</div>
								</div>
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="ingredients">Ingredients:</label>
									<div class="col-md-9">
										<textarea rows="4" cols="50" class="form-control" id="ingredients" name="ingredients" placeholder="Please enter the ingredients here..." rows="10"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Execution:</label>
									<div class="col-md-9">
										<textarea rows="4" cols="50" class="form-control" id="message" name="message" placeholder="Please enter the execution here..." rows="5"></textarea>
									</div>
								</div>
								<div class="form-group">
								<label class="col-md-3 control-label" for="message">Video from Youtube:</label>
									<div class="col-md-9">
										<input id = "imgUrl" name="imgUrl" type ="text" placeholder="Insert Video" class="form-control">
									</div>
								</div>
							
								<!-- Post Button -->
								<div class="form-group">
									<div class="col-md-12 text-right">
										<button type="submit" name = "submit-video" id = "submit-video" class="btn btn-primary btn-lg">
										Post to videos
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="videos.php">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</form>
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


	$scrstr = "";

echo '
	<style>
		#map_canvas{
			background: transparent url("pictures/ajax-loading.gif") no-repeat center center;
		}
	</style>';

while ($count < $rowcount) {
	$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
	$title = explode(' ', $row['TITLE']);
	$newtitle = "";
	for ($i = 0; $i < sizeof($title); $i++){
		$newtitle .= $title[$i] ."_";
	}
	
	if ( $rowAd['ISADMIN']==1){	
	$loopResult = ' 
							<div class="col-sm-6" >
								<h2>' . $row['TITLE'] . ' </h2>
								<div class="embed-responsive embed-responsive-16by9" id = "in_video">
									<iframe class="embed-responsive-item" src="' . $row['LINK'] . '" frameborder="0" allowfullscreen></iframe>
								</div>
								<p>
									<!-- Trigger/Open The Modal -->
									<button id="' . $newtitle . '" class="btn btn-default">
										View Details &raquo;
									</button>
									<p style = "text-align:right; padding-right:30px; color:white">
                 	<a class="btn btn-lg btn-primary" style="background-color:red; float:right" href="deleteVideo.php?comm='.$row['VIDEO_ID'].'" role="button"> Delete &#9747</a></p>
					
					<button type="button" id= "myBtn'.$row['VIDEO_ID'].'" class="btn btn-lg btn-primary" style="background-color:green;float:right" data-target="#myModal">Edit </button>
		<div id ="myModal'.$row['VIDEO_ID'].'" class="modal">	
			<div class="modal-content">
				<h2 align="center"><strong>Edit </strong></h2>
				<form action="renewVideo.php" method="post" id = "submit_video"  name = "submit_video" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<div class="col-md-9">
									<input id="video_id" name="video_id" type="hidden" class="form-control" value = "'.$row['VIDEO_ID'].'">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Title:</label>
								<div class="col-md-9">
									<input id="PostTitle" name="PostTitle" type="text" placeholder="'. $row['TITLE'] .'" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Description:</label>
								<div class="col-md-9">
									<input id="description" name="description" type="text" placeholder="'. $row['DESCRIPTION'] .'" class="form-control">
								</div>
							</div>	
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Ingredients:</label>
								<div class="col-md-9">
									<input id="ingredients" name="ingredients" type="text" placeholder="'. $row['INGREDIENTS'] .'" class="form-control">
								</div>
							</div>	
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Execution:</label>
								<div class="col-md-9">
									<input id="execution" name="execution" type="text" placeholder="'. $row['EXECUTION'] .'" class="form-control">
								</div>
							</div>	
							
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit-Video" class="btn btn-primary btn-lg">
										Renew Video
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="videos.php">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
									<!-- The Modal -->
									<div id="' . $row['VIDEO_ID'] . '" class="modal">

										<!-- Modal content -->
										<div class="modal-content">
											<span class="close" style = "font-size:15px !important; color: #ff0000">Press outside the window to exit</span>	
											<h2 align="center"><strong>' . $row['TITLE'] . '</strong></h2>
											<div class="row">
												<div class="col-xs-6">
													<div class="embed-responsive embed-responsive-16by9" id = "in_video">
														<iframe class="embed-responsive-item" src="' . $row['LINK'] . '" frameborder="0" allowfullscreen></iframe>
													</div>
												</div>
												<div class="col-xs-6" style="font-family: consolas;">
													<h3><strong><u>Ingredients:</u></strong></h3>
													' . $row['INGREDIENTS'] . '
													<h3><strong><u>Execution:</u></strong></h3>
													' . $row['EXECUTION'] . '
												</div>
											</div>
										</div>
									</div>
								</p>

							</div><!--/.col-xs-6.col-lg-4-->
				';
				}else{
					$loopResult = ' 
							<div class="col-sm-6" >
								<h2>' . $row['TITLE'] . ' </h2>
								<div class="embed-responsive embed-responsive-16by9" id = "in_video">
									<iframe class="embed-responsive-item" src="' . $row['LINK'] . '" frameborder="0" allowfullscreen></iframe>
								</div>
								<p>
									<!-- Trigger/Open The Modal -->
									<button id="' . $newtitle . '" class="btn btn-default">
										View Details &raquo;
									</button>
									
									<!-- The Modal -->
									<div id="' . $row['VIDEO_ID'] . '" class="modal">

										<!-- Modal content -->
										<div class="modal-content">
											<span class="close" style = "font-size:15px !important; color: #ff0000">Press outside the window to exit</span>	
											<h2 align="center"><strong>' . $row['TITLE'] . '</strong></h2>
											<div class="row">
												<div class="col-xs-6">
													<div class="embed-responsive embed-responsive-16by9" id = "in_video">
														<iframe class="embed-responsive-item" src="' . $row['LINK'] . '" frameborder="0" allowfullscreen></iframe>
													</div>
												</div>
												<div class="col-xs-6" style="font-family: consolas;">
													<h3><strong><u>Ingredients:</u></strong></h3>
													' . $row['INGREDIENTS'] . '
													<h3><strong><u>Execution:</u></strong></h3>
													' . $row['EXECUTION'] . '
												</div>
											</div>
										</div>
									</div>
								</p>

							</div><!--/.col-xs-6.col-lg-4-->
				';
					
				}
	echo $loopResult;

	echo '<script>
	// Get the modal
	var modal' . $row['VIDEO_ID'] . ' = document.getElementById("' . $row['VIDEO_ID'] . '");

	// Get the button that opens the modal
	var btn' . $row['VIDEO_ID'] . ' = document.getElementById("' . $newtitle . '");


	// Get the <span> element that closes the modal
	var span' . $row['VIDEO_ID'] . ' = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btn' . $row['VIDEO_ID'] . '.onclick = function() {
		modal' . $row['VIDEO_ID'] . '.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modal' . $row['VIDEO_ID'] . '.style.display = "none";
	}

 </script>';
 
	$count = $count + 1;
	$scrstr .= $row['VIDEO_ID'] . "_";
	
	echo '<script>
	// Get the modal
	var modalAdd'.$row['VIDEO_ID'].' = document.getElementById("myModal'.$row['VIDEO_ID'].'");

	// Get the button that opens the modal
	var btnAdd'.$row['VIDEO_ID'].' = document.getElementById("myBtn'.$row['VIDEO_ID'].'");


	// Get the <span> element that closes the modal
	var spanAdd'.$row['VIDEO_ID'].' = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btnAdd'.$row['VIDEO_ID'].'.onclick = function() {
		modalAdd'.$row['VIDEO_ID'].'.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modalAdd'.$row['VIDEO_ID'].'.style.display = "none";
	}

 </script>';
}

$end = '</div>';
echo $end;

$scr = explode ('_',$scrstr);

echo '<script>
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {';
		for ($i=0;$i<$rowcount-1;$i++){	
		echo 'if (event.target == modal' . $scr[$i] .') {
			modal' . $scr[$i] . '.style.display = "none";
					} else ';
		}
		echo ' if (event.target == modal' . $scr[$rowcount-1] .'){
						modal' . $scr[$rowcount-1] . '.style.display = "none";
					}
				if (event.target == modalAdd){
					modalAdd.style.display = "none";
				}
		}</script>';

?>
