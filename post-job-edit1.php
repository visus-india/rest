<?php 
include('admin_header.php');
require 'php-connect.php';
?>
	<html>
	<head>
<title>Healthcare Jobs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<link rel="stylesheet" href="css/intlTelInput.css">
<link href="css/pikaday.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/pikaday.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/intlTelInput.js"></script> 
  
<!-- Custom javascript files -->
  <script src="js/customonblur.js"></script>
   <script src="js/customkeypress.js"></script>
   <script src="js/errValidation_Num.js"></script>
   .
 <!-- Custom End javascript files --> 
 
 
 
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
</head>
	<body>

<div class="container">
<div class="single">
<div class="row"> 
  <h3>Job Details</h3>
  <div class="col-md-6">
      <form method="POST">
		     <div class="form-group">
				<label >Company<span class="red">*</span></label>
				<input type="text" class="form-control" id="companyId"  name ="companyId" placeholder="Enter the Company Name " maxlength="30" onblur="checkcompanyname();check()" onKeyPress="return letternumber(event)">
				<span id="companyerror" style="color:#F00" > </span>
			</div>
			

  </div>
   <div class="col-md-6">
        
		 <div class="form-group">
				<label >Job Title<span class="red">*</span></label>

				<input type="text" class="form-control" id="jobId"  name ="jobId" placeholder="Job Title" maxlength="30" onblur="checkjobdetails();check()" onkeypress="return AlphaOnly(event)">
				<span id="jobTitleerror" style="color:#F00" > </span>
			</div>
			
			
  
  
    </div>
  
</div>  

<div class="row">
	   <div class="col-md-12">
	
		    <div class="form-group">
				<label >Job Description<span class="red">*</span></label>
				<textarea class="form-control" rows="5" onblur="checkJobDescription();check();" id="jobDes"   name ="jobDes"></textarea>
				<span id="jobDescriptionerror" style="color:#F00" > </span>
			</div>
	 </div>
	 
 </div>
	  <!----div 3----->
	  
