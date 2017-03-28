<?php
    session_start();
	require_once ("database.php");
	$db = new Database();
	
	$sql = "SELECT * FROM FORUM WHERE FORUM_ID != 1";
	$sql1 = mysqli_query($conn, $sql);
	$rowcount = $sql1 -> num_rows;
	
	
	//----------------------------------------------
	$email = $_SESSION['email'];
	//echo $email;
	$sql12 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $email ."\"";
	$sql21 = mysqli_query($conn, $sql12);
	$rowAd = mysqli_fetch_array($sql21, MYSQL_ASSOC);
	
$IsAdmin =$rowAd['ISADMIN'];
	
//echo $rowAd['ISADMIN'];
if ( $rowAd['ISADMIN']==1){
$loopResult1 = '		
	<p>
	<button type="button" id= "myBtn" class="btn btn-primary btn-lg btn-block" data-target="#myModal">Add Category Forum &raquo;</button>
	
		<div id ="myModal" class="modal">
			<div class="modal-content">
				<h2 align="center"><strong>Sumbit Category</strong></h2>
				<form action="admin-putCategoryForum.php" method="post" id = "submit_Forum"  name = "submit_Forum" enctype="multipart/form-data">	
				
				<div class = "row">
					<div  class="col-xs-12">
					<div class="form-group">
						<label class="col-md-3 control-label" for="email">Forum Title:</label>
						<div class="col-md-9">
							<input id="PTitle" name="PTitle" type="text" placeholder="Insert Forum Title" class="form-control">
						</div>		
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Can edit:</label>
						<div class="col-md-9">
							<input id = "edit" name="edit" type ="text" placeholder="Insert 1 that you can edit" class="form-control">
						</div>
					</div>
					<!-- Post Button -->
					<div class="form-group">
						<div class="col-md-12 text-right">
							<button type="submit" name = "submit_Forum" class="btn btn-primary btn-lg">
								Post to category
							</button>
							<a class="btn btn-primary btn-lg" type="submit" href="Forum.php">Cancel</a>
						</div>
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
	
	
	
	//----------------------
	$count = 0;
	
	while ($count < $rowcount){
		$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);

		$loopResult = '
				<div class="col-md-12 text-center">
					<a class="btn btn-primary btn-lg" type="submit" id = "' . $row['FORUM_ID'] . '" href="showForum.php?id='.$row['FORUM_ID'].'">'. $row['TITLE'] .'</a>
				</div>
				<br><br><br>
					';
		
		echo $loopResult;
		$count = $count + 1;
	}

?>
