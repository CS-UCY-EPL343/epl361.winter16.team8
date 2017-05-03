<?php
echo '
	<style>
		hr {
    		display: block;
    		height: 1px;
    		border: 0;
    		border-top: 1px solid #000;
    		margin: 1em 0;
    		padding: 0; 
		}
	</style>';
session_start();
require_once ("database.php");
$db = new Database();
$sql = "SELECT * FROM FORUM_COMMENTS WHERE FORUM_ID = 1
ORDER BY DATE DESC";

$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

//--------------------------------------------------------------------------------------------------------------------/
$email = $_SESSION['email'];
	//echo $email;
	$sql12 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $email ."\"";
	$sql21 = mysqli_query($conn, $sql12);
	$rowAd = mysqli_fetch_array($sql21, MYSQL_ASSOC);
	
$IsAdmin =$rowAd['ISADMIN'];
	
if ( $rowAd['ISADMIN']==1){
$loopResult1 = '		
	<p>
	<button type="button" id= "myBtn" class="btn btn-primary btn-lg btn-block" data-target="#myModal">Add Announcements&raquo;</button>

		<div id ="myModal" class="modal">
			<div class="modal-content">
				<h2 align="center"><strong>Submit Announcements</strong></h2> 
				<form action="admin-announcements.php" method="post" id = "submit_announcements"  name = "submit_announcements" enctype="multipart/form-data">	
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Post Title:</label>
								<div class="col-md-9">
									<input id="titlos" name="titlos" type="text" placeholder="Insert Announcements Title" class="form-control">
								</div>
							</div>
							<!-- Message body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="message">Description:</label>
								<div class="col-md-9">
									<textarea class="form-control" id="message" name="message" placeholder="Insert your description here..." rows="10"></textarea>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-md-3 control-label" for="fileToUpload">Select image to upload:</label>
								<div class="col-md-9">
									<input type="file" name="fileToUpload" id="fileToUpload">
								</div>
							</div>	
	
							                                                                                                                     
							<div class="col-md-9 text-right">
								<button type="submit" name = "submit_announcements" class="btn btn-primary btn-lg">
									Post to announcements
								</button>
								<a class="btn btn-primary btn-lg" type="submit" href="Announcements.php">Cancel</a>
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
//---------------------------------------------------------------------------------------------------/
$count = 0;
$previous=0;
echo "</div class = \"blog-post\">";

while ($count < $rowcount) {
	$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
	$sql111 = "SELECT * FROM FORUM_PICTURES WHERE COMMENT_ID = ".$row['COMMENT_ID']."";
	$sql222 = mysqli_query($conn, $sql111);
	$rowAd1 = mysqli_fetch_array($sql222, MYSQL_ASSOC);
	$str = explode('-', $row['DATE']);
	$year=$str[0];
	
	
	$now = $year;
	
	if ($now!=$previous){
		if ( $rowAd['ISADMIN']==1){
		$loopResult = '
			<h2 id="' . $row['COMMENT_ID'] . '" style=";"><b>' . $year. '</b></h2>
				<hr>
				<div class="blog-post">
					<p class="lead" style="font-size: 25px; text-align: justify; padding-top:30px;padding-left:20px ">
						<strong>' . $row['TITLE'] . '</strong>
					
					
					
						<p class="lead" style="font-size: 12px; text-align: justify; padding-top:10px;padding-left:20px ">
							<i>' . $row['DATE'] . '</i>
						</p>
				
					<p>
						<div class = "col-xs-12 col-lg-12" style = "padding-bottom:30px">
								<img class="first-slide img-responsive" src="'. $rowAd1['PICTURE_PATH'] .'">
							</div>
						<p class="lead" style="font-size: 16px; text-align: justify; padding-top:30px;padding-left:20px ">
						' . $row['COMMENT'] . '
						</p>
						<p style = "text-align:right; padding-right:30px; ">
						
                 	<a class="btn btn-lg btn-primary" style="background-color:red;float:right" href="deleteAnnouncement.php?comm='.$row['COMMENT_ID'].'" role="button"> Delete &#9747</a>
                 	<button type="button" id= "myBtn'.$row['COMMENT_ID'].'" class="btn btn-lg btn-primary" style="background-color:green" data-target="#myModal">Edit </button>
							
		<div id ="myModal'.$row['COMMENT_ID'].'" class="modal">
			<div class="modal-content">
				<h2 align="center"><strong>Edit Announcements</strong></h2>
				<form action="renewAnnouncements.php" method="post" id = "submit_category"  name = "submit_category" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<div class="col-md-9">
									<input id="com_id" name="com_id" type="hidden" class="form-control" value = "'.$row['COMMENT_ID'].'">
								</div>
							</div>
							<div class="form-group">
							
								<label class="col-md-3 control-label" for="email">Title:</label>
								<div class="col-md-9">
									<input id="PostTitle" name="PostTitle" type="text" placeholder="'. $row['TITLE'] .'" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Message:</label>
								<div class="col-md-9">
									<input id="comment" name="comment" type="text" placeholder="'. $row['COMMENT'] .'" class="form-control">
								</div>
							</div>
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit-announcements" class="btn btn-primary btn-lg">
										Update
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="Announcements.php">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
                 	</p>
						<br>
					<a href="mailto:' . $row['EMAIL'] . '" target="_top">' . $row['EMAIL'] . '</a>
					<hr>
					<hr>
					
					</p>
				</p>
			</p>
					
				</div>
				';
				}else{
					$loopResult = '
			<h2 id="' . $row['COMMENT_ID'] . '" style=";"><b>' . $year. '</b></h2>
				<hr>
				<div class="blog-post">
					<p class="lead" style="font-size: 25px; text-align: justify; padding-top:30px;padding-left:20px ">
						<strong>' . $row['TITLE'] . '</strong>
					
					
					
						<p class="lead" style="font-size: 12px; text-align: justify; padding-top:10px;padding-left:20px ">
							<i>' . $row['DATE'] . '</i>
						</p>
				
					<p>
					<div class = "col-xs-12 col-lg-12" style = "padding-bottom:30px">
								<img class="first-slide img-responsive" src="'. $rowAd1['PICTURE_PATH'] .'">
							</div>
						<p class="lead" style="font-size: 16px; text-align: justify; padding-top:30px;padding-left:20px ">
						' . $row['COMMENT'] . '
						</p>
						
						<br>
					<a href="mailto:' . $row['EMAIL'] . '" target="_top">' . $row['EMAIL'] . '</a>
					<hr>
					<hr>
					
					</p>
				</p>
			</p>
					
				</div>
				';
				}
				
	}else {
		if ( $rowAd['ISADMIN']==1){
		
		$loopResult = '
		
		<div class="blog-post">
					<p class="lead" style="font-size: 25px; text-align: justify; padding-top:30px;padding-left:20px ">
						<strong>' . $row['TITLE'] . '</strong>
					
					
				
						<p class="lead" style="font-size: 12px; text-align: justify; padding-top:10px;padding-left:20px ">
							<i>' . $row['DATE'] . '</i>
						</p>
				
					<p>
					<div class = "col-xs-12 col-lg-12" style = "padding-bottom:30px">
								<img class="first-slide img-responsive" src="'. $rowAd1['PICTURE_PATH'] .'">
							</div>
						<p class="lead" style="font-size: 16px; text-align: justify; padding-top:30px;padding-left:20px ">
						' . $row['COMMENT'] . '
						</p>
						<p style = "text-align:right; padding-right:30px; ">
                 	<a class="btn btn-lg btn-primary" style="background-color:red;float:right" href="deleteAnnouncement.php?comm='.$row['COMMENT_ID'].'" role="button"> Delete &#9747</a>
                 	<button type="button" id= "myBtn'.$row['COMMENT_ID'].'" class="btn btn-lg btn-primary" style="background-color:green" data-target="#myModal">Edit </button>
		<div id ="myModal'.$row['COMMENT_ID'].'" class="modal">	
			<div class="modal-content">
				<h2 align="center"><strong>Edit Announcements</strong></h2>
				<form action="renewAnnouncements.php" method="post" id = "submit_category"  name = "submit_category" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<div class="col-md-9">
									<input id="com_id" name="com_id" type="hidden" class="form-control" value = "'.$row['COMMENT_ID'].'">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Title:</label>
								<div class="col-md-9">
									<input id="PostTitle" name="PostTitle" type="text" placeholder="'. $row['TITLE'] .'" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Comment:</label>
								<div class="col-md-9">
									<input id="comment" name="comment" type="text" placeholder="'. $row['COMMENT'] .'" class="form-control">
								</div>
							</div>
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit-announcements" class="btn btn-primary btn-lg">
										Update
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="Announcements.php">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
                 	</p>
						<br>
					<a href="mailto:' . $row['EMAIL'] . '" target="_top">' . $row['EMAIL'] . '</a>
					<hr>
					<hr>
					
					</p>
				</p>
			</p>
		</div>
				';
				}else{
					$loopResult = '
		
		<div class="blog-post">
					<p class="lead" style="font-size: 25px; text-align: justify; padding-top:30px;padding-left:20px ">
						<strong>' . $row['TITLE'] . '</strong>
					
					
				
						<p class="lead" style="font-size: 12px; text-align: justify; padding-top:10px;padding-left:20px ">
							<i>' . $row['DATE'] . '</i>
						</p>
				
					<p>
					<div class = "col-xs-12 col-lg-12" style = "padding-bottom:30px">
								<img class="first-slide img-responsive" src="'. $rowAd1['PICTURE_PATH'] .'">
							</div>
						<p class="lead" style="font-size: 16px; text-align: justify; padding-top:30px;padding-left:20px ">
						' . $row['COMMENT'] . '
						</p>
						
						<br>
					<a href="mailto:' . $row['EMAIL'] . '" target="_top">' . $row['EMAIL'] . '</a>

					<hr>
					<hr>
					
					</p>
				</p>
			</p>
		</div>
				';
					
				}
		
	}
	$previous=$now;
	
	
	echo $loopResult;
	$count = $count + 1;
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

		


?>
