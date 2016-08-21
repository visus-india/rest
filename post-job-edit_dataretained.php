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
							value="<?php echo isset($_POST['companyId']) ? $_POST['companyId'] : $data['ORGNAME']  ?>" >
							<span id="companyerror" style="color:#F00" > </span>
						</div>								
					</div>
					<div class="col-md-6">									
						<div class="form-group">
							<label >Job Title<span class="red">*</span></label>
							
							<input type="text" class="form-control" name = "jobtitle" id="jobtitle"
							placeholder="Enter Job Title" maxlength="60" 
							onblur="OBvalidateMandatory('jobtitle','jobTitleerror');postjobcheck();" 
							value="<?php echo isset($_POST['jobtitle']) ? $_POST['jobtitle'] : $data['JOBTITLE']  ?>"
							>
							<span id="jobTitleerror" style="color:#F00" > </span>
						</div>			
					</div>								
				</div>  
				
				<?php
					
					function isSelected($value,$selectType){
						global $data;
						if ($selectType =="JobType")
						{
							if (isset($_POST['jobTypeId']))
							{
								if($value == $_POST['jobTypeId'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
							else
							{
								
								if($value == $data['JOBTYPE'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
						}
						
						if ($selectType =="jobcurr")
						{
							if (isset($_POST['currencySelect']))
							{
								if($value == $_POST['currencySelect'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
							else
							{
								
								if($value == $data['JOBCURRENCY'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
						}
						
						if ($selectType =="education")
						{
							if (isset($_POST['eduCation_Level']))
							{
								if($value == $_POST['eduCation_Level'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
							else
							{
								
								if($value == $data['QLFN'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
						}
						if ($selectType =="saltype")
						{
							if (isset($_POST['salaryType']))
							{
								if($value == $_POST['salaryType'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
							else
							{
								
								if($value == $data['SALARYTYPE'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
						}
						if ($selectType =="expDuration")
						{
							if (isset($_POST['experienceYears']))
							{
								if($value == $_POST['experienceYears'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
							else
							{
								
								if($value == $data['EXPUOM'])
								{
									return 'selected="selected"';
									}	else{
									return '';
								} 
							}
						}
						
						
						
					}
					
					
					function isChecked($value)
					{
						global $data;
						$resDate="";
						if ($value == 'resumeRes')
						{
							if ($data ['RESUMEREQ'] =='Y')
							{
								if (isset($_POST["resumeReq"]))
								{
									return 'checked';
								}
								
							}else
							{
								if (isset($_POST["resumeReq"]))
								{
									return 'checked';
								}
								
							}
						}
						
						if ($value == 'checkloc')
						{
							if ($data ['CHECKLOCATION'] =='Y')
							{
								if (isset($_POST["checkJob"]))
								{
									return 'checked';
								}
								
							}else
							{
								if (isset($_POST["checkJob"]))
								{
									return 'checked';
								}
								
							}
						}
						
						
						if ($value == 'jobClose')
						{
							
							
							if ($data ['JOBCLOSED'] =='Y')
							{
								if (isset($_POST["jobClosedCheck"]))
								{
									return 'checked';
								}
								
							}else
							{
								if (isset($_POST["jobClosedCheck"]))
								{
									return 'checked';
								}
								
							}
							
						}
						
						
					}
				?>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label >Job Type<span class="red">*</span> </label>
							<select class="form-control" name = "jobTypeId" id="jobTypeId" onblur="checkjobtype();postjobcheck()" >
								<option value="" >Select Job Type</option>
								
								<option <?php echo isSelected('Full Time',"JobType");?> value="Full Time"  >Full Time</option>
								<option <?php echo isSelected('Part Time',"JobType");?>  value="Part Time"  >Part Time</option>
								<option  <?php echo isSelected('Temporary',"JobType");?> value="Temporary" >Temporary</option>
								<option  <?php echo isSelected('Contract',"JobType");?> value="Contract"  >Contract</option>
								<option   <?php echo isSelected('Internship',"JobType");?> value="Internship" >Internship</option>
								<option  <?php echo isSelected('Fresher',"JobType");?>  value="Fresher" >Fresher</option>
								<option <?php echo isSelected('Walk-in',"JobType");?>  value="Walk-in" >Walk-in</option>
								
							</select>
							<span id="joberror" style="color:#F00"> </span>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label >Job Code</label>
							
							
							<input type="text" class="form-control" id="jobcode"  name = "jobcode"
							placeholder="Enter Job Code" maxlength="30" 
							value="<?php echo isset($_POST['jobcode']) ? $_POST['jobcode'] : $data['JOBCODE']  ?>">
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
							onkeypress="return OKValidateAlphaOnly(event)" value = "<?php echo isset($_POST['CountryId']) ? $_POST['CountryId'] : $data['JOBCOUNTRY']  ?>"  >
							<span id="countryerror" style="color:#F00"> </span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Location<span class="red">*</span> </label>							
							<input type="text" maxlength ="60" class="form-control" id="CityId"  name = "CityId" maxlength="30" 
							placeholder="Enter Location, eg.  State, City, Area " 
							onblur="OBvalidateMandatory('CityId','stateerror');postjobcheck();" 
							value = "<?php echo isset($_POST['CityId']) ? $_POST['CityId'] : $data['JOBLOCATION']  ?>" 
							onkeypress="return OKValidateAlphaspecialOnly(event)">
							<span id="stateerror" style="color:#F00"> </span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-2 " >
							<label >Salary</label>
							
							<select class="form-control" id= "currencySelect"  name = "currencySelect" >
								<option <?php echo isSelected('GBP',"jobcurr");?>  value="GBP" >GBP</option>
								<option <?php echo isSelected('USD',"jobcurr");?>  value="USD" >USD</option>								
								<option  <?php echo isSelected('EUR',"jobcurr");?>  value="EUR">EUR</option>
								<option  <?php echo isSelected('Cents',"jobcurr");?>  value="Cents" >Cents</option>
								
							</select>
							
						</div>
						<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-6" >
							<label >&nbsp;</label>						
							
							<input type="text" class="form-control"  
							value = "<?php echo isset($_POST['salary']) ? $_POST['salary'] : $data['JOBSALARY']  ?>"
							name = "salary" id="salary" maxlength="30" placeholder="Enter salary">
							<span id="salaryerror" style="color:#F00"> </span>
							
						</div>
						
						<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-4 " >
							<label >&nbsp;</label>
							<select class="form-control" id ="salaryType"  name = "salaryType"  >	
								
								<option <?php echo isSelected('Per Annum',"saltype");?> value="Per Annum">Per Annum</option>
								<option <?php echo isSelected('Per Month',"saltype");?>  value="Per Month" >Per Month</option>
								<option  <?php echo isSelected('Per Week',"saltype");?> value="Per Week" >Per Week</option>
								<option  <?php echo isSelected('Per Day',"saltype");?> value="Per Day" >Per Day</option>
								<option  <?php echo isSelected('Hour',"saltype");?> value="Hour" >Per Hour</option>											
								
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
								<option <?php echo isSelected('High School',"education");?> value ="High School"> High School</option>
								<option <?php echo isSelected('Diploma',"education");?> value ="Diploma">Diploma</option>
								<option <?php echo isSelected('Bachelors',"education");?>value ="Bachelors">Bachelors</option>
								<option <?php echo isSelected('Masters',"education");?> value ="Masters">Masters</option>
								<option <?php echo isSelected('Doctorate',"education");?>  value ="Doctorate">Doctorate</option>
								<option <?php echo isSelected('Professional Certificate',"education");?> value ="Professional Certificate" >Professional Certificate</option>
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
							onkeypress="return OKValidateDecimal(event)" 
							value = "<?php echo isset($_POST['experience']) ? $_POST['experience'] : $data['EXPERIENCE']  ?>">
							<span id="experienceerror" style="color:#F00"> </span>
							
						</div>
						<div style="padding-left: 0px;padding-right: 0px;" class="form-group col-xs-4 " >
							<label >&nbsp;</label>
							<select class="form-control"  id ="experienceYears"   name = "experienceYears" >	
								
								<option <?php echo isSelected('Years',"expDuration");?> value = "Years">Years</option>
								<option <?php echo isSelected('Months',"expDuration");?>  value = "Months">Months</option>							
							</select>
							
							
						</div>	
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label >Preferred Language(s)</label>
							
							
							<input type="text" class="form-control"  name = "lanGuage" id="lanGuage" 
							placeholder="Enter Preferred Language(s), eg. English, Urdu" 
							maxlength="120" 
							value = "<?php echo isset($_POST['lanGuage']) ? $_POST['lanGuage'] : $data['LANGUAGEPREF']  ?>">
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
							value = "<?php echo isset($_POST['licenSe']) ? $_POST['licenSe'] : $data['LICENSES']  ?>">
							<span id="licenseerror" style="color:#F00"> </span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div style="padding-bottom:10px; padding-top:30px;">
								<label class="checkbox-inline">
									
									
									<input type="checkbox" id="resumeRequired"  
									<?php echo isChecked('resumeRes');?>								
									name ="resumeReq" > Resume Required
									<span id="resumeclikerror" style="color:#F00"> </span>
								</label>
								<label class="checkbox-inline">
									
									<!--R4S init cap for Near -->
									<input type="checkbox" id="checkLocation"  
									<?php echo isChecked('checkloc');?>
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
							id="jobDes" name ="jobDes" placeholder="Enter Job Description"><?php echo isset($_POST['jobDes']) ? $_POST['jobDes'] : $data['JOBDESC']  ?></textarea>
							<span id="jobDescriptionerror" style="color:#F00" > </span>
						</div>
					</div>
					
				</div>
				<!----div 4----->
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label >Job Open Date </label>
							<input type="text" class="form-control" name ="jobOpenDate" id="jobOpenDate"
							value = "<?php echo isset($_POST['jobOpenDate']) ? $_POST['jobOpenDate'] : $data['OPENDATE']  ?>"placeholder="Job Open Date"  readonly style="background-color:white;  cursor: pointer;">
						</div>
					</div>
					<div class="col-md-3"> 
						<div class="form-group">
							<label >Apply Before </label>
							<input type="text" class="form-control" name ="applyBefore" id="applyBefore"
							value = "<?php echo isset($_POST['applyBefore']) ? $_POST['applyBefore'] : $data['APPLYBEFORE']?>" placeholder="Apply Before"  readonly style="background-color:white;  cursor: pointer;">
						</div>
						
					</div>
					<div class="col-md-3"> 
						<div class="form-group">
							<label >Expected Join Date </label>
							<input type="text" class="form-control" name ="expectedJoinDate" id="expectedJoinDate" 
							value = "<?php echo isset($_POST['expectedJoinDate']) ? $_POST['expectedJoinDate'] : $data['JOINDATE']?>" placeholder="Expected Join Date"  readonly style="background-color:white;  cursor: pointer;">
						</div>
					</div>
					<div class="col-md-3"> 
						<div class="form-group">
							<div style="padding-bottom:10px; padding-top:30px;">
								<label class="checkbox-inline">
									<input type="checkbox" id="jobClosedCheck" name ="jobClosedCheck" <?php echo isset($_POST['jobClosedCheck']) ? $_POST['jobClosedCheck'] : $data['JOBCLOSED'] ?> >Job Closed									
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
		
		//R4S error message changed .
		}catch (Exception $e) {
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
		$salary=$_POST["salary"];
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
	
	function strEmpty($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
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
		
		/*  if($jobOpendate !=""){
			echo "in if" .$jobOpendate;
			$jobOpendate= date("Y-m-d h:i:s", strtotime($jobOpendate));
			echo "in after format if" .$jobOpendate;
			}else{
			echo "in else";
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
		}  */
		
		
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
			/* 	echo " in bind value".DATE_FORMAT(new DateTime ($jobOpendate),'%d/%m/%y');
				$statement->bindValue(":jobOpendate", DATE_FORMAT(new DateTime ($jobOpendate), '%yyyy-%dd-%mm'));
				$statement->bindValue(":applyBefore", );
			$statement->bindValue(":expectedJoinDate", ); */
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
	</script>
	<?php 
		
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