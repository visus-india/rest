
<?php 
	
	include('admin_header.php');
	include('banner.php');
	include ('messages.php');
	include ('validations.php');
	
	$sessionuser = "";
	if (empty($_SESSION["username"]))
	{
		
	?>
	<script>
		location.href="index.php";
	</script>
	<?php 
		header("location:index.php");
	} else
	{
		$sessionuser = $_SESSION["username"];
		
	}
	
?>

<!-- for the pagination in the table -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" 
href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 
src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<Style>
	table.dataTable thead th {
    outline: none;
	font-size: 0.85em;
    color: #999;
	border-bottom:1px solid #ddd;
	}
	
	div.dataTables_paginate {
	float: right;
	font-family: 'Roboto', sans-serif;
	font-size: 0.85em;
	color: #999;
	}
	
	table.dataTable.no-footer{border-bottom:1px solid #ddd;}
</style>
<script>
	
	$(document).ready(function() {
		var table =  $('#searchTable').dataTable
		( {"searching": false ,
			"aaSorting": [], 
			"lengthChange": false,
			"bInfo" : false,
			"columns": [
			null,
			null,
			null,
			null,
			null,
			null,
			{ "orderable": false }
			]
			
		}
		
		);
		
		$('a.toggle-vis').on( 'click', function (e) {
			e.preventDefault();
			
			// Get the column API object
			var column = table.column( $(this).attr('data-column') );
			
			// Toggle the visibility
			column.visible( ! column.visible() );
		} );
	} );
	
	
</script>
<!-- end of pagination changes -->
<!--changed title removed s in Job R4S -->
<title>Healthcare Jobs - Search Job Postings
</title>

<div class="container">
	
    <div ><br />
		<form method="POST" >
			<!--R4S removed s for job-->
			<h3>Search Job Postings</h3>
			<div class="col-md-12">	
				<span id="errorMessge"> </span>		
			</div> 
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<!--R4S removed and onkeypress is removed*-->
						<label >Company Name</label>
						<input type="text" class="form-control" maxlength =<?php echo $fieldLength["OrgName"] ?> 
						placeholder="Enter Company Name" 
						value="" name ="companyName" id ="companyName" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<!--R4S removed * and onkeypress is present.-->
						<!--R4S onkeypress removed.-->
						
						<label >Job Title</label>
						<input type="text" class="form-control" 
						maxlength = <?php echo $fieldLength["Title"] ?> 
						placeholder= "Enter Job Title" value="" name ="jobTitle" id ="jobTitle">
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="form-group">
						<label >Job Type</label>
						<select class="form-control" id="jobType" name ="jobType">
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
				<!--R4S removed * and onkeypress is present.-->'
				<div class="col-md-4">
					<div class="form-group">
						<label >Job Code</label>
						<input type="text" class="form-control"  
						maxlength =<?php echo $fieldLength["JobCode"] ?>
						placeholder=" Enter Job Code"  
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
			<hr/>
		</form>		
		<?php			
			
			
			require 'php-connect.php';
			
			// define variables and set to empty values
			$companyName = $jobTitle =  $jobType =  $jobCode=  "";
			$companyNameErr = $jobTitleErr = $jobTypeErr= $jobClosedErr = $jobCodeErr ="" ;		
			$jobClosed='N';
			
			
			
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
			<span id="validationError" style="color:#F00" ><?php $errMsg["90014"]?> </span> 
			<div class="row">
				<?php
				}
				
				//echo $varSuccess;
				//$styleHide =" display:inline";
				
				
				function strEmpty($data)
				{
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					$data = preg_quote($data);
					//$data = mysql_real_escape_string($data);
					return $data;
				}
				
				
				
				function searchJobPosting($companyName, $jobTitle, $jobType,
				$jobClosed, $jobCode)
				{
					$error="";
					global $errMsg;
					global $sessionuser ;
					try
					{
						$sessionpage="post-Job-Search.php";
						$sessionevent="step1:Before Database Connect";
						
						$pdo = Database::connect();						
						
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						//R4S 2 changed to query for special characters
						
						$sql = "SELECT ID, DATE_FORMAT(OPENDATE,'%d/%m/%Y') OPENDATE, 
						DATE_FORMAT(APPLYBEFORE,'%d/%m/%Y') APPLYBEFORE,ORGNAME, JOBTITLE, 
						JOBTYPE , JOBCOUNTRY, JOBLOCATION, QLFN 
						FROM JOB_LISTING where 
						ORGNAME like ?
						and  JOBTITLE like ?
						and JOBTYPE like ?
						and JOBCODE like ?
						AND  JOBCLOSED = ? order by LASTUPDATEDATE DESC";
						
						$sessionevent="step1.1: before prepare sql";
						
						$statement = $pdo->prepare($sql);	
						
						$companyName= '%'.$companyName.'%';
						$jobTitle = '%'.$jobTitle.'%';
						$jobType= '%'.$jobType.'%';
						$jobCode ='%'.$jobCode.'%';
						
						
						$sessionevent="step2:After Database Connect";
						$statement->execute (array($companyName, $jobTitle, $jobType, $jobCode, $jobClosed));	
						$numberOfRecords =  $statement->rowcount();
						if ( $numberOfRecords > 0)
						{ ?>
						<table id ="searchTable" class="compact table table-condensed table-bordered ">
							<thead>
								<tr >
									
									<th style="text-align:center" class="col-md-1">Apply Before</th>
									<th style="text-align:center" class="col-md-3"> Company Name </th>
									<th style="text-align:center" class="col-md-3"> Job Title </th>
									<th style="text-align:center" class="col-md-1"> Job Type</th>
									<th style="text-align:center" class="col-md-1"> Country</th>
									<th style="text-align:center" class="col-md-2"> Location</th>							
									<th style="text-align:center" class="col-md-1"> Edit</th>
									
								</tr>
								<thead>
									<tbody>
										<?php
											for ($i=0; $data = $statement->fetch(); $i++)
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
									</tbody>
								</table>
							</div>
							<?php
								$sessionevent="step3:Before Database disconnect";
								Database::disconnect();		
								
								
							} 
							
							else
							{?>
							<!-- R4S changed the Error Message -->
							<span id="noRecords" style="color:#F00" ><?php echo $errMsg['90032'] ?> </span> 
							<?php
							}
							
						}
						catch (Exception $e) {
							$sessionmsg=$e;
							$error=$e->getMessage();
							$showErr= substr($error,0,34);
						?>
						<!--R4S message number changed location href is in here..-->
						
						<script>
							
							document.getElementById('errorMessge').innerHTML= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><?php echo $errMsg['90048']?> </div>";
						</script>
						<?php
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