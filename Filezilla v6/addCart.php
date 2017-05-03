<?php session_start();
require_once 'database.php';
$email = $_SESSION['email'];
$db = new Database();
$sql = "SELECT C.EMAIL, P.PRODUCT_ID, P.PRODUCT_NAME, C.QUANTITY, P.PICTURE, P.PRICE  
		FROM CART AS C, PRODUCTS AS P 
		WHERE C.EMAIL = \"" . $email . "\" AND C.PRODUCT_ID = P.PRODUCT_ID";
$query = mysqli_query($conn, $sql);
if ($query -> num_rows != 0) {
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
		<tbody>';

	while (($row = mysqli_fetch_array($query, MYSQL_ASSOC)) != NULL) {
		echo '
			<tr class="productitm">
				<td><img src="' . $row['PICTURE'] . '" class="thumb" width="120" height = "60"></td>
				<td>' . $row['PRODUCT_NAME'] . '</td>
				<form name="form" action="changecart.php" method = "get">
					<td>
						<input name="qty" id="' . $row['PRODUCT_ID'] . '" type="number" value="' . $row['QUANTITY'] . '" min="1" max="9999" class="qtyinput">
						<input type="hidden" name="tochange" value=' . $row['PRODUCT_ID'] . '>
						<input type="submit" >
					</td>
				</form>
				<td>€' . $row['PRICE'] . '</td>
				<td id="' . $row['PRODUCT_ID'] . '_">€' . number_format($row['PRICE'] * $row['QUANTITY'], 2) . '</td>
				<td><a class="remove" href="delcart.php?todelete=' . $row['PRODUCT_ID'] . '"><img src="pictures/trash.png" alt="X"></a></td>
			</tr>';
	}

	$sql = "SELECT SUM(P.PRICE*C.QUANTITY) AS TOTPRICE  
		FROM CART AS C, PRODUCTS AS P 
		WHERE C.EMAIL = \"" . $email . "\" AND C.PRODUCT_ID = P.PRODUCT_ID";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	$totprice = $row['TOTPRICE'];
	echo '<tr class="extracosts" style="color: #888b8d">
								<td>Costs</td>
								<td colspan="2" class="light"></td>
								<td id=cost>€' . number_format($totprice, 2) . '</td>
								<td>&nbsp;</td>
							</tr>';
	$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"" . $email . "\"";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	$disc = 0;
	echo '<tr class="extracosts" style="color: #888b8d">
								<td class="light">Discound</td>
								<td colspan="2" class="light"></td>';
	if ($row['ISVIP'] == 1) {
		$disc = (floor(($totprice * 0.25) * 100)) / 100;
		echo '<td id=disc>-€' . number_format($disc, 2) . ' (25%)</td>';
	} else {
		echo '<td id=disc>-€' . number_format($disc, 2) . ' (0%)</td>';
	}
	$ship = (ceil(($totprice * 0.12) * 100)) / 100;
	echo '	<td>&nbsp;</td>
							</tr>
							<tr class="extracosts" style="color: #888b8d">
								<td>Shipping &amp; Tax</td>
								<td colspan="2" class="light"></td>
								<td id=ship>€' . number_format($ship, 2) . '</td>
								<td>&nbsp;</td>
							</tr>';

	$totprice = $totprice - $disc + $ship;

	echo '<tr class="totalprice" style="color: #888b8d">
								<td class="light">Total:</td>
								<td colspan="2">&nbsp;</td>
								<td colspan="2"><span class="thick" id=finalp>€' . number_format($totprice, 2) . '</span></td>
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

	/*
	echo '<script>
						$(\'input[type="number"]\').change(function() {
							if (this.getAttribute(\'value\') === this.value) {
								$(this).data(\'lastvalue\', this.value);
							} else {
								// take whatever action you require here:
								var value = this.value * 123.12;
								var newvalue = $(this).data(\'lastvalue\') * 123.12;
								document.getElementById(\'finalp\').innerHTML = "â‚¬"+(newvalue-value);
								// update the lastvalue data property here:
								$(this).data(\'lastvalue\', this.value);
							}
						}).change(); 
	
</script>';*/

} else {
	echo "<h2 style=\"text-align:center; font-size: 40px; color:white;\">Your cart is empty!</h2>";
}



?>



