<?php session_start();
require_once ("database.php");
$db = new Database();

if (isset($_POST['register-submit'])) {
	$email = $_POST['email'];
	$name = $_POST['Name'];
	$surname = $_POST['Surname'];
	$password = $_POST['password'];
	$d = $_POST['Day_of_birth'];
	$m = $_POST['Month_of_birth'];
	$y = $_POST['Year_of_birth'];
	$dob = $y.'-'.$m.'-'.$d;
	$country = $_POST['Country'];
	$sex = $_POST['SEX'];
	$address = $_POST['Address'];
	$city = $_POST['City'];
	$postal_code = $_POST['Postal_Code'];
	$mobile = $_POST['Mobile_Number'];
	$cpass= $_POST['confirm_password'];
	if ($db -> register($email, $name, $surname,$cpass, $password, $dob,$country, $sex, $address, $city, $postal_code, $mobile, $conn)) {
		$_SESSION["islogin"] = true;
		$_SESSION["email"] = $email;
		echo "<script>window.location = \"laGalerie.php\" ;</script>";
	}
	else{
        if($cpass!=$password)
            echo "<script>alert('Password and confirm password must match!!')</script>";
        else{
            if (strlen($password) < 8)
                echo "<script>alert('Password size: greater than 8 and lower than 15!')</script>";
            if (strlen($password) > 15)
                echo "<script>alert('Password size: greater than 8 and lower than 15!')</script>";
        }
        echo "<script>window.location = \"SignUp.php\" ;</script>";
	}
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
		echo "<script>alert('Username or Password are incorrect!')</script>";
		echo "<script>window.location = \"SignUp.php\" ;</script>";
	}

}
$db -> closeConnection();
?>
