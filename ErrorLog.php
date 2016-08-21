<?php
	try{	
		$sessionbrowser=$_SERVER['HTTP_USER_AGENT'];
		$pdo = Database::connect();
		//$sessionmsg = mysql_real_escape_string($sessionmsg);
		$sessionmsg = str_replace("'"," ", $sessionmsg);
		
		$sql ="INSERT INTO ERROR_LOG
		(`CREATEDDATE`,`SESSIONNAME`,`DATEANDTIME`,`BROWSERNAME`,
		`SESSIONPAGE`,`SESSIONEVENT`,`ERRORDESC`) 
		values(now(),'$sessionuser',now(),'$sessionbrowser',
		'$sessionpage','$sessionevent','$sessionmsg')";
		
		
		/* $sql="INSERT INTO error_log
		(SESSIONPAGE,SESSIONEVENT,ERRORDESC) 
		values
		('$sessionpage','$sessionevent','$sessionmsg')"; */
		
		$stmt = $pdo->prepare($sql);
		//$pdo->beginTransaction();
		$stmt->execute();	
		//$pdo->commit();
		
		$pdo = Database::disconnect();
		}catch(Exception $e){
		echo $e;
		//$pdo->rollBack();
		exit;
		}
		
		?>
		