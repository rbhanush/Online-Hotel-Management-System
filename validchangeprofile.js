// JavaScript Document
function validateChangeprof(theForm) {
    var reason = "";
reason += validateFirstname(theForm.first);
	reason += validateCity(theForm.city);
	reason += validateState(theForm.state);
	reason += validateCountry(theForm.country);
   	reason += validateSecurityans(theForm.seca);
   	reason += validateEmail(theForm.email);
   	reason += validatePhone(theForm.phone );
	 	if(reason != "") {
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}

 function validateSecurityans(fld) {
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

 function validateFirstname(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your first name.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}


//City
function validateCity(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your city.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

//State
function validateState(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your states.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

//Country
function validateCountry(fld) {
	   var error = "";
    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your country.\n";
    } 
	else {
        fld.style.background = 'White';
    }
    return error;
}

//Email check
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

//Phone nnmber check
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
	else if (!(stripped.length == 10)) {
        error = "The phone number is the wrong length.Must be 10 digits. \n";
        fld.style.background = 'Yellow';
    }
    return error;
}

function checkname()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.first;
	
	if(fn.value=="")
	{
		alert("You didnt enter the name.\n");
		fn.style.background = 'Yellow';
	}
	
	if(error=="")
	{
		fn.style.background = '';
	}
}

function checknumber()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.phone;
	
	if(fn.value=="")
	{
		alert("You didnt enter the phone number.\n");
		fn.style.background = 'Yellow';
	}
	
	if(error=="")
	{
		fn.style.background = '';
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
        fld.style.background = '';
    }
}

function checkcity()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.city;
	
	if(fn.value=="")
	{
		alert("You didnt enter the city.\n");
		fn.style.background = 'Yellow';
	}
	
	if(error=="")
	{
		fn.style.background ='';
	}
}

function checkstate()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.state;
	
	if(fn.value=="")
	{
		alert("You didnt enter the state.\n");
		fn.style.background = 'Yellow';
	}
	
	if(error=="")
	{
		fn.style.background = '';
	}
}

function checkcountry()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.country;
	
	if(fn.value=="")
	{
		alert("You didnt enter the country.\n");
		fn.style.background = 'Yellow';
	}
	
	if(error=="")
	{
		fn.style.background = '';
	}
}

function checkquestion()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.secq;
	
	if(fn.value=="")
	{
		alert("You didnt enter the security question.\n");
		fn.style.background = 'Yellow';
	}
	
	if(error=="")
	{
		fn.style.background = '';
	}
}

function checkanswer()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.seca;
	
	if(fn.value=="")
	{
		alert("You didnt enter the security answer.\n");
		fn.style.background = 'Yellow';
	}
	
	if(error=="")
	{
		fn.style.background = '';
	}
}
