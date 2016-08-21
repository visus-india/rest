<!--
	
	This file contains the common validations for the field values.
	
-->
<?php
	include 'messages.php';
	/***The strEmpty checks for the extra spaces in the text and removes slashes and special characters ***/
	
	function validateMandatory($fieldName)
	{
		$error="";
				//$fieldName = strEmpty($fieldName);
		
		if (isset($fieldName) && empty($fieldName))
		{
			$error =   "empty data";
			
		} 		
		return $error;
	}
	
	
	function validateEmail($fieldName)
	{
		
		$error ="";
		$fieldName = strEmpty($fieldName);
		if ( filter_var($fieldName, FILTER_VALIDATE_EMAIL))
		{		
			return $error;
		} 
		else
		{
			$error ="UserName not in Email Format";
			return $error;
		}
	}
	
	function validateFieldLengthType($fieldValue,$fieldlength, $fieldtype)
	{
		global $errMsg;
		$validateFieldMessage="";
		if (strlen($fieldValue) > $fieldlength)
		{
			$validateFieldMessage = $errMsg['90046'];
			return $validateFieldMessage;
		}
		if ($fieldtype == "AlphaNumeric")
		{
			if(!(preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $fieldValue)))
			{
				$validateFieldMessage = $errMsg['90046'];
				return $validateFieldMessage;
			}
		}
		if ($fieldtype == "Number")
		{
			if (!(is_numeric(fieldValue)))
			{
				$validateFieldMessage = $errMsg['90046'];
				return $validateFieldMessage;
			}
			
				
		}	
		if ($fieldtype == "Alpha")
		{
			if(!(preg_match('/^[a-zA-Z]+[a-zA-Z._]+$/', $fieldValue)))
			{
				$validateFieldMessage = $errMsg['90046'];
				return $validateFieldMessage;
			}
		}
		else
		{
			return $validateFieldMessage;
		}
		
	}
	
	
	
?>