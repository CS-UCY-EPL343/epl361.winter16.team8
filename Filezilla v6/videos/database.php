<?php session_start();
require_once ("connect.php");
class Database {

	public function closeConnection() {
		$conn = null;
	}

	public function logout(){
		$_SESSION["islogin"] = false;
		$_SESSION["email"] = "UNDEFINED_EMAIL";
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
	
	public function putProduct($title, $message, $category, $price, $picture, $weight, $conn) {
		
		if ($conn==NULL){
			echo "NULL!!!<br>";
		}
		echo "product function!";
		
		$sql = "INSERT INTO PRODUCTS (PRODUCT_NAME,DESCRIPTION,CATEGORY_ID,PRICE,PICTURE,WEIGHT)
		VALUES (
		'" . $title . "'
		,'" . $message . "'
		,'" . $category . "'
		,'" . $price. "'
		, '" . $picture. "'
		, '" . $weight . "')";
		echo $sql;
		if (mysqli_query($conn, $sql)) {
			echo "added succesfully!";
			return true;
		} else {
			echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
		
	}
	
	public function putVideo($PostTitle,$link,$description,$ingredients,$message,$conn) {
		
		if ($conn==NULL){
			echo "NULL!!!<br>";
		}
		echo "video function!";
		
		$sql = "INSERT INTO VIDEOS (TITLE,LINK,DESCRIPTION,INGREDIENTS,EXECUTION)
		VALUES (
		'" . $PostTitle . "'
		,'" . $link . "'
		,'" . $description. "'
		, '" . $ingredients. "'
		, '" . $message . "')";
		echo $sql;
		if (mysqli_query($conn, $sql)) {
			echo "added succesfully!";
			return true;
		} else {
			echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
		
	}
	
	
	
	public function putCategory($PostTitle,$choose1, $imgUrl, $conn) {
		
		if ($conn==NULL){
			echo "NULL!!!<br>";
		}
		echo "category function!";
		
		$sql = "INSERT INTO CATEGORIES (CATEGORY_NAME,SUPER_CATEGORY,DESCRIPTION)
		VALUES (
		'" . $PostTitle. "'
		,'" . $choose1. "'
		,'" . $imgUrl. "')";
		echo $sql;
		if (mysqli_query($conn, $sql)) {
			echo "added succesfully!";
			if ($choose1 == 0){
				$sql1 = "UPDATE CATEGORIES SET SUPER_CATEGORY = NULL WHERE CATEGORY_NAME = '". $PostTitle ."'";
				echo $sql1;
				$sql2 = mysqli_query($conn, $sql1);
			}
			return true;
		} else {
			echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
	}
	
	public function putForum($PTitle,$edit,$conn) {
		if ($conn==NULL){
			echo "NULL!!!<br>";
		}
		echo "Forum function!";
		$sq2 = "SELECT * FROM FORUM ";
		$sg13 = mysqli_query($conn, $sq2);
		$row = mysqli_fetch_array($sq13, MYSQL_ASSOC);
		
		$sql = "INSERT INTO FORUM (TITLE,CANEDIT)
		VALUES (
		'" . $PTitle. "'
		," . $edit. ")";
		echo $sql;
		$neo=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($neo, MYSQL_ASSOC);
		if ($row!=NULL) {
			echo "added succesfully!";
			return true;
		} else {
			echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
		
	}
	
	
	public function putAnnouncements( $titlos,$FORUMID ,$email, $message, $approved,$conn) {
		if ($conn==NULL){
			echo "NULL!!!<br>";
		}
		echo "Announcements function!";
		
		$sql = "INSERT INTO FORUM_COMMENTS(FORUM_ID,TITLE,EMAIL,COMMENT,APPROVED)
		VALUES (
		
		'" . $FORUMID. "'
		,'" . $titlos. "'
		,'" . $email. "'
		,'" . $message. "'
		," . $approved. ")";
		echo $sql;
		$neo1=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($neo1, MYSQL_ASSOC);
		if ($row!=NULL) {
			echo "added succesfully!";
			return true;
		} else {
			echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
		
	}
	
		public function updateName($name) {
		
		if ($conn==NULL){
			echo "NULL!!!<br>";
		}
		echo "customer function!";
		
		$sql = "UPDATE CUSTOMER SET NAME='". $PostTitle ."'";
		
		echo $sql;
		if (mysqli_query($conn, $sql)) {
			echo "added succesfully!";
			return true;
		} else {
			echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
	}

}
?>
