<?php
require_once ("database.php");
//connecting with database
$db = new Database();

$local = "<script>document.write(localStorage.getItem(\"islogin\"))</script>";
echo $local."gfs";

$email = "<script>document.write(localStorage.getItem(\"email\"))</script>";
echo $email;

$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL= " . $email . " ";
$sq2 = mysqli_query($conn, $sql1);
$rowcount = $sql1 -> num_rows;
$row = mysqli_fetch_array($sql2, MYSQL_ASSOC);

echo $rowcount . "<br><br>";


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
											<td>email</td>
											<td id= "cd" style="color: #888888";>' . $row['EMAIL'] . '</td>
											<td>
											<button type="button" onclick="Email()">
												Edit
											</button></td>
										</tr>
										<tr id="j">
											<td>password</td>
											<td id= "dd" style="color: #888888";>' . $row['PASSWORD'] . '</td>
											<td>
											<button type="button" onclick="Password()">
												Edit
											</button></td>
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