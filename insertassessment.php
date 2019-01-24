<?php

	include('dbsqlserver.php');
	
	$AssessmentCode = $_POST['AssessmentCode'];	
	$AssessmentDate = $_POST['AssessmentDate'];	
	$CustomerName = $_POST['CustomerName'];
	$ContactNo = $_POST['ContactNo'];	
	$Address = $_POST['Address'];	
	$NIDNumber = $_POST['NIDNumber'];	
	$TTYCode = $_POST['TTYCode'];	
	$Level3 = $_POST['Level3'];	
	$Level2 = $_POST['Level2'];
	$Level1 = $_POST['Level1'];
	$AROCode = $_POST['AROCode'];
	$VerifiedBy = $_POST['VerifiedBy'];	
	$VerifiedDate = $_POST['VerifiedDate'];
	$InvCustomerCode = $_POST['InvCustomerCode'];
	
	//$AssessmentCode = $_POST['AssessmentCode'];
	$Q1 = $_POST['Q1'];
	$Q2 = $_POST['Q2'];
	$Q3 = $_POST['Q3'];
	$Q4 = $_POST['Q4'];
	$Q5 = $_POST['Q5'];
	$Q6 = $_POST['Q6'];
	$Q7 = $_POST['Q7'];
	$Q8 = $_POST['Q8'];
	$Q9 = $_POST['Q9'];
	$Q10 = $_POST['Q10'];
	$Q11 = $_POST['Q11'];
	$Q12 = $_POST['Q12'];
	$Q13 = $_POST['Q13'];
	$Q14 = $_POST['Q14'];
	$Q15 = $_POST['Q15'];
	$Q16 = $_POST['Q16'];
	$Q17 = $_POST['Q17'];
	$Q18 = $_POST['Q18'];
	$Q19 = $_POST['Q19'];
	$Q19a = $_POST['Q19a'];
	//$Q19b = $_POST['Q19b'];
	//$Q19c = $_POST['Q19c'];
	$Q19f = ($Q19. "~" .$Q19a);
	$Q20 = $_POST['Q20'];
	
	
	/*if ($_FILES["image"]["error"] > ""){
		echo "<font size = '5'><font color=\"#e31919\">Error: NO CHOSEN FILE <br />";
		echo"<p><font size = '5'><font color=\"#e31919\">INSERT TO DATABASE FAILED";
	}else{*/
		move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);
		move_uploaded_file($_FILES["image1"]["tmp_name"],"images/" . $_FILES["image1"]["name"]);
		move_uploaded_file($_FILES["imagea"]["tmp_name"],"images/" . $_FILES["imagea"]["name"]);
		move_uploaded_file($_FILES["image1a"]["tmp_name"],"images/" . $_FILES["image1a"]["name"]);
		
		$file="images/".$_FILES["image"]["name"];
		$file1="images/".$_FILES["image1"]["name"];
		$file2="images/".$_FILES["imagea"]["name"];
		$file3="images/".$_FILES["image1a"]["name"];
		//insert assesscustomer table query
		$sql = "INSERT INTO AssessCustomer (AssessmentCode,AssessmentDate,CustomerName,ContactNo,Address,NIDNumber,TTYCode,Level3,Level2,Level1,AROCode,VerifiedBy,VerifiedDate,InvCustomerCode,PassportImageLocation,NIDPhotoLocation,PassportImageLocation1,NIDPhotoLocation1) 
		VALUES ('$AssessmentCode','$AssessmentDate','$CustomerName','$ContactNo','$Address','$NIDNumber','$TTYCode','$Level3','$Level2','$Level1','$AROCode','$VerifiedBy','$VerifiedDate','$InvCustomerCode','$file1','$file', '$file3','$file2')";
		
		$sql1 = "INSERT INTO TmpAssessmentAnswer (AssessmentCode,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Q11,Q12,Q13,Q14,Q15,Q16,Q17,Q18,Q19,Q20) 
		VALUES ('$AssessmentCode','$Q1','$Q2','$Q3','$Q4','$Q5','$Q6','$Q7','$Q8','$Q9','$Q10','$Q11','$Q12','$Q13','$Q14','$Q15','$Q16','$Q17','$Q18','$Q19f','$Q20')";
		
		if(odbc_exec($connection,$sql)){
			odbc_exec($connection,$sql1);
			$msg="Successfully Inserted!";
			echo "<script type='text/javascript'>
				alert('$msg');
				window.location = 'index.php';
			</script>";
		}else{
			echo "ERROR: Could not able to execute $sql";
		}
	//}


?>