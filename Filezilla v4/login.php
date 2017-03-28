<?php
session_start();
require_once 'database.php';
$db = new Database();

	$db -> logout();
	echo "<script>window.location = \"laGalerie.php\" ;</script>";
?>