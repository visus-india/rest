<?php 
	ob_start();
	session_start();
	
	
	
?>
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
			include('banner.php');
			include ('messages.php');
			$sessionpage="Login.php";
			$sessionevent="step1:Before Database Connection";	   	
		?>	
		
		
	</head>
	<div class="container">
		
		
		<div class="single">  
			<div class="col-md-4">
				
			</div>
			<div class="col-md-7 pull-left">
				<div class="login-form-section">
					<div class="login-content">
						<form method="POST" action ="<?php echo $_SERVER['PHP_SELF'];?>">
							<div class="section-title">
								<h3>Log in</h3>
							</div>
							<div class="textbox-wrap">
								<span id="loginError" style="color:#F00" > </span> 
								<div class="input-group col-md-6">
									<span class="input-group-addon "><i class="fa fa-user"></i></span>
									<input type="text" required  maxlength =<?php echo $fieldLength["UserName"] ?>
									onblur="OBvalidateMandatory('lusername','lnerror');
									OBvalidateUserName('lusername','lnerror');OBenableLoginButton();" 
									id="lusername" name="lusername" class="form-control" placeholder="Username">
									
								</div>
								<span id="lnerror" style="color:#F00" > </span> 
							</div>
							<div class="textbox-wrap">
								<div class="input-group col-md-6 ">
									<span class="input-group-addon "><i class="fa fa-key"></i></span>
									<input type="password"  required  maxlength =<?php echo $fieldLength["Password"] ?>
									onblur="OBvalidateMandatory('lpassword','lperror'); OBenableLoginButton();" 
									id="lpassword"  name="lpassword" class="form-control " placeholder="Password"> 
									<span class="input-group-addon "  onclick =" toggle_password('lpassword');">
										<i class="fa fa-eye form-control-feedback"></i>
									</span>											
								</div>
								<span id="showhide" class="hide" > </span> 
								<span id="lperror" style="color:#F00" > </span> 
							</div>
							
							<div class="">								
								<input type="submit" id="submitbutton" style="margin-bottom:20px;" class="btn btn-primary col-md-6" value="Log in"  disabled />
								
							</div>
							
						</form>
						
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	<script>
		function postJobSearchFuc(){
			location.href="post-job-search.php";
		}
	</script>
	<?php
		require 'php-connect.php';
		
		$sessionevent="step1:Before IF Condition POST";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$loginName = $_POST["lusername"];
			$Password = $_POST["lpassword"];
			
			
			$loginNameErr = validateFieldValues($loginName,"userName");
			$PasswordErr = validateFieldValues($Password,"password");
			
		?>
		<script>
			document.getElementById('lnerror').innerHTML= "<?php echo $loginNameErr ?>";
			document.getElementById('lperror').innerHTML=	"<?php echo $PasswordErr ?>";
		</script>
		<?php
			$varSuccess ="";
			
			if (($loginNameErr == "" || $loginNameErr ==null)
			&& ($PasswordErr == "" || $PasswordErr ==null))
			{
				
				$varSuccess = validateLogin(strEmpty($loginName),strEmpty($Password));
				
				?><script>
				document.getElementById('loginError').innerHTML= "<?php echo $varSuccess ?>";
			document.getElementById('lusername').value=	"<?php echo $loginName ?>";</script>
			<?php
			}
			
		}
		
		function strEmpty($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		function validateFieldValues($data,$fieldName)
		
		{
			try{
				$sessionpage="Login.php";
				$sessionevent="step2:In UserName Password validateFieldValues function";
				global $errMsg;		
				global $fieldLength;
				$data =strEmpty($data);	
				$error ="";			
				if (empty($data) && isset($data))
				{
					$error =  $errMsg['90004'];
					return $error;
				} else
				{
					if ($fieldName == "userName")
					{
						if (strlen($data) >$fieldLength["UserName"])
						{
							$error =  $errMsg['90043'];					
							return $error;
						}
						else if (!(filter_var($data, FILTER_VALIDATE_EMAIL)))
						{
							$error =  $errMsg['90039'];					
							return $error;
							
						}
						
					}
					
					else if ($fieldName == "password")
					{	
						if (strlen($data) >$fieldLength["Password"])
						{
							$error =  $errMsg['90044'];					
							return $error;					
						}
						
					}
					
					
				}
			}
			catch (Exception $e)
			{
				
				$sessionmsg=$e;
				$error=$e->getMessage();
				$showErr= substr($error,0,34);
				$error = $errMsg['90040'];			
				include "ErrorLog.php";	
				return $error;
				exit;
			}
			
		}
		
		function validateLogin($loginName, $loginPassword)
		{
			global $errMsg;
			$sessionpage="Login.php";
			$activeFlag="N";
			
			try
			{				
				$sessionevent="step1:In UserName Password validateLogin function";
				if ( !empty($loginName) && !empty($loginPassword)) {       
					
					
					if ( null==$loginName || null == $loginPassword ) {
						header("Location: index.php");
						} else {
						$pdo = Database::connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$pdo->beginTransaction();
						$sql = "SELECT ID, PASSWORD, ACTIVESTATUS FROM R4S_USER where EMAILID = '$loginName'";
						$q = $pdo->prepare($sql);		
						$q->execute ();		
						$pdo->commit();
						$data = $q->fetch();						
						$ID = $data['ID'];
						
						if($data>0){
							if ($activeFlag == $data['ACTIVESTATUS'])
							{
								$error =  $errMsg['90042'];	
								return $error;
							}
							else if ( $loginPassword == $data['PASSWORD'])
							{
								$pdo->beginTransaction();
								$sql = "UPDATE R4S_USER  set LASTSUCCESSLOGINDATE = now() where ID = $ID";						
								$q = $pdo->prepare($sql);		
								$q->execute ();							
								$pdo->commit();
								$url= 'post-job-search.php';
								header('Location : $url');
								$_SESSION["username"]= $loginName;
							?>
							<script>
								location.href="post-job-search.php";
							</script>
							<?php
							}
							else if ( $loginPassword != $data['PASSWORD']){
								$pdo->beginTransaction();
							$sql = "UPDATE R4S_USER  set LASTFAILEDLOGINDATE = now() where ID =  $ID";						
							$q = $pdo->prepare($sql);		
							$q->execute ();							
							$pdo->commit();
							$error =  $errMsg['90036'];							
							return $error;
							}
							
							
							Database::disconnect();
							}
							else
							{ 
							
							$error =  $errMsg['90035'];	
							return $error;
							}
							
							
							} 
							
							}
							}catch (Exception $e) 
							{
							$sessionmsg=$e;
							$pdo->rollBack();
							$error=$e->getMessage();
							$showErr= substr($error,0,34);
							$error = $errMsg['90040'];			
							include "ErrorLog.php";	
							return $error;
							exit;				
							
							}
							
							}
							
							include('footer.php');
					?>													