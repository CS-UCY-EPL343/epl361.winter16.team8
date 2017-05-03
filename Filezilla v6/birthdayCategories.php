<?php
require_once ("database.php");
$db = new Database();


$sql = "SELECT * FROM CATEGORIES WHERE SUPER_CATEGORY IS NULL";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

//-----------------------------------------------

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
	<button type="button" id= "myBtn" class="btn btn-primary btn-lg btn-block" data-target="#myModal">Add Category &raquo;</button>
	
		<div id ="myModal" class="modal">
			<div class="modal-content">
				<h2 align="center"><strong>Submit Category</strong></h2>
				<form action="admin-put_categoryProduct.php" method="post" id = "submit_category"  name = "submit_category" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Category:</label>
								<div class="col-md-9">
									<input id="PostTitle" name="PostTitle" type="text" placeholder="Insert Category Title" class="form-control">
								</div>
							</div>		
							<div class="form-group">
								<label class="col-md-3 control-label" for="message">Description:</label>
								<div class="col-md-9">
									<input id = "imgUrl" name="imgUrl" type ="text" placeholder="Insert your description.." class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label " for="choose">Categories: Choose one of the categories</label>
									<select id="choose" name="choose" class="form-control" required>
										<option value=""></option>
										<option value="NULL">Super Category</option>';
										$sql123 = "SELECT * FROM CATEGORIES WHERE SUPER_CATEGORY IS NULL";
										$sql321 = mysqli_query($conn, $sql123);
										$countOfCats = 0;
										$rowcountOfCats = $sql321 -> num_rows;
										
										while ($countOfCats < $rowcountOfCats){
											$rowCats = mysqli_fetch_array($sql321, MYSQL_ASSOC);
											$loopResult1 .= '<option value="'.$rowCats['CATEGORY_ID'].'">'. $rowCats['CATEGORY_NAME'] .'</option>';
											$countOfCats = $countOfCats + 1;
										}
										
$loopResult1 .= '
									</select>
							</div>
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit-category" class="btn btn-primary btn-lg">
										Post to category
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="Categories.php">Cancel</a>
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
//----------------------------------------


$count = 0;
echo "<ul>";
	
