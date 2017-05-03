<?php session_start();
require_once('database.php');
$email = $_SESSION['email'];

//find auto increment's id
$sql = "SHOW TABLE STATUS LIKE 'ORDERS'";
echo $sql."<br>";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
echo $row['Auto_increment'];
$order = $row['Auto_increment'];

//find total price
$sql = "SELECT SUM(P.PRICE*C.QUANTITY) AS TOTPRICE  
		FROM CART AS C, PRODUCTS AS P 
		WHERE C.EMAIL = \"".$email."\" AND C.PRODUCT_ID = P.PRODUCT_ID";
echo $sql."<br>";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
$totprice = $row['TOTPRICE'];

//shipping price
$ship = (ceil(($totprice*0.12)*100))/100;

//finds discount
$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"".$email."\"";
echo $sql."<br>";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
$disc=0;						
	if($row['ISVIP']==1){
		$disc=(floor(($totprice*0.25)*100))/100;
	}
//finds final price 
$fprice = $totprice + $ship - $disc;

//saves data in orders
$sql = "INSERT INTO ORDERS (EMAIL,TOTAL_PRICE,IS_CANCELLED,SHIPPING_COST,DISCOUNT,FINAL_PRICE) VALUES (\"".$email."\",".$totprice.",0,".$ship.",".$disc.",".$fprice.")";
echo $sql."<br>";
$query = mysqli_query($conn, $sql);

//saves data in order_details
$sql = "SELECT * FROM CART WHERE EMAIL = \"".$email."\"";
echo $sql."<br>";
$query = mysqli_query($conn, $sql);
while(($row = mysqli_fetch_array($query, MYSQL_ASSOC))!=null){
	$sql = "INSERT INTO ORDER_DETAILS (ORDER_ID,PRODUCT_ID,QUANTITY) VALUES (".$order.",".$row['PRODUCT_ID'].",".$row['QUANTITY'].")";
	echo $sql."<br>";
	$query2 = mysqli_query($conn, $sql);
}

$sql = "DELETE FROM CART WHERE EMAIL = \"".$email."\"";
echo $sql."<br>";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
echo '<script>window.location = "laGalerie.php" ;</script>';
?>