<?php 
	
	include('admin_header.php');
	include('banner.php');
	include ('messages.php');
	include ('validations.php');
	
	if (empty($_SESSION["username"]))
	{
	?>
	<script>
		location.href="index.php";
	</script>
	<?php 
		header("location:index.php");
	}
	
?>
<style>
	.scrollableTable
	{
	display: inline-block;
	
	white-space: nowrap;
	overflow-x: scroll;
	}
</style>

<title>Healthcare Jobs - Search Job Postings
</title>

<div class="container">
	
    <div ><br />
		<form method="POST" >
			<h3>Search Job Postings</h3>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label >Company Name</label>
						<input type="text" class="form-control" maxlength =<?php echo $fieldLength["OrgName"] ?> 
						placeholder="Enter Company Name" onkeyPress ="return OKValidateAlphaAndSpecial(event)"  
						value="" name ="companyName" id ="companyName" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label >Job Title</label>
						<input type="text" class="form-control" onkeyPress ="return OKValidateAlphaAndSpecial(event)" 
						maxlength =<?php echo $fieldLength["Title"] ?> 
						placeholder=" Enter Job Title" value="" name ="jobTitle" id ="jobTitle">
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="form-group">
						<label >Job Type</label>
						<select class="form-control" id="jobType" name ="jobType" onblur="checkjobtype();check()">
							<option value="" selected>Select Job Type</option>
							<option >Full Time</option>
							<option>Part Time</option>
							<option>Temporary</option>
							<option>Contract</option>
							<option>Internship</option>
							<option>Fresher</option>
							<option>Walk-in</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label >Job Code</label>
						<input type="text" class="form-control" onkeyPress ="return letternumber(event)" 
						maxlength =<?php echo $fieldLength["JobCode"] ?>
						placeholder=" Enter Job Code" onkeyPress ="return OKValidateAlphaAndSpecial(event)" 
						value="" name ="jobCode" id ="jobCode">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label >&nbsp;</label><br/>
						<input type="checkbox" id="jobClosed"  name ="jobClosed"> Job Closed
					</div>
				</div>
				<div class="col-md-2 pull-right">
					<label >&nbsp;</label><br/>
					<input type="submit" value="Search" class="btn btn-primary col-md-12">
				</div>
				
			</div>
			<br/>
		</form>		
		<?php			
			
			
			require 'php-connect.php';
			
			// define variables and set to empty values
			$companyName = $jobTitle =  $jobType =  $jobCode=  "";
			$companyNameErr = $jobTitleErr = $jobTypeErr= $jobClosedErr = $jobCodeErr ="" ;			
			
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$companyName = $_POST["companyName"];
				$jobTitle = $_POST["jobTitle"];
				$jobType = $_POST["jobType"];			
				$jobCode =$_POST["jobCode"];
				if (isset($_POST["jobClosed"]))
				{
					$jobClosed = 'Y';
				}
				else
				{
					$jobClosed='N';
				}
				
				$varSuccess ="";
				$validateField ="";
				global $errMsg;
				global $fieldLength;
				
				
				
				$validateField = validateFieldLengthType
				(strEmpty($companyName), 
				$fieldLength["OrgName"], 
				$fieldType["OrgName"]);
				$validateField = $validateField + validateFieldLengthType
				(strEmpty($jobTitle), 
				$fieldLength["Title"], 
				$fieldType["Title"]);
				$validateField = $validateField +  validateFieldLengthType
				(strEmpty($jobCode), 
				$fieldLength["JobCode"], 
				$fieldType["JobCode"]);
				if ($validateField =="" )
				{
					$varSuccess = searchJobPosting
					(strEmpty($companyName),strEmpty($jobTitle),strEmpty($jobType),
					strEmpty($jobClosed), strEmpty($jobCode));
				}
				else
				{
				?>
				<span id="validationError" style="color:#F00" ><?php $errMsg["90045"]?> </span> 
				<div class="row">
					<?php
					}
					
					//echo $varSuccess;
					//$styleHide =" display:inline";
				}
				
				function strEmpty($data)
				{
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					$data = mysql_real_escape_string($data);
					return $data;
				}
				
				
				
				function searchJobPosting($companyName, $jobTitle, $jobType,
				$jobClosed, $jobCode)
				{
					$error="";
					global $errMsg;
					try
					{
						$sessionpage="post-Job-Search.php";
						$sessionevent="step1:Before Database Connect";
						
						$pdo = Database::connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "SELECT ID, OPENDATE,APPLYBEFORE,ORGNAME, JOBTITLE, 
						JOBTYPE , JOBCOUNTRY, JOBLOCATION, QLFN 
						FROM JOB_LISTING where ORGNAME like '%$companyName%' 
						and  JOBTITLE like '%$jobTitle%' 
						and JOBTYPE like '%$jobType%' 
						and JOBCODE like '%$jobCode%' 
						AND  JOBCLOSED = '$jobClosed' order by JOBLOCATION, QLFN";
						$q = $pdo->prepare($sql);	
						
						$sessionevent="step2:After Database Connect";
						$q->execute ();	
						$numberOfRecords =  $q->rowcount();
						if ( $numberOfRecords > 0)
						{ ?>
						<table class="table table-bordered  ">
							<tr>
								
								<th style="text-align:center" class="col-md-1">Apply Before</th>
								<th style="text-align:center" class="col-md-3"> Company Name </th>
								<th style="text-align:center" class="col-md-3">Job Title </th>
								<th style="text-align:center" class="col-md-1"> Job Type</th>
								<th style="text-align:center" class="col-md-1"> Country</th>
								<th style="text-align:center" class="col-md-2"> Location</th>							
								<th style="text-align:center" class="col-md-1"> Edit</th>
								
							</tr>
							<?php
								for ($i=0; $data = $q->fetch(); $i++)
								{ 
								?>
								<tr>
									
									<td class=" col-md-1"><?php echo $data['APPLYBEFORE'] ?></td>
									<td  class=" col-md-3" ><?php echo $data['ORGNAME'] ?></td>
									<td  class=" col-md-3" ><?php echo $data['JOBTITLE'] ?></td>
									<td  class=" col-md-1" ><?php echo $data['JOBTYPE'] ?></td>
									<td  class=" col-md-1" ><?php echo $data['JOBCOUNTRY'] ?></td>
									<td  class=" col-md-2"><?php echo $data['JOBLOCATION'] ?></td>								
									<td  class=" col-md-1" style="text-align:center"> <a href = "post-job-edit.php?ID=<?php echo $data['ID'] ?>" class="linkButton">Edit</a> </td>
								</tr>
								<?php
								}?>
						</table>
					</div>
					<?php
						$sessionevent="step3:Before Database disconnect";
						Database::disconnect();		
						
						
					} 
					
					else
					{?>
					<span id="noRecords" style="color:#F00" ><?php echo $errMsg['90052'] ?> </span> 
					<?php
					}
					
				}
				catch (Exception $e) {
					$sessionmsg=$e;
					$error=$e->getMessage();
					$showErr= substr($error,0,34);
					$error = $errMsg['90053'];			
					include "ErrorLog.php";	
					return $error;
					exit;
				}
				
			} ?>
			
	</div>
</div>
</body>
<html>
	<?php
		include('footer.php');
	?>				