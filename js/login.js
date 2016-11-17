var islogin = true;

function visibility(){
	
	/*product.html file's variables*/
	if(islogin) return;
	document.getElementById("cart").style.display="none";
	document.getElementById("totp").style.display="none";
	document.getElementById("fff").style.display="none";
}
function isLogin(){
	if (islogin)
		document.getElementById("signup").outerHTML=""+
		
		"<a id=\"signup\"  class=\"button\">"+
			"<li id=\"signup\" class=\"dropdown\">"+
				"<a class=\"dropdown-toggle\""+
				"data-toggle=\"dropdown\" href=\"Categories.html\">Welcome, Admin <span"+
				"class=\"caret\"></span></a>"+
				"<ul class=\"dropdown-menu\">"+
					"<li>"+
						"<a href=\"#\">Cart</a>"+
					"</li>"+
					"<li>"+
						"<a href=\"#\">Order History</a>"+
					"</li>"+
					"<li>"+
						"<a href=\"#\">Settings</a>"+
					"</li>"+
				"<li>"+
					"<a href=\"#\">Logout</a>"+
				"</li>"+
			"</ul>"+
		"</li>"+
		"</a>";
				
	else
		document.getElementById("signup").outerHTML=""+
		"<a id=\"signup\" href=\"SignUp.html\" class=\"button\"> Sign Up/Login "+
			"<span class=\"glyphicon glyphicon-user\"></a>";
	
	visibility();	
}



