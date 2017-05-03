<?php

$comm = $_GET['comm'];

session_start();
require_once ("database.php");
$db = new Database();

$sql = "UPDATE CONTACT_US SET ISREAD = 1 WHERE COMMENT_ID = \"$comm\" ";
echo $sql;
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

echo '<script>
        window.location.href = "notifications.php"
      </script>';

?>