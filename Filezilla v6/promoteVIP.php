<?php

$comm = $_GET['comm'];

session_start();
require_once ("database.php");
$db = new Database();

$sql = "UPDATE CUSTOMERS SET ISVIP = 1 WHERE EMAIL = \"$comm\" ";
echo $sql;
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

echo '<script>
        window.location.href = "notifications.php"
      </script>';

?>