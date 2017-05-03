<?php

session_start();
require_once ("database.php");
$db = new Database();

$sql = "SELECT * FROM CONTACT_US WHERE ISREAD = 0";

$sql1 = mysqli_query($conn, $sql);

$rowcount = $sql1 -> num_rows;

$count = 0;

while ($count < $rowcount) {
	$row = mysqli_fetch_array($sql1, MYSQL_ASSOC);

    $loopResult = '
                <li><span style = "font-size:15px"><u><strong> '. $row['NAME'] .' '. " " .' '. $row['SURNAME'] .':</strong></u></span>
                <span style = "font-size:15px; text-align:justify"> '. $row['MESSAGE'] .'</span>
                <p style = "text-align:right"><strong><u> Mark as Read</u></strong>
                 <a class="btn btn-sm btn-primary" style="background-color:#39ff33;float:right" href="markRead.php?comm='.$row['COMMENT_ID'].'" role="button"> &#10004</a></p></li> 
                <hr>
            ';

    echo $loopResult;
    $count = $count + 1;
}

?>