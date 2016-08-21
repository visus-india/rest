<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<?php 
include('header.php');
?>
	

<div class="container">

    <div class="single">  
	 

	 <h3>Register</h3>
	   <div class="col-md-6">
	
	    <form>
		
		<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-2" >
				
				 <label>Title<span class="red">*</span></label>
				   <select class="form-control">
							<option>Mr</option>				 
							<option>Ms </option>
							<option>Mrs</option>
							<option>Miss</option>							
							<option>Dr</option>
				
					</select>
				
			   </div>
			   
			     <div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-10 " >
				 <label>First Name<span class="red">*</span></label>
				<input type="text" class="form-control" id="firstNameId"  onblur="checkname();check()" placeholder="Enter the First Name" maxlength="30" onkeypress="return AlphaOnly(event)">
				<span id="nameerror" style="color:#F00" > </span> 
			   </div>	
		    
			
			<div class="form-group">
				<label >Last Name <span class="red">*</span> </label>
				<input type="text" class="form-control" onblur="lastname();check()" id="lNameId" placeholder="Enter the Last Name" maxlength="30" onkeypress="return AlphaOnly(event)">
			      <span id="lnameerror" style="color:#F00"> </span>
			</div>
		    
			<div class="form-group">
				<label >Email  <span class="red">*</span></label>
				<input type="email" class="form-control" onblur="checkemail();check()" id="emailId" placeholder="Enter Email"  maxlength="60">
			 <span id="emailerror" style="color:#F00"> </span>
			</div> 
			
			
	        <div class="form-group">
				<label >Date of Birth<span class="red">*</span> </label>
				<input type="text" class="form-control" onblur="check();checkdob()" id="startDate" placeholder="Date of Birth" readonly>
				<span id="doberror" style="color:#F00"> </span>
			</div> 
			
		 
		    <div class="form-group">
				<label for="exampleInputEmail1">Contact Number <span class="red">*</span></label><br>
				<input type="tel" class="form-control" onblur="checkMobile();check()" id="contactNum"  placeholder="Enter Contact Number" maxlength="15" onkeypress="return Validate(event)">
			    <span id="mobileerror" style="color:#F00"> </span>
			</div>  
			
		   <div class="form-group">
				<label >Job Type<span class="red">*</span> </label>
				  	<select class="form-control" id="jobTypeId" onblur="checkjobtype();check()">
				<option value="" selected>Select Job Type</option>
					<option >Full Time</option>
					<option>Part Time</option>
					<option>Temporary</option>
					<option>Contract</option>
					<option>Internship</option>
					<option>Fresher</option>
					<option>Walk-in</option>
				</select>
				<span id="joberror" style="color:#F00"> </span>
			</div>
			 <div class="form-group">
				<label>Where You want to work.?<span class="red">*</span> </label> <br/>
				<div style="padding-bottom:10px; padding-top:10px;">
				<div class="login-check">
				 	<label class="checkbox1"><input type="checkbox" id="ausId" name="checkbox" onblur="validationcheck();check()"><i> </i>Australia</label>&nbsp;&nbsp;				 				 	
				 	<label class="checkbox1"><input type="checkbox" id="usId" name="checkbox" onblur="validationcheck();check()"><i> </i>US</label>&nbsp;&nbsp;
				 	<label class="checkbox1"><input type="checkbox" id="middleId" name="checkbox" onblur="validationcheck();check()"><i> </i>Middle East</label>&nbsp;&nbsp;
				    &nbsp;<span id="workerror" style="color:#F00" > </span> 
				 </div>
				 </div>
			  </div>
	 </div>
	 <div class="col-md-6 single_right">
	 
			<div class="form-group">
				<label >Job Code <span class="red">*</span></label>
				<input type="text" class="form-control" onblur="check();checkjobcode()" id="jobcodeId" name="pincode" maxlength="15" placeholder="Enter the Jobcode" onKeyPress="return letternumber(event)"/> 
			    <span id="jobcodeerror" style="color:#F00" > </span> 
			</div>
	 
	           
			 <div class="form-group">
				<label >Post code <span class="red">*</span></label>
				<input type="text" class="form-control" onblur="check();checkpostal() " id="postalcodeId" name="pincode" maxlength="10" placeholder="Enter the Pincode" onKeyPress="return letternumber(event)"/> 
			    <span id="posterror" style="color:#F00" > </span> 
			</div>
		  
		    <div class="form-group">
				<label>Address Line 1</label>
				<input type="text" class="form-control" id="addressId1" maxlength="30"  placeholder="Address Line 1">
			</div>
		  
			<div class="form-group">
				<label>Address Line 2</label>
				<input type="text" class="form-control" id="addressId2" maxlength="30" placeholder="Address Line 2">
			</div>
			
			
			<div class="form-group">
				<label>Town/city</label>
				<input type="" class="form-control" id="CityId" maxlength="30"  placeholder="Town/city">
			</div>
			

           <div class="form-group">
				<label>Upload CV<span class="red">*</span></label>
				<div style=" padding-top:10px;">
				<input type="file" id="cvId" onblur="checkcv();check()">
				 <span id="cvIderror" style="color:#F00" > </span> 
				<p class="help-block">.</p>
				</div>
			</div>
		 
          
		   
			
			 <div class="form-group">			
				 <div class="login-check">
					<label class="checkbox1"><input type="checkbox" name="checkbox" id="agreeId" onblur="check();Termscheck()"><i> </i>I agree to the Terms and Conditions</label>				 	
				     <span id="termerror" style="color:#F00" > </span> 
				</div>
			</div>
			</br>
		   <div class="col-md-12 pull-right">
		   <input type="submit" id="submitbutton" class="btn col-md-6" value="Submit" disabled />
		   </div>
		  
   </div> 
   </form>
  <div class="clearfix"> </div>
 </div>

</div>
<script>
    $("#contactNum").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: false,
      // dropdownContainer: "body",
       //excludeCountries: ["us"],
       geoIpLookup: function(callback) {
         $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
           var countryCode = (resp && resp.country) ? resp.country : "";
           callback(countryCode);
         });
       },
	    
       initialCountry: "auto",
       //nationalMode: true,
       //numberType: "MOBILE",
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
       // preferredCountries: ['uk', 'us']
      //separateDialCode: true,
      //utilsScript: "build/js/utils.js"
    });
  var startDate = new Pikaday(
      {
          field: document.getElementById('startDate'),
          firstDay: 1,
          position: 'bottom left',
          //minDate: new Date(),
          maxDate: new Date(),
          yearRange: [1980,2020],
          onSelect: function() {
            
          }
      });
  </script>
<?php
include('footer.php');
?>