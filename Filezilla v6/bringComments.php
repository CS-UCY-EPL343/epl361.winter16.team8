<?php

session_start();
require_once ("database.php");
$db = new Database();

$sql = "SELECT * FROM FORUM_COMMENTS WHERE APPROVED = 0";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

$count = 0;
$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
$sql2 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $row['EMAIL'] ."\" ";
$sql3 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);

while ($count < $rowcount) {
	
    $loopResult = '
            <li><span style = "font-size:15px"><strong><u> '. $row2['NAME'] .' '. " " .' '. $row2['SURNAME'] .': </u></strong> '. $row['COMMENT'] .'</span></li> 
            <p><a class="btn btn-sm btn-primary" style="background-color:#FF0000;float:right" href="removeComment.php?comm='.$row['COMMENT_ID'].'" role="button">&#9747</a>
            <a class="btn btn-sm btn-primary" style="background-color:#39ff33;float:right" href="acceptComment.php?comm='.$row['COMMENT_ID'].'" role="button">&#10004</a></p>
            <hr>
            ';
    echo $loopResult;
    
    $row = mysqli_fetch_array($sql1, MYSQL_ASSOC);
    $sql2 = "SELECT * FROM CUSTOMERS WHERE EMAIL = \"". $row['EMAIL'] ."\" ";
    $sql3 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($sql3, MYSQL_ASSOC);
    $count = $count + 1;

}

?>