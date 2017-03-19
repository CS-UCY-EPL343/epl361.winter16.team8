<?php
require_once ("connect.php");
class Database {

	public function closeConnection() {
		$conn = null;
	}

	public function register($email, $name, $surname, $password, $dob, $sex, $address, $city, $postal_code, $mobile, $conn) {
		echo "register function!";
		//$hash = password_hash($password, PASSWORD_DEFAULT);
		//we hash  our password
		//$dob2 = date($dob);
		//echo $dob." ".$dob2;
		$sql = "INSERT INTO CUSTOMERS (EMAIL,NAME,SURNAME,PASSWORD,DOB,SEX,ADDRESS,CITY,POSTAL_CODE,MOBILE,ISVIP)
		VALUES (
		'" . $email . "'
		,'" . $name . "'
		,'" . $surname . "'
		,'" . $password . "'
		, date('" . $dob . "')
		, '" . $sex . "'
		, '" . $address . "'
		, '" . $city . "'
		, " . $postal_code . "
		, " . $mobile . "
		, 'false')";
		echo $sql;
		if (mysqli_query($conn, $sql)) {
			echo "added succesfully!";
			return true;
		} else {
			echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
	}

	function login($email, $password, $conn) {
		echo "login function <br>";
		$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = '" . $email . "' AND PASSWORD = '" . $password . "'";
		echo $sql . "<br>";
		$result = mysqli_query($conn, $sql);
		if ($result != null) {
			echo "Not null result<br>";
			if ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
				return true;
			}
			return false;
		} else {
			echo "Null result<br>";
			return false;
		}

	}
	
	function getUsername($email, $conn) {
		$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = '" . $email ."'";
		echo $sql . "<br>";
		$result = mysqli_query($conn, $sql);
		if ($result != null) {
			echo "Not null result getUsername!<br>";
			if ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
				echo $row['NAME'];
				return $row['NAME'];
			}
			return "";
		} else {
			echo "Null result getUsername!<br>";
			return "";
		}

	}
	
	public function getCustomers($conn){
		$sql = "SELECT * FROM CUSTOMERS";
		$result = mysqli_query($conn, $sql);
		echo "<table style=\"width:100%\">";
  		echo 	"<tr>";
    	echo 		"<th>Firstname</th>";
   		echo 		"<th>Lastname</th>"; 
    	echo 		"<th>Date Of Birth</th>";
  		echo 	"</tr>";
		if ($result != null) {
			while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
				echo "<tr>";
    			echo 	"<td>".$row['NAME']."</td>";
   				echo 	"<td>".$row['SURNAME']."</td>"; 
    			echo 	"<td>".$row['DOB']."</td>";
  				echo "</tr>";
			}
		} 
		echo "</table>";
	}

	public function getVideos($conn) {

		$sql = "SELECT * FROM VIDEOS";
		$sql1 = mysqli_query($conn, $sql);
		
		$count = 0;
		while ($row = mysqli_fetch_array($sql1, MYSQL_ASSOC)) {
			$count = $count + 1;
		}
		
		return sql1;
	}
	
	public function getCustomer($field,$email,$conn){
		$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = ".$email;
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
		return $row[$field];
	}
	
	public function changeCustomer($field,$newdata,$email,$conn){
		$sql = "UPDATE CUSTOMERS SET ".$field." = ".$newdata." WHERE EMAIL = ".$email;
		$query = mysqli_query($conn, $sql);
	}

}
?>
