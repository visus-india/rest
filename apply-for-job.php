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
include('banner.php');
?>

<div class="container">
<div class="single"> 
  <h3>Job Details</h3>
  <div class="col-md-6">
      <form>
		     <div class="form-group">
				<label >Job Title<span class="red">*</span></label>
				<input type="text" class="form-control" onblur="checkjobdetails();check1()" id="jobId" placeholder="Enter the Job Title" maxlength="30"    onkeypress="return AlphaOnly(event)">
			     <span id="joberror" style="color:#F00" > </span> 
			 </div>
			
			<div class="form-group">
				<label >Company Name <span class="red">*</span> </label>
				<input type="text" class="form-control" id="companyId" onblur="checkcompanyname();check1()" placeholder="Enter the Company Name" maxlength="30" onKeyPress="return letternumber(event)">
			     <span id="companyerror" style="color:#F00" > </span> 
			</div>
	  </form>
  </div>
   <div class="col-md-6">
        
		 <div class="form-group">
				<label >Job Type<span class="red">*</span> </label>
				  	<select class="form-control" id="jobTypeId1" onblur="checkjobtype1();check1()">
				   <option value="" selected>Select Job Type</option>
						<option >Full Time</option>
						<option>Part Time</option>
						<option>Temporary</option>
						<option>Contract</option>
						<option>Internship</option>
						<option>Fresher</option>
						<option>Walk-in</option>
				  </select>
				<span id="joberror1" style="color:#F00"> </span>
			</div>
			
			<div class="form-group">
				<label>Location <span class="red">*</span> </label> 
				<input type="text" class="form-control" onblur="checklocation();check1()"id="locationId" placeholder="Enter the Location" maxlength="30" onkeypress="return AlphaOnly(event)">
			     <span id="locationerror" style="color:#F00" > </span> 
			</div>
  
  
    </div>
  
  </div>
  <hr>
    <div class="single">  
	 

	 <h3>Enter Your Details</h3>
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
				<input type="text" class="form-control" id="firstNameId"  onblur="checkfname();check1()" placeholder="Enter the First Name" maxlength="30" onkeypress="return AlphaOnly(event)">
				<span id="fnameerror" style="color:#F00" > </span> 
				
			   </div>		        
			
			<div class="form-group">
				<label>Last Name <span class="red">*</span> </label>
				<input type="text" class="form-control" id="lNameId" onblur="lastname();check1()" placeholder="Enter the Last Name" maxlength="30" onkeypress="return AlphaOnly(event)">
			    <span id="lnameerror" style="color:#F00"> </span>
			</div>
		    
			<div class="form-group">
				<label>Email  <span class="red">*</span></label>
				<input type="email" class="form-control"  onblur="checkemail(); check1()" id="emailId" placeholder="Enter Email"  maxlength="60">
			    <span id="emailerror" style="color:#F00"> </span>
			</div>
			
			
	        <div class="form-group">
				<label>Date of Birth<span class="red">*</span> </label>
				<input type="text" class="form-control" onblur="checkdob();check1()" id="startDate" placeholder="Date of Birth" readonly>
			     <span id="doberror" style="color:#F00"> </span>
			</div>
			
		 
		    <div class="form-group">
				<label>Contact Number <span class="red">*</span></label><br>
				<input type="tel" class="form-control"  onblur="checkMobile(); check1()" id="contactNum"  placeholder="Enter Contact Number" maxlength="15" onkeypress="return Validate(event)">
			     <span id="mobileerror" style="color:#F00"> </span>
			</div>
			
		


	 </div>
	 <div class="col-md-6 single_right">

			 <div class="form-group">
				<label>Pincode <span class="red">*</span></label>
				<input type="text" class="form-control" onblur="checkpostal(); check1()" id="postalcodeId" name="postalcodeId" maxlength="10" placeholder="Enter the Pincode" onKeyPress="return letternumber(event)"/> 
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
				<input type="" class="form-control" id="CityId" maxlength="30" placeholder="Town/city">
			</div>
			

         <div class="form-group">
				<label>Upload CV<span class="red">*</span></label>
				<div style=" padding-top:10px;">
				<input type="file" id="cvId" onblur="checkcv(); check1()">
				 <span id="cvIderror" style="color:#F00" > </span> 
				<p class="help-block">.</p>
				</div>
			</div>
		   
		   
		
			 <div class="form-group">			
				 <div class="login-check">
					<label class="checkbox1"><input type="checkbox" name="checkbox" id="agreeId" onblur="Termscheck();check1()"><i> </i>I agree to the Terms and Conditions</label>				 	
				     <span id="termerror" style="color:#F00" > </span> 
				</div>
			</div>
			
		
		      <input type="submit" id="submitbutton" class="btn col-md-6" value="Submit" disabled />
	</form>	  
   </div>
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
          yearRange: [2016,2020],
          onSelect: function() {
            
          }
      });
  </script>
<?php
include('footer.php');
?>