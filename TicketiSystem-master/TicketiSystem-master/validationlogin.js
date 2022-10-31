function validatelogin()
{
	var Username=document.getElementById("Username");
	var Passwords=document.getElementById("Passwords");
	if(Username.value==null || Username.value=="")
	{
		Username.focus();
		alert("Enter valid Username");
		return false;
	}
	
    if(Passwords.value==null || Passwords.value=="")
	{
		Passwords.focus();
		alert("Enter valid Password");
		return false;
	}

	return true;
}