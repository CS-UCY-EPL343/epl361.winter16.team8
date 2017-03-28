<?php

session_start();
require_once ("database.php");
$db = new Database();

$sql = "SELECT * FROM CUSTOMERS WHERE ISADMIN = 1";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

$count = 0;

while ($count < $rowcount) {
	$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);

    $loopResult = '
                <li style = "text-align:center"><span style = "font-size:15px"> '. $row['NAME'] .' '. " " .' '. $row['SURNAME'] .' </span></li>
                <hr>
            ';

    echo $loopResult;
    $count = $count + 1;
}

?>