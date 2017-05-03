<?php

session_start();
require_once ("database.php");
$db = new Database();

$id = $_GET['comm'];

$sql = "UPDATE ORDERS SET DATE_SHIPPED = current_timestamp WHERE ORDER_ID = $id";

$sql1 = mysqli_query($conn, $sql);

echo '<script>
        window.location.href = "notifications.php"
      </script>';

?>

