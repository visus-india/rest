<!DOCTYPE HTML>
<html>
<head>
<title>Healthcare Jobs - Contact Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<?php 
include('header.php');
include('banner.php');
?>
<style>
.error{
color:red;
}
</style>
   <!--<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>-->
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDpP84ZdLCPeBTvl8rnzZ6mJA9xY1sfYkY"></script>
	
<div class="container">
    

 
 
	 		<ul class="breadcrumb" style="padding-left: 17px;">  
		  <li>  
			<a href="index.php">Home</a> <span class="divider"></span>  
		  </li>  
		<li class="active">
			<a href="contactus.php"></a>Contact Us<span class="divider"></span>  
	    </li> 
			</ul>
           <div class="single"> 
		   <span id="msg">  </span>
	   <div class="col-md-6">
	    
	   <h3>Contact Us</h3>
	   
	   <div id="map" style="width:100%;height:650px;border:0;"></div>
	   </div>
	 
	 <div class="col-md-6">
	 <h3 style="padding-left:15px;margin-bottom: 10px;">Request a call back</h3>
	 <form  method="post" id="login_form">
	  <div class="form-group">
	  <div class="row">
	   <div class="col-md-12">
	   <label class="control-label col-md-4">Name<span class="red">*</span></label>
	    <div class="col-md-8">
			<div style="padding-left: 0px; padding-right: 0px;" class="col-md-3" >
				
				 
				   <select class="form-control" name="title">
							<option value="Mr">Mr</option>				 
							<option value="Ms">Ms </option>
							<option value="Mrs">Mrs</option>
							<option value="Miss">Miss</option>							
							<option value="Dr">Dr</option>
				
					</select>
				
			   </div>
			   
			     <div style="padding-left: 0px;padding-right: 0px;" class=" col-md-9" >
				
				<input type="text" class="form-control" id="firstNameId"  name="firstNameId" onblur="OBvalidateMandatory('firstNameId','nameerror');OBcontactcheck()" placeholder="Enter Name" maxlength="60" onkeypress="return OKValidateAlphaOnly(event)"  maxlength="60" />
			   </div>	
				<span id="nameerror" style="color:#F00" > </span> 
		</div>	
		</div>	
		</div>	
		</div>	
			
	 <div class="form-group">
	 <div class="row">
	  <div class="col-md-12">
                <label class="control-label col-md-4">Job Title<span class="red">*</span></label>
               
                <div class="col-md-8">
                    <input type="text" class="form-control" id="jobId" name="jobId" placeholder= "Enter Job Title"  onblur="OBvalidateMandatory('jobId','jobTitleerror');OBcontactcheck()" maxlength="60"//>
				<span id="jobTitleerror" style="color:#F00" ></span>
                </div>
            </div>
            </div>
            </div>
			
			
             <div class="form-group">
			 <div class="row">
	  <div class="col-md-12">
                <label class="control-label col-md-4">Organization<span class="red">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="organizationId" name="organizationId" placeholder=" Enter Organization Name" onblur="OBvalidateMandatory('organizationId','organizationerror');OBcontactcheck()" maxlength="60"/>
				<span id="organizationerror" style="color:#F00" > </span>
                </div>
            </div> 
			</div>
            </div>
			
			
			 <div class="form-group">
			 	 <div class="row">
	  <div class="col-md-12">
                <label class="control-label col-md-4">Contact Number<span class="red">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" onblur="OBvalidateMandatory('contactNum','mobileerror');OBcontactcheck()" id="contactNum" name="contactNum"  placeholder="Enter Contact Number" maxlength="20" onkeypress="return mobileNocheck(event)">
			    <span id="mobileerror" style="color:#F00"> </span>
                   </div>
            </div> 
			</div>
            </div>
			
			
            <div class="form-group">
				 <div class="row">
	  <div class="col-md-12">
                <label class="control-label col-md-4">Email<span class="red">*</span></label>
                <div class="col-md-8">
                    <input type="email" class="form-control" onblur="OBvalidateEmailId('emailId','emailerror');OBcontactcheck()" id="emailId" placeholder="Enter Email" name="emailId" maxlength="60">
			 <span id="emailerror" style="color:#F00"> </span>
                </div>
            </div> 
			</div>
            </div>
			
			<div class="form-group">
				 <div class="row">
	  <div class="col-md-12">
				<label class="control-label col-md-4" for="contactymessage">Brief Message<span class="red">*</span></label>
				<div class="col-md-8">
				<textarea class="form-control" id="NamecontactYmessage" maxlength="2000" name="NamecontactYmessage"  rows="6" onblur="OBvalidateMandatory('NamecontactYmessage','NamecontactYmessageerror');OBcontactcheck()"></textarea>
				<span id="numberCount"> </span><br />
				<span id="NamecontactYmessageerror" style="color:#F00"> </span>
				
				</div>
				
			</div>
			</div>
			
			</div>
			<div class="form-group">
				 <div class="row">
	          <div class="col-md-12">
				<label class="control-label col-md-4" > Select Captcha Image<span class="red">*</span></label>
				<div class="col-md-8">
			<div class="g-recaptcha" data-sitekey="6LfKqSQTAAAAAHVEg4qV3mUkVI7xGcHHMcTPsOjf" id="captcha"></div>
			<input type="hidden" style="color:red;" title="Captcha code Required." class="my_cpa hiddencode required" name="hiddencode" id="hiddencode" />
			     <span id="errIdrecaptcha" style="color:#F00"></span>				
				 </div>
				
			</div>
			</div>
			
			</div>&nbsp;&nbsp; 
				<div class="form-group">
				<div class="col-md-12">
				  <p><b> IMPORTANT : </b> By submitting your email address and any other personal information to this website, ypu consent to such information being collected, held, used and disclosed in accordance with our <a href="privacy_policy.php" target="_blank"> Privacy Policy</a> and our website <a href="Terms-and-conditions.php" target="_blank"> Terms and Conditions.</a></p>
				  </div>
				
			</div>
			<div class="form-group">
			<div class="col-md-12">
		   <input type="submit" id="submitbutton" class="btn btn-primary col-md-6 col-xs-12 pull-right" value="Submit" name="submitbutton" disabled />
		   </br>
		   </div>		   
		   </div>
		   <div class="form-group">
			<div class="col-md-12"> 
			<br />
			<p>For any other queries or information, please email us at <a href="mailto:query@recruit4success.com">query@recruit4success.com.</a></p>
			</div>
			</div>
		   <?php
			include('php-connect.php');
			include ('mail1.php'); 
			include ('messages.php'); 
			$sessionpage="contactus.php";
		function test_input($data) 
			{
			$sessionevent="step1:After test input function";	
			
					
			   $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
			}
	$checkjobtitle = $checkorganization= $checkMobile= $checkemail= $checkname=$contactYmessage="";
		if(isset($_POST['submitbutton']))
		{
			$sessionevent="step2:After submitbutton post";	
			if (!empty($_POST["jobId"])){
				$checkjobtitle = test_input($_POST["jobId"]);
					}
					
					if (!empty($_POST["firstNameId"])){
				$checkname = test_input($_POST["firstNameId"]);
					}
					
			
			if (!empty($_POST["organizationId"])) {
				$checkorganization=test_input($_POST["organizationId"]);
				}	
				
			if (!empty($_POST["contactNum"])) {
				$checkMobile=test_input($_POST["contactNum"]);
				}	
			   	
				if (!empty($_POST["emailId"])) {     
				if(filter_var($_POST["emailId"], FILTER_VALIDATE_EMAIL)) {
				 $checkemail = test_input($_POST["emailId"]);
					}
			   }
			   if (!empty($_POST["NamecontactYmessage"])) {
				$contactYmessage=test_input($_POST["NamecontactYmessage"]);
				}
			
			if(($checkjobtitle !="")&&($checkorganization!="")&&($checkMobile!="")&&($checkemail!="")&&($checkname!="")&&($contactYmessage!=""))
			{
	        $sessionevent="step3:After check all manatory fields";
			 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
					{
					include("getCurlData.php");
					$google_url="https://www.google.com/recaptcha/api/siteverify";
					$secret='6LfKqSQTAAAAAOgPfknt-1cFUBtua_pepSQkMi-t';
					$ip=$_SERVER['REMOTE_ADDR'];
					$url=$google_url."?secret=".$secret."&response=".$_POST['g-recaptcha-response']."&remoteip=".$ip;
					$res=getCurlData($url);
					$res= json_decode($res, true);
				try
					
				{
					$checktiTle=$_POST['title'];
					//$email1="ajprincejob@gmail.com";
					//$name=$firstname.$lastname;
					
			$sessionevent="step4:Before Database connection";	
					 $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$pdo->beginTransaction();
					$sql="INSERT INTO CALLBACK_REQ(CREATEDDATE, LASTUPDATEDATE, CREATEDBY, LASTUPDATEBY, TITLE, NAME,JOBTITLE,ORGNAME,PHONENUM,EMAILID,MSG) values(now(),now(),?,?,?,?,?,?,?,?,?)";
					$q = $pdo->prepare($sql);
					
					$q->execute(array($checkname,$checkname,$checktiTle,$checkname,$checkjobtitle,$checkorganization,$checkMobile,$checkemail,$contactYmessage));
					echo $q;
					/* echo '<br/><div class="alert alert-success fade in" style="margin-top:10px;">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Success!</strong> '.$errMsg['90027'].'</div>'; */
					
					?>
					<script>
					document.getElementById('msg').innerHTML= "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90027']?> </div>";
					</script>
					<?php
					$pdo->commit();
					$pdo=Database::disconnect(); 
			                $sessionevent="step5:After insert statement";
						/* $frommail='query@recruit4success.com';
						if($checkemail)
						{
							
							$FromEmail	=	$frommail; 
							$Subject	=	'Mail From ContactUs Page';  
							$Message	=	"Message From $checkname ,
							<table border='0'>
								<tr><td>Title</td><td>$checktiTle</td></tr>
								<tr><td>Name</td><td>$checkname</td></tr>
								<tr><td>Job Title</td><td>$checkjobtitle</td></tr>
								<tr><td>Organization </td><td>$checkorganization</td></tr>
								<tr><td>Phone Number</td><td>$checkMobile</td></tr>
								<tr><td>Email Id </td><td>$checkemail</td></tr>
								<tr><td> Brief Message</td><td>$contactYmessage</td></tr>
								
							</table>";
							$FromName	=	'Recruit4Success'; 
							$ToName	=	'rajuz1965@gmail.com';
							
						$sessionevent="step6:Before sendmail function";
							sendEmail($checkemail,$Subject,$Message,$FromName,$ToName);
						$sessionevent="step7:After sendmail function";
							
						}*/
				}
				
						catch (Exception $e) 
							{
								$sessionevent="step8:Get error Exception";
								$sessionuser=$checkname;
							 $sessionmsg=$e;
							 $pdo->rollBack();
							 $error=$e->getMessage();
							 $showErr= substr($error,0,34);
							 /* echo '<div class="alert alert-danger fade in">
								<a href="#" class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> '.$errMsg['90026'].' '.$showErr.'</div>'; */
								?>
						   <script>
							document.getElementById('msg').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90026']?> </div>";
							</script>
							<?php
							include "ErrorLog.php";	
							exit;
						   }	
						   
					
					}else{
						?>
						<script>
							document.getElementById('msg').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90051']?> </div>";
							</script>	
							<?php
							
					}	
					}else{
						?>
						<script>
							document.getElementById('msg').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90049']?> </div>";
							</script>
						<?php							
					}	
		}
		?>
 </div>
