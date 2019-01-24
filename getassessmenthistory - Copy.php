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
				Where AssessmentDate Between '$sdate' AND '$edate'
				Order By T2.AssessmentAnswerID ASC";
	$result = odbc_exec($connection,$query);												
	$x=1;	
?>
<div style="overflow-x:auto; height: 100%;">
	<!--<table class="table table-responsive table-border" border="1">
		<tr>
			<th style="text-align: center">Assessment Date</th>
			<th style="text-align: center">Assessment Code</th>
			<th style="text-align: center">Customer Name</th>
			<th style="text-align: center">Territory</th>
			<th style="text-align: center">Q1</th>
			<th style="text-align: center">Q2</th>
			<th style="text-align: center">Q3</th>
			<th style="text-align: center">Q4</th>
			<th style="text-align: center">Q5</th>
			<th style="text-align: center">Q6</th>
			<th style="text-align: center">Q7</th>
			<th style="text-align: center">Q8</th>
			<th style="text-align: center">Q9</th>
			<th style="text-align: center">Q10</th>
			<th style="text-align: center">Q11</th>
			<th style="text-align: center">Q12</th>
			<th style="text-align: center">Q13</th>
			<th style="text-align: center">Q14</th>
			<th style="text-align: center">Q15</th>
		</tr>
	<?php
		//$sumres = 0;
		//while($row = odbc_fetch_array($result)) {
	?>
		<tr>
			<td style="text-align: center"><?php echo substr($row['AssessmentDate'],0,10); ?></td>
			<td style="text-align: center"><?php echo $row['AssessmentCode']; ?></td>
			<td><?php echo $row['CustomerName']; ?></td>
			<td><?php echo $row['TerritoryName']; ?></td>
			<td><?php echo $row['Q3']; ?></td>
			<td><?php echo $row['Q4']; ?></td>
			<td><?php echo $row['Q5']; ?></td>
			<td><?php echo $row['Q6']; ?></td>
			<td><?php echo $row['Q7']; ?></td>
			<td><?php echo $row['Q8']; ?></td>
			<td><?php echo $row['Q9']; ?></td>
			<td><?php echo $row['Q10']; ?></td>
			<td><?php echo $row['Q14']; ?></td>
			<td><?php echo $row['Q15']; ?></td>
			<td><?php echo $row['Q16']; ?></td>
			<td><?php echo $row['Q17']; ?></td>
			<td><?php echo $row['Q18']; ?></td>
			<td><?php echo $row['Q19']; ?></td>
			<td><?php echo $row['Q20']; ?></td>
		</tr>												
	<?php //} ?>												
	</table>-->
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
				<td style="text-align: center"><?php echo $row['AROCode']; ?></td>
				<td>
					<a href="verifyassessment.php?code=<?php echo $row['AssessmentAnswerID']; ?>">&nbsp;&nbsp;<img src="images/edit.gif" /></a>												
				</td>
			</tr>
			
		<?php } ?>
			
		</table>
	
</div>