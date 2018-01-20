// JavaScript Document
function validateRes(form)
{
	var er='';
	er+=validateBankName(form.bankname);
	er+=validateCardNo(form.cardno);
	er+=validatePassword(form.password);
	if(er)
	{alert(er);
	return false;}
	else
	return true;
}
function validateBankName(fld)
{
	var error="";
	if(fld.value=="")
	{
   		fld.style.background = 'Yellow';
        error += "You didn't enter proper bank name.\n";
    }
	else 
	{
        fld.style.background = 'White';
    }
    return error;
}
function validateCardNo(fld)
{
	var error="";
	if(fld.value=="")
	{
   		fld.style.background = 'Yellow';
        error += "You didn't enter proper card no.\n";
    }
	else 
	{
        fld.style.background = 'White';
    }
    return error;
}
function validatePassword(fld)
{
	var error="";
	if(fld.value=="")
	{
   		fld.style.background = 'Yellow';
        error += "You didn't enter proper password.\n";
    }
	else 
	{
        fld.style.background = 'White';
    }
    return error;
}

function checkbankname()
{
	var error="";
	theForm=document.forms["rescon"];
	var bname=theForm.bankname;

	if(bname.value=="")
	{
   		bname.style.background = 'Yellow';
        error += "You didn't enter bank name.\n";
    }
	if(error=="")
	{
        bname.style.background = 'White';
    }
	else
	{
		alert(error);
	}
}

function checkcardno()
{
	var error="";
	theForm=document.forms["rescon"];
	var cno=theForm.cardno;

	if(cno.value=="")
	{
   		cno.style.background = 'Yellow';
        error += "You didn't enter proper card no.\n";
    }
	if(error=="")
	{
        cno.style.background = 'White';
    }
	else
	{
		alert(error);
	}
}

function checkpass()
{
	var error="";
	theForm=document.forms["rescon"];
	var pass=theForm.password;

	if(pass.value=="")
	{
   		pass.style.background = 'Yellow';
        error += "You didn't enter proper password.\n";
    }
	if(error=="")
	{
        pass.style.background = 'White';
    }
	else
	{
		alert(error);
	}
}