<?php
//Author:Stephanie Nicolaou
session_start();
require_once ("database.php");
$db = new Database();
$ID = $_GET['comm'];

$sql = "DELETE FROM PRODUCTS WHERE PRODUCT_ID = $ID";

$sql1 = mysqli_query($conn, $sql);

$rowcount = $sql1 -> num_rows;

$count = 0;

echo '<script>
        window.location.href = "Categories.php"
      </script>';

?>