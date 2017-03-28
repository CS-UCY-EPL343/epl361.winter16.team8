<?php

	require_once ("database.php");
	$db = new Database();
	
	$sql = "SELECT * FROM FORUM WHERE FORUM_ID != 0";
	$sql1 = mysqli_query($conn, $sql);
	$rowcount = $sql1 -> num_rows;
	
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
