<?php 
	include('admin_header.php');
	include ('validations.php');
	include ('messages.php');
	
	if (empty($_SESSION["username"]))
	{
		$sessionuser=$_SESSION["username"];
	?>
	<script>
		location.href="index.php";
	</script>
	<?php
	}
	
	
	require 'php-connect.php';
	$message="";
	
	$ID="";
	$updatedID="";
	if (isset ($_GET["ID"]) )
	{
		$ID = $_GET["ID"];
	}
	if (isset ($_GET["message"]) )
	{
		$message = $_GET["message"];			
		
	} 
	
	
	
	$sessionpage = "post-job-edit.php";
	
	/* $varSuccess ="";
		$varSuccess =findJobPosting($ID);
		
		function findJobPosting($ID )
	{ */
	$error="";
	$data="";
	$q="";
	$pdo="";
	$sql="";
	global $successMessage;
	global  $message; 
	try
	{
		global $sessionuser;
		$sessionevent ="in find query";
		$data="";
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//CREATEDDATE,CREATEDBY,LASTUPDATEDATE,LASTUPDATEBY,JOBTITLE,JOBTYPE,JOBCURRENCY,SALARYTYPE,JOBCLOSEDupdate
		
		$sql = "SELECT 
		ORGNAME, JOBTITLE, JOBTYPE, JOBCODE, JOBCOUNTRY,
		JOBLOCATION,JOBCURRENCY,JOBSALARY,SALARYTYPE,
		QLFN, EXPERIENCE, EXPUOM, LANGUAGEPREF, 
		LICENSES,RESUMEREQ,CHECKLOCATION, JOBDESC,
		DATE_FORMAT(OPENDATE,'%d/%m/%Y') OPENDATE, 
		DATE_FORMAT(APPLYBEFORE,'%d/%m/%Y') APPLYBEFORE,
		DATE_FORMAT(JOINDATE,'%d/%m/%Y') JOINDATE,JOBCLOSED
		from JOB_LISTING where ID= '$ID'";
		
		$q = $pdo->prepare($sql);	    	
		$q->execute ();		      
		$data = $q->fetch();		
		
	?>
	<title> Healthcare Jobs - Edit Jobs</title>
	<div class="container">
		<div class="single">
			<form method ="POST" >
				
				
				<input type="hidden" value = "<?php echo $ID ?>"  name ="id"/>
				<div class="row"> 
					<h3>Edit Job</h3>
					<div class="col-md-12">	
						<span id="updateMessage"> </span>		
					</div> 
					
					<div class="col-md-6">								
						<div class="form-group">
							<label >Company Name<span class="red">*</span></label>							
							<input type="text" class="form-control" name = "companyId" id="companyId"
							placeholder="Enter Company Name " maxlength="60"
							onblur="OBvalidateMandatory('companyId','companyerror');postjobcheck();"										
							value = "<?php echo $data['ORGNAME'] ?>" >
							<span id="companyerror" style="color:#F00" > </span>
						</div>								
					</div>
					<div class="col-md-6">									
						<div class="form-group">
							<label >Job Title<span class="red">*</span></label>
							
							<input type="text" class="form-control" name = "jobtitle" id="jobtitle"
							placeholder="Enter Job Title" maxlength="60" 
							onblur="OBvalidateMandatory('jobtitle','jobTitleerror');postjobcheck();" 
							value = "<?php echo $data['JOBTITLE'] ?>" >
							<span id="jobTitleerror" style="color:#F00" > </span>
						</div>			
					</div>								
				</div>  
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label >Job Type<span class="red">*</span> </label>
							<select class="form-control" name = "jobTypeId" id="jobTypeId" onblur="checkjobtype();postjobcheck()" >
								<option value="" selected>Select Job Type</option>
								<option  <?php if ($data ['JOBTYPE']	== 	"Full Time") {?> selected <?php }?> value="Full Time">Full Time</option>
								<option  <?php if ($data ['JOBTYPE']	== 	"Part Time") {?> selected <?php }?> value="Part Time">Part Time</option>
								<option  <?php if ($data ['JOBTYPE']	== 	"Temporary") {?> selected <?php }?> value="Temporary">Temporary</option>
								<option  <?php if ($data ['JOBTYPE']	== 	"Contract") {?> selected <?php }?> value="Contract">Contract</option>
								<option  <?php if ($data ['JOBTYPE']	== 	"Internship") {?> selected <?php }?> value="Internship">Internship</option>
								<option  <?php if ($data ['JOBTYPE']	== 	"Fresher") {?> selected <?php }?> value="Fresher">Fresher</option>
								<option  <?php if ($data ['JOBTYPE']	== 	"Walk-in") {?> selected <?php }?> value="Walk-in">Walk-in</option>
							</select>
							<span id="joberror" style="color:#F00"> </span>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label >Job Code</label>
							
							
							<input type="text" class="form-control" id="jobcode"  name = "jobcode"
							placeholder="Enter Job Code" maxlength="30" 
							value = "<?php echo $data['JOBCODE'] ?>" >
							<span id="jobCodeerror" style="color:#F00" > </span>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Country<span class="red">*</span> </label>
							<input type="" class="form-control" id="CountryId"  name = "CountryId" maxlength="60"
							placeholder="Enter Country" onblur="OBvalidateMandatory('CountryId','countryerror');postjobcheck()" 
							onkeypress="return OKValidateAlphaOnly(event)" value = "<?php echo $data['JOBCOUNTRY'] ?>">
							<span id="countryerror" style="color:#F00"> </span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Location<span class="red">*</span> </label>							
							<input type="text" maxlength ="60" class="form-control" id="CityId"  name = "CityId" maxlength="30" 
							placeholder="Enter Location, eg.  State, City, Area " 
							onblur="OBvalidateMandatory('CityId','stateerror');postjobcheck();" 
							value = "<?php echo $data['JOBLOCATION'] ?>" onkeypress="return OKValidateAlphaspecialOnly(event)">
							<span id="stateerror" style="color:#F00"> </span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-2 " >
							<label >Salary</label>
							
							<select class="form-control" id= "currencySelect"  name = "currencySelect" >
								<option <?php if ($data ['JOBCURRENCY']	== 	"GBP" ){?> selected <?php }?> value="GBP" >GBP</option>
								<option <?php if ($data ['JOBCURRENCY']	== 	"USD" ){?> selected <?php }?> value="USD" >USD</option>								
								<option  <?php if ($data ['JOBCURRENCY']	== 	"EUR") {?> selected <?php }?> value="EUR">EUR</option>
								<option  <?php if ($data ['JOBCURRENCY']	== 	"Cents") {?> selected <?php }?>  value="Cents" >Cents</option>
								
							</select>
						<?php						
							
							$rangeSalary = $data ['JOBSALARY']; 	
							$hyphen = strpos($rangeSalary, "-"); 
							$maxSalary = substr($rangeSalary, $hyphen+1);
							$minSalary = substr($rangeSalary,0,$hyphen);
							
							?>	
						</div>
						<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-3" >
						<label >&nbsp;</label>
						<input type="text" class="form-control"  value = "<?php echo $minSalary ?>"  name = "minsalary" id="minsalary" 
						maxlength="15" placeholder="Enter Min Salary"
						onkeypress ="OKValidateDecimal(event);"> 
					</div>
					
					<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-3">
						<label >&nbsp;</label>
						<input type="text" class="form-control"  value = "<?php echo $maxSalary ?>"  name = "maxsalary" id="maxsalary" 
						maxlength="15" placeholder="Enter Max Salary" onkeypress ="OKValidateDecimal(event);" >
						<span id="salaryerror" style="color:#F00"> </span>						
					</div>
						
						<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-4 " >
							<label >&nbsp;</label>
							<select class="form-control" id ="salaryType"  name = "salaryType"  >	
								
								<option <?php if ($data ['SALARYTYPE']	== 	"Per Annum") {?> selected <?php }?> value="Per Annum">Per Annum</option>
								<option <?php if ($data ['SALARYTYPE']	== 	"Per Month"){?> selected <?php }?>  value="Per Month" >Per Month</option>
								<option  <?php if ($data ['SALARYTYPE']	== 	"Per Week" ){?> selected <?php }?> value="Per Week" >Per Week</option>
								<option  <?php if ($data ['SALARYTYPE']	== 	"Per Day" ){?> selected <?php }?> value="Per Day" >Per Day</option>
								<option  <?php if ($data ['SALARYTYPE']	== 	"Per Hour" ){?> selected <?php }?> value="Hour" >Per Hour</option>											
								
							</select>
							<span id="salaryTypeError" style="color:#F00"> </span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label >Education Level<span class="red">*</span></label>
							<select class="form-control" id="eduCation_Level"   name = "eduCation_Level"
							>
								<option value="" selected>Select Education</option>
								<option <?php if ($data ['QLFN']	== 	"High School" ){?> selected <?php }?> value ="High School"> High School</option>
								<option <?php if ($data ['QLFN']	== 	"Diploma") {?> selected <?php }?> value ="Diploma">Diploma</option>
								<option <?php if ($data ['QLFN']	== 	"Bachelors" ){?> selected <?php }?> value ="Bachelors">Bachelors</option>
								<option <?php if ($data ['QLFN']	== 	"Masters" ){?> selected <?php }?> value ="Masters">Masters</option>
								<option <?php if ($data ['QLFN']	== 	"Doctorate") {?> selected <?php }?>  value ="Doctorate">Doctorate</option>
								<option <?php if ($data ['QLFN']	== 	"Professional Certificate") {?> selected <?php }?> value ="Professional Certificate" >Professional Certificate</option>
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
							onkeypress="return OKValidateDecimal(event)" value = "<?php echo $data['EXPERIENCE'] ?>" >
							<span id="experienceerror" style="color:#F00"> </span>
							
						</div>
						<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-4 " >
							<label >&nbsp;</label>
							<select class="form-control"  id ="experienceYears"   name = "experienceYears" >	
								
								<option <?php if ($data ['EXPUOM']	== 	"Years" ){?> selected <?php }?> value = "Years">Years</option>
								<option <?php if ($data ['EXPUOM']	== 	"Months" ){?> selected <?php }?>  value = "Months">Months</option>							
							</select>
							
							
						</div>	
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label >Preferred Language(s)</label>
							
							
							<input type="text" class="form-control"  name = "lanGuage" id="lanGuage" 
							placeholder="Enter Preferred Language(s), eg. English, Urdu" 
							maxlength="120" 
							value = "<?php echo $data['LANGUAGEPREF'] ?>">
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
							maxlength="120"   value = "<?php echo $data['LICENSES'] ?>">
							<span id="licenseerror" style="color:#F00"> </span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							
							<div style="padding-bottom:10px; padding-top:30px;">
								<label class="checkbox-inline">
									
									
									<input type="checkbox" id="resumeRequired"  <?php if ($data ['RESUMEREQ']	== 	"Y") {?> checked <?php }?>
									name ="resumeReq" > Resume Required
									<span id="resumeclikerror" style="color:#F00"> </span>
								</label>
								<label class="checkbox-inline">
									
									<!--R4S init cap for Near -->
									<input type="checkbox" id="checkLocation"  <?php if ($data ['CHECKLOCATION']	== 	"Y"){?> checked <?php }?> 
									name ="checkJob"> Check Job Location is Near Applicants Location
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
							
							
							<textarea class="form-control" rows="5" maxlength="2000"
							onblur="OBvalidateMandatory('jobDes','jobDescriptionerror');postjobcheck()" 
							id="jobDes" name ="jobDes" placeholder="Enter Job Description"><?php echo $data['JOBDESC'] ?></textarea>
							<span id="jobDescriptionerror" style="color:#F00" > </span>
						</div>
					</div>
					
				</div>
				<!----div 4----->
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label >Job Open Date </label>
							<input type="text" class="form-control" name ="jobOpenDate" id="jobOpenDate" value = "<?php echo $data['OPENDATE'] ?>"  placeholder="Job Open Date"  readonly style="background-color:white;  cursor: pointer;">
						</div>
					</div>
					<div class="col-md-3"> 
						<div class="form-group">
							<label >Apply Before </label>
							<input type="text" class="form-control" name ="applyBefore" id="applyBefore" value = "<?php echo $data['APPLYBEFORE'] ?>" placeholder="Apply Before"  readonly style="background-color:white;  cursor: pointer;">
						</div>
						
					</div>
					<div class="col-md-3"> 
						<div class="form-group">
							<label >Expected Join Date </label>
							<input type="text" class="form-control" name ="expectedJoinDate" id="expectedJoinDate" value = "<?php echo ($data['JOINDATE'])?>"  placeholder="Expected Join Date"  onblur ="validateExpectedJoinDate()";
							readonly style="background-color:white;  cursor: pointer;">
							<span id="dateValidateMessage" style="color:#F00" > </span>
						</div>
					</div>
					<div class="col-md-3"> 
						<div class="form-group">
							
							<div style="padding-bottom:10px; padding-top:30px;">
								<label class="checkbox-inline">
									<input type="checkbox" id="jobClosedCheck" name ="jobClosedCheck" <?php if ($data ['JOBCLOSED']	== 	"Y"){?> checked <?php }?> 
									onblur="" > Job Closed
									
								</label>
								
								
							</div>
						</div>
					</div>
				</div>
				
				<!----div 5----->
				<div class="row ">
					<div class="col-md-12">
						<div class="col-md-6">
							&nbsp;
						</div>
						<div class="col-md-6">
							<a href="post-job-search.php" style="margin-right:2px;" class="btn btn-primary col-xs-5" value="Close"> Close</a>
							<input type="submit" name="save" id="submitbutton" style="margin-left:2px;"  class="btn btn-primary col-xs-5 pull-right" value="Save"  > 
							
							
						</div>
						
					</div>
					
				</div> 
				
			</form>	
		</div>
	</div>    
	<?php
		Database::disconnect();
	}
	//R4S error message changed .
	catch (Exception $e) {
		$sessionmsg=$e;
		//$pdo->rollBack();
		$error=$e->getMessage();
		$showErr= substr($error,0,34); 
		
	?>
	<!--R4S message number changed location href is in here..-->
	
	<script>
		
		document.getElementById('updateMessage').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90048']?> </div>";
	</script>
	<?php $error = $errMsg['90048'];			
		include "ErrorLog.php";	
		return $error;
		exit;	
	}				
	//}
