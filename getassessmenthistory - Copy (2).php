<?php
	//error_reporting(0);
	include('dbsqlserver.php');
	
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	
	/*$query = "Select T1.AssessmentDate, T1.AssessmentCode, T1.CustomerName, T1.[Address], T1.NIDNumber, T1.TTYCode AS TerritoryName, T1.AROCode AS AROName,
					T2.Q3, T2.Q4, T2.Q5, T2.Q6, T2.Q7, T2.Q8, T2.Q9, T2.Q10, T2.Q14, T2.Q15, T2.Q16, T2.Q17, T2.Q18,T2.Q19, T2.Q20 
			From AssessCustomer T1
			  Inner Join TmpAssessmentAnswer T2 ON T1.AssessmentCode = T2.AssessmentCode
			Where T1.AssessmentDate Between '$startdate' and '$enddate'";
	$result = odbc_exec($connection,$query);*/
	$query = "Select T1.*, T2.* From AssessCustomer T1
				Inner Join TmpAssessmentAnswer T2 ON T1.AssessmentCode = T2.AssessmentCode
				Where AssessmentDate Between '$startdate' AND '$enddate'
				Order By T2.AssessmentAnswerID ASC";
	$result = odbc_exec($connection,$query);												
	$x=1;	
?>
<div style="overflow-x:auto; height: 100%;">	
	<table class="table table-responsive table-border" border="1">
		<tr>
			<th style="text-align: center">Sl</th>
			<th style="text-align: center">Code</th>
			<th style="text-align: center">CustomerName</th> 
			<th style="text-align: center">Territory Name</th>
			<th style="text-align: center">Score</th>
		</tr>
	<?php
		$sumres = 0;
		while($row = odbc_fetch_array($result)) {
	?>
		<tr>
			<td style="text-align: center"><?php echo $x++; ?></td>		
			<td style="text-align: center"><a href="verifyassessment.php?AssessmentAnswerID=<?php echo $row['AssessmentAnswerID'];  ?>"><?php echo $row['AssessmentCode']; ?></a></td>
			<td style="text-align: center"><?php echo $row['CustomerName']; ?></td>
			<td style="text-align: center"><?php echo $row['AROCode']; ?></td>
			<td style="text-align: center"><?php //echo $row['AROCode']; ?></td>
		</tr>		
	<?php } ?>		
	</table>
	
</div>