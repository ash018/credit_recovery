<?php
	//error_reporting(0);
	include("db.php");
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];	
	if($_POST['ttyname']!= ""){
		$ttyname = $_POST['ttyname'];
	}else{
		$ttyname = "%";
	}
	$formonth = date('m').date('Y');
	echo $query = "Select 	T2.CustomerCode, T2.ProjectionAmount, T1.mobileno,convert(varchar(10),T1.visitdate,120) as visitdate, 
				T1.customercode, T1.comittedamount, 
				T1.commitmentdate, 
				T1.nextphonecalldate, 
				T1.nextvisitdate,
				T3.[Name] AS Remarks, T4.[Name] AS Support, T5.Territory, T5.InstODNo, T5.InstODAmount, T5.CustomerName 
			From creditrecovery T1 
				inner join projection T2 ON T1.customercode = T2.CustomerCode 
				inner join remarkscomments T3 ON T1.remarks = T3.[id] 
				inner join support T4 ON T1.supports = T4.[id] 
				inner join CreditAnalysis T5 ON T1.customercode = T5.Code 
			Where 	(T1.visitdate between '$startdate' and '$enddate' ) and 
				(T2.ProjectionAmount <> 0) and 
				(ForMonth = '$formonth') and 
				T5.Territory LIKE '$ttyname'";	
	$result = odbc_exec($connection,$query);	
	$x=1;
?>

<table class="table table-responsive table-border" border="1" style="display: block; overflow-y: auto">	
	
	<tr>
		<th style="text-align: center">Sl</th>
		<th style="text-align: center">Territory</th>
		<th style="text-align: center">Code</th>
		<th style="text-align: center">Name</th>
		<th style="text-align: center">Phone</th> 
		<th style="text-align: center">OD NO.</th>
		<th style="text-align: center">OD Amt</th>
		<th style="text-align: center">Proj.(TK)</th>
		<th style="text-align: center">Comt.(TK)</th>
		<th style="text-align: center">Comt.Date</th>
		<th style="text-align: center">Next Phone Call date</th>
		<th style="text-align: center">Next visit date</th>
		<th style="text-align: center">Support</th>
		<th style="text-align: center">Remarks</th>
	</tr>
	<?php while($row = odbc_fetch_array($result)) { 
		//print_r($row); //exit();
	?>
	<tr>
		<td style="text-align: center"><?php echo $x++; ?></td>		
		<td style="text-align: center"><?php echo $row['Territory']; ?></td>	
		<td style="text-align: center"><?php echo $row['CustomerCode']; ?></td>
		<td style="text-align: center"><?php echo $row['CustomerName']; ?></td>
		<td style="text-align: center"><?php echo $row['mobileno']; ?></td>
		<td style="text-align: center"><?php echo round($row['InstODNo'],1); ?></td>
		<td style="text-align: center"><?php echo round($row['InstODAmount']); ?></td>
		<td style="text-align: center"><?php echo round($row['ProjectionAmount']); ?></td>
		<td style="text-align: center"><?php echo round($row['comittedamount']); ?></td>
		<td style="text-align: center"><?php echo $row['commitmentdate']; ?></td>
		<td style="text-align: center"><?php echo $row['nextphonecalldate']; ?></td>
		<td style="text-align: center"><?php echo $row['nextvisitdate']; ?></td>
		<td style="text-align: center"><?php echo $row['Support']; ?></td>
		<td style="text-align: center"><?php echo $row['Remarks']; ?></td>
	</tr>	
	<?php } ?>	
</table>


							
							