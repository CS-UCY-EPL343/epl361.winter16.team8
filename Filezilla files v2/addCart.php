<?php 
require_once 'database.php';
echo "<script>document.write(localStorage.getItem(\"email\"))</script><br>";
$email = "<script>document.write(localStorage.getItem(\"email\"))</script><br>";
echo $email;
$db = new Database();
$sql = "SELECT * FROM CART WHERE EMAIL = \"".$email."\"";
$query = mysqli_query($conn, $sql);
if ($query -> num_rows != 0){
	
}
else{
	echo "<h2>Your cart is empty!</h2>";
}

?>