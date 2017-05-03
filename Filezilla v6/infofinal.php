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

$x1 = "";
$x1 .= '
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<h4> Personal Information </h4>
								<hr>
								<br>
								';
echo $x1;
$sex = "FEMALE";
if ($row['SEX']=="M"){
	$sex = "MALE";
}
$x2 = ".

									<form action='update.php' method='post'>
		<table style='width:100%'>
			<tr>
				<td>
					<label>Name</label>
				</td>
				<td id='name1'>
					<label id='name_label' name='name_label'>".$row['NAME']."</label>
				</td>
				<td id='name2'>
					<button id='name_button' onclick=\"change_name()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td>
					<label>Surame</label>
				</td>
				<td id='surname1'>
					<label id='surname_label' name='surname_label'>".$row['SURNAME']."</label>
				</td>
				<td id='surname2'>
					<button id='surname_button' onclick=\"change_surname()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td>
					<label>Date of Birth</label>
				</td>
				<td id='dob1'>
					<label id='dob_label' name='surname_label'>".$row['DOB']."</label>
				</td>
				<td id='dob2'>
					<button id='dob_button' onclick=\"change_dob()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td>
					<label>Sex</label>
				</td>
				<td id='sex1'>
					<label id='sex_label' name='surname_label'>".$sex."</label>
				</td>
				<td id='sex2'>
					<button id='sex_button' onclick=\"change_sex()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td>
					<label>Country</label>
				</td>
				<td id='country1'>
					<label id='country_label' name='country_label'>".$row['COUNTRY']."</label>
				</td>
				<td id='country2'>
					<button id='country_button' onclick=\"change_country()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td>
					<label>Address</label>
				</td>
				<td id='address1'>
					<label id='address_label' name='address_label'>".$row['ADDRESS']."</label>
				</td>
				<td id='address2'>
					<button id='address_button' onclick=\"change_address()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td>
					<label>City</label>
				</td>
				<td id='city1'>
					<label id='city_label' name='city_label'>".$row['CITY']."</label>
				</td>
				<td id='city2'>
					<button id='city_button' onclick=\"change_city()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td>
					<label>Postal Code</label>
				</td>
				<td id='postal1'>
					<label id='postal_label' name='postal_label'>".$row['POSTAL_CODE']."</label>
				</td>
				<td id='postal2'>
					<button id='postal_button' onclick=\"change_postal()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td>
					<label>Mobile</label>
				</td>
				<td id='mobile1'>
					<label id='mobile_label' name='mobile_label'>".$row['MOBILE']."</label>
				</td>
				<td id='mobile2'>
					<button id='mobile_button' onclick=\"change_mobile()\">Edit</button>
				</td>
			</tr>
			<tr>
				<td id='password_lbl'>
					<label>Password</label>
				</td>
				<td id='password1'>
					<label id='password_label' name='password_label'>******</label>
				</td>
				<td id='password2'>
					<button id='password_button' onclick=\"change_password()\">Edit</button>
				</td>
			</tr>
		</table>
	  </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			";
echo $x2;

