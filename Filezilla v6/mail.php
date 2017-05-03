<?php
session_start();
require_once("database.php");
$email = $_SESSION['email'];
$sql = mysqli_prepare($conn, "SELECT NAME FROM CUSTOMERS WHERE SEX = ?");
mysqli_stmt_bind_param($sql,'s',$sex);
$sex = "F";
mysqli_stmt_execute($sql);
mysqli_stmt_bind_result($sql, $a);
while (mysqli_stmt_fetch($sql)){
	printf("%s<br>",$a);
}

?>

