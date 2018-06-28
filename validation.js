function val()
{
	for(var ind=0; ind<document.forms[1].elements.length; ind++)
		if(document.forms[1].elements[ind].value == ""){
			alert("Please fill all the data");
			return false;
		}
	
	var email_reg = /^[A-Za-z0-9_]+\@[a-z0-9_]+\.[a-z]+$/;
	var email = document.getElementById("email").value;
	var pass = document.getElementById("pass");
	var pass2 = document.getElementById("pass2");
	if(!email_reg.test(email)){
		alert("Email entered is invalid.");
		email.focus();
		email.select();
		return false;
	}
	else if (pass.value != pass2.value)
	{
		alert("Passwords mismatch.");
		pass2.focus();
		pass2.select();
		return false;
	}
	
	return true;
}

