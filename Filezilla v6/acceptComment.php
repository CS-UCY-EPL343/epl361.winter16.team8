<?php

$id = $_GET['comm'];

session_start();
require_once ("database.php");
$db = new Database();

$sql = "UPDATE FORUM_COMMENTS SET APPROVED = 1 WHERE COMMENT_ID = $id ";
$sql1 = mysqli_query($conn, $sql);
$rowcount = $sql1 -> num_rows;

echo '<script>
        window.location.href = "notifications.php"
      </script>';

?>