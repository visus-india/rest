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
	 
	   <div class="col-md-6">
			 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19929.848011621663!2d0.0816768!3d51.3620499!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8aca6a20ba13b%3A0x954fcf39c3de5a4e!2sHolywell+Cl%2C+Orpington%2C+Greater+London+BR6+9XP%2C+UK!5e0!3m2!1sen!2sin!4v1467276724493"
			 frameborder="0" style="border:0" allowfullscreen></iframe>
	 </div>
	 <div class="col-md-6">
	 
	 <h3>Request a call back</h3>
	 <form>
	 <div class="form-group">
                <label class="control-label col-xs-4">Job Title<span class="red">*</span></label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="jobId"" placeholder="" onblur="checkjobtitle();contactcheck()" onkeypress="return AlphaOnly(event)"/>
				<span id="jobTitleerror" style="color:#F00" ></span>
                </div><br />
            </div><br />
			
			
             <div class="form-group">
                <label class="control-label col-xs-4">Organization<span class="red">*</span></label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="organizationId" placeholder="" onblur="checkorganization();contactcheck()" onkeypress="return AlphaOnly(event)"/>
				<span id="organizationerror" style="color:#F00" > </span>
                </div><br />
            </div><br />
			
			
			 <div class="form-group">
                <label class="control-label col-xs-4">Contact Number<span class="red">*</span></label>
                <div class="col-xs-8">
                    <input type="tel" class="form-control" onblur="checkMobile();contactcheck()" id="contactNum"  placeholder="Enter Contact Number" maxlength="15" onkeypress="return Validate(event)">
			    <span id="mobileerror" style="color:#F00"> </span>
                </div><br />
            </div><br />
			
			
            <div class="form-group">
                <label class="control-label col-xs-4">Email<span class="red">*</span></label>
                <div class="col-xs-8">
                    <input type="email" class="form-control" onblur="checkemail();contactcheck()" id="emailId" placeholder="Enter Email"  maxlength="60">
			 <span id="emailerror" style="color:#F00"> </span>
                </div><br />
            </div><br />
			
			<div class="form-group">
				<label class="control-label col-xs-4">Brief Message</label>
				<div class="col-xs-8">
				<textarea class="form-control" id="addressId2" maxlength="2000"   rows="6"></textarea>
				</div>
			</div> &nbsp; &nbsp;
			
				<div class="form-group">
				
				  <p><b> IMPORTANT : </b> By submitting your email address and any other personal information to this website, ypu consent to such information being collected, held, used and disclosed in accordance with our <a href="privacy_policy.php"> Privacy Policy</a> and our website <a href="Terms-and-conditions.php"> Terms and Conditions.</a></p>
				
			</div>
			
			
			
			<div id="search_form" class="clearfix">
			
			<label class="btn2 btn-2 btn2-1b">
			 <input type="submit" value="Submit" id="submitbutton" disabled />
			 </label>
			 </div>
			 
 </div>

 

</div>

</div>
<!--------------------------------------->

<div class="single">
<div class="row">
   <div class="container">
     <div class="col-md-3">
			  <h4><b>UK Address</b></h4>
			 <address>
				6 Holywell Close,<br>
				BR69XP.<br>
				United Kingdom (UK).<br>
				Landline no- +44 1689486254<br>
				Email id :- 
				
			 </address>
	 </div>
	   <div class="col-md-3">
			  <h4><b>UK Address</b></h4>
			 <address>
				6 Holywell Close,<br>
				BR69XP.<br>
				United Kingdom (UK).<br>
				Landline no- +44 1689486254<br>
				Email id :- 
				
			 </address>
	 </div>
	 
	   <div class="col-md-3">
			  <h4><b>UK Address</b></h4>
			 <address>
				6 Holywell Close,<br>
				BR69XP.<br>
				United Kingdom (UK).<br>
				Landline no- +44 1689486254<br>
				Email id :-
				
			 </address>
	 </div>
	 
	   <div class="col-md-3">
			  <h4><b>UK Address</b></h4>
			 <address>
				6 Holywell Close,<br>
				BR69XP.<br>
				United Kingdom (UK).<br>
				Landline no- +44 1689486254<br>
				Email id :-
				
			 </address>
	 </div>
	 
     
   
   
   </div>
  
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
	</script>
<?php
include('footer.php');
?>