function validatelogin()
{
	var AdminUsername=document.getElementById("AdminUsername");
	var Password=document.getElementById("Password");
	if(AdminUsername.value==null || AdminUsername.value=="")
	{
		AdminUsername.focus();
		alert("Enter valid Username");
		return false;
	}
	
    if(Password.value==null || Password.value=="")
	{
		Password.focus();
		alert("Enter valid Password");
		return false;
	}

	return true;
}