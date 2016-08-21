<?php
	
	include('admin_header.php');
	
	
	if (empty($_SESSION["username"]))
	{
	?>
	<script>
		location.href="index.php";
	</script>
	
	<?php
	}	
	require 'php-connect.php';
	include 'messages.php';
	include 'validations.php';
	$sessionpage = "post-job.php";
	
	
?>
<title> Healthcare Jobs - Add Jobs</title>
<div class="container">
	<div class="single">
		<form method ="POST">
			<div class="row">
				<h3>Add Jobs</h3>
				<div class="col-md-12">	
					<span id="insertMessage" style="color:Green" > </span>
				</div>
				<div class="col-md-6">								
					<div class="form-group">
						<label >Company Name<span class="red">*</span></label>
						<input type="text" class="form-control" name = "companyId" id="companyId"
						placeholder="Enter Company Name " maxlength="60"
						onblur="OBvalidateMandatory('companyId','companyerror');postjobcheck();"										
						value = "">
						<span id="companyerror" style="color:#F00" > </span>
					</div>								
				</div>
				<div class="col-md-6">									
					<div class="form-group">
						<label >Job Title<span class="red">*</span></label>
						<input type="text" class="form-control" name = "jobtitle" id="jobtitle"
						placeholder="Enter Job Title" maxlength="60" 
						onblur="OBvalidateMandatory('jobtitle','jobTitleerror');postjobcheck();" 
						value = "">
						<span id="jobTitleerror" style="color:#F00" > </span>
					</div>			
				</div>								
			</div>  
			
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label >Job Type<span class="red">*</span> </label>
						<select class="form-control" name = "jobTypeId" id="jobTypeId"
						onblur="OBvalidateMandatory('jobTypeId','joberror');postjobcheck()">
							<option value="" selected>Select Job Type</option>
							<option  value="Full Time">Full Time</option>
							<option   value="Part Time">Part Time</option>
							<option   value="Temporary">Temporary</option>
							<option   value="Contract">Contract</option>
							<option   value="Internship">Internship</option>
							<option   value="Fresher">Fresher</option>
							<option   value="Walk-in">Walk-in</option>
						</select>
						<span id="joberror" style="color:#F00"> </span>
					</div>	
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label >Job Code</label>
						<input type="text" class="form-control" id="jobcode"  name = "jobcode"
						placeholder="Enter Job Code" maxlength="30" 
						value = "">
						<span id="jobCodeerror" style="color:#F00" > </span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">				
					<div class="form-group">
						<label>Country<span class="red">*</span> </label>
						<input type="" class="form-control" id="CountryId"  name = "CountryId" maxlength="30"
						placeholder="Enter Country" onblur="OBvalidateMandatory('CountryId','countryerror');postjobcheck()" 
						onkeypress="return OKValidateAlphaOnly(event)" value = "United Kingdom">
						<span id="countryerror" style="color:#F00"> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Location<span class="red">*</span> </label>
						<input type="text" maxlength ="60" class="form-control" id="CityId"  name = "CityId" maxlength="30" 
						placeholder="Enter Location, eg.  State, City, Area " 
						onblur="OBvalidateMandatory('CityId','stateerror');postjobcheck()" 
						value = "" onkeypress="return OKValidateAlphaspecialOnly(event)">
						<span id="stateerror" style="color:#F00"> </span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-2 " >
						<label >Salary</label>
						
						<select class="form-control" id= "currencySelect"  name = "currencySelect" >
							<option value="GBP">GBP</option>
							<option value="USD" >USD</option>
							<option value="EUR" >EUR</option>
							<option value="Cents" >Cents</option>
							
						</select>
						
					</div>
					<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-6" >
						<label >&nbsp;</label>
						<input type="text" class="form-control"  value = ""  name = "salary" id="salary" 
						maxlength="25" placeholder="Enter Salary" 
						onkeypress="return OKValidateDecimal(event)">
						<span id="salaryerror" style="color:#F00"> </span>
						
					</div>
					
					<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-4 " >
						<label >&nbsp;</label>
						<select class="form-control" id ="salaryType"  name = "salaryType"  >	
							
							<option value="Per Annum">Per Annum</option>
							<option value="Per Month" >Per Month</option>
							<option value="Per Week" >Per Week</option>
							<option value="Per Day" >Per Day</option>
							<option value="Per Hour" >Per Hour</option>											
						</select>
						<span id="salaryTypeError" style="color:#F00"> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label >Education Level</label>
						<select class="form-control" id="eduCation_Level"   name = "eduCation_Level"
						>
							<option value="" selected>Select Education</option>
							<option value ="High School"> High School</option>
							<option value ="Diploma">Diploma</option>
							<option value ="Bachelors">Bachelors</option>
							<option value ="Masters">Masters</option>
							<option value ="Doctorate">Doctorate</option>
							<option value ="Professional Certificate" >Professional Certificate</option>
						</select>
						<span id="educationerror" style="color:#F00"> </span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-8" >
						<label >Experience<span class="red">*</span></label>
						<input type="" class="form-control"  name = "experience"  id="experience" maxlength="10" 
						placeholder="Enter Experience" onblur="OBvalidateMandatory('experience','experienceerror');postjobcheck()" 
						onkeypress="return OKValidateDecimal(event)" value = "" >
						<span id="experienceerror" style="color:#F00"> </span>
						
					</div>
					<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-4 " >
						<label >&nbsp;</label>
						<select class="form-control"  id ="experienceYears"   name = "experienceYears" >	
							
							<option  value = "Years">Years</option>
							<option  value = "Months">Months</option>							
						</select>
						
						
					</div>	
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label >Preferred Language(s)</label>
						<input type="text" class="form-control"  name = "lanGuage" id="lanGuage" 
						placeholder="Enter Preferred Language(s), eg. English, Urdu" 
						maxlength="120"  
						value = "">
						<span id="languageerror" style="color:#F00"> </span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					
					<div class="form-group">
						<label >Licence(s)</label>
						<input type="text" class="form-control" id="licenSe"  name = "licenSe" 
						placeholder="Enter Licences, eg. Nurse, Nurse Anesthetist" 
						maxlength="120" 
						value = "">
						<span id="licenseerror" style="color:#F00"> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						
						<div style="padding-bottom:10px; padding-top:30px;">
							<label class="checkbox-inline">
								<input type="checkbox" id="resumeRequired"  
								name ="resumeReq" > Resume Required
								
								<span id="resumeclikerror" style="color:#F00"> </span>
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" id="checkLocation"  
								name ="checkJob"> Check Job Location is Near  Applicants Location
								
								<span id="checkboxlocationerror" style="color:#F00"> </span>
							</label>
							
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					
					<div class="form-group">
						<label >Job Description<span class="red">*</span></label>
						<textarea maxlength ="2000" class="form-control" rows="5" 
						onblur="OBvalidateMandatory('jobDes','jobDescriptionerror');postjobcheck()" 
						id="jobDes" name ="jobDes" placeholder="Enter Job Description"></textarea>
						<span id="jobDescriptionerror" style="color:#F00" > </span>
					</div>
				</div>
				
			</div>
			<!----div 4----->
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label >Job Open Date </label>
						<input type="text" class="form-control" name ="jobOpenDate" id="jobOpenDate" value = ""  placeholder="Job Open Date"  readonly style="background-color:white;  cursor: pointer;">
					</div>
				</div>
				<div class="col-md-3"> 
					<div class="form-group">
						<label >Apply Before </label>
						<input type="text" class="form-control" name ="applyBefore" id="applyBefore" value = "" placeholder="Apply Before"  readonly style="background-color:white;  cursor: pointer;">
					</div>
					
				</div>
				<div class="col-md-3"> 
					<div class="form-group">
						<label >Expected Join Date </label>
						<input type="text" class="form-control" name ="expectedJoinDate" id="expectedJoinDate" value = ""  placeholder="Expected Join Date"  readonly style="background-color:white;  cursor: pointer;">
					</div>
				</div>
				<div class="col-md-3"> 
					<div class="form-group">
						
						<div style="padding-bottom:10px; padding-top:30px;">
							<label class="checkbox-inline">
								<input type="checkbox" id="jobClosedCheck" name ="jobClosedCheck" value="option1" 
								onblur="" > Job Closed
								
							</label>
							
							
						</div>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-md-12">
					<div class="col-md-6">
						&nbsp;
					</div>
					<div class="col-md-6">
						<a href="post-job-search.php" style="margin-right:2px;" class="btn btn-primary col-xs-5" value="Close"> Close</a>
						<input type="submit"  id="submitbutton" style="margin-left:2px;"  class="btn btn-primary col-xs-5 pull-right" value="Save" disabled > 
						
						
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
	
