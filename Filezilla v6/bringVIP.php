<?php

session_start();
require_once ("database.php");
$db = new Database();

$sql = "SELECT * FROM CUSTOMERS WHERE ISADMIN = 0 AND ISVIP = 1";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

$count = 0;

while ($count < $rowcount) {
	$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);

    $loopResult = '
                <li><span style = "font-size:15px"> '. $row['NAME'] .' '. " " .' '. $row['SURNAME'] .' </span></li>
                <p style = "text-align:right"><strong><u> Demote to User </u></strong>
                <a class="btn btn-sm btn-primary" style="background-color:#39ff33;float:right" href="demoteVIP.php?comm='.$row['EMAIL'].'" role="button">&#10004</a></p></li> 
                <hr>
            ';

    echo $loopResult;
    $count = $count + 1;
}

?>