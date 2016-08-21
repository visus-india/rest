var specialKeys = new Array();
specialKeys.push(8); //Backspace
specialKeys.push(9); //Tab
specialKeys.push(46); //Delete
specialKeys.push(36); //Home
specialKeys.push(35); //End
specialKeys.push(37); //Left
specialKeys.push(39); //Right
function OKValidateAlphaOnly(e) // Function to accept only Alphabet Letters 
{
	var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
	var ret = ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode || keyCode==46 || keyCode==39 || keyCode==32));            
	return ret;
}
function isNumberKey(evt)   // Function to accept only numeric values

{  
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
	
	return false;
	return true;
}


function OKValidatePhoneno(event)   // Function to accept only numeric & special characters(-,+ , . , ) , )) values
{
	var regex = new RegExp("^[0-9?+-.()]+$");
	var key = String.fromCharCode((event.charCode ? event.which : event.charCode)|| (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode || keyCode==46 || keyCode==39 || keyCode==32));
	if (!regex.test(key))
	{
		event.preventDefault();
		return false;
	}
}
//Added for job posting page
//modified after review
function OKValidateAlphaAndSpecial(event)   // Function to accept only numeric & special characters(-,+ , . , ) , )) values
{
	var regex = new RegExp("^[A-Za-z0-9?+-. (){}\[\\\]]+$");
	var key = String.fromCharCode((event.charCode ? event.which : event.charCode)|| (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode || keyCode==46 || keyCode==39 || keyCode==32));
	if (!regex.test(key))
	{
		event.preventDefault();
		return false;
	}
}
//Added for job posting page
function OKValidateDecimal(event)   // Function to accept only numeric &. values
{
	var regex = new RegExp("^[0-9?+.]+$");
	var key = String.fromCharCode((event.charCode ? event.which : event.charCode)|| (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode || keyCode==46 || keyCode==39 || keyCode==32));
	if (!regex.test(key))
	{
		event.preventDefault();
		return false;
	}
}

function OKValidateAlphaNumeric(e)   // Allow Alpha numberic values only
{
	var key;
	var keychar;
	if (window.event) key = window.event.keyCode;
	else if (e) key = e.which;
	else return true;
	keychar = String.fromCharCode(key);
	keychar = keychar.toLowerCase(); // control keys 
	if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) ) return true; // alphas and numbers
	else if ((("abcdefghijklmnopqrstuvwxyz0123456789").indexOf(keychar) > -1)) return true; else return false; 
} 



function numbersonly(e)   //  Numbers Only Validation
{ 
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57) //if not a number
		return false //disable key press
	}
}
