<?php session_start();
require_once ("database.php");
//connecting with database
$db = new Database();

$email = $_SESSION['email'];

$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL= \"" . $email . "\" ";
$sq2 = mysqli_query($conn, $sql);
if ($query -> num_rows != 0)
	$rowcount = $sq1 -> num_rows;
echo $rowcount;
$row = mysqli_fetch_array($sq2, MYSQL_ASSOC);

echo '<script>

var isClick = true;

function isInform() {
	
	if (isClick){
	localStorage.x = document.getElementById("x").innerText;
	document.getElementById("a").outerHTML=""+
	"<tr id=\"a\">"+
	"<td>" + "Name" + "</td>" +
	"<td><input id =\"y\" type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changeName()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelName()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>"+
	"</tr>";
	}
}

function changeName(){
	var newName = document.getElementById("y").value;
	document.getElementById("a").outerHTML=""+
	"<tr id=\"a\">"+
	"<td>" + "Name" + "</td>" +
	"<td id=\"x\" style=\"color: #888888\">" + newName + "</td>"+
	"<td><button type=\"button\" onclick=\"isInform()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelName(){
	document.getElementById("a").outerHTML=""+
	"<tr id=\"a\">"+
	"<td>" + "Name" + "</td>" +
	"<td id=\"x\" style=\"color: #888888\">" + localStorage.x + "</td>"+
	"<td><button type=\"button\" onclick=\"isInform()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//

function Surname(){
	if(isClick){	
	localStorage.xx = document.getElementById("xx").innerText;
	document.getElementById("b").outerHTML=""+
	"<tr id=\"b\">"+
	"<td>" + "Surname" + "</td>" +
	"<td><input id =\"yy\" type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changeSurname()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelSurname()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>";			
	"</tr>";

}
}
function changeSurname(){
	var newSurname = document.getElementById("yy").value;
	document.getElementById("b").outerHTML=""+
	"<tr id=\"b\">"+
	"<td>" + "Surname" + "</td>" +
	"<td id=\"xx\" style=\"color: #888888\">" + newSurname + "</td>"+
	"<td><button type=\"button\" onclick=\"Surname()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelSurname(){
	document.getElementById("b").outerHTML=""+
	"<tr id=\"b\">"+
	"<td>" + "Surname " + "</td>" +
	"<td id=\"xx\" style=\"color: #888888\">" + localStorage.xx + "</td>"+
	"<td><button type=\"button\" onclick=\"Surname()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//
function Dod(){
	
	if(isClick){
	localStorage.xxx = document.getElementById("xxx").innerText;
	document.getElementById("c").outerHTML=""+
	"<tr id=\"c\">"+
	"<td>" + "Date of birth" + "</td>" +
	"<td><input id =\"yyy\" type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changeDate()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelDate()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>";	
	"</tr>";	
 }
}

function changeDate(){
	var newDate = document.getElementById("yyy").value;
	document.getElementById("c").outerHTML=""+
	"<tr id=\"c\">"+
	"<td>" + "Date of birth" + "</td>" +
	"<td id=\"xxx\" style=\"color: #888888\">" + newDate + "</td>"+
	"<td><button type=\"button\" onclick=\"Dod()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelDate(){
	document.getElementById("c").outerHTML=""+
	"<tr id=\"c\">"+
	"<td>" + "Date of birth" + "</td>" +
	"<td id=\"xxx\" style=\"color: #888888\">" + localStorage.xxx + "</td>"+
	"<td><button type=\"button\" onclick=\"Dod()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//
function Sex(){
	if(isClick){
	localStorage.ab = document.getElementById("ab").innerText;
	document.getElementById("d").outerHTML=""+
	"<tr id=\"c\">"+
	"<td>" + "Sex" + "</td>" +
	
	
	"<td><div class=\"form-group\">" +
		"<select id=\"SEX\" class=\"form-control\">" +
			"<option>"+"Male"+"</option>" +
		    "<option>"+"Female"+"</option>" +
		"</select>" +
	"</div></td>" +
	"<td><button type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>";		
	"</tr>";	
}
}

//----------------------------------------------------------------------------------------------//

function Address(){
	if(isClick){
	localStorage.ba = document.getElementById("ba").innerText;
	document.getElementById("e").outerHTML=""+
	"<tr id=\"e\">"+
	"<td>" + "Address" + "</td>" +
	"<td><input id=\"ya\" type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changeAddress()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelAddress()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>";			
"</tr>";
}
}

function changeAddress(){
	var newAddress = document.getElementById("ya").value;
	document.getElementById("e").outerHTML=""+
	"<tr id=\"e\">"+
	"<td>" + "Address" + "</td>" +
	"<td id=\"ba\" style=\"color: #888888\">" + newAddress + "</td>"+
	"<td><button type=\"button\" onclick=\"Address()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelAddress(){
	document.getElementById("e").outerHTML=""+
	"<tr id=\"e\">"+
	"<td>" + "Address " + "</td>" +
	"<td id=\"ba\" style=\"color: #888888\">" + localStorage.ba + "</td>"+
	"<td><button type=\"button\" onclick=\"Address()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//
function City(){
	if(isClick){
	localStorage.bb = document.getElementById("bb").innerText;
	document.getElementById("f").outerHTML=""+
	"<tr id=\"f\">"+
	"<td>" + "City" + "</td>" +
	"<td><input id=\"yb\" type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changeCity()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelCity()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>"+
	"</tr>";		
}
}

function changeCity(){
	var newCity = document.getElementById("yb").value;
	document.getElementById("f").outerHTML=""+
	"<tr id=\"f\">"+
	"<td>" + "City" + "</td>" +
	"<td id=\"bb\" style=\"color: #888888\">" + newCity + "</td>"+
	"<td><button type=\"button\" onclick=\"City()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelCity(){
	document.getElementById("f").outerHTML=""+
	"<tr id=\"f\">"+
	"<td>" + "City " + "</td>" +
	"<td id=\"bb\" style=\"color: #888888\">" + localStorage.bb + "</td>"+
	"<td><button type=\"button\" onclick=\"City()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//


function Code(){
	if(isClick){
	localStorage.bc = document.getElementById("bc").innerText;
	document.getElementById("g").outerHTML=""+
	"<tr id=\"g\">"+
	"<td>" + "Postal Code" + "</td>" +
	"<td><input id=\"kb\" type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changePCode()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelPCode()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>"+	
	"</tr>";	
}
}

function changePCode(){
	var newPCode = document.getElementById("kb").value;
	document.getElementById("g").outerHTML=""+
	"<tr id=\"g\">"+
	"<td>" + "Postal Code" + "</td>" +
	"<td id=\"bc\" style=\"color: #888888\">" + newPCode + "</td>"+
	"<td><button type=\"button\" onclick=\"Code()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelPCode(){
	document.getElementById("g").outerHTML=""+
	"<tr id=\"g\">"+
	"<td>" + "Postal Code " + "</td>" +
	"<td id=\"bc\" style=\"color: #888888\">" + localStorage.bc + "</td>"+
	"<td><button type=\"button\" onclick=\"Code()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//
function Number(){
	if(isClick){
	localStorage.cc = document.getElementById("cc").innerText;
	document.getElementById("h").outerHTML=""+
	"<tr id=\"h\">"+
	"<td>" + "Mobile Number" + "</td>" +
	"<td><input id=\"kk\" type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changeNumber()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelNumber()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>"+
	"</tr>";
}
}

function changeNumber(){
	var newNumber = document.getElementById("kk").value;
	document.getElementById("h").outerHTML=""+
	"<tr id=\"h\">"+
	"<td>" + "Mobile Number" + "</td>" +
	"<td id=\"cc\" style=\"color: #888888\">" + newNumber + "</td>"+
	"<td><button type=\"button\" onclick=\"Number()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelNumber(){
	document.getElementById("h").outerHTML=""+
	"<tr id=\"h\">"+
	"<td>" + "Mobile Number " + "</td>" +
	"<td id=\"cc\" style=\"color: #888888\">" + localStorage.cc + "</td>"+
	"<td><button type=\"button\" onclick=\"Number()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//
function Email(){
	if(isClick){
	localStorage.cd = document.getElementById("cd").innerText;
	document.getElementById("i").outerHTML=""+
	"<tr id=\"i\">"+
	"<td>" + "Email" + "</td>" +
	"<td><input id=\"kw\"  type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changeEmail()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelEmail()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>"+	
	"</tr>";
}
}


function changeEmail(){
	var newEmail = document.getElementById("kw").value;
	document.getElementById("i").outerHTML=""+
	"<tr id=\"i\">"+
	"<td>" + "Email" + "</td>" +
	"<td id=\"cd\" style=\"color: #888888\">" + newEmail + "</td>"+
	"<td><button type=\"button\" onclick=\"Email()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelEmail(){
	document.getElementById("i").outerHTML=""+
	"<tr id=\"i\">"+
	"<td>" + "Email " + "</td>" +
	"<td id=\"cd\" style=\"color: #888888\">" + localStorage.cd + "</td>"+
	"<td><button type=\"button\" onclick=\"Email()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//



function Password(){
	if(isClick){
	localStorage.dd = document.getElementById("dd").innerText;
	document.getElementById("j").outerHTML=""+
	"<tr id=\"j\">"+
	"<td>" + "Password" + "</td>" +
	"<td><input id=\"ww\"  type=\"text\" style=\"color: #888888\"></input></td>"+
	"<td><button onclick=\"changePassword()\" type=\"button\"><span class=\"glyphicon glyphicon-ok\"></span></button>" +
	"<button onclick=\"cancelPassword()\" type=\"button\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>"+
	"</tr>";		
}
}
function changePassword(){
	var newPassword = document.getElementById("ww").value;
	document.getElementById("j").outerHTML=""+
	"<tr id=\"j\">"+
	"<td>" + "Password" + "</td>" +
	"<td id=\"dd\" style=\"color: #888888\">" + newPassword + "</td>"+
	"<td><button type=\"button\" onclick=\"Password()\">" + "Edit" + "</button></td>"+
	"</tr>";
}
function cancelPassword(){
	document.getElementById("j").outerHTML=""+
	"<tr id=\"j\">"+
	"<td>" + "Password " + "</td>" +
	"<td id=\"dd\" style=\"color: #888888\">" + localStorage.dd + "</td>"+
	"<td><button type=\"button\" onclick=\"Password()\">" + "Edit" + "</button></td>"+
	"</tr>";

}
//----------------------------------------------------------------------------------------------//
	
</script>';

echo '<script>
	// Get the modal
	var modalAdd = document.getElementById("modalid");

	// Get the button that opens the modal
	var btnAdd = document.getElementById("btnmodal");


	// Get the <span> element that closes the modal
	var spanAdd = document.getElementsByClassName("close");

	// When the user clicks on the button, open the modal
	btnAdd.onclick = function() {
		modalAdd.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	document.getElementsByClassName("close").onclick = function() {
		modalAdd.style.display = "none";
	}

 </script>';

$x1 = "";
$x1 .= '
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<h4> Personal Information </h4>
								<hr>
								<br>
								';
echo $x1;

$x2 = "";
$x2 .= '<table style="width:100%">
										<tr id="a">
										<!--	<th>Firstname</th> -->
										<td>Name</td>
										<td id ="x" style="color: #888888";>' . $row['NAME'] . '</td>
										<td>
										<button type="button" onclick="isInform()">
											Edit
										</button></td>
										</tr>
										<tr id="b">
											<td>Surname</td>
											<td id="xx" style="color: #888888";>' . $row['SURNAME'] . '</td>
											<td>
											<button type="button" onclick="Surname()">
												Edit
											</button></td>
										</tr>
										<tr id="c">
											<td>Date of birth</td>
											<td id ="xxx" style="color: #888888";>' . $row['DOB'] . '</td>
											<td>
											<button type="button" onclick="Dod()">
												Edit
											</button></td>
										</tr>
										<tr id="d">
											<td>Sex</td>
											<td  id ="ab" style="color: #888888";>' . $row['SEX'] . '</td> 
											<td>
											<button type="button" onclick="Sex()">
												Edit
											</button></td>
										</tr>
										<tr id="e">
											<td>Address</td>
											<td id ="ba" style="color: #888888";>' . $row['ADDRESS'] . '</td>
											<td>
											<button type="button" onclick="Address()">
												Edit
											</button></td>
										</tr>
										<tr id="f">
											<td>City</td>
											<td id="bb" style="color: #888888";>' . $row['CITY'] . '</td>
											<td>
											<button type="button" onclick="City()">
												Edit
											</button></td>
										</tr>
										<tr id="g">
											<td>Postal Code</td>
											<td id="bc" style="color: #888888";>' . $row['POSTAL_CODE'] . '</td>
											<td>
											<button type="button" onclick="Code()">
												Edit
											</button></td>
										</tr>
										<tr id="h">
											<td>Mobile Number</td>
											<td id="cc" style="color: #888888";>' . $row['MOBILE'] . '</td>
											<td>
											<button type="button" onclick="Number()">
												Edit
											</button></td>
										</tr>
										<tr id="i">
											<td>Email</td>
											<td id= "cd" style="color: #888888";>' . $row['EMAIL'] . '</td>
											<td>
											<button type="button" onclick="Email()">
												Edit
											</button></td>
										</tr>
										<tr id="i">
											<td>Password</td>
											<td id= "cd" style="color: #888888";>*********</td>
											<td>
											
							<!----------------------------------------------------------------------->
							<!-- Trigger/Open The Modal -->
											
											
									<button id="btnmodal" class="btn btn-default">Edit &raquo;</button>
									<!-- The Modal -->
									<div id="modalid" class="modal">

										<!-- Modal content -->
										<div class="modal-content">
											<span class="close" style = "font-size:15px !important; color: #ff0000">Press outside the window to exit</span>	
											<h2 align="center"><strong>Change Password</strong></h2>
											<div class="row">
												<div class="col-xs-12">
													<div class = "form-group">
														<label class="col-md-3 control-label" >Old password: </label>
														
														<div class="col-md-9">
														<input id="oldpass" name="oldpass" type="text" placeholder="Insert Old Password" class="form-control">
														</div>
														
														<div class="form-group">
															<label class="col-md-3 control-label" for="message">New Password: </label>
															<div class="col-md-9">
																<textarea class="form-control" id="newpass" name="newpass" placeholder="Insert New Password"></textarea>
															</div>
														</div>
														
														<div class="form-group">
														<label class="col-md-3 control-label" for="message">Confirm New Password: </label>
															<div class="col-md-9">
																<input id = "newpassc" name="newpassc" type ="text" placeholder="Insert New Password" class="form-control">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
											
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			';
echo $x2;
?>