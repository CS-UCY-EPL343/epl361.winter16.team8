<?php
require_once ("database.php");
$db = new Database();


$sql = "SELECT * FROM CATEGORIES WHERE SUPER_CATEGORY IS NULL";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

//--------------------------------------

$loopResult1 = '		
	<p>
	<button type="button" id= "myBtn" class="btn btn-primary btn-lg btn-block" data-target="#myModal">Add Category &raquo;</button>
	
		<div id ="myModal" class="modal">
			<div class="modal-content">
				<h2 align="center"><strong>Sumbit Category</strong></h2>
				<div class = "row">
					<div  class="col-xs-12">
					<div class="form-group">
						<label class="col-md-3 control-label" for="email">Post Title:</label>
						<div class="col-md-9">
							<input id="PostTitle" name="PostTitle" type="text" placeholder="Insert Post Title" class="form-control">
						</div>		
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Category:</label>
						<div class="col-md-9">
							<input id = "imgUrl" name="imgUrl" type ="text" placeholder="Insert Category" class="form-control">
						</div>
					</div>
					<!-- Post Button -->
					<div class="form-group">
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-primary btn-lg">
								Post to category
							</button>
							<a class="btn btn-primary btn-lg" type="submit" href="Categories.php">Cancel</a>
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
	
//----------------------------------


$count = 0;
echo "<ul>";
	
while ($count < $rowcount) {
	$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);		
	$loopResult = '
					<li style = "font-size:20px; color:white"> '. $row['CATEGORY_NAME'] .'
				';
	
	$sql2 = "SELECT * FROM CATEGORIES WHERE SUPER_CATEGORY = ". $row['CATEGORY_ID']."";
	$sql3 = mysqli_query($conn, $sql2);
	$rowcount2 = $sql3 -> num_rows;
	
	$count2 = 0;
	echo $loopResult;
	echo "<ul>";
	while ($count2 < $rowcount2){
		$row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);
		//$id = row2['CATEGORY_ID'];
		$loopResult2 = '
		
				<li><span style = "font-size:17px"><a style = "font-weight:bold; color:yellow" id = "' . $row2['CATEGORY_ID'] . '" href = "cakes.php?varname='.$row2['CATEGORY_ID'].'"> '. $row2['CATEGORY_NAME'] .' </a></span></li>
				';
		echo $loopResult2;
		$count2 = $count2 + 1;
	}
	echo "</ul>";
	echo "</li>";
	$count = $count + 1;
}
echo "</ul>";
?>
