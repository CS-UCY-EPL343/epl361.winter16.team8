<?php
require_once ("database.php");
$db = new Database();

$sql = "SELECT * FROM CATEGORIES WHERE SUPER_CATEGORY IS NULL";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

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