<div class="row">
	   <div class="col-md-6">
	
		  <div class="form-group">
				<label>Country</label>
				<input type="" class="form-control" id="CountryId"  name ="CountryId" maxlength="30" placeholder="Enter the Country" onblur="checkCountry();check()" onkeypress="return AlphaOnly(event)">
				<span id="countryerror" style="color:#F00"> </span>
			    </div>
				
			
				<div class="form-group">
				<label>State</label>
				<input type="" class="form-control" id="CityId"   name ="CityId" maxlength="30" placeholder="Enter the State" onblur="checkState();check()" onkeypress="return AlphaOnly(event)">
				<span id="stateerror" style="color:#F00"> </span>
			    </div>
				
				 <div class="form-group">
				<label >Date of Birth<span class="red">*</span> </label>
				<input type="text" class="form-control" onblur="checkdob();check()" id="startDate"   name ="startDate" placeholder="Date of Birth" readonly>
				 <span id="doberror" style="color:#F00"> </span>
				</div> 
			   
			   
			     
			     <div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-2 " >
				 <label >Salary<span class="red">*</span></label>
						
						<select class="form-control">
						<option>Dollar</option>
						<option>Euro</option>
						<option>Pounds</option>
						<option>Cents</option>
						
						</select>
				
			   </div>
			    <div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-6" >
				<label >&nbsp;</label>
				<input type="" class="form-control" id="salary"  name ="salary" maxlength="15" placeholder="Enter salary" onblur="checkSalary();check()" onkeypress="return Validate(event)">
				 <span id="salaryerror" style="color:#F00"> </span>
				
			   </div>
			   
			     <div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-4 " >
						<label >&nbsp;</label>
						<select class="form-control">						
						<option>Year</option>
						<option>Month</option>
						<option>Week</option>
						<option>Day</option>
						<option>Hour</option>
						</select>
				
			   </div>
			   
			   	<div class="form-group">
				
				<div style="padding-bottom:10px; padding-top:10px;">
					<label class="checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1"   name ="resumeReq" value="option1" onblur="checkResumecheckbox();check()" > Resume Required
						
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" id="inlineCheckbox2"  name ="checkLocation" value="option2" onblur="checkLocationcheckbox();check()"> Check Job Location is near  Applicants Location
						
					</label></br>
					<span id="resumeclikerror" style="color:#F00"> </span> 
					<span id="checkboxlocationerror" style="color:#F00"> </span>
				</div>
			  </div>
			
	   </div>
	   
	   <div class="col-md-6">
	
		    <div class="form-group">
				<label >Education Level<span class="red">*</span></label>
					<select class="form-control" id="eduCation_Level"   name ="eduCation_Level" onblur="checkEducation();check()">
					<option value="" selected>Select Education</option>
					<option>High School</option>
					<option>Diploma</option>
					<option>Bachelors</option>
					<option>Masters</option>
					<option>Doctorate</option>
					<option>Professinal Certificate</option>
					</select>
					<span id="educationerror" style="color:#F00"> </span>
			</div>
			
			<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-8" >
				<label >Experience<span class="red">*</span></label>
				<input type="" class="form-control" id="experience"  name ="experience" maxlength="10" placeholder="Enter Experience" onblur="checkExperience();check()" onkeypress="return Validate(event)">
				<span id="experienceerror" style="color:#F00"> </span>
				
			   </div>
			   
			     <div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-4 " >
				<label >&nbsp;</label>
				  	<select class="form-control">				
					<option>Years</option>
					<option>Months</option>							
				</select>
				
			   </div>			  
			
			<div class="form-group">
				<label >Preferred Language<span class="red">*</span></label>
				<input type="text" class="form-control" id="lanGuage"  name ="lanGuage"  placeholder="Enter Preferred Language" maxlength="30" onblur="checkLanguage();check()" onkeypress="return AlphaOnly(event)">
				<span id="languageerror" style="color:#F00"> </span>
			</div>
			
			    <div class="form-group">
				<label >License<span class="red">*</span></label>
				<input type="text" class="form-control" id="licenSe"  name ="licenSe" placeholder="Enter License" maxlength="30" onblur="checkLicense();check()" onKeyPress="return letternumber(event)">
				<span id="licenseerror" style="color:#F00"> </span>
			</div>
			
	   </div>
	 
	 
 </div>
	  <!----div 4----->
 <div class="row">
   <div class="col-md-4">
             <div class="form-group">
				<label >Job Open Date </label>
				<input type="text" class="form-control" id="jobOpenDate" name ="jobOpenDate" placeholder="Job Open Date" readonly>
				
			</div>
   </div>
    <div class="col-md-4"> 
	   <div class="form-group">
				<label >Apply Before</label>
				<input type="text" class="form-control" id="applyBefore"  name ="applyBefore"  placeholder="Apply Before" readonly>
				
			</div>
	
	</div>
	 <div class="col-md-4"> 
	     <div class="form-group">
				<label >Expected Join Date</label>
				<input type="text" class="form-control" id="expectedJoinDate" name ="expectedJoinDate"  placeholder="Expected Join Date" readonly>
				
			</div>
	 </div>
 </div>
	
  <!----div 5----->
	 <div class="row ">
         <div class="col-md-12">
			<div class=" pull-right">
				 <button id="submitbutton" class="btn col-md-6" value="Save"  > Update</button>  
				<a href="post-job-search.php"><button id="submitbutton" class="btn col-md-6" value="Close"> Cancel</a></button>
				
			</div>
			
        </div>
		 
   </div> 

