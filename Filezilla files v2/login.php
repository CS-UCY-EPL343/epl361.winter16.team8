<?php
session_start();
require_once 'database.php';
$db = new Database();

function logout() {
	$_SESSION["islogin"] = false;
	$_SESSION["email"] = "UNDEFINED_EMAIL";
}

if (isset($_POST['logout'])) {
	$db -> logout();
}
?>