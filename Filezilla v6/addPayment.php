<?php session_start();
require_once 'database.php';

echo'	
		<table id="cart" style="width:100%">
		<thead>
			<tr>
				<th class="first">Product</th>
				<th class="second">Qty</th>
				<th class="third">Total</th>
			</tr>
		</thead>
		<tbody>';
		
$sql = "SELECT C.EMAIL, P.PRODUCT_ID, P.PRODUCT_NAME, C.QUANTITY, P.PRICE  
		FROM CART AS C, PRODUCTS AS P 
		WHERE C.EMAIL = \"".$_SESSION['email']."\" AND C.PRODUCT_ID = P.PRODUCT_ID";
$query = mysqli_query($conn, $sql);
while (($row = mysqli_fetch_array($query, MYSQL_ASSOC))!=null){
	echo '
			<tr class="productitm">
				<td>'.$row['PRODUCT_NAME'].'</td>
				<td>'.$row['QUANTITY'].'</td>
				<td>€'.number_format($row['PRICE']*$row['QUANTITY'],2).'</td>
			</tr>';
}
$sql = "SELECT SUM(P.PRICE*C.QUANTITY) AS TOTPRICE  
		FROM CART AS C, PRODUCTS AS P 
		WHERE C.EMAIL = \"".$_SESSION['email']."\" AND C.PRODUCT_ID = P.PRODUCT_ID";
		
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
$totprice = $row['TOTPRICE'];

$ship = (ceil(($totprice*0.12)*100))/100;

$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"".$_SESSION['email']."\"";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
$disc = 0;

if ($row['ISVIP']==1){
	$disc=(floor(($totprice*0.25)*100))/100;
}
echo '
		</tbody>
	</table>
	<hr>
	<div id="shiping+" class="row" align="left">
		<div id="total+" class="row col-sm-6" align="left">
			<label class="pmt-label" for="shiping"> <span class="cc-icon mr8"></span>Shipping &amp; Tax</label>
		</div>
		<div id="total+" class="row col-sm-6" align="right">
			<label class="pmt-label"  for="total"><span class="cc-icon mr8" align="left"></span>€'.number_format($ship,2).'</label>
		</div>
	</div>
	<hr>
	<div id="shiping+" class="row" align="left">
		<div id="total+" class="row col-sm-6" align="left">
			<label class="pmt-label" for="shiping"> <span class="cc-icon mr8"></span>Discount</label>
		</div>
		<div id="total+" class="row col-sm-6" align="right">
			<label class="pmt-label"  for="total"><span class="cc-icon mr8" align="left"></span>-€'.number_format($disc,2).'</label>
		</div>
	</div>
	<hr>
	<div id="total+" class="row" align="left">
		<div id="total+" class="row col-sm-6" align="left">
			<label class="pmt-label" for="shiping"> <span class="cc-icon mr8"></span>Total: </label>
		</div>
		<div id="total+" class="row col-sm-6" align="right">
			<label class="pmt-label"  for="total"><span class="cc-icon mr8" align="left"></span>€'.number_format($totprice - $disc + $ship,2).'</label>
		</div>
	</div>';

?>