</form>	
</div>
  </div>    
  <div class="clearfix"> </div>

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
  var jobOpenDate = new Pikaday(
      {
          field: document.getElementById('jobOpenDate'),
          firstDay: 1,
          position: 'bottom left',
         // minDate: new Date(),
         // maxDate: new Date(),
          yearRange: [2016,2020],
          onSelect: function() {
            
          }
      });
	  var applyBefore = new Pikaday(
      {
          field: document.getElementById('applyBefore'),
          firstDay: 1,
          position: 'bottom left',
          minDate: new Date(),
         // maxDate: new Date(),
          yearRange: [2016,2020],
          onSelect: function() {
            
          }
      });
	  var expectedJoinDate = new Pikaday(
      {
          field: document.getElementById('expectedJoinDate'),
          firstDay: 1,
          position: 'bottom left',
          minDate: new Date(),
          //maxDate: new Date(),
          yearRange: [2016,2020],
          onSelect: function() {
            
          }
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

</body>
</html>
<?php
// define variables and set to empty values
$companyName = 	$jobId =$jobDescription = $countryID =	$cityID = $startDate = 	$salary = "";
	$resumeRequired = 	$checkJobLocation = $educationLevel = $experience =	$language = "";
	$license = $jobOpendate = $applyBefore = $expectedJoinDate =  "" ;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
	$companyName = $_POST["companyId"];
	$jobId = $_POST["jobId"];
	$jobDescription = $_POST["jobDes"];
	$countryID = $_POST["CountryId"];
	$cityID = $_POST["CityId"];
	$startDate = $_POST["startDate"];
	$salary = $_POST["salary"];
	if(!empty($_POST["resumeReq"])){
	$resumeRequired = $_POST["resumeReq"];
	}
	if(!empty($_POST["checkLocation"])){
	$checkJobLocation = $_POST["checkLocation"];
	}
	$educationLevel = $_POST["eduCation_Level"];
	$experience = $_POST["experience"];
	$language = $_POST["lanGuage"];
	$license = $_POST["licenSe"];
	$jobOpendate = $_POST["jobOpenDate"];
	$applyBefore = $_POST["applyBefore"];
	$expectedJoinDate = $_POST["expectedJoinDate"]; 
	$varSuccess ="";
 	$varSuccess = addJobPosting
		(strEmpty($companyName),strEmpty($jobId),strEmpty($jobDescription),
		strEmpty($countryID),strEmpty($cityID),strEmpty($startDate),
		strEmpty($salary),strEmpty($resumeRequired),strEmpty($checkJobLocation),
		strEmpty($educationLevel),strEmpty($jobId),strEmpty($experience),
		strEmpty($language),strEmpty($license),strEmpty($jobOpendate),
		strEmpty($applyBefore),strEmpty($expectedJoinDate)		
		);
			
	//echo $varSuccess;
  //$styleHide =" display:inline";
}

function strEmpty($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



function UpdateJobPosting($companyName,$jobId,$jobDescription,$countryID ,
						$cityID ,$startDate ,$salary ,	$resumeRequired ,
						$checkJobLocation , $educationLevel ,$experience,
						$language,$license,$jobOpendate ,$applyBefore ,	$expectedJoinDate )
{
	$error="";

	try
	{
		
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//CREATEDDATE,CREATEDBY,LASTUPDATEDATE,LASTUPDATEBY,JOBTITLE,JOBTYPE,JOBCURRENCY,SALARYTYPE,JOBCLOSED
        $sql = "Update job_listing  set 
				JOBCODE = $jobId ,
				ORGNAME =$companyName,
				JOBSALARY =$salary,
				JOBCOUNTRY =  $countryID,
				JOBLOCATION = $cityID,
				QLFN = $educationLevel,
				EXPERIENCE = $experience ,
				RESUMEREQ = $resumeRequired ,
				CHECKLOCATION = $checkJobLocation,
				LANGUAGEPREF =$language,
				LICENSES = $license,
				OPENDATE = $jobOpendate,
				APPLYBEFORE =$applyBefore ,
				JOINDATE =$expectedJoinDate,
				JOBDESC= $jobDescription
				 WHERE ID = $ID";
		echo("<script>console.log('PHP: ".$sql."');</script>");
		$q = $pdo->prepare($sql);	       
		 
		$q->execute ();		      
		

			Database::disconnect();

			}
			//header ("Location : post-job-search.php");
			//echo "success";
		
		
		
       
		
 
	

	catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	
}
include('footer.php');
?>