<?php 
session_start();
require_once("database.php");
echo "update_customer.php ! <br>";
$db=new Database();

$level = $_POST['level'];
$field = $_POST['field'];

$sql = "UPDATE CUSTOMERS SET $field=\"".$level."\" WHERE EMAIL=\"".$_SESSION['email']."\"";

if (mysqli_query($conn, $sql)) {
	echo "Success";
} else {
	echo "Error " . mysqli_error($conn);
}
?>