echo "<script>
			function change_name(){
				document.getElementById(\"name1\").innerHTML=\"<input type='text' name='name_input' value='".$row['NAME']."'>\";
				document.getElementById(\"name2\").innerHTML=\"<input type='submit' name='submit_name' value='submit'><button id='cancel_name' onclick='revert_name()'>cancel</button>\";
			}
			
			function revert_name(){
				document.getElementById(\"name1\").innerHTML=\"<label id='name_label' name='name_label'>".$row['NAME']."</label>\";
				document.getElementById(\"name2\").innerHTML=\"<button id='name_button' onclick='change_name()'>Edit</button>\";
			}
			
			
			
			function change_surname(){
				document.getElementById(\"surname1\").innerHTML=\"<input type='text' name='surname_input' value='".$row['SURNAME']."'>\";
				document.getElementById(\"surname2\").innerHTML=\"<input type='submit' name='submit_surname' value='submit'><button id='cancel_surname' onclick='revert_surname()'>cancel</button>\";
			}
			
			function revert_surname(){
				document.getElementById(\"surname1\").innerHTML=\"<label id='surname_label' name='surname_label'>".$row['SURNAME']."</label>\";
				document.getElementById(\"surname2\").innerHTML=\"<button id='surname_button' onclick='change_surname()'>Edit</button>\";
			}
			
			
			
			function change_dob(){
				document.getElementById(\"dob1\").innerHTML=\"";
														echo "<table><tr>";
														echo "<td><select id='Year_of_birth' name='Year_of_birth' class='form-control' onchange='dayControl()' required>";
														echo "<option value='' placeholder='YYYY'>(YEAR)</option>";
														$y = date('Y');
														for ($i = $y; $i >= 1930; $i--) {
															echo "<option value='$i'>$i</option>";
														}

													echo "</select></td><td><select id='Month_of_birth' name='Month_of_birth' class='form-control' onchange='dayControl()' required>";
													echo "<option value='' placeholder='MM'>(MONTH)</option>";
													echo "<option value='1'>January</option>";
													echo "<option value='2'>February</option>";
													echo "<option value='3'>March</option>";
													echo "<option value='4'>April</option>";
													echo "<option value='5'>May</option>";
													echo "<option value='6'>June</option>";
													echo "<option value='7'>July</option>";
													echo "<option value='8'>August</option>";
													echo "<option value='9'>September</option>";
													echo "<option value='10'>October</option>";
													echo "<option value='11'>November</option>";
													echo "<option value='12'>December</option></select></td>";
													echo "<td><select id='Day_of_birth' name='Day_of_birth' class='form-control' required>";
														echo "<option value=''>(DAY)</option>";
														for ($i = 1; $i < 32; $i++) {
															echo "<option value='$i'>$i</option>";
														}
													echo "</select><td><tr><table>\";";
				echo "document.getElementById(\"dob2\").innerHTML=\"<input type='submit' name='submit_dob' value='submit'><button id='cancel_dob' onclick='revert_dob()'>cancel</button>\";
			}
			
			function revert_dob(){
				document.getElementById(\"dob1\").innerHTML=\"<label id='dob_label' name='dob_label'>".$row['DOB']."</label>\";
				document.getElementById(\"dob2\").innerHTML=\"<button id='dob_button' onclick='change_dob()'>Edit</button>\";
			}
			
			
			
			function change_sex(){
				document.getElementById(\"sex1\").innerHTML=\"<select id='sex' name='sex' class='form-control' required>";
													echo "<option value='' placeholder='MM'>(SEX)</option>";
													echo "<option value='M'>MALE</option>";
													echo "<option value='F'>FEMALE</option></select>\";
				document.getElementById(\"sex2\").innerHTML=\"<input type='submit' name='submit_sex' value='submit'><button id='cancel_sex' onclick='revert_sex()'>cancel</button>\";
			}
			
			function revert_sex(){
				document.getElementById(\"sex1\").innerHTML=\"<label id='sex_label' name='sex_label'>".$sex."</label>\";
				document.getElementById(\"sex2\").innerHTML=\"<button id='sex_button' onclick='change_sex()'>Edit</button>\";
			}
			
			
			
			function change_country(){
				document.getElementById(\"country1\").innerHTML=\"<input type='text' name='country_input' value='".$row['COUNTRY']."'>\";
				document.getElementById(\"country2\").innerHTML=\"<input type='submit' name='submit_country' value='submit'><button id='cancel_country' onclick='revert_country()'>cancel</button>\";
			}
			
			function revert_country(){
				document.getElementById(\"country1\").innerHTML=\"<label id='country_label' name='country_label'>".$row['COUNTRY']."</label>\";
				document.getElementById(\"country2\").innerHTML=\"<button id='country_button' onclick='change_country()'>Edit</button>\";
			}
			
			
			
			function change_address(){
				document.getElementById(\"address1\").innerHTML=\"<input type='text' name='address_input' value='".$row['ADDRESS']."'>\";
				document.getElementById(\"address2\").innerHTML=\"<input type='submit' name='submit_address' value='submit'><button id='cancel_address' onclick='revert_address()'>cancel</button>\";
			}
			
			function revert_address(){
				document.getElementById(\"address1\").innerHTML=\"<label id='address_label' name='address_label'>".$row['ADDRESS']."</label>\";
				document.getElementById(\"address2\").innerHTML=\"<button id='address_button' onclick='change_address()'>Edit</button>\";
			}
			
			
			
			function change_city(){
				document.getElementById(\"city1\").innerHTML=\"<input type='text' name='city_input' value='".$row['CITY']."'>\";
				document.getElementById(\"city2\").innerHTML=\"<input type='submit' name='submit_city' value='submit'><button id='cancel_city' onclick='revert_city()'>cancel</button>\";
			}
			
			function revert_city(){
				document.getElementById(\"city1\").innerHTML=\"<label id='city_label' name='city_label'>".$row['CITY']."</label>\";
				document.getElementById(\"city2\").innerHTML=\"<button id='city_button' onclick='change_city()'>Edit</button>\";
			}
			
			
			
			function change_postal(){
				document.getElementById(\"postal1\").innerHTML=\"<input type='number' name='postal_input' value='".$row['POSTAL_CODE']."'>\";
				document.getElementById(\"postal2\").innerHTML=\"<input type='submit' name='submit_postal' value='submit'><button id='cancel_postal' onclick='revert_postal()'>cancel</button>\";
			}
			
			function revert_postal(){
				document.getElementById(\"postal1\").innerHTML=\"<label id='postal_label' name='postal_label'>".$row['POSTAL_CODE']."</label>\";
				document.getElementById(\"postal2\").innerHTML=\"<button id='postal_button' onclick='change_postal()'>Edit</button>\";
			}
			
			
			
			function change_mobile(){
				document.getElementById(\"mobile1\").innerHTML=\"<input type='number' name='mobile_input' value='".$row['MOBILE']."'>\";
				document.getElementById(\"mobile2\").innerHTML=\"<input type='submit' name='submit_mobile' value='submit'><button id='cancel_mobile' onclick='revert_mobile()'>cancel</button>\";
			}
			
			function revert_mobile(){
				document.getElementById(\"mobile1\").innerHTML=\"<label id='mobile_label' name='mobile_label'>".$row['MOBILE']."</label>\";
				document.getElementById(\"mobile2\").innerHTML=\"<button id='mobile_button' onclick='change_mobile()'>Edit</button>\";
			}
			
			
			
			function change_password(){
				document.getElementById(\"password_lbl\").innerHTML=\"<table>";
																	echo "<tr><td><label>Old Password</label></td></tr>";
																	echo "<tr><td><label>New Password</label></td></tr>";
																	echo "<tr><td><label>Confirm Password</label></td></tr>";
																echo "</table>\";
				document.getElementById(\"password1\").innerHTML=\"<table>";
																	echo "<tr><td><input type='password' name='old_pass' required></td></tr>";
																	echo "<tr><td><input type='password' name='new_pass' required></td></tr>";
																	echo "<tr><td><input type='password' name='confirm_pass' required></td></tr>";
																echo "</table>\";
				document.getElementById(\"password2\").innerHTML=\"<input type='submit' name='submit_password' value='submit'><button id='cancel_password' onclick='revert_password()'>cancel</button>\";
			}
			
			function revert_password(){
				document.getElementById(\"password_lbl\").innerHTML=\"<label>Password</label>\";
				document.getElementById(\"password1\").innerHTML=\"<label id='password_label' name='password_label'>******</label>\";
				document.getElementById(\"password2\").innerHTML=\"<button id='password_button' onclick='change_password()'>Edit</button>\";
			}
			
			function dayControl() {
													var month = document.getElementById(\"Month_of_birth\").value;
													if (month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12) {
														var day=\"\";
														day+='<option value=\"\">(DAY)</option>';
														var i=0;
														for (i=1;i<=31;i++){
															day+='<option value=\"'+i+'\">'+i+'</option>';
														}
														document.getElementById(\"Day_of_birth\").innerHTML=day;
													}
													else if (month == 4 || month == 6 || month == 9 || month == 11) {
														var day=\"\";
														day+='<option value=\"\">(DAY)</option>';
														var i=0;
														for (i=1;i<=30;i++){
															day+='<option value=\"'+i+'\">'+i+'</option>';
														}
														document.getElementById(\"Day_of_birth\").innerHTML=day;
													}
													else if (month == 2) {
														var d=28;
														var y = document.getElementById(\"Year_of_birth\").value;
														if (y%4==0 && y%100!=0){
															d++;
														}
														var day=\"\";
														day+='<option value=\"\">(DAY)</option>';
														var i=0;
														for (i=1;i<=d;i++){
															day+='<option value=\"'+i+'\">'+i+'</option>';
														}
														document.getElementById(\"Day_of_birth\").innerHTML=day;
													}
												}
		</script>";



?>