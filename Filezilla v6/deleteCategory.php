<?php
//Author:Stephanie Nicolaou
session_start();
require_once ("database.php");
$db = new Database();
$ID = $_GET['comm'];

$sql = "DELETE FROM CATEGORIES WHERE CATEGORY_ID = $ID";

$sql1 = mysqli_query($conn, $sql);

$sql2 = "DELETE FROM CATEGORIES WHERE SUPER_CATEGORY = $ID";

$sql4 = "SELECT * FROM CATEGORIES WHERE SUPER_CATEGORY = $ID";
$sql5 = mysqli_query($conn, $sql4);
$rowcount = $sql5 -> num_rows;

$count = 0;

while ($count < $rowcount){
  $sql3 = mysqli_query($conn, $sql2);
  $count = $count + 1;
}

echo '<script>
        window.location.href = "Categories.php"
      </script>';

?>