function validateEnquiry(theForm)
{ 
	var reason="";
	reason += validateName(theForm.name);
	reason += validateEmail(theForm.email);
	reason += validatePhone(theForm.phone);
	reason += validateMessage(theForm.message);
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

function trim(s)
{
   	return s.replace(/^\s+|\s+$/, '');
}


function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;

    if (fld.value == "") {
        fld.style.background = 'Yellow';
        error = "You didn't enter an email address.\n";
    } 
	else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = 'Yellow';
        error = "Please enter a valid email address.\n";
    } 
	else if (fld.value.match(illegalChars)) {
        fld.style.background = 'Yellow';
        error = "The email address contains illegal characters.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

function validatePhone(fld) {
    var error = "";
    var stripped = fld.value;

   if (fld.value == "") {
        error = "You didn't enter a phone number.\n";
        fld.style.background = 'Yellow';
    } 
	else if (isNaN(parseInt(stripped))) {
        error = "The phone number contains illegal characters.\n";
        fld.style.background = 'Yellow';
    } 
	else if (!(stripped.length == 10  || stripped.length == 12)) {
        error = "The phone number is not a valid number. \n";
        fld.style.background = 'Yellow';
    }
    return error;
}

function validateMessage(fld)
{
    var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your message.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

function checkname()
{
	var error = "";
	theForm=document.forms['f'];
	var fld=theForm.name;
	
    if (fld.value == "") 
	{
   		fld.style.background = 'Yellow';
        alert("You didn't enter your name.\n");
    }
	else 
	{
        fld.style.background = 'White';
    }
}

function checkemail()
{
	var error="";
	theForm=document.forms['f'];
	var fld=theForm.email;

    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;

    if (fld.value == "") {
        fld.style.background = 'Yellow';
        error = "You didn't enter an email address.\n";
    } 
	else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = 'Yellow';
        error = "Please enter a valid email address.\n";
    } 
	else if (fld.value.match(illegalChars)) {
        fld.style.background = 'Yellow';
        error = "The email address contains illegal characters.\n";
    }
	if(error!="")
	{
		alert(error);
	}
	else 
	{
        fld.style.background = 'White';
    }
}

function checkphone()
{
	var error = "";
	theForm=document.forms['f'];
	var fld=theForm.phone;

    var stripped = fld.value;

   	if (fld.value == "") 
	{
        error = "You didn't enter a phone number.\n";
        fld.style.background = 'Yellow';
    } 
	else if (isNaN(parseInt(stripped))) 
	{
        error = "The phone number contains illegal characters.\n";
        fld.style.background = 'Yellow';
    } 
	else if (!(stripped.length == 10 || stripped.length == 12)) 
	{
        error = "The phone number is not a valid number. \n";
        fld.style.background = 'Yellow';
    }
	if(error!="")
	{
		alert(error);
	}
	else
	{
		fld.style.background = 'White';
	}
}

