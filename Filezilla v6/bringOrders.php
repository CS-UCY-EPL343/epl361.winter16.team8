<style>
.mycontent-left {
  border-right: 1px dashed #333;
}
</style>
<?php

session_start();
require_once ("database.php");
$db = new Database();

$sql = "SELECT * FROM ORDERS WHERE DATE_SHIPPED IS NULL AND IS_CANCELLED = 0";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

$count = 0;
$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
$sql2 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $row['EMAIL'] ."\" ";
$sql3 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);

echo '<div class = "col-lg-6 mycontent-left">
        <h2 style = "text-align: center"> Must be shipped</h2>';
while ($count < $rowcount) {
	
    $loopResult = '
            <li><span style = "font-size:15px"><strong><u> '. $row2['NAME'] .' '. " " .' '. $row2['SURNAME'] .': </u></strong> </span>
            <p><a class="btn btn-sm btn-primary" style="background-color:#FF0000;float:right" href="cancelOrder.php?comm='.$row['ORDER_ID'].'" role="button">&#9747</a>
            <a class="btn btn-sm btn-primary" style="background-color:#39ff33;float:right" href="shipOrder.php?comm='.$row['ORDER_ID'].'" role="button">&#10004</a></p>
            </li> 
                <p><strong><u>Order ID:</u></strong> '. $row['ORDER_ID'] .'</p> <p><strong><u>Price:</u></strong> &euro;'. $row['FINAL_PRICE'] .'</p> <p><strong><u>Address:</u></strong> '. $row2['ADDRESS'] .'</p>
            <hr>
            ';
    echo $loopResult;
    
    $row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
    $sql2 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $row['EMAIL'] ."\" ";
    $sql3 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);
    $count = $count + 1;

}
echo '</div>';


$sql = "SELECT * FROM ORDERS WHERE DATE_SHIPPED IS NOT NULL AND DATE_ARRIVED IS NULL";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

$count = 0;
$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
$sql2 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $row['EMAIL'] ."\" ";
$sql3 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);

echo '<div class = "col-lg-6">
        <h2 style = "text-align: center"> Must be delivered</h2>';
while ($count < $rowcount) {
	
    $loopResult = '
            <li><span style = "font-size:15px"><strong><u> '. $row2['NAME'] .' '. " " .' '. $row2['SURNAME'] .': </u></strong> </span>
            <p>
            <a class="btn btn-sm btn-primary" style="background-color:#39ff33;float:right" href="deliveredOrder.php?comm='.$row['ORDER_ID'].'" role="button">&#10004</a></p>
            </li> 
                <p><strong><u>Order ID:</u></strong> '. $row['ORDER_ID'] .'</p> <p><strong><u>Price:</u></strong> &euro;'. $row['FINAL_PRICE'] .'</p> <p><strong><u>Address:</u></strong> '. $row2['ADDRESS'] .'</p>
            <hr>
            ';
    echo $loopResult;
    
    $row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
    $sql2 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $row['EMAIL'] ."\" ";
    $sql3 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);
    $count = $count + 1;

}
echo '</div>';

?>