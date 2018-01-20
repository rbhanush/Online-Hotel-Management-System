function validForgetpassword(theForm)
{ 
	var reason="";
	reason += validateName(theForm.username);
	reason += validateSecquestion(theForm.secquestion);
	reason += validateSecanswer(theForm.secanswer);
	if(reason != "") 
	{
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}

function validateName(fld)
{

    var error = "";
    if (fld.value == "") 
	{
   		fld.style.background = 'Yellow';
        error = "You didn't enter your name.\n";
    }
	//else if (illegalChars.test(fld.value)) 
	//{
      //  fld.style.background = 'Yellow';
       // error = "The username contains illegal characters.\n";
	//}
	else 
	{
        fld.style.background = 'White';
    }
    return error;
}

//security question
function validateSecquestion(fld) {
	  	var error = "";
		if(fld.value == 'default') {
		fld.style.background = 'Yellow';
        error = "Please select the security question.\n";
		
		}
    return error;
}
 
 //security answer
 function validateSecanswer(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your confirmation answer.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}
