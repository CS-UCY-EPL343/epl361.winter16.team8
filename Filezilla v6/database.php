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

	public function register($email, $name, $surname,$cpass, $password, $dob,$country, $sex, $address, $city, $postal_code, $mobile, $conn) {
		//$hash = password_hash($password, PASSWORD_DEFAULT);
		//we hash  our password
		//$dob2 = date($dob);
		//echo $dob." ".$dob2;
		if($cpass!=$password)
		return false;
		if (strlen($password) < 8)
			return false;
		if (strlen($password) > 15)
			return false;

		$sql = "INSERT INTO CUSTOMERS (EMAIL,NAME,SURNAME,PASSWORD,DOB,COUNTRY,SEX,ADDRESS,CITY,POSTAL_CODE,MOBILE,ISVIP)
		VALUES (
		'" . $email . "'
		,'" . $name . "'
		,'" . $surname . "'
		,'" . sha1($password) . "'
		, date('" . $dob . "')
		, '" . $country . "'
		, '" . $sex . "'
		, '" . $address . "'
		, '" . $city . "'
		, " . $postal_code . "
		, " . $mobile . "
		, 'false')";
		echo $sql;
		if (mysqli_query($conn, $sql)) {
			return true;
		} else {
			return false;
		}
	}

	function login($email, $password, $conn) {
		$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = '" . $email . "' AND PASSWORD = '" . sha1($password) . "'";
		$result = mysqli_query($conn, $sql);
		if ($result != null) {
			if ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
				return true;
			}
			return false;
		} else {
			return false;
		}

	}
	
	function getUsername($email, $conn) {
		$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL = '" . $email ."'";
		$result = mysqli_query($conn, $sql);
		if ($result != null) {
			if ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
				return $row['NAME'];
			}
			return "";
		} else {
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

		
		$sql = "INSERT INTO PRODUCTS (PRODUCT_NAME,DESCRIPTION,CATEGORY_ID,PRICE,PICTURE,WEIGHT)
		VALUES (
		'" . $title . "'
		,'" . $message . "'
		,'" . $category . "'
		,'" . $price. "'
		, '" . $picture. "'
		, '" . $weight . "')";
		if (mysqli_query($conn, $sql)) {
			return true;
		} else {
			return false;
		}
		
	}
	
	public function putVideo($PostTitle,$link,$description,$ingredients,$message,$conn) {
		
		

		
		$sql = "INSERT INTO VIDEOS (TITLE,LINK,DESCRIPTION,INGREDIENTS,EXECUTION)
		VALUES (
		'" . $PostTitle . "'
		,'" . $link . "'
		,'" . $description. "'
		, '" . $ingredients. "'
		, '" . $message . "')";
		if (mysqli_query($conn, $sql)) {
			return true;
		} else {
			return false;
		}
		
	}
	
	
	
	public function putCategory($PostTitle,$choose1, $imgUrl, $conn) {
		

		$sql = "INSERT INTO CATEGORIES (CATEGORY_NAME,SUPER_CATEGORY,DESCRIPTION)
		VALUES (
		'" . $PostTitle. "'
		,'" . $choose1. "'
		,'" . $imgUrl. "')";
		if (mysqli_query($conn, $sql)) {
			if ($choose1 == 0){
				$sql1 = "UPDATE CATEGORIES SET SUPER_CATEGORY = NULL WHERE CATEGORY_NAME = '". $PostTitle ."'";
				$sql2 = mysqli_query($conn, $sql1);
			}
			return true;
		} else {
			return false;
		}
	}
	
	public function putForum($PTitle,$edit,$conn) {
		
		$sq2 = "SELECT * FROM FORUM ";
		$sg13 = mysqli_query($conn, $sq2);
		$row = mysqli_fetch_array($sq13, MYSQL_ASSOC);
		
		$sql = "INSERT INTO FORUM (TITLE,CANEDIT)
		VALUES (
		'" . $PTitle. "'
		," . $edit. ")";

		$neo=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($neo, MYSQL_ASSOC);
		if ($row!=NULL) {
			return true;
		} else {
			return false;
		}
		
	}
	
	
	public function putAnnouncements( $titlos,$FORUMID ,$email, $message,$pictures, $approved,$conn) {
	
		$sql = "INSERT INTO FORUM_COMMENTS(FORUM_ID,TITLE,EMAIL,COMMENT,APPROVED)
		VALUES (
		
		'" . $FORUMID. "'
		,'" . $titlos. "'
		,'" . $email. "'
		,'" . $message. "'
		," . $approved. ")";
		$sql1 = "SELECT * FROM FORUM_COMMENTS WHERE FORUM_ID = $FORUMID AND TITLE =\"$titlos\" AND EMAIL = \"$email\" AND COMMENT=\"$message\" AND APPROVED=$approved";
		echo $sql1;
		$neo1=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($neo1, MYSQL_ASSOC);
		$neo2=mysqli_query($conn, $sql1);
		if ($neo2 == NULL)
			echo "null";
		else {
			echo "not null";
		}
		
		$rowA=mysqli_fetch_array($neo2, MYSQL_ASSOC);
		$cID = $rowA['COMMENT_ID'];
		$sql2 = "INSERT INTO FORUM_PICTURES (COMMENT_ID,PICTURE_PATH)
		VALUES (
		
		" . $cID. "
		,'" . $pictures. "')";
		
		echo $sql2;
		if (mysqli_query($conn, $sql2))
			echo "true";
		else
			echo "null";
		
		
		
	}
	public function putContactUs($message, $email, $name, $surname, $country,$city, $conn) {
		
		
		$sql = "INSERT INTO CONTACT_US (NAME,SURNAME,COUNTRY,TOWN,EMAIL,MESSAGE)
		VALUES (
		'" . $name . "'
		,'" . $surname . "'
		,'" . $country . "'
		,'" . $city . "'
		,'" . $email. "'
		, '" . $message. "')";
		echo $sql;
		if (mysqli_query($conn, $sql)) {
			return true;
		} else {
			return false;
		}
		
	}
	public function putContactUsFalse($message, $name, $surname,$country, $email, $city, $conn) {
		
	
		$sql = "INSERT INTO CONTACT_US (NAME,SURNAME,COUNTRY,TOWN,EMAIL,MESSAGE)
		VALUES (
		'" . $name . "'
		,'" . $surname . "'
		,'" . $country . "'
		,'" . $city . "'
		,'" . $email. "'
		, '" . $message. "')";
		if (mysqli_query($conn, $sql)) {
			return true;
		} else {
			return false;
		}
		
	}
	
	public function putForumComment($title, $message, $id, $email, $conn){
	
		$sql = "INSERT INTO FORUM_COMMENTS(FORUM_ID,TITLE,EMAIL,COMMENT)
		VALUES (
		
		'" . $id. "'
		,'" . $title. "'
		,'" . $email. "'
		,'" . $message. "')";

		$neo1=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($neo1, MYSQL_ASSOC);
		if ($row!=NULL) {
			return true;
		} else {
			return false;
		}
	}

	public function renewProduct($id,$titlos,$description, $price, $choose,$conn){

		if ($titlos != NULL){
			$sql = "UPDATE PRODUCTS SET PRODUCT_NAME = \"$titlos\" WHERE PRODUCT_ID = $id ";
			mysqli_query($conn, $sql);	
		}
		if ($description != null){
			$sql = "UPDATE PRODUCTS SET DESCRIPTION = \"$description\" WHERE PRODUCT_ID = $id ";
			mysqli_query($conn, $sql);	
		}	
		if ($price != null){
			$sql = "UPDATE PRODUCTS SET PRICE = $price WHERE PRODUCT_ID = $id ";
			mysqli_query($conn, $sql);	
		}
		if ($choose != null){
			$sql = "UPDATE PRODUCTS SET CATEGORY_ID = $choose WHERE PRODUCT_ID = $id ";
			mysqli_query($conn, $sql);	
		}
		
	}
	public function renewAnnouncement($PostTitle,$comment,$value,$conn){

		if ($PostTitle != NULL){
			$sql = "UPDATE FORUM_COMMENTS SET TITLE = \"$PostTitle\" WHERE COMMENT_ID = $value ";
			mysqli_query($conn, $sql);	
		}
		if ($comment != null){
			$sql = "UPDATE FORUM_COMMENTS SET COMMENT = \"$comment\" WHERE COMMENT_ID = $value ";
			mysqli_query($conn, $sql);	
		}	
		
		
	}
	public function renewCat($PostTitle,$value,$conn){

		if ($PostTitle != NULL){
			$sql = "UPDATE CATEGORIES SET CATEGORY_NAME = \"$PostTitle\" WHERE CATEGORY_ID = $value ";
			mysqli_query($conn, $sql);	
		}
			
		
		
	}
	public function renewVideo($PostTitle,$video_id,$description,$ingredients,$execution,$conn){

		if ($PostTitle != NULL){
			$sql = "UPDATE VIDEOS SET TITLE = \"$PostTitle\" WHERE VIDEO_ID = $video_id ";
			mysqli_query($conn, $sql);	
		}
		if ($description != null){
			$sql = "UPDATE VIDEOS SET DESCRIPTION = \"$description\" WHERE VIDEO_ID = $video_id ";
			mysqli_query($conn, $sql);	
		}	
		if ($ingredients != null){
			$sql = "UPDATE VIDEOS SET INGREDIENTS = \"$ingredients\" WHERE VIDEO_ID = $video_id ";
			mysqli_query($conn, $sql);	
		}	
		if ($execution != null){
			$sql = "UPDATE VIDEOS SET EXECUTION = \"$execution\" WHERE VIDEO_ID = $video_id ";
			mysqli_query($conn, $sql);	
		}
		
	}

	public function renewForum($id,$titlos,$conn){

		if ($titlos != NULL){
			$sql = "UPDATE FORUM SET TITLE = \"$titlos\" WHERE FORUM_ID = $id ";
			mysqli_query($conn, $sql);	
		}
	}

	public function renewComment($id,$message,$conn){

		if ($message != NULL){
			$sql = "UPDATE FORUM_COMMENTS SET COMMENT = \"$message\", APPROVED = 0 WHERE COMMENT_ID = $id ";
			mysqli_query($conn, $sql);	
		}
	}


}
?>
