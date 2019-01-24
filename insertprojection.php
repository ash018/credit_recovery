<?php
	//echo '<pre/>';print_r($_POST);exit(); 	
	ob_start();
	include("db.php");
	
	$visitdate = mysqli_real_escape_string($link, $_POST['visitdate']);
	$customercode = mysqli_real_escape_string($link, $_POST['customercode']);
	if(empty($customercode)){
		$msg="Must Enter Go Button!!";
		echo "<script type='text/javascript'>
			alert('$msg');
			window.location = 'addnewprojection.php';			
		</script>";
		exit();
	}
	$customername = mysqli_real_escape_string($link, $_POST['customername']);
	$TTYCode = mysqli_real_escape_string($link, $_POST['TTYCode']);
	$territoryname = mysqli_real_escape_string($link, $_POST['territoryname']);	
	$mobileno = mysqli_real_escape_string($link, $_POST['mobileno']);
	$installmentsize = mysqli_real_escape_string($link, $_POST['installmentsize']);
	$overdueamount = mysqli_real_escape_string($link, $_POST['overdueamount']);
	$projectionamount = mysqli_real_escape_string($link, $_POST['projectionamount']);
	
	$comittedamount = "0";
	$actualpaidamount = "0";
	
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);
	$supports = mysqli_real_escape_string($link, $_POST['supports']);
	$nextvisitdate = mysqli_real_escape_string($link, $_POST['nextvisitdate']);
	empty($nextvisitdate) ? $nextvisitdate = '1000-01-01' : $nextvisitdate;
	//print_r($nextvisitdate);exit();
	//Insert first sql table query ie: student1 table	
	$sql = "INSERT INTO creditrecovery (visitdate,customercode,customername,TTYCode,territoryname,mobileno,projectionamount,
				installmentsize,overdueamount,nextvisitdate,comittedamount,actualpaidamount,remarks,supports
			) 
			VALUES ('$visitdate','$customercode','$customername','$TTYCode','$territoryname','$mobileno','$projectionamount',
				'$installmentsize','$overdueamount','$nextvisitdate','$comittedamount','$actualpaidamount','$remarks','$supports')";
	
	
	if(mysqli_query($link, $sql)){
		$msg="Successfully Inserted!!";
		echo "<script type='text/javascript'>
			alert('$msg');
			window.location = 'index.php';
		</script>";
		
	}else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	// close connection
	mysqli_close($link);



?>