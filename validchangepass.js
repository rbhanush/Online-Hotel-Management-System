// JavaScript Document
function validNewpassword(theForm)
{ 
	var reason="";
	reason += validateCurpass(theForm.curpass);
	reason += validateNewpass(theForm.newpass);
	if(reason != "") 
	{
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}

 function validateCurpass(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your current password.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

 function validateNewpass(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your new password.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

