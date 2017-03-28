<?php session_start();
require_once ("database.php");
//connecting with database
$db = new Database();

$email = $_SESSION['email'];
$local = $_SESSION['islogin'];

$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL= \"" . $email . "\" ";
$sq2 = mysqli_query($conn, $sql);
if ($query -> num_rows != 0)
	$rowcount = $sq1 -> num_rows;
$row = mysqli_fetch_array($sq2, MYSQL_ASSOC);

$x1 = "";
$x1 .= '<body>
			<div>
				<h1 style="text-align:center;"><p class="lead" style="font-size: 40px; text-align:center; color:white; ">Submit your comments</p></h1>
			</div>;';
echo $x1;

$x2 = "";
$x4="";
if ($local == true) {
	$x2 .= '
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="well well-sm">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Name:</label>
									<div class="col-md-9">
										<label class="col-md-3 control-label" for="name">' . $row['NAME'] . '</label>
									</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Your E-mail:</label>
									<div class="col-md-9">
										<label class="col-md-3 control-label" for="name">' . $row['EMAIL'] . '</label>
									</div>
								</div>';
echo $x2;
} 

else {
	$x4 = '
	<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="well well-sm">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Name:</label>
									<div class="col-md-9">
										<input id="name" name="name" type="text" placeholder="Your name" class="form-control">
									</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Your E-mail:</label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control">
									</div>
								</div>

	';
	echo $x4;
}
$x3 = "";
$x3 .= '
			<!-- Header input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Post Title:</label>
									<div class="col-md-9">
										<input id="PostTitle" name="PostTitle" type="text" placeholder="Insert Post Title" class="form-control">
									</div>
								</div>

								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Your message:</label>
									<div class="col-md-9">
										<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="10"></textarea>
									</div>
								</div>

								<!-- Post Button -->
								<div class="form-group">
									<div class="col-md-12 text-right">
										<button type="submit" class="btn btn-primary btn-lg">
											Post to forum
										</button>
										
										<a class="btn btn-primary btn-lg" type="submit" href="Forum.php">Return to Discussions</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>';
echo $x3;
?>
