<?php session_start();

echo '
	<div id="mainnav" class="navbar navbar-default" style="z-index:100;">
		<div class="container-fluid">
	
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span><span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="laGalerie.php">
							<img class="img-rounded" alt="logo" src="pictures/logo.jpg" width="100" height="100">
						</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li>
								<a href="Announcements.php">Announcements </a>
							</li>
	
							<li>
								<a href="Categories.php">Categories </a>
							</li>
			
							<li>
								<a href="videos.php">Videos <span class="glyphicon glyphicon-film"></span></a>
							</li>
	
							<li>
								<a href="Forum.php">Forum <span	class="glyphicon glyphicon-pencil"></span></a>
							</li>
	
							<li>
								<a href="cityCenter.php">Find a Store <span	class="glyphicon glyphicon-globe"></span></a>
							</li>
	
							<li>
								<a href="ContactUs.php"> Contact Us <span class="glyphicon glyphicon-phone-alt"></span></a>
							</li>
						</ul>
						<div id="signup" class="nav navbar-nav navbar-right btn-group-vertical" role="group">';
	
						


if ($_SESSION["islogin"] == false) {
	echo '				

							<li align="right">
								<a href="SignUp.php"> Sign Up/Login <span class="glyphicon glyphicon-user"></span></a>
	
								<form class="navbar-form navbar-right btn-group-vertical" role="group">
									<div class="form-group">
										<input type="text" class="form-control"	placeholder="Search...">
									</div>
									<a href="Search"><span class="glyphicon glyphicon-search"></span></a>
								</form>
							</li>
	
		';
}
else {
	require_once ('database.php');
	$db=new Database();
	$sql = "SELECT * FROM CUSTOMERS WHERE EMAIL= \"".$_SESSION["email"]."\"";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query, MYSQL_ASSOC);
	if ($row['ISADMIN'] == 1){
		echo '				
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Welcome, '.$row["NAME"].' 
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li>
										<a href="notifications.php">Notifications</a>
									</li>
									<li>
										<a href="infoForm.php">Settings</a>
									</li>
									<li>
										<a id="logout" name="logout" href="login.php">Logout</a>
									</li>
								</ul>
							</div>
	
							<form class="navbar-form navbar-right btn-group-vertical" role="group">
								<div class="form-group">
									<input type="text" class="form-control"	placeholder="Search...">
								</div>
								<a href="Search"><span class="glyphicon glyphicon-search"></span></a>
							</form>';
	}
	else{
		echo '				
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Welcome, '.$row["NAME"].' 
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li>
										<a href="cart.php">Cart</a>
									</li>
									<li>
										<a href="order.php">Order History</a>
									</li>
									<li>
										<a href="infoForm.php">Settings</a>
									</li>
									<li>
										<a id="logout" name="logout" href="login.php">Logout</a>
									</li>
								</ul>
							</div>
	
							<form class="navbar-form navbar-right btn-group-vertical" role="group">
								<div class="form-group">
									<input type="text" class="form-control"	placeholder="Search...">
								</div>
								<a href="Search"><span class="glyphicon glyphicon-search"></span></a>
							</form>';
	}
}
echo '					</div>
					</div>
				</div>
			</nav>
		</div>
	</div>';
?>
