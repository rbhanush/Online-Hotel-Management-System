// JavaScript Document
function validBill(theForm) {
    var reason = "";
 	reason += validate(theForm.user);
if(reason != "") {
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}

function validate(fld) {
	  	var error = "";
		if(fld.value == '') {
			fld.style.background = 'Yellow';
        
        error = "Please enter the username.\n";
		}
    return error;
}
