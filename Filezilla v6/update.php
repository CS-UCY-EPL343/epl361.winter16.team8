<?php session_start();
	require_once("database.php");
	
	if (isset($_POST['submit_name'])){
		unset($_POST['submit_name']);
		$sql = "UPDATE CUSTOMERS SET NAME = \"".$_POST['name_input']."\" WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	}else if (isset($_POST['submit_surname'])){
		unset($_POST['submit_surname']);
		$sql = "UPDATE CUSTOMERS SET SURNAME = \"".$_POST['surname_input']."\" WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	}else if (isset($_POST['submit_dob'])){
		unset($_POST['submit_dob']);
		$bday = $_POST['Year_of_birth']."-".$_POST['Month_of_birth']."-".$_POST['Day_of_birth'];
		$sql = "UPDATE CUSTOMERS SET DOB = date(\"".$bday."\") WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	}else if (isset($_POST['submit_sex'])){
		unset($_POST['submit_sex']);
		$sql = "UPDATE CUSTOMERS SET SEX = \"".$_POST['sex']."\" WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	}else if (isset($_POST['submit_country'])){
		unset($_POST['submit_country']);
		$sql = "UPDATE CUSTOMERS SET COUNTRY = \"".$_POST['country_input']."\" WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	}else if (isset($_POST['submit_address'])){
		unset($_POST['submit_address']);
		$sql = "UPDATE CUSTOMERS SET ADDRESS = \"".$_POST['address_input']."\" WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	}else if (isset($_POST['submit_postal'])){
		unset($_POST['submit_postal']);
		$sql = "UPDATE CUSTOMERS SET POSTAL_CODE= \"".$_POST['postal_input']."\" WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	}else if (isset($_POST['submit_mobile'])){
		unset($_POST['submit_mobile']);
		$sql = "UPDATE CUSTOMERS SET MOBILE= \"".$_POST['mobile_input']."\" WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	}else if (isset($_POST['submit_password'])){
		unset($_POST['submit_password']);
		$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL =  \"".$_SESSION['email']."\"";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query, MYSQL_ASSOC);
		if ($row['PASSWORD']!=sha1($_POST['old_pass'])){
			echo "<script>alert('Old Password is wrong!');</script>";
		}else if ($_POST['new_pass']!=$_POST['confirm_pass']){
			echo "<script>alert('New Password does not equal Confirm password!');</script>";
		}else{
			$sql = "UPDATE CUSTOMERS SET PASSWORD= \"".sha1($_POST['new_pass'])."\" WHERE EMAIL =  \"".$_SESSION['email']."\"";
			$query = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($query, MYSQL_ASSOC);
		}
		
		
	}
	//CHANGE THIS!!!
	echo "<script>window.location = \"infoForm.php\" ;</script>";

 ?>