while ($count < $rowcount) {
	$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);		
	$loopResult = '
					<li style = "font-size:20px"> '. $row['CATEGORY_NAME'] .'
				';
	if ( $rowAd['ISADMIN']==1){
	echo '<p style = "text-align:right; padding-right:30px; color:white">
				
                 	<a class="btn btn-md btn-primary" style="background-color:red;float:right" href="deleteCategory.php?comm='.$row['CATEGORY_ID'].'" role="button"> Delete &#9747</a>
                 	<button type="button" id= "myBtn'.$row['CATEGORY_ID'].'" class="btn btn-md btn-primary" style="background-color:green;float:right" data-target="#myModal">Edit </button>';
	}
	$sql2 = "SELECT * FROM CATEGORIES WHERE SUPER_CATEGORY = ". $row['CATEGORY_ID']."";
	$sql3 = mysqli_query($conn, $sql2);
	$rowcount2 = $sql3 -> num_rows;
	
	$count2 = 0;
	echo $loopResult;
	if ( $rowAd['ISADMIN']==1){
	echo '<div id ="myModal'.$row['CATEGORY_ID'].'" class="modal">	
			<div class="modal-content">
				<h2 align="center"><strong>Edit Name of Category</strong></h2>
				<form action="renewCategory.php" method="post" id = "submit_category"  name = "submit_category" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<div class="col-md-9">
									<input id="com_id" name="com_id" type="hidden" class="form-control" value = "'.$row['CATEGORY_ID'].'">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Title:</label>
								<div class="col-md-9">
									<input id="PostTitle" name="PostTitle" type="text" placeholder="'. $row['CATEGORY_NAME'] .'" class="form-control">
								</div>
							</div>
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit-category" class="btn btn-primary btn-lg">
										Renew category
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="Categories.php">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</p>
				';
				echo '<script>
	// Get the modal
	var modalAdd'.$row['CATEGORY_ID'].' = document.getElementById("myModal'.$row['CATEGORY_ID'].'");

	// Get the button that opens the modal
	var btnAdd'.$row['CATEGORY_ID'].' = document.getElementById("myBtn'.$row['CATEGORY_ID'].'");


	// Get the <span> element that closes the modal
	var spanAdd'.$row['CATEGORY_ID'].' = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btnAdd'.$row['CATEGORY_ID'].'.onclick = function() {
		modalAdd'.$row['CATEGORY_ID'].'.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modalAdd'.$row['CATEGORY_ID'].'.style.display = "none";
	}

 </script>';
	}
	echo "<ul>";
	while ($count2 < $rowcount2){
		$row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);
		//$id = row2['CATEGORY_ID'];
		if ( $rowAd['ISADMIN']==1){
		$loopResult2 = '
				<p style = "text-align:right; padding-right:30px; color:white">
				
                 	<a class="btn btn-md btn-primary" style="background-color:red;float:right" href="deleteCategory.php?comm='.$row2['CATEGORY_ID'].'" role="button"> Delete &#9747</a>
                 	<button type="button" id= "myBtn'.$row2['CATEGORY_ID'].'" class="btn btn-md btn-primary" style="background-color:green;float:right" data-target="#myModal">Edit </button>
					 <li><span style = "font-size:17px"><a style = "font-weight:bold;color:blue" id = "' . $row2['CATEGORY_ID'] . '" href = "cakes.php?varname='.$row2['CATEGORY_ID'].'"> '. $row2['CATEGORY_NAME'] .' </a></span></li>
                 	<div id ="myModal'.$row2['CATEGORY_ID'].'" class="modal">	
			<div class="modal-content">
				<h2 align="center"><strong>Edit Name of Category</strong></h2>
				<form action="renewCategory.php" method="post" id = "submit_category"  name = "submit_category" enctype="multipart/form-data">
					<div class = "row">
						<div  class="col-xs-12">
							<div class="form-group">
								<div class="col-md-9">
									<input id="com_id" name="com_id" type="hidden" class="form-control" value = "'.$row2['CATEGORY_ID'].'">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="email">Title:</label>
								<div class="col-md-9">
									<input id="PostTitle" name="PostTitle" type="text" placeholder="'. $row2['CATEGORY_NAME'] .'" class="form-control">
								</div>
							</div>
							<!-- Post Button -->
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" name= "submit-category" class="btn btn-primary btn-lg">
										Renew category
									</button>
									<a class="btn btn-primary btn-lg" type="submit" href="Categories.php">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</p>
				';
		}else{
			$loopResult2 = '
				<li><span style = "font-size:17px"><a style = "font-weight:bold; color:blue" id = "' . $row2['CATEGORY_ID'] . '" href = "cakes.php?varname='.$row2['CATEGORY_ID'].'"> '. $row2['CATEGORY_NAME'] .' </a></span></li>
				
				';
			
			
		}
		echo $loopResult2;
		$count2 = $count2 + 1;
		echo '<script>
	// Get the modal
	var modalAdd'.$row2['CATEGORY_ID'].' = document.getElementById("myModal'.$row2['CATEGORY_ID'].'");

	// Get the button that opens the modal
	var btnAdd'.$row2['CATEGORY_ID'].' = document.getElementById("myBtn'.$row2['CATEGORY_ID'].'");


	// Get the <span> element that closes the modal
	var spanAdd'.$row2['CATEGORY_ID'].' = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btnAdd'.$row2['CATEGORY_ID'].'.onclick = function() {
		modalAdd'.$row2['CATEGORY_ID'].'.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modalAdd'.$row2['CATEGORY_ID'].'.style.display = "none";
	}

 </script>';
	}
	echo "</ul>";
	echo "</li>";
	$count = $count + 1;
}
echo "</ul>";
?>
