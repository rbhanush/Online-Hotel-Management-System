function validateLogin(theForm)
{ 
	var reason="";
	reason += validateName(theForm.username);
	reason += validatePassword(theForm.password);
	if(reason != "") 
	{
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}

function checkname()
{
	var error="";
	theForm=document.forms['f'];
	var un=theForm.username;
	
	if(un.value=="")
	{		un.style.background = 'Yellow';

		alert("You didnt enter the username.\n");
	}
	if(error=="")
	{
		un.style.background = 'White';
	}
}



function pass()
{
	var error="";
	theForm=document.forms['f'];
	var un=theForm.password;
	
	if(un.value=="")
	{		un.style.background = 'Yellow';

		alert("You didnt enter the password.\n");
	}
	if(error=="")
	{
		un.style.background = 'White';
	}
}



function validatePassword(fld)
{
    var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your password.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

function validateName(fld)
{
    var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your username.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}