</script>

</body>
</html>
<?php
	
	// define variables and set to empty values
	$companyName = 	$jobId =$jobDescription = $countryID =	$cityID = $startDate = 	$salary = "";
	$resumeRequired = 	$checkJobLocation = $educationLevel = $experience =	$language = "";
	$license = $jobOpendate = $applyBefore = $expectedJoinDate = $jobCurrency = $salaryType ="" ;
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sessionpage= "post-job.php";
		$companyName = $_POST["companyId"];
		$jobTitle = $_POST["jobtitle"];
		$jobDescription = $_POST["jobDes"];
		$countryID = $_POST["CountryId"];
		$cityID = $_POST["CityId"];
		$jobTypeId= $_POST["jobTypeId"];
		$salary = $_POST["salary"];
		$jobCode =$_POST["jobcode"];
		if (isset($_POST["resumeReq"]))
		{
			$resumeRequired = 'Y';
		}
		else
		{
			$resumeRequired='N';
		}
		
		if (isset($_POST["checkJob"]))
		{
			$checkJobLocation = 'Y';
		}
		else
		{
			$checkJobLocation='N';
		}
		if (isset($_POST["jobClosedCheck"]))
		{
			$jobClosedCheck = 'Y';
		}
		else
		{
			$jobClosedCheck='N';
		}
		
		
		$educationLevel = $_POST["eduCation_Level"];
		$experience = $_POST["experience"];
		$language = $_POST["lanGuage"];
		$license = $_POST["licenSe"];
		$jobOpendate = $_POST["jobOpenDate"];
		$applyBefore = $_POST["applyBefore"];
		$expectedJoinDate = $_POST["expectedJoinDate"]; 
		$jobCurrency = $_POST["currencySelect"];
		$salaryType = $_POST["salaryType"];
		$experienceYears =$_POST["experienceYears"];
		
		$varSuccess ="";
		$validateMandatoryFields ="";
		
		
		$validateMandatoryFields  = validateMandatory($companyName).
		validateMandatory($jobTitle) .
		validateMandatory($jobDescription) .
		validateMandatory($countryID) .
		validateMandatory($cityID).
		validateMandatory($jobTypeId) .
		validateMandatory($experience);	
		
		
		if ($validateMandatoryFields =="")
		{
			$varSuccess = InsertJobPosting
			( strEmpty($companyName),strEmpty($jobTitle),strEmpty($jobDescription),
			strEmpty($countryID),strEmpty($cityID),
			strEmpty($salary),strEmpty($resumeRequired),strEmpty($checkJobLocation),
			strEmpty($educationLevel),strEmpty($experience),strEmpty($experienceYears),
			strEmpty($language),strEmpty($license),strEmpty($jobOpendate),
			strEmpty($applyBefore),strEmpty($expectedJoinDate),strEmpty($jobCurrency),
			strEmpty($salaryType), strEmpty($jobTypeId), strEmpty ($jobCode),strEmpty ($jobClosedCheck)
			);
			
			//echo $varSuccess;
			
		?>
		
		
		
		<?php
		}
		else{?>		
		<!-- R4S error message -->
		<script>			
			document.getElementById('insertMessage').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90047']?> </div>";
		</script>		
		<?php }
		//$styleHide =" display:inline";
	}
	
	function strEmpty($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		//$data = mysql_real_escape_string($data);
		return $data;
	}
	
	
	
	function InsertJobPosting( $companyName,$jobTitle, $jobDescription,$countryID ,
	$cityID ,$salary ,	$resumeRequired ,
	$checkJobLocation , $educationLevel ,$experience,$experienceYears,
	$language,$license,$jobOpendate ,$applyBefore ,	
	$expectedJoinDate ,$jobCurrency,$salaryType,$jobTypeId,$jobCode,$jobClosedCheck)
	{
		$error="";
		global $errMsg;
		global $successMessage;
		$currentdate = date("Y-m-d h:i:s");
		
		if($jobOpendate !=""){
			$jobOpendate= date("Y-m-d h:i:s", strtotime($jobOpendate));
			}else{
			$jobOpendate="";
		}
		if($expectedJoinDate !=""){
			$expectedJoinDate = date("Y-m-d h:i:s", strtotime($expectedJoinDate));
			}else{
			$expectedJoinDate="";
		}
		if($applyBefore !=""){
			$applyBefore= date("Y-m-d h:i:s", strtotime($applyBefore));
			}else{
			$applyBefore="";
		}
		/* $expectedJoinDate = date("Y-m-d h:i:s", strtotime($expectedJoinDate));
			$jobOpendate= date("Y-m-d h:i:s", strtotime($jobOpendate));
		$applyBefore= date("Y-m-d h:i:s", strtotime($applyBefore)); */
		
		$sessionevent="step1: InsertJobPosting function";
		$sessionpage ="job-post.php";
		try
		{
			$userName = $_SESSION["username"];
		
			$pdo = Database::connect();
			$pdo->beginTransaction();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//CREATEDDATE,CREATEDBY,
			//R4S changed date to now();
			$sql = "Insert into JOB_LISTING  
			(JOBTITLE , 
			ORGNAME ,
			JOBSALARY ,
			JOBCOUNTRY ,
			JOBLOCATION ,
			QLFN ,
			EXPERIENCE  ,
			EXPUOM ,
			RESUMEREQ  ,
			CHECKLOCATION ,
			LANGUAGEPREF,
			LICENSES ,
			OPENDATE ,
			APPLYBEFORE  ,
			JOINDATE ,
			JOBDESC,
			JOBCURRENCY ,
			LASTUPDATEDATE,
			SALARYTYPE,
			JOBTYPE,
			JOBCODE ,
			LASTUPDATEBY ,
			JOBCLOSED ,
			CREATEDDATE, 
			CREATEDBY		
			)		
			values 
			('$jobTitle', 
			'$companyName',
			'$salary',
			'$countryID',
			'$cityID',
			'$educationLevel',	
			'$experience',
			'$experienceYears' ,
			'$resumeRequired' ,
			'$checkJobLocation',
			'$language',
			'$license',
			'$jobOpendate',
			'$applyBefore' ,
			'$expectedJoinDate',
			'$jobDescription',
			'$jobCurrency',
			now(),
			'$salaryType',
			'$jobTypeId',
			'$jobCode',
			'$userName',
			'$jobClosedCheck',
			now(),
			'$userName' )";
			$sessionevent="step2: before sql in InsertJobPosting function";
			
			$q = $pdo->prepare($sql);	       
			$q->execute ();		      
			$pdo->commit();
			$sessionevent="step3: after sql in InsertJobPosting function";
			Database::disconnect();
			//updated error code. ?>
			<!-- R4S error message -->
		<script>
			
			document.getElementById('insertMessage').innerHTML= "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90033'] ?> </div>";
			
		</script>
		<?php	return $errMsg['90033'];
			
		}
		
		catch (Exception $e) {
			$sessionmsg=$e;
			$pdo->rollBack();
			$error=$e->getMessage();
			$showErr= substr($error,0,34);
			$error = $errMsg['90041'];			
			include "ErrorLog.php";	?>
			<!-- R4S error message -->
			<script>			
			document.getElementById('insertMessage').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90041']?> </div>";
		</script>
		<?php	return $error;
			exit;	
		}
		
	}
	include('footer.php');
	?>			