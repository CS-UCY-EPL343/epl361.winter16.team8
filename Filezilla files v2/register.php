<?php session_start();
require_once ("database.php");
echo "register.php ! <br>";
$db = new Database();

if (isset($_POST['register-submit'])) {
	echo "register-submit! <br>";
	$email = $_POST['email'];
	echo $email . " <br>";
	$name = $_POST['Name'];
	echo $name . " <br>";
	$surname = $_POST['Surname'];
	echo $surname . " <br>";
	$password = $_POST['password'];
	echo $password . " <br>";
	$dob = $_POST['Date_of_birth'];
	echo $dob . " <br>";
	$sex = $_POST['SEX'];
	$sex2;
	if ($sex == 'Male') {
		$sex2 = 'M';
	} else if ($sex == 'Female') {
		$sex2 = 'F';
	}
	echo $sex . " " . $sex2 . "<br>";
	$address = $_POST['Address'];
	echo $address . " <br>";
	$city = $_POST['City'];
	echo $city . " <br>";
	$postal_code = $_POST['Postal_Code'];
	echo $postal_code . " <br>";
	$mobile = $_POST['Mobile_Number'];
	echo $mobile . " <br>";
	if ($db -> register($email, $name, $surname, $password, $dob, $sex2, $address, $city, $postal_code, $mobile, $conn)) {
		$_SESSION["islogin"] = true;
		$_SESSION["email"] = $email;
		echo $_SESSION["islogin"]."<br>".$_SESSION["email"];
	}
	header("Location:laGalerie.php");
} else if (isset($_POST['login-submit'])) {
	echo "login-submit <br>";
	$email = $_POST['Email_Address'];
	echo $email . " <br>";
	$password = $_POST['password'];
	echo $password . " <br>";
	if ($db -> login($email, $password, $conn)) {
		$_SESSION["islogin"] = true;
		$_SESSION["email"] = $email;		
		echo "<script>window.location = \"laGalerie.php\" ;</script>";
	} else {
		echo "You are doing something wrong...";
		echo "<script>window.location = \"SignUp.php\" ;</script>";
	}

}
$db -> closeConnection();
?>