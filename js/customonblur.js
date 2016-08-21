
function OBvalidatecheck() // Empty text box validation 
{
	
	
	//var pat2=phoneNo.value.length > 9 && phoneNo.value.length <= 15;
	var pat3=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	
	var a =document.getElementById("firstNameId").value!="";
	var b =document.getElementById("lNameId").value!="";
	var c =document.getElementById("emailId").value!="";
	var d =document.getElementById("startDate").value!="";
	var e =document.getElementById("contactNum").value!="";
	var f =document.getElementById("jobTypeId").value!="";
	var jrc =document.getElementById("jobroleId").value!="";
	var h =document.getElementById("postalcodeId").value!="";
	var address1 =document.getElementById("addressId1").value!="";
	var town_City =document.getElementById("CityId").value!="";
	var i =document.getElementById("cvId").value!="";
	var j =document.getElementById("usId").checked == true;
	var k =document.getElementById("ausId").checked == true;
	var l =document.getElementById("middleId").checked == true;
	var c2 =pat3.test(document.getElementById('emailId').value);
	var mm =document.getElementById("agreeId").checked == true;
	var phoneNo = document.getElementById('contactNum');
	//alert(a+"<br>"+b+"<br>"+c+"<br>"+d+"<br>"+e+"<br>"+f+"<br>"+g+"<br>"+h+"<br>"+i+"<br>"+j+"<br>"+k+"<br>"+l);
	
	if( ((a && b && c && d && e && f && jrc && h  && address1 && town_City  && phoneNo && c2) == true) && ((j || k || l || i)  == true) && mm==true)
	{			
		
		
		document.getElementById("submitbutton").disabled = false; 
	}
	else
	{	
		
		document.getElementById("submitbutton").disabled = true;				 
		
	}
	
}





/* OBvalidateMandatory function validates the empty value for the fields 
and displayes the error in the screen as specified */

var errcolor="#FF0000"; 


function OBvalidateMandatory(target,error)
{
	
	var d = document;
    var target = d.getElementById(target);
	var error = d.getElementById(error);
	if( target.value == "")
	{
		error.innerHTML=errMsg["90004"];
		target.style.borderColor=errcolor; 
	}
	else
	{
		error.innerHTML=" ";
		target.style.borderColor=""; 
	}
	
}

// Mobile No Validation

//Where You want to work.? validation
function OBcheck()
{ 
	
	var value1=document.getElementById('usId');
	var value2=document.getElementById('ausId');
	var value3=document.getElementById('middleId'); 
	var value4=document.getElementById('ukId');
	
	
	
	if( (value1.checked == true) || (value2.checked == true) || (value3.checked == true) || (value4.checked == true))
	{
		
		document.getElementById('workerror').innerHTML=" ";
	}
	else
	
	{
		
		document.getElementById('workerror').innerHTML=errMsg["90004"];			 
	} 
	
}


function OBvalidateTermscheck()
{
	
	
	var o = document.getElementById('agreeId');
	
	if ( (o.checked == false )  )
	{
		document.getElementById('termerror').innerHTML=errMsg["90004"];
	}
	
	else
	{
		document.getElementById('termerror').innerHTML=" ";
		
	}
}


// Apply for jobs page Validation starts Here:
//***********************************************	

//start of button enable and disable validation for apply-for-job page 
//*******************************************************************

function OBValidationApplyjobcheck() // Empty text box validation 
{
	
	//var pat2=phoneNo.value.length > 9 && phoneNo.value.length <= 15;
	var pat3=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	
	var JobTitle=document.getElementById("jobId").value!="";
	var CompanyName =document.getElementById("companyId").value!="";
	var jobcode =document.getElementById("jobcodeId").value!="";
	var JobType=document.getElementById("jobTypeId1").value!="";
	var country=document.getElementById("country").value!="";
	var firstNameId=document.getElementById("firstNameId").value!="";
	var lNameId=document.getElementById("lNameId").value!="";
	var email=document.getElementById("emailId").value!="";
	var emailvalid =pat3.test(document.getElementById('emailId').value);
	var city =document.getElementById("CityId").value!="";
	var addresssline1 =document.getElementById("addressId1").value!="";
	var citylocation =document.getElementById("cityLocation").value!="";
	var dob =document.getElementById("startDate").value!="";
	var contact=document.getElementById("contactNum").value!="";
	var postal =document.getElementById("postalcodeId").value!="";
	var cv =document.getElementById("cvId").value!="";
	var agree =document.getElementById("agreeId").checked == true;
	
	if((JobTitle && CompanyName && JobType && location && firstNameId && lNameId && email && emailvalid && dob && contact  && postal && cv && agree && city && jobcode && country  && citylocation && addresssline1))  
	{			
		
		
		document.getElementById("submitbutton").disabled = false; 
	}
	else
	{	
		
		document.getElementById("submitbutton").disabled = true;				 
		
	}
	
}


