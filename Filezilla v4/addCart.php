<?php session_start();
require_once 'database.php';
$email = $_SESSION['email'];
$db = new Database();
$sql = "SELECT C.EMAIL, P.PRODUCT_ID, P.PRODUCT_NAME, C.QUANTITY, P.PICTURE, P.PRICE  
		FROM CART AS C, PRODUCTS AS P 
		WHERE C.EMAIL = \"".$email."\" AND C.PRODUCT_ID = P.PRODUCT_ID";
$query = mysqli_query($conn, $sql);
if ($query -> num_rows != 0){
	echo '
	<div id="w">
				<header id="title">
					<h1>My Shopping Basket</h1>
				</header>
				<div id="page">
	<table id="cart">
		<thead>
			<tr>
				<th class="first">Photo</th>
				<th class="second">Product</th>
				<th class="third">Qty</th>
				<th class="fourth">Price</th>
				<th class="fifth">Total</th>
				<th class="sixth">&nbsp;</th>
			</tr>
					
		</thead>
		<script>
			function calculateTotal(id1,price){
				var total_price = price*document.getElementById(id1).value;
				var a = total_price.toFixed(2);
				document.getElementById(id1+"_").innerHTML="€"+a;
			}
		</script>
		<tbody>';
	
	while (($row = mysqli_fetch_array($query, MYSQL_ASSOC))!= NULL){
		echo '
			<tr class="productitm">
				<td><img src="' . $row['PICTURE'] . '" class="thumb" width="120" height = "60"></td>
				<td>' . $row['PRODUCT_NAME'] . '</td>
				<td><input id="'.$row['PRODUCT_ID'].'" type="number" value="' . $row['QUANTITY'] . '" min="1" max="9999" class="qtyinput" onchange = "calculateTotal('.$row['PRODUCT_ID'].','.$row['PRICE'].')"></td>
				<td>€' . $row['PRICE'] . '</td>
				<td id="'.$row['PRODUCT_ID'].'_">€' . number_format($row['PRICE']*$row['QUANTITY'],2) . '</td>
				<td><a class="remove" href="delcart.php?todelete='.$row['PRODUCT_ID'].'"><img src="pictures/trash.png" alt="X"></a></td>
			</tr>';
	}

$sql = "SELECT SUM(P.PRICE*C.QUANTITY) AS TOTPRICE  
		FROM CART AS C, PRODUCTS AS P 
		WHERE C.EMAIL = \"".$email."\" AND C.PRODUCT_ID = P.PRODUCT_ID";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
$totprice = $row['TOTPRICE'];
	echo 
							'<tr class="extracosts" style="color: #888b8d">
								<td>Costs</td>
								<td colspan="2" class="light"></td>
								<td>€'.number_format($totprice,2).'</td>
								<td>&nbsp;</td>
							</tr>';
$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"".$email."\"";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
$disc=0;						
	echo 					'<tr class="extracosts" style="color: #888b8d">
								<td class="light">Discound</td>
								<td colspan="2" class="light"></td>';
	if($row['ISVIP']==1){
		$disc=(floor(($totprice*0.25)*100))/100;
		echo 					'<td>-€'.number_format($disc,2).' (25%)</td>';
	}
	else{
		echo 					'<td>-€'.number_format($disc,2).' (0%)</td>';
	}
	$ship = (ceil(($totprice*0.12)*100))/100;
	echo 					'	<td>&nbsp;</td>
							</tr>
							<tr class="extracosts" style="color: #888b8d">
								<td>Shipping &amp; Tax</td>
								<td colspan="2" class="light"></td>
								<td>€'.number_format($ship,2).'</td>
								<td>&nbsp;</td>
							</tr>';

	$totprice = $totprice - $disc + $ship;

		
						
	echo 					'<tr class="totalprice" style="color: #888b8d">
								<td class="light">Total:</td>
								<td colspan="2">&nbsp;</td>
								<td colspan="2"><span class="thick">€'.number_format($totprice,2).'</span></td>
							</tr>
		</tbody>
	</table>
	</div>
				<hr>
				<center>
					<a href="payment.php"><button id="submitbtn">
						Checkout Now!
					</button></a>
				</center>
				<hr>
			</div>';
}
else{
	echo "<h2 style=\"text-align:center; font-size: 40px; color:white;\">Your cart is empty!</h2>";
}

?>