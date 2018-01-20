// JavaScript Document
function validateRes()
{ 
	theForm=document.forms["register"];
	
	var reason="";
	reason += validateName(theForm.uname);
	reason += datecheck(theForm.cindate,theForm.coutdate);
	reason += checkcat(theForm.ct);
	if(reason != "") 
	{
    	alert("Some fields need correction:\n" + reason);
 		return false;
	}
 	return true;
}
function daysBetween(first, second) {

    // Copy date parts of the timestamps, discarding the time parts.
    var one = new Date(first.getFullYear(), first.getMonth(), first.getDate());
    var two = new Date(second.getFullYear(), second.getMonth(), second.getDate());

    // Do the math.
    var millisecondsPerDay = 1000 * 60 * 60 * 24;
    var millisBetween = two.getTime() - one.getTime();
    var days = millisBetween / millisecondsPerDay;

    // Round down.
    return Math.floor(days);
}


function datecheck(cin,cout)
{
	var error = "";

	if (cin.value == "") 
	{
   		cin.style.background = 'Yellow';
        error += "You didn't enter check in date.\n";
    } 
	if (cout.value == "") 
	{
   		cout.style.background = 'Yellow';
        error += "You didn't enter check out date.\n";
    }

	var Date1 = new Date(cin.value);
	var Date2 = new Date(cout.value);
	var today = new Date();
	
	var diff=daysBetween(Date1,today);
	
	if( diff > 0 )
		error += "Check in date is not proper.\n";

	var diff=daysBetween(Date2,today);
	
	if( diff > 0 )
		error += "Check out date is not proper.\n";
	
	if(Date2 < Date1)
     	error += "Check out date should be greater than check in date.\n";
	
 	return error;
}

function validateName(fld)
{
    var error = "";
    if (fld.value == "") 
	{
   		fld.style.background = 'Yellow';
        error += "You didn't enter your name.\n";
    }
	else 
	{
        fld.style.background = 'White';
    }
    return error;
}

function cincheck()
{
	theForm=document.forms["register"];
	
	var error="";
	var cin=theForm.cindate;
	var cout=theForm.coutdate;	
	var jcin=/^[2]{1}[0-9]{3}-[0-1]{1}[0-9]{1}-[0-3]{1}[0-9]{1}$/

	if(cin.value=="")
	{
		cin.style.background = 'Yellow';
		error += "";
	}
	else if(cin.value.search(jcin)==-1)
	{
		cin.style.background = 'Yellow';
		error += "";
	}
	
	if(cin.value != "")
	{
		if(cout.value != "")
		{
			var Date1 = new Date(cin.value);
			var Date2 = new Date(cout.value);
			var today = new Date();
	
			var diff=daysBetween(Date1,today);
	
			if( diff > 0 )
				error += "Checkin date is less than today's date.\n";

			var diff=daysBetween(Date2,today);
	
			if( diff > 0 )
				error += "Checkout date is less than today's date.\n";
	
			if(Date2 < Date1)
		     	error += "Checkout date is less than Checkin date.\n";
		}
		else
		{
			var Date1 = new Date(cin.value);
			var today = new Date();
	
			var diff=daysBetween(Date1,today);
	
			if( diff > 0 )
				error += "Checkin date is less than today's date.\n";
		}
	}
	
	if(error != "")
	{
		alert("Some fields need correction:\n" + error);
	}
	else 
	{
        cin.style.background = 'White';
    }	
}

function coutcheck()
{
	theForm=document.forms["register"];
	
	var error="";
	var cin=theForm.cindate;	
	var cout=theForm.coutdate;
	var jcout=/^[2]{1}[0-9]{3}-[0-1]{1}[0-9]{1}-[0-3]{1}[0-9]{1}$/

	if(cout.value=="")
	{
		cout.style.background = 'Yellow';
		error += "";
	}
	else if(cout.value.search(jcout)==-1)
	{
		cout.style.background = 'Yellow';
		error += "";
	}
	
	var Date1 = new Date(cin.value);
	var Date2 = new Date(cout.value);
	var today = new Date();
	
	var diff=daysBetween(Date1,today);
	
	if( diff > 0 )
		error += "Checkin date is less than today's date.\n";

	var diff=daysBetween(Date2,today);
	
	if( diff > 0 )
		error += "Checkout date is less than today's date.\n";
	
	if(Date2 < Date1)
     	error += "Checkout date is less than Checkin date.\n";
	
	if(error != "")
	{
		alert("Some fields need correction:\n" + error);
	}
	else 
	{
        cout.style.background = 'White';
    }	

}

function checkcat(ct)
{
	var error="";
	
	if(ct.value == "default")
	{
		error += "You didn't select the room category.\n";
		ct.style.background = 'Yellow';
	}

	if(error == "")
		ct.style.background = 'White';
		
	return error;
}

function checkcategory()
{
	var error = "";
	theForm=document.forms['register'];
	var fld=theForm.ct;
	
    if (fld.value == "default") 
	{
   		fld.style.background = 'Yellow';
        alert("You didn't choose a room type.\n");
    }
	else 
	{
        fld.style.background = 'White';
    }
}
