<?php

	include('dbsqlserver.php');
	
	$QuestionerID = $_POST['QuestionerID'];	
	$QuestionerText = $_POST['QuestionerText'];	
	$Notes = $_POST['Notes'];
	
	
	//insert AssessQuestioner table query
	$sql = "INSERT INTO AssessQuestioner (QuestionerID,QuestionerText,Notes) 
	VALUES ('$QuestionerID','$QuestionerText','$Notes')";

	if(odbc_exec($connection,$sql)){
		$msg="Successfully Inserted!";
		echo "<script type='text/javascript'>
			alert('$msg');
			window.location = 'viewquestioner.php';
		</script>";
	}else{
		echo "ERROR: Could not able to execute $sql";
	}



?>