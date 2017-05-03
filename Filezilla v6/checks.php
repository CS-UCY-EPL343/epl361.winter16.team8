<?php
function check_customer($email, $name, $surname, $yob, $mob, $dob, $sex, $address, $city, $postal_code, $mobile, $password) {

	//checks if email is more than 50 chars long
	if ($email . size() > 51) {
		echo "Email size is bigger than 50";
		return false;
	}
	//checks if email is less than 1 char long
	if ($email . size() < 1) {
		echo "Email field is empty";
		return false;
	}
	//checks if email has the right format
	if (preg_match($email, "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
		echo "Valid email address.";
		return false;
	}

	//checks if name is more than 15 chars long
	if ($name . size() > 16) {
		echo "Name size is bigger than 15";
		return false;
	}
	//checks if name size is less than 1 char long
	if ($name . size() < 1) {
		echo "Name field is empty";
		return false;
	}
	//checks if the name contains numbers or symbols
	if (ctype_alpha($name) == false) {
		echo "Name must contain only letters";
		return false;
	}

	//checks if surname is more than 25 chars long
	if ($surname . size() > 26) {
		echo "Surname size is bigger than 25";
		return false;
	}
	//checks if surname size is less than 1 char long
	if ($surname . size() < 1) {
		echo "Surname field is empty";
		return false;
	}
	//checks if the surname contains numbers or symbols
	if (ctype_alpha($surname) == false) {
		echo "Surname must contain only letters";
		return false;
	}

	//checks if password is more than 20 chars long
	if ($password . size() > 21) {
		echo "Password size is bigger than 20 characters";
		return false;
	}
	//checks if password size is less than 1
	if ($password . size() < 1) {
		echo "Password field is empty";
		return false;
	}

	//check passwords strength
	//checks if password is at least 8 chars long
	if ($password . size() < 8) {
		echo "Password too short!";
		return false;
	}
	//checks if password contains numbers
	if (!preg_match("#[0-9]+#", $password)) {
		echo "Password must include at least one number!";
		return false;
	}
	//checks if password contains letter
	if (!preg_match("#[a-zA-Z]+#", $password)) {
		echo "Password must include at least one letter!";
		return false;
	}
	//checks if password contains upper case letters
	if (!preg_match("#[A-Z]+#", $password)) {
		echo "Password must include at least one Upper-case letter!";
		return false;
	}
	//checks if password contains at least one symbol
	if (!preg_match("[!@#$%^&*()_+=-~`{}[]|:;'\?><,./']+", $password)) {
		echo "Password must include at least one symbol!";
		return false;
	}

	//checks if sex variable is valid
	if ($sex != 'M' or $sex != 'F' or $sex . size() > 1) {
		echo "Sex field must be either F or M";
		return false;
	}
	//checks if sex field size is less than 1
	if ($sex . size() < 1) {
		echo "Sex field is empty";
		return false;
	}

	//checks if address is more than 40 chars long
	if ($address . size() > 41) {
		echo "Address size is bigger than 40 characters";
		return false;
	}
	//checks if address is less than 1 chars long
	if ($address . size() < 1) {
		echo "Address field is empty";
		return false;
	}
	//checks if address contains letter
	if (!preg_match("#[a-zA-Z]+#", $address)) {
		echo "Address must include at least one letter!";
		return false;
	}
	//checks if the address contains numbers or symbols
	if (ctype_alpha($address) == false) {
		echo "Address must contain only letters";
		return false;
	}

	//checks if city size is more than 15 chars long
	if ($city . size() > 16) {
		echo "City size is bigger than 15 characters";
		return false;
	}
	//checks if city size is less than 1 char long
	if ($city . size() < 1) {
		echo "City field is empty";
		return false;
	}
	//checks if city contains letter
	if (!preg_match("#[a-zA-Z]+#", $city)) {
		echo "City must include at least one letter!";
		return false;
	}
	//checks if the city contains numbers or symbols
	if (ctype_alpha($city) == false) {
		echo "City must contain only letters";
		return false;
	}

	//checks if postal code is empty
	if ($postal_code . size() < 1) {
		echo "Postal code field is empty";
		return false;
	}
	//checks if mobile field is empty
	if ($mobile . size() < 1) {
		echo "Mobile field is empty";
		return false;
	}

	//checks the date validation
	//30 day months
	if ($mob == 4 or $mob == 6 or $mob == 9 or $mob == 11) {
		if ($dob > 31) {
			echo "Day must be less than 31";
			return false;
		}
	}
	//31 day months
	else if ($mob == 1 or $mob == 3 or $mob == 5 or $mob == 7 or $mob == 8 or $mob == 10 or $mob == 12) {
		if ($dob > 32) {
			echo "Day must be less than 32";
			return false;
		}
	}
	//check febuary
	else if ($mob == 2) {
		if ($yob % 4 == 0 && $yob % 100 != 0) {
			if ($dob > 30) {
				echo "Day must be less than 30";
				return false;
			}
		} else {
			if ($dob > 29) {
				echo "Day must be less than 29";
				return false;
			}
		}
	}

	return true;
}

function check_forum_comments($comments) {
	
	//check if comment field size is bigger than 250
	if ($comments.size()>251){
		echo "Comments field must contain maximum 250 characters";
		return false;
	}
	
	return true;
}
?>