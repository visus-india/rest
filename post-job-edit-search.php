<!--
	
	This file contains the query for searching
	
-->
<?php
	include 'messages.php';
	require 'php-connect.php';
	/***The strEmpty checks for the extra spaces in the text and removes slashes and special characters ***/
	
	function searchJobPosting($ID)
	{
		$data="";
		
		global $successMessage;
		global  $message;
		
	
			
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//CREATEDDATE,CREATEDBY,LASTUPDATEDATE,LASTUPDATEBY,JOBTITLE,JOBTYPE,JOBCURRENCY,SALARYTYPE,JOBCLOSED
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
			
			
			return $data;
	}						