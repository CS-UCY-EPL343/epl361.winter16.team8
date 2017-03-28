<?php session_start();
require_once('database.php');

$id=$_GET['id'];
$sql = "SELECT * FROM ORDER_DETAILS,PRODUCTS WHERE ORDER_ID = ".$id." AND ORDER_DETAILS.PRODUCT_ID = PRODUCTS.PRODUCT_ID";
$query = mysqli_query($conn, $sql);
if ($query -> num_rows != 0){
	echo '
	<div id="w">
		<header id="title">
			<h1> Order Details </h1>
		</header>
		<div id="page">
			<table id="cart">
				<thead>
					<tr>
						<th class="first">Picture</th>
						<th class="second">Product Name</th>
						<th class="third">Default Price</th>
						<th class="fourth">Quantity</th>
					</tr>
							
				</thead>
		
				<tbody>';
	
	while (($row = mysqli_fetch_array($query, MYSQL_ASSOC))!= NULL){
				
		echo '
					<tr class="productitm">
						<td><img src="' . $row['PICTURE'] . '" class="thumb" width="120" height = "60"></td>
						<td>' . $row['PRODUCT_NAME'] . '</td>
						<td>' . $row['PRICE'] . '</td>
						<td>' . $row['QUANTITY'] . '</td>';
		echo		'</tr>';
	}
	echo'		</tbody>
			</table>
		</div>
	</div>';

}

?>