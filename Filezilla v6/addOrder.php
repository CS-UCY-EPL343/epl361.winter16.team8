<?php session_start();
require_once('database.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM ORDERS WHERE EMAIL = \"".$email."\" ORDER BY ORDER_DATE DESC";
$query = mysqli_query($conn, $sql);
if ($query -> num_rows != 0){
	echo '
	<div id="w">
		<header id="title">
			<h1>My Shopping History</h1>
		</header>
		<div id="page">
			<table id="cart">
				<thead>
					<tr>
						<th></th>
						<th class="first">Order Date</th>
						<th class="second">Final Price</th>
						<th class="third">Items Bought</th>
						<th class="fourth">Shipped</th>
						<th class="fifth">Arrived</th>
					</tr>
							
				</thead>
		
				<tbody>';
	
	while (($row = mysqli_fetch_array($query, MYSQL_ASSOC))!= NULL){
		//order ID
		$id=$row['ORDER_ID'];
		
		//find items bought
		$sql="SELECT SUM(QUANTITY) AS C FROM ORDER_DETAILS WHERE ORDER_ID = ".$id;
		$query2 = mysqli_query($conn, $sql);
		$row2=mysqli_fetch_array($query2, MYSQL_ASSOC);
		$count=$row2['C'];
		
		echo '
					<tr class="productitm">
						<td><a href="historyDetails.php?id='.$id.'">Details</a></td>
						<td>' . $row['ORDER_DATE'] . '</td>
						<td>' . $row['FINAL_PRICE'] . '</td>
						<td>' . $count . '</td>';
		if ($row['DATE_SHIPPED']!=NULL)
			echo		'<td>' . $row['DATE_SHIPPED'] . '</td>';
		else
			echo		'<td>Not Shipped Yet!</td>';
			
		if ($row['DATE_ARRIVED']!=NULL)
			echo		'<td>' . $row['DATE_ARRIVED'] . '</td>';
		else
			echo		'<td>Not Arrived Yet!</td>';
		echo		'</tr>';
	}
	echo'		</tbody>
			</table>
		</div>
	</div>';

}
else{
	echo "<h2 style=\"text-align:center; font-size: 40px; color:white;\">You have not bought anything yet!</h2>";
}
?>