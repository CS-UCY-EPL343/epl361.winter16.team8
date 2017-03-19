
function login(){
	localStorage.setItem("islogin","true");
	window.location.href = "laGalerie.php";
}
function logout(){
	localStorage.setItem("islogin","false");
	localStorage.setItem("username","UNDEFINED_USERNAME");
	localStorage.setItem("email","UNDEFINED_EMAIL");
	window.location.href = "laGalerie.php";
}
function popup(){
	alert('Not yet implemented!');
}
function tryLogin(){
	if((document.getElementById("email_address").value == "admin")
	&& document.getElementById("password").value == "admin"){
		login();
	}
	else{
		window.location.href = "SignUp.php";
		document.getElementById("incorrect").outerHTML="<p id=\"incorrect\" style=\"color: #ff0000\">Incorrect Email and Password Combination</p>";
	}
}

function isLogin(){
	if (localStorage.getItem("islogin")=="true")
		document.getElementById("signup").outerHTML=""+
		"<div id=\"signup\" class=\"nav navbar-nav navbar-right btn-group-vertical\" role=\"group\">"+
			"<div class=\"btn-group\" role=\"group\">"+
				"<button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">"+
					"Welcome, "+localStorage.getItem("username") +
					"<span class=\"caret\"></span>"+
				"</button>"+
				"<ul class=\"dropdown-menu\">"+
					"<li>"+
						"<a href=\"cart.php\">Cart</a>"+
					"</li>"+
					"<li>"+
						"<a href=\"javascript:popup()\">Order History</a>"+
					"</li>"+
					"<li>"+
						"<a href=\"infoForm.php\">Settings</a>"+
					"</li>"+
					"<li>"+
						"<a onclick=\"logout()\" href=\"#\">Logout</a>"+
					"</li>"+
				"</ul>"+
			"</div>"+
			"<form>"+
				"<div class=\"form-group\">"+
					"<input type=\"text\" class=\"form-control\" placeholder=\"Search...\" />"+
				"</div>"+
			"</form>"+
		"</div>";
				
	else
		document.getElementById("signup").outerHTML=""+
		"<div id=\"signup\" class=\"nav navbar-nav navbar-right btn-group-vertical\" role=\"group\">"+
			"<li align=\"right\">"+
				"<a href=\"SignUp.php\"> Sign Up/Login <span class=\"glyphicon glyphicon-user\"></span></a>"+
				"<form class=\"navbar-form navbar-right btn-group-vertical\" role=\"group\">"+
					"<div class=\"form-group\">"+
						"<input type=\"text\" class=\"form-control\" placeholder=\"Search...\">"+
					"</div>"+
					"<a href=\"Search\"><span class=\"glyphicon glyphicon-search\"></span></a>"+
				"</form>"+
			"</li>"+
		"</div>";
}