//End  of button enable and disable validation for apply-for-job page 
//*******************************************************************



// Post Jobs Validation starts Here:
//***********************************************		


// single validation 
//updated for post job 
function checkLocationcheckbox()  // Checkbox Location Validation 
{
	
	
	var o = document.getElementById('checkLocation');
	
	if ( (o.checked == false )  )
	{
		document.getElementById('checkboxlocationerror').innerHTML=" Select Location Required";
	}
	
	else
	{
		document.getElementById('checkboxlocationerror').innerHTML=" ";
		
	}
	
}
//updated for post job 
function checkResumecheckbox()  // Checkbox Resume Validation 
{
	
	
	var o = document.getElementById('resumeRequired');
	
	if ( (o.checked == false )  )
	{
		document.getElementById('resumeclikerror').innerHTML=" Select Resume Required";
	}
	
	else
	{
		document.getElementById('resumeclikerror').innerHTML=" ";
		
	}
	
}

//start of button enable and disable validation for post -job page validation
//************************************************************************************
//updated for post job 
function postjobcheck() // Empty text box validation 
{
	
	
	if ((document.getElementById("companyId").value!="") &&  
	(document.getElementById("jobtitle").value!="") &&
	(document.getElementById("jobTypeId").value!="") && 
	(document.getElementById("CountryId").value!="")&& 
	(document.getElementById("CityId").value!="")&&
	(document.getElementById("experience").value!="") && 				
	(document.getElementById("jobDes").value!="")
	)
	{
	
		document.getElementById("submitbutton").disabled = false; 
		
	}
	else
	{
		
		document.getElementById("submitbutton").disabled = true;
		
	} }
	
	
	
	//End  of button enable and disable validation for post-job page validation 
	//*******************************************************************
	
	
	// Contact_us  page Single validation Start Here.
	
  	// End 
	
	//start of button enable and disable validation for contact_us page  validation
	//**************************************************************************************
	
	
	
	
	function OBcontactcheck() // Empty text box validation 
	{
		var pat3=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
		var JobTitle=document.getElementById("jobId").value!="";
		var Name=document.getElementById("firstNameId").value!="";
		var email=document.getElementById("emailId").value!="";
		var emailvalid =pat3.test(document.getElementById('emailId').value);
		var contact=document.getElementById("contactNum").value!="";
		var contactlen =(contactNum.value.length > 9 && contactNum.value.length <= 20);
		var organization=document.getElementById("organizationId").value!="";
		var message=document.getElementById("NamecontactYmessage").value!="";
		
		
		if((JobTitle && Name && email && emailvalid && contact && contactlen && organization && message))  
		{			
			
			
			document.getElementById("submitbutton").disabled = false; 
		}
		else
		{	
			
			document.getElementById("submitbutton").disabled = true;				 
			
		}
		
	}
	
	
	//End  of button enable and disable validation for contact_us page  validation 
	//************************************************************************************************
	
	
	
	//Javascript Validation specific to Login Page.
	
	
	/* The toggle_password is used for showing and hiding the password */
	
	
	function toggle_password(target){
		var d = document;
		var tag = d.getElementById(target);
		var tag2 = d.getElementById("showhide");
		
		if (tag2.innerHTML == 'Show'){
			tag.setAttribute('type', 'text');   
			tag2.innerHTML = 'Hide';
			
			} else {
			tag.setAttribute('type', 'password');   
			tag2.innerHTML = 'Show';
		}
	}
	
	/* OBvalidateEmailFormat function validates the empty value for the field 
	and the  field value should be in email format  */
	
	function OBvalidateEmailId(target,error)
	
	{
		var d = document;
		var target = d.getElementById(target);
		var error = d.getElementById(error);
		
		var pattern= /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
		
		if( target.value == "")
		{
			error.innerHTML=errMsg['90004'];
			target.style.borderColor=errcolor; 
		}   
		else if(pattern.test(target.value))
		{  
			
			error.innerHTML="";
			target.style.borderColor="";
			
		}
		else
		{   
			error.innerHTML= errMsg['90002'];
			target.style.borderColor=errcolor;
		} 
		
	}  
	
	/* OBenableLoginButton enables the login button only
	if the username and password is entered in valid format**/	
	
	
	
	function OBenableLoginButton() 
	{
		
		var pattern= /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
		
		
		var userName=document.getElementById("lusername").value!="";
		var password=document.getElementById("lpassword").value!="";
		
		if((userName && password && pattern.test(document.getElementById('lusername').value)))  
		{					
			
			document.getElementById("submitbutton").disabled = false; 
		}
		else
		{	
			
			document.getElementById("submitbutton").disabled = true;				 
			
		}
		
	}
	//End of button enable and disable validation for Login page 
	
	//	End of login field validation
	//********************************************************************			