function validate()
{
	var username=document.getElementById("username");
	var name=document.getElementById("name");
	var email=document.getElementById("email");
	var phoneno=document.getElementById("phoneno");
	var address=document.getElementById("address");
	var gender=document.getElementById("gender");
	var age=document.getElementById("age");
	var pw=document.getElementById("pw");
	var cpw=document.getElementById("cpw");
	
	var alphaExp = /^[a-zA-Z]+$/;
	var atpos = EmailId.value.indexOf("@");
    var dotpos = EmailId.value.lastIndexOf(".");
	
	
	if(username.value==null || username.value=="")
	{
		username.focus();
		alert("Enter valid username");
		return false;
	}
	
    if(name.value==null || name.value=="")
	{
		name.focus();
		alert("Enter valid Name");
		return false;
	}
	
	if(name.value.match(alphaExp)){}
	else{
		alert("Name can have only letters");
		name.focus();
		return false;
	}
	
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.value.length) 
	{
        alert("Enter valid email-ID");
		email.focus();
        return false;
   	}
	
	if(phoneno.value==null || phoneno.value==" ")
	{
		alert("Please Enter Mobile Number");
		phoneno.focus();
		return false;
	}
	if (isNaN(phoneno.value))
	{
		alert(" Your Mobile Number must be Integers");
		phoneno.focus();
		return false;
	}
	if((phoneno.value.length =11))
	{
		alert("Enter the valid Mobile Number");
		phoneno.focus();
		return false;
	}
	
	if(address.value==null || address.value=="")
	{
		address.focus();
		alert("Enter valid Name");
		return false;
	}
	
	if(gender.value==null || gender.value=="")
	{
		gender.focus();
		alert("Enter valid Name");
		return false;
	}
	
	if(age.value==null || age.value=="")
	{
		alert("Please Enter Age");
		age.focus();
		return false;
	}
	if (isNaN(age.value))
	{
		alert(" Your Age must be Integer");
		age.focus();
		return false;
	}
 	if(pw.value.length< 6|| cpw.value.length< 6)
	{
		alert("Please enter a password of atleast 6 characters");
		pw.focus();
		return false;
	}
	else if (pw.value.length != cpw.value.length) 
	{
		alert("Passwords do not match.");
		pw.focus();
        return false;
    }
	else if (pw.value != cpw.value) 
	{
		alert("Passwords do not match.");
		pw.focus();
        return false;
    }
	return true;
}