?>
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
		format : "DD/MM/YYYY",
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
		format : "DD/MM/YYYY",
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
		format : "DD/MM/YYYY",
		position: 'bottom left',
		minDate: new Date(),
		//maxDate: new Date(),
		yearRange: [2016,2020],
		onSelect: function() {
			
		}
	});
	
	function validateExpectedJoinDate()
	{
		var jobOpenDate = new Date (document.getElementById('jobOpenDate').value);
		var jobApplyDate = new Date (document.getElementById('applyBefore').value);
		var joinDate = new Date (document.getElementById('expectedJoinDate').value);
		alert (jobApplyDate);
		alert (jobOpenDate);
		alert(joinDate);
		alert (dates.compare(joinDate,jobApplyDate));
		if (jobApplyDate!="" || jobApplyDate =="00/00/0000")
		{
			alert("here 1" + dates.compare(joinDate,jobApplyDate) );
			if (dates.compare(joinDate,jobApplyDate) = -1)
			{
		alert("here 2");
					document.getElementById('dateValidateMessage').innerHTML= "Expected Join Date Should be greater than Apply Before Date.";

			}
		}
		if (jobApplyDate=="" && jobOpenDate !="" )
		{
	alert("here 3");
			if (jobOpenDate < jobApplyDate)
			{
			alert("here 4");
					document.getElementById('dateValidateMessage').innerHTML= "Expected Join Date Should be greater than Job Open Date.";

			}
		}
	
	};
	
