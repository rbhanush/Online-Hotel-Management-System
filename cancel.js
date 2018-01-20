// JavaScript Document
function validateFormOnSubmit(theForm) {
	var reason="";
		reason += validateBankname(theForm.bn);
   	reason += validateAccount(theForm.ac);

 	if(reason != "") {
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}

 function validateBankname(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your bank name.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

 function validateAccount(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your bank account number.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

function checkbname()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.bn;
	
	if(fn.value=="")
	{	fn.style.background = 'Yellow';

		alert("You didnt enter the bank name.\n");
		}
	else
	{
		fn.style.background = 'White';
	}
}

function checkaccount()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.ac;
	
	if(fn.value=="")
	{	fn.style.background = 'Yellow';

		alert("You didnt enter the Account number.\n");
		}
	else
	{
		fn.style.background = 'White';
	}
}
