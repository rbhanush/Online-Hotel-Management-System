// JavaScript Document
function validForgetpass(theForm)
{ 
	var reason="";
	reason += validatePass(theForm.npass,theForm.cpass);
	if(reason != "") 
	{
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}

function validatePass(pass,confpass) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores

    if (pass.value == "") {
        pass.style.background = 'Yellow';
        error = "You didn't enter your password.\n";
    } 
	else if ((pass.value.length < 5) ) {
        pass.style.background = 'Yellow';
        error = "The password must be min 5 character long.\n";
    }
    else if (confpass.value == "") {
        confpass.style.background = 'Yellow';
        error = "You didn't enter confirmation password.\n";
    }
	else if ((confpass.value != pass.value) ) {
        confpass.style.background = 'Yellow';
        error = "Confirmation password mismatch.\n";
    }
    return error;
}
