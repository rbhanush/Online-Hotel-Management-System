//Form validation
function validateFormOnSubmit(theForm) {
    var reason = "";
 	//var em=theForm.emailf;
    //document.write("Entered emai"+em);
	reason += validateSecurityques(theForm.secquestion);
	reason += validateFirstname(theForm.fname);
		reason += validateGender(theForm);

	reason += validateCity(theForm.city);
	reason += validateState(theForm.state);
	reason += validateCountry(theForm.country);
   	reason += validateUsername(theForm.username);
	reason += validateSecurityans(theForm.secanswer);
   	reason += validateEmail(theForm.email);
   	reason += validatePass(theForm.password,theForm.confirmpass);
   	reason += validatePhone(theForm.phone );

 	if(reason != "") {
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}
 //hello test
//Validate password. 
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

function validateGender(theForm)
{
	var error="";
	
	if (( theForm.sex[0].checked == false ) && ( theForm.sex[1].checked == false ) ) 
		error = "Please choose your Gender: Male or Female\n"; 
	return error;
}


//security question
function validateSecurityques(fld) {
	  	var error = "";
		if(fld.value == 'default') {
			fld.style.background = 'Yellow';
        
        error = "Please select the security question.\n";
		}
    return error;
}
 
 //security answer
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

 //first name
 function validateFirstname(fld) {
	   var error = "";
	   var illegalChars = /\W/; // allow letters, numbers, and underscores

    if (fld.value == "") {
   		fld.style.background = 'Yellow';
        error = "You didn't enter your first name.\n";
    }
	else if (illegalChars.test(fld.value)) {
        fld.style.background = 'Yellow';
        error = "The name contains illegal characters.\n";
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

//Username check
function validateUsername(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores

    if (fld.value == "") {
        fld.style.background = 'Yellow';
        error = "You didn't enter your User Name.\n";
    } 
	else if (!(fld.value.length > 3) ) {
		  fld.style.background = 'Yellow';
        error = "The username must conatin more than 3 characters.\n";
    } 
	else if (!(fld.value.length <= 10)) {
        fld.style.background = 'Yellow';
        error = "The username cannot be exist more than 10 characters.\n";
    } 
	else if (illegalChars.test(fld.value)) {
        fld.style.background = 'Yellow';
        error = "The username contains illegal characters.\n";
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

function checkfname()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.fname;
	
	if(fn.value=="")
	{	fn.style.background = 'Yellow';

		alert("You didnt enter the firstname.\n");
		}
	else
	{
		fn.style.background = 'White';
	}
}

function checkuname()
{
	var error="";
	theForm=document.forms['f'];
	var un=theForm.username;
	
	if(un.value=="")
	{	un.style.background = 'Yellow';

		alert("You didnt enter the username.\n");
		}
		else if (!(fn.value.length > 3) ) {
		  fn.style.background = 'Yellow';
        alert( "The username must conatin more than 3 characters.\n");
    } 
	else if (!(fn.value.length <= 10)) {
        fn.style.background = 'Yellow';
        alert("The username cannot be exist more than 10 characters.\n");
    } 
	else
	{
		un.style.background = 'White';
	}
}

function checkpass()
{
	var error="";
	theForm=document.forms['f'];
	var pass=theForm.password;
	
	if(pass.value=="")
	{
		pass.style.background = 'Yellow';
		alert("You didnt enter the password.\n");
	}
		else if ((pass.value.length < 5) ) {
        pass.style.background = 'Yellow';
        alert("The password must be min 5 character long.\n");
    }

	else
	{
		pass.style.background = 'White';
	}
}

function checkconfpass()
{
	var error="";
	theForm=document.forms['f'];

	var pass=theForm.password;
	var confpass=theForm.confirmpass;

	if(pass.value=="")
	{
		error += "You didnt enter the password.\n";
		pass.style.background = 'Yellow';
	}
	if(confpass.value=="")
	{
		error += "You didnt enter the confirmation password.\n";
		confpass.style.background = 'Yellow';
	}
	
	if(pass.value != confpass.value)
	{
		if(pass!=confpass)
			error += "Confirmation password mismatch.\n";
	}
	
	if(error=="")
	{
		confpass.style.background = 'White';
	}
	else
	{
		alert(error);
	}
}
function checkcity()
{
	var error = "";
	theForm=document.forms['f'];
	var fld=theForm.city;

	if (fld.value == "") 
	{
   		fld.style.background = 'Yellow';
        alert("You didn't enter your city.\n");
    } 
	else 
	{
        fld.style.background = 'White';
    }
}

function checkstate()
{
	var error = "";
	theForm=document.forms['f'];
	var fld=theForm.state;

	if (fld.value == "") 
	{
   		fld.style.background = 'Yellow';
        alert("You didn't enter your state.\n");
    } 
	else 
	{
        fld.style.background = 'White';
    }
}

function checkcountry()
{
	var error = "";
	theForm=document.forms['f'];
	var fld=theForm.country;

	if (fld.value == "") 
	{
   		fld.style.background = 'Yellow';
        alert("You didn't enter your country.\n");
    } 
	else 
	{
        fld.style.background = 'White';
    }
}

function checksecqstn()
{
	var error = "";
	theForm=document.forms['f'];
	var fld=theForm.secanswer;

	if (fld.value == "") 
	{
   		fld.style.background = 'Yellow';
        alert("You didn't answer any security question.\n");
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
	else if (!(stripped.length == 10)) 
	{
        error = "The phone number is the wrong length.Must be 10 digits. \n";
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

function securityques(fld) {
	  	var error = "";
			theForm=document.forms['f'];
	var fld=theForm.secquestion;

		if(fld.value == 'default') {
			fld.style.background = 'Yellow';
        
        alert("Please select the security question.\n");
		}
	else
	{
		fld.style.background = 'White';
	}
}
 
