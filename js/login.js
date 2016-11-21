//localStorage.islogin="false";
//localStorage.incorrect="false";

function visibility(){
	
	/*product.html file's variables*/
	if(localStorage.islogin=="true") return;
	document.getElementById("cart").style.display="none";
	document.getElementById("totp").style.display="none";
	document.getElementById("fff").style.display="none";
}
function login(){
	localStorage.islogin="true";
	window.location.href = "laGalerie.html";
}
function logout(){
	localStorage.islogin="false";
	window.location.href = "laGalerie.html";
}

function tryLogin(){
	if((document.getElementById("email_address").value == "admin")
	&& document.getElementById("password").value == "admin"){
		login();
	}
	else{
		window.location.href = "SignUp.html";
		document.getElementById("incorrect").outerHTML="<p id=\"incorrect\" style=\"color: #ff0000\">Incorrect Email and Password Combination</p>";
	}
}

function isLogin(){
	if (localStorage.islogin=="true")
		document.getElementById("signup").outerHTML=""+
		"<div id=\"signup\" class=\"nav navbar-nav navbar-right btn-group-vertical\" role=\"group\">"+
			"<div class=\"btn-group\" role=\"group\">"+
				"<button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">"+
					"Welcome, Admin!"+
					"<span class=\"caret\"></span>"+
				"</button>"+
				"<ul class=\"dropdown-menu\">"+
					"<li>"+
						"<a href=\"cart.html\">Cart</a>"+
					"</li>"+
					"<li>"+
						"<a href=\"#\">Order History</a>"+
					"</li>"+
					"<li>"+
						"<a href=\"infoForm.html\">Settings</a>"+
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
				"<a href=\"SignUp.html\"> Sign Up/Login <span class=\"glyphicon glyphicon-user\"></span></a>"+
				"<form class=\"navbar-form navbar-right btn-group-vertical\" role=\"group\">"+
					"<div class=\"form-group\">"+
						"<input type=\"text\" class=\"form-control\" placeholder=\"Search...\">"+
					"</div>"+
					"<a href=\"Search\"><span class=\"glyphicon glyphicon-search\"></span></a>"+
				"</form>"+
			"</li>"+
		"</div>";
	
	visibility();
}



