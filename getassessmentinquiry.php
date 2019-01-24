<?php
	//error_reporting(0);
	include('dbsqlserver.php');
	
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	
	$query = "Select T1.*, T2.* From AssessCustomer T1
				Inner Join TmpAssessmentAnswer T2 ON T1.AssessmentCode = T2.AssessmentCode
				Where AssessmentDate Between '$startdate' AND '$enddate'
				Order By T2.AssessmentAnswerID ASC";
	$result = odbc_exec($connection,$query);	
	
	$x=1;
?>
<table class="table table-responsive table-border" border="1">
	<tr>
		<th style="text-align: center">Sl</th><th style="text-align: center">Code</th><th style="text-align: center">CustomerName</th> <th style="text-align: center">Territory Name</th><th style="text-align: center">Verify</th>
	</tr>
<?php
	$sumres = 0;
	while($row = odbc_fetch_array($result)) {
?>
	<tr>
		<td style="text-align: center"><?php echo $x++; ?></td>		
		<td style="text-align: center"><?php echo $row['AssessmentCode']; ?></td>
		<td style="text-align: center"><?php echo $row['CustomerName']; ?></td>
		<td style="text-align: center"><?php echo $row['TTYCode']; ?></td>
		<td>
			<a href="verifyassessment.php?code=<?php echo $row['AssessmentAnswerID']; ?>">&nbsp;&nbsp;<img src="images/edit.gif" /></a>												
		</td>
	</tr>
	
<?php } ?>
	
</table>


							
							