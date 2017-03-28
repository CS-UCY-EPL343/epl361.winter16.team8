<?php
require_once ("database.php");
$db = new Database();
$sql = "SELECT * FROM FORUM_COMMENTS WHERE FORUM_ID = 0
ORDER BY DATE DESC";

$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

//--------------------------------------------------------------------------------------------------------------------/
$loopResult1 = '		
	<p>
	<button type="button" id= "myBtn" class="btn btn-primary btn-lg btn-block" data-target="#myModal">Add Announcements&raquo;</button>

		<div id ="myModal" class="modal">
			<div class="modal-content">
				<h2 align="center"><strong>Sumbit Announcements</strong></h2>
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
								Post to announcements
							</button>
							<a class="btn btn-primary btn-lg" type="submit" href="Announcements.php">Cancel</a>
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
	

//---------------------------------------------------------------------------------------------------/
$count = 0;
$previous=0;
echo "</div class = \"blog-post\">";
while ($count < $rowcount) {
	$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
	
	$str = explode('-', $row['DATE']);
	$year=$str[0];
	
	
	$now = $year;
	
	if ($now!=$previous){
		$loopResult = '
			<h2 id="' . $row['COMMENT_ID'] . '" style="color:white;"><b>' . $year. '</b></h2>
				<hr>
				<div class="blog-post">
					<p class="lead" style="font-size: 16px; text-align: justify; color:white; ">
						' . $row['TITLE'] . '
					
					
					<p class="blog-post-meta">
						<p class="lead" style="font-size: 16px; text-align: justify; color:white; ">
							<i>' . $row['DATE'] . '</i>
						</p>
				
					<p>
						<p class="lead" style="font-size: 16px; text-align: justify; color:white; ">
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
				
	}else {
		$loopResult = '
		
		<div class="blog-post">
					<p class="lead" style="font-size: 16px; text-align: justify; color:white; ">
						' . $row['TITLE'] . '
					
					
					<p class="blog-post-meta">
						<p class="lead" style="font-size: 16px; text-align: justify; color:white; ">
							<i>' . $row['DATE'] . '</i>
						</p>
				
					<p>
						<p class="lead" style="font-size: 16px; text-align: justify; color:white; ">
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
	$previous=$now;
	echo $loopResult;
	$count = $count + 1;

}




echo "</div>";
?>
