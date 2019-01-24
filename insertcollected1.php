<?php
	//echo '<pre/>';print_r($_POST);exit(); 	
	ob_start();
	include("db.php");
	
	$visitdate = mysqli_real_escape_string($link, $_POST['visitdate']);
	$customercode = mysqli_real_escape_string($link, $_POST['customercode']);
	$customername = mysqli_real_escape_string($link, $_POST['customername']);
	$TTYCode = mysqli_real_escape_string($link, $_POST['TTYCode']);
	$territoryname = mysqli_real_escape_string($link, $_POST['territoryname']);	
	$mobileno = mysqli_real_escape_string($link, $_POST['mobileno']);
	$installmentsize = mysqli_real_escape_string($link, $_POST['installmentsize']);
	$overdueamount = mysqli_real_escape_string($link, $_POST['overdueamount']);
	$projectionamount = mysqli_real_escape_string($link, $_POST['projectionamount']);	
	$comittedamount = mysqli_real_escape_string($link, $_POST['comittedamount']);
	$actualpaidamount = mysqli_real_escape_string($link, $_POST['actualpaidamount']);
	
	$remarks = mysqli_real_escape_string($link, $_POST['remarks']);
	$supports = mysqli_real_escape_string($link, $_POST['supports']);
	$username = mysqli_real_escape_string($link, $_POST['username']);
	
	$nextvisitdate = mysqli_real_escape_string($link, $_POST['nextvisitdate']);
	empty($nextvisitdate) ? $nextvisitdate = '1000-01-01' : $nextvisitdate;
		
	//Insert first sql table query ie: student1 table	
	$sql = "INSERT INTO creditrecovery (visitdate,customercode,customername,TTYCode,territoryname,mobileno,projectionamount,
				installmentsize,overdueamount,nextvisitdate,comittedamount,actualpaidamount,remarks,supports,UserName
			) 
			VALUES ('$visitdate','$customercode','$customername','$TTYCode','$territoryname','$mobileno','$projectionamount',
				'$installmentsize','$overdueamount','$nextvisitdate','$comittedamount','$actualpaidamount','$remarks','$supports', '$username')";
	
	
	if(mysqli_query($link, $sql)){
		$msg="Successfully Inserted!!";
		echo "<script type='text/javascript'>
			alert('$msg');
			window.location = 'index1.php';
		</script>";
		
	}else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	// close connection
	mysqli_close($link);



?>