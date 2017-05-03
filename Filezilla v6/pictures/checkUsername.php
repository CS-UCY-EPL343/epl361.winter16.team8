<?php
session_start();
include 'connectDB.php';
?>

<?php
$hint = "";
$q = $_REQUEST["q"];
$sql = "SELECT USERNAME FROM users where USERNAME='$q'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQL_ASSOC);
$count = mysqli_num_rows($result);
if ($q !== "") {
	if ($count == 1) {
		$hint = " <p style='color:red;'> Αυτό το ψευδώνυμο είναι ήδη χρησιμοποιημενο.</p>";
		$_SESSION['disabled'] = "true";
	} else {
		$_SESSION['disabled'] = "false";
		$hint = "<p style='color:green;'> Αυτό το ψευδώνυμο είναι διαθέσιμο</p>";
	}
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>