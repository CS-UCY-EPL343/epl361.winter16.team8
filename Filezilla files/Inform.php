<?php require("database.php"); ?>
<script>
	var isClick = true;

	function isInform() {

		if (isClick) {
			localStorage.x = document.getElementById("x").innerText;
			document.getElementById("a").outerHTML = "" + "<tr id=\"a\">" + "<td>" + "Name" + "</td>" + "<td><input id =\"y\" type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changeName()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button onclick=\"cancelName()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>" + "</tr>";
		}
	}

	function changeName() {
		var newName = document.getElementById("y").value;
		document.getElementById("a").outerHTML = "" + "<tr id=\"a\">" + "<td>" + "Name" + "</td>" + "<td id=\"x\" style=\"color: #888888\">" + newName + "</td>" + "<td><button type=\"button\" onclick=\"isInform()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newName)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		mysqli_query($db -> $conn, $sql);
		?>
	}

	function cancelName() {
		document.getElementById("a").outerHTML = "" + "<tr id=\"a\">" + "<td>" + "Name" + "</td>" + "<td id=\"x\" style=\"color: #888888\">" + localStorage.x + "</td>" + "<td><button type=\"button\" onclick=\"isInform()\">" + "Edit" + "</button></td>" + "</tr>";

	}
	//----------------------------------------------------------------------------------------------//

	function Surname() {
		if (isClick) {
			localStorage.xx = document.getElementById("xx").innerText;
			document.getElementById("b").outerHTML = "" + "<tr id=\"b\">" + "<td>" + "Surname" 
			+ "</td>" + "<td><input id =\"yy\" type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changeSurname()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + 
			"<button onclick=\"cancelSurname()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>";
			"</tr>";

		}
	}

	function changeSurname() {
		var newSurname = document.getElementById("yy").value;
		document.getElementById("b").outerHTML = "" + "<tr id=\"b\">" + "<td>" + "Surname" + "</td>" + "<td id=\"xx\" style=\"color: #888888\">" + newSurname + "</td>" + "<td><button type=\"button\" onclick=\"Surname()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newSurname)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		(mysqli_query($db -> $conn, $sql))
		?>
	}

	function cancelSurname() {
		document.getElementById("b").outerHTML = "" + "<tr id=\"b\">" + "<td>" + "Surname " + "</td>" + "<td id=\"xx\" style=\"color: #888888\">" + localStorage.xx + "</td>" + "<td><button type=\"button\" onclick=\"Surname()\">" + "Edit" + "</button></td>" + "</tr>";

	}

	//----------------------------------------------------------------------------------------------//
	function Dod() {

		if (isClick) {
			localStorage.xxx = document.getElementById("xxx").innerText;
			document.getElementById("c").outerHTML = "" + "<tr id=\"c\">" + "<td>" + "Date of birth" + "</td>" + "<td><input id =\"yyy\" type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changeDate()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button onclick=\"cancelDate()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>";
			"</tr>";
		}
	}

	function changeDate() {
		var newDate = document.getElementById("yyy").value;
		document.getElementById("c").outerHTML = "" + "<tr id=\"c\">" + "<td>" + "Date of birth" + "</td>" + "<td id=\"xxx\" style=\"color: #888888\">" + newDate + "</td>" + "<td><button type=\"button\" onclick=\"Dod()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newDate)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		mysqli_query($db -> $conn, $sql);
		?>
	}

	function cancelDate() {
		document.getElementById("c").outerHTML = "" + "<tr id=\"c\">" + "<td>" + "Date of birth" + "</td>" + "<td id=\"xxx\" style=\"color: #888888\">" + localStorage.xxx + "</td>" + "<td><button type=\"button\" onclick=\"Dod()\">" + "Edit" + "</button></td>" + "</tr>";

	}

	//----------------------------------------------------------------------------------------------//
	function Sex() {
		if (isClick) {
			localStorage.ab = document.getElementById("ab").innerText;
			document.getElementById("d").outerHTML = "" + "<tr id=\"c\">" + "<td>" + "Sex" + "</td>" + "<td><div class=\"form-group\">" + "<select id=\"SEX\" class=\"form-control\">" + "<option>" + "Male" + "</option>" + "<option>" + "Female" + "</option>" + "</select>" + "</div></td>" + "<td><button type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>";
			"</tr>";
		}
	}

	//----------------------------------------------------------------------------------------------//

	function Address() {
		if (isClick) {
			localStorage.ba = document.getElementById("ba").innerText;
			document.getElementById("e").outerHTML = "" + "<tr id=\"e\">" + "<td>" + "Address" + "</td>" + "<td><input id=\"ya\" type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changeAddress()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button onclick=\"cancelAddress()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>";
			"</tr>";
		}
	}

	function changeAddress() {
		var newAddress = document.getElementById("ya").value;
		document.getElementById("e").outerHTML = "" + "<tr id=\"e\">" + "<td>" + "Address" + "</td>" + "<td id=\"ba\" style=\"color: #888888\">" + newAddress + "</td>" + "<td><button type=\"button\" onclick=\"Address()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newAddress)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		mysqli_query($db -> $conn, $sql);
		?>
	}

	function cancelAddress() {
		document.getElementById("e").outerHTML = "" + "<tr id=\"e\">" + "<td>" + "Address " + "</td>" + "<td id=\"ba\" style=\"color: #888888\">" + localStorage.ba + "</td>" + "<td><button type=\"button\" onclick=\"Address()\">" + "Edit" + "</button></td>" + "</tr>";

	}

	//----------------------------------------------------------------------------------------------//
	function City() {
		if (isClick) {
			localStorage.bb = document.getElementById("bb").innerText;
			document.getElementById("f").outerHTML = "" + "<tr id=\"f\">" + "<td>" + "City" + "</td>" + "<td><input id=\"yb\" type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changeCity()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button onclick=\"cancelCity()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>" + "</tr>";
		}
	}

	function changeCity() {
		var newCity = document.getElementById("yb").value;
		document.getElementById("f").outerHTML = "" + "<tr id=\"f\">" + "<td>" + "City" + "</td>" + "<td id=\"bb\" style=\"color: #888888\">" + newCity + "</td>" + "<td><button type=\"button\" onclick=\"City()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newCity)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		mysqli_query($db -> $conn, $sql);
		?>
	}

	function cancelCity() {
		document.getElementById("f").outerHTML = "" + "<tr id=\"f\">" + "<td>" + "City " + "</td>" + "<td id=\"bb\" style=\"color: #888888\">" + localStorage.bb + "</td>" + "<td><button type=\"button\" onclick=\"City()\">" + "Edit" + "</button></td>" + "</tr>";

	}

	//----------------------------------------------------------------------------------------------//

	function Code() {
		if (isClick) {
			localStorage.bc = document.getElementById("bc").innerText;
			document.getElementById("g").outerHTML = "" + "<tr id=\"g\">" + "<td>" + "Postal Code" + "</td>" + "<td><input id=\"kb\" type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changePCode()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button onclick=\"cancelPCode()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>" + "</tr>";
		}
	}

	function changePCode() {
		var newPCode = document.getElementById("kb").value;
		document.getElementById("g").outerHTML = "" + "<tr id=\"g\">" + "<td>" + "Postal Code" + "</td>" + "<td id=\"bc\" style=\"color: #888888\">" + newPCode + "</td>" + "<td><button type=\"button\" onclick=\"Code()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newPCode)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		mysqli_query($db -> $conn, $sql);
		?>
	}

	function cancelPCode() {
		document.getElementById("g").outerHTML = "" + "<tr id=\"g\">" + "<td>" + "Postal Code " + "</td>" + "<td id=\"bc\" style=\"color: #888888\">" + localStorage.bc + "</td>" + "<td><button type=\"button\" onclick=\"Code()\">" + "Edit" + "</button></td>" + "</tr>";

	}

	//----------------------------------------------------------------------------------------------//
	function Number() {
		if (isClick) {
			localStorage.cc = document.getElementById("cc").innerText;
			document.getElementById("h").outerHTML = "" + "<tr id=\"h\">" + "<td>" + "Mobile Number" + "</td>" + "<td><input id=\"kk\" type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changeNumber()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button onclick=\"cancelNumber()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>" + "</tr>";
		}
	}

	function changeNumber() {
		var newNumber = document.getElementById("kk").value;
		document.getElementById("h").outerHTML = "" + "<tr id=\"h\">" + "<td>" + "Mobile Number" + "</td>" + "<td id=\"cc\" style=\"color: #888888\">" + newNumber + "</td>" + "<td><button type=\"button\" onclick=\"Number()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newNumber)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		mysqli_query($db -> $conn, $sql);
		?>
	}

	function cancelNumber() {
		document.getElementById("h").outerHTML = "" + "<tr id=\"h\">" + "<td>" + "Mobile Number " + "</td>" + "<td id=\"cc\" style=\"color: #888888\">" + localStorage.cc + "</td>" + "<td><button type=\"button\" onclick=\"Number()\">" + "Edit" + "</button></td>" + "</tr>";

	}

	//----------------------------------------------------------------------------------------------//
	function Email() {
		if (isClick) {
			localStorage.cd = document.getElementById("cd").innerText;
			document.getElementById("i").outerHTML = "" + "<tr id=\"i\">" + "<td>" + "Email" + "</td>" + "<td><input id=\"kw\"  type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changeEmail()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button onclick=\"cancelEmail()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>" + "</tr>";
		}
	}

	function changeEmail() {
		var newEmail = document.getElementById("kw").value;
		document.getElementById("i").outerHTML = "" + "<tr id=\"i\">" + "<td>" + "Email" + "</td>" + "<td id=\"cd\" style=\"color: #888888\">" + newEmail + "</td>" + "<td><button type=\"button\" onclick=\"Email()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newEmail)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		mysqli_query($db -> $conn, $sql);
		?>
	}

	function cancelEmail() {
		document.getElementById("i").outerHTML = "" + "<tr id=\"i\">" + "<td>" + "Email " + "</td>" + "<td id=\"cd\" style=\"color: #888888\">" + localStorage.cd + "</td>" + "<td><button type=\"button\" onclick=\"Email()\">" + "Edit" + "</button></td>" + "</tr>";

	}

	//----------------------------------------------------------------------------------------------//

	function Password() {
		if (isClick) {
			localStorage.dd = document.getElementById("dd").innerText;
			document.getElementById("j").outerHTML = "" + "<tr id=\"j\">" + "<td>" + "Password" + "</td>" + "<td><input id=\"ww\"  type=\"text\" style=\"color: #888888\"></input></td>" + "<td><button onclick=\"changePassword()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" + "<button onclick=\"cancelPassword()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>" + "</tr>";
		}
	}

	function changePassword() {
		var newPassword = document.getElementById("ww").value;
		document.getElementById("j").outerHTML = "" + "<tr id=\"j\">" + "<td>" + "Password" + "</td>" + "<td id=\"dd\" style=\"color: #888888\">" + newPassword + "</td>" + "<td><button type=\"button\" onclick=\"Password()\">" + "Edit" + "</button></td>" + "</tr>";
		<?php 
		$name = "<script>document.write(newPassword)</script>";
		$email = "<script>document.write(localStorage(\"email\"))";
		$sql = "UPDATE CUSTOMERS SET NAME =\"".$name." \"WHERE EMAIL = \"".$email."\"";
		mysqli_query($db -> $conn, $sql);
		?>
	}

	function cancelPassword() {
		document.getElementById("j").outerHTML = "" + "<tr id=\"j\">" + "<td>" + "Password " + "</td>" + "<td id=\"dd\" style=\"color: #888888\">" + localStorage.dd + "</td>" + "<td><button type=\"button\" onclick=\"Password()\">" + "Edit" + "</button></td>" + "</tr>";

	}

	//----------------------------------------------------------------------------------------------//
</script>
