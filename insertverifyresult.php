<?php

	include('dbsqlserver.php');
	
	$assessmentcodevr = $_POST['assessmentcodevr'];	
	$VerifierComments = $_POST['VerifierComments'];	
	$totalresult = $_POST['totalresult'];
	$WhoVerify = $_POST['WhoVerify'];	
	$VerifyDate = date("Y-m-d");
	$Notes = "Verified";
	
	
	//insert assesscustomer table query
	$sql = "INSERT INTO tmpVerifyAssessment (AssessmentCode, WhoVerify, VerifierComments, VerifyDate, TotalMarks, Notes) 
	VALUES ('$assessmentcodevr', '$WhoVerify', '$VerifierComments', '$VerifyDate', '$totalresult', '$Notes')";
	
	if(odbc_exec($connection,$sql)){		
		$msg="Successfully Inserted!";
		echo "<script type='text/javascript'>
			alert('$msg');
			window.location = 'viewverify.php';
		</script>";
	}else{
		echo "ERROR: Could not able to execute $sql";
	}
	
?>