</div>
</div>
<!--------------------------------------->

<div class="container">
 <div class="single"> 
<div class="row">
   <div class="container">
     <div class="col-md-3">
			  <h4><b>UK Office</b></h4>
			 <address class= "row_1">
				6 Holywell Close,<br>
				ORPINGTON,<br>
				BR69XP.<br>
				United Kingdom (UK).<br>
				Work Phone#: +44-1-6894 86254<br>
			 </address>
	 </div>
	   <div class="col-md-3 ">
			  <h4><b>US Office</b></h4>
			 <address class= "row_1">
				12 Penns Trail,<br>
				Newtown, <br>
				PA 18940<br>
				United States of America (USA).<br>
				Work Phone#: +1 (609) 558-3339<br>
				
			 </address>
	 </div>
	 
   </div>
  
</div>

</div>
</div>

<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $('#login_form').validate({
             ignore: ":hidden:not(.my_cpa)",
               rules: {       
                   "hiddencode": {
                       required: function() {
                           if(grecaptcha.getResponse() == '') {
                               return true;
                           } else {
                               return false;
                           }
                       }
                   }
               }
            });
        }
    }
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
})(jQuery, window, document);
    
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
	
	$(document).ready(function() {
    var text_max = 2000;
    $('#numberCount').html(text_max + ' characters remaining');

    $('#NamecontactYmessage').keyup(function() {
        var text_length = $('#NamecontactYmessage').val().length;
        var text_remaining = text_max - text_length;

        $('#numberCount').html(text_remaining + ' characters remaining');
    });
});
 var locations = [
      ['6 Holywell Close, ORPINGTON, BR69XP. United Kingdom (UK)', 51.361555, 0.098958, 4],
      ['12 Penns Trail, Newtown, PA 18940 USA', 40.229595, -74.908996, 5]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 2,
      center: new google.maps.LatLng(41.127663, -37.330381),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
	</script>
	
	
	
<?php
include('footer.php');
?>