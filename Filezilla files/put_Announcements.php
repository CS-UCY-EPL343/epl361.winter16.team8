<?php
require_once ("database.php");
$db = new Database();
$sql = "SELECT * FROM FORUM_COMMENTS WHERE FORUM_ID = 0
ORDER BY DATE DESC";

$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;


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