</script>

</body>
</html>

<?php
	
	// define variables and set to empty values
	$companyName = 	$jobId =$jobDescription = $countryID =	$cityID = $startDate = 	$salary = "";
	$resumeRequired = 	$checkJobLocation = $educationLevel = $experience =	$language = "";
	$license = $jobOpendate = $applyBefore = $expectedJoinDate = $jobCurrency = $salaryType ="" ;
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$ID= $_POST["id"];
		$companyName = $_POST["companyId"];
		$jobTitle = $_POST["jobtitle"];
		$jobDescription = $_POST["jobDes"];
		$countryID = $_POST["CountryId"];
		$cityID = $_POST["CityId"];
		$jobTypeId= $_POST["jobTypeId"];		
		$jobCode =$_POST["jobcode"];
		$salary="";
		$minSalaryNumber="";
		$maxSalaryNumber="";
		//$salaryNumber="";
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
		
		//R4S salary changed to TExt after UAT.
		/* if (isset($_POST["salary"]))
			{
			$salary = $_POST["salary"];
			
			if (!(is_numeric ($salary)))
			{
			$salaryNumber = "Salary is not number";
			}
		} */
		
		$minSalary = $_POST["minsalary"];
		$maxSalary = $_POST["maxsalary"];
		// R4S salary changed to text as per the UAT.
		//salary range changes
		//R4S salary accepts non numeric value change.
		
		
		
		/* if (isset($_POST["minsalary"]) )
		{
			$minSalary = $_POST["minsalary"];
			
			if (!(is_numeric ($minSalary)))
			{
				$minSalaryNumber = "Minimum Salary is not number";
			}
		}
		
		if (isset($_POST["maxsalary"]) )
		{
			$maxSalary = $_POST["maxsalary"];
			
			if (!(is_numeric ($maxSalary)))
			{
				$maxSalaryNumber = "Maximum Salary is not number";
			}
		} */
		$salary =$minSalary."-".$maxSalary;
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
		
		//R4S salary changed to text after UAT
		/* if ($salaryNumber !="")
			{ ?>
			<script>
			document.getElementById('updateMessage').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $salaryNumber?> </div>";
			
		</script> */
		
		if ($validateMandatoryFields =="")
		{
			
			$varSuccess = UpdateJobPosting
			($ID, strEmpty($companyName),strEmpty($jobTitle),strEmpty($jobDescription),
			strEmpty($countryID),strEmpty($cityID),
			strEmpty($salary),strEmpty($resumeRequired),strEmpty($checkJobLocation),
			strEmpty($educationLevel),strEmpty($experience),strEmpty($experienceYears),
			strEmpty($language),strEmpty($license),strEmpty($jobOpendate),
			strEmpty($applyBefore),strEmpty($expectedJoinDate),strEmpty($jobCurrency),
			strEmpty($salaryType), strEmpty($jobTypeId), strEmpty ($jobCode),strEmpty ($jobClosedCheck)
			); 
			?><script>
			
			
			
			//document.getElementById('updateMessage').innerHTML= "<?php echo $varSuccess ?>";
			//R4S setting message inside the function.
			
		</script>
		<?php
		}
		
		else{
			
		?>		
		<!--R4S setting message in span. -->
		<script>
			document.getElementById('updateMessage').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90047']?> </div>";
			
		</script>
		
		<?php }
		
		//$styleHide =" display:inline";
	}
	
	function strEmpty($dataTrim)
	{
		$data = trim($dataTrim);
		$data = stripslashes($dataTrim);
		$data = htmlspecialchars($dataTrim);
		//mysql_real_escape_string($data);
		return $data;
	}
	
	
	
	function UpdateJobPosting($ID, $companyName,$jobTitle, $jobDescription,$countryID ,
	$cityID ,$salary ,	$resumeRequired ,
	$checkJobLocation , $educationLevel ,$experience,$experienceYears,
	$language,$license,$jobOpendate ,$applyBefore ,	
	$expectedJoinDate ,$jobCurrency,$salaryType,$jobTypeId,$jobCode,$jobClosedCheck)
	{
		$error="";
		$sessionpage= "post-job-edit.php";
		$sessionevent="step1: updateJobPosting function";
		$currentdate = date("Y-m-d h:i:s");
		/* if($jobOpendate !=""){
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
		} */
		global $errMsg;
		global $successMessage;
		global $sessionuser;
		try
		{
			$userName = $_SESSION["username"];
			
			$pdo = Database::connect();
			$pdo->beginTransaction();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//CREATEDDATE,CREATEDBY,
			//R4S changed to now();
			//R4S 2 changed to query for special characters
			$sql = "Update JOB_LISTING  SET
			LASTUPDATEDATE =  now(),
			OPENDATE = STR_TO_DATE('$jobOpendate','%d/%m/%Y'),
			APPLYBEFORE  =  STR_TO_DATE('$applyBefore','%d/%m/%Y'),
			JOINDATE =  STR_TO_DATE('$expectedJoinDate','%d/%m/%Y'),
			JOBTITLE = :jobTitle, 
			JOBCODE =:jobCode,
			ORGNAME = :companyName,
			JOBSALARY = :salary,
			JOBCOUNTRY = :countryID,
			JOBLOCATION =:cityID,
			QLFN = :educationLevel,
			EXPERIENCE =:experience ,
			EXPUOM =:experienceYears,
			RESUMEREQ =:resumeRequired,
			CHECKLOCATION =:checkJobLocation,
			LANGUAGEPREF = :language,
			LICENSES = :license,
			JOBDESC = :jobDescription,
			JOBCURRENCY = :jobCurrency,		
			SALARYTYPE =:salaryType,
			JOBTYPE = :jobTypeId,
			LASTUPDATEBY =:userName ,
			JOBCLOSED =:jobClosedCheck  		
			WHERE ID = $ID";			
			
			$sessionevent="step2: before prepare sql InsertJobPosting function";
			$statement = $pdo->prepare($sql);	
			$statement->bindValue(":jobTitle", $jobTitle);
			$statement->bindValue(":jobCode", $jobCode);
			$statement->bindValue(":companyName", $companyName);
			$statement->bindValue(":salary", $salary);
			$statement->bindValue(":countryID", $countryID);
			$statement->bindValue(":cityID", $cityID);		
			$statement->bindValue(":educationLevel", $educationLevel);
			$statement->bindValue(":experience", $experience);
			$statement->bindValue(":experienceYears", $experienceYears);
			$statement->bindValue(":resumeRequired", $resumeRequired);
			$statement->bindValue(":checkJobLocation", $checkJobLocation);
			$statement->bindValue(":language", $language);
			$statement->bindValue(":license", $license);
			$statement->bindValue(":jobDescription", $jobDescription);
			$statement->bindValue(":jobCurrency", $jobCurrency);
			$statement->bindValue(":salaryType", $salaryType);
			$statement->bindValue(":jobTypeId", $jobTypeId);
			$statement->bindValue(":userName", $userName);
			$statement->bindValue(":jobClosedCheck", $jobClosedCheck);
			
			
			$statement->execute ();		
			$pdo->commit();
			$sessionevent="step3: befpre disconnect function";
			Database::disconnect();	
			
		?>
		<!--R4S message number changed location href is in here..-->
		<script>
			
			document.getElementById('updateMessage').innerHTML= "<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90034'] ?> </div>";
			
		</script>
		<?php 
			echo "<meta http-equiv='refresh' content='1'>";
			return 90034;
			
		}
		
		catch (Exception $e) {
			$sessionmsg=$e;
			echo $e;
			$pdo->rollBack();
			$error=$e->getMessage();
			$showErr= substr($error,0,34);
		$error = 90048;	?>
		<!--R4S message number changed.-->
		<script>			
			document.getElementById('updateMessage').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90048']?> </div>";
		</script>
		<?php include "ErrorLog.php";	
			return $error;
			exit;	
		}
		
	}
	include('footer.php');
	?>																		