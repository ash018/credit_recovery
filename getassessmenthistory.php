<?php
	include('dbsqlserver.php');	
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	
	$query = "Select T1.*, T2.* From AssessCustomer T1
				Inner Join TmpAssessmentAnswer T2 ON T1.AssessmentCode = T2.AssessmentCode
				Where AssessmentDate Between '$startdate' AND '$enddate'
				Order By T2.AssessmentAnswerID ASC";
	$result = odbc_exec($connection,$query);												
	$x=1;
	$totalres = 0;
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
		<td style="text-align: center"><a href="verifyassessment.php?AssessmentCode=<?php echo $row['AssessmentCode'];  ?>"><?php echo $row['AssessmentCode']; ?></a></td>
		<td style="text-align: center"><?php echo $row['CustomerName']; ?></td>
		<td style="text-align: center"><?php echo $row['AROCode']; ?></td>
		<td style="text-align: center">														
		<?php //echo $totalScore; 
			$q3 = $row['Q3'];
			if($row['Q4']== 2){
				$q4 =  "2";
			}elseif($row['Q4'] ==3){
				$q4 =  "2";
			}elseif($row['Q4'] ==4){
				$q4 =  "2";
			}elseif($row['Q4'] ==5){
				$q4 = "2";
			}elseif($row['Q4'] ==6){
				$q4 = "2";
			}elseif($row['Q4'] ==7){
				$q4 = "2";
			}elseif($row['Q4'] ==8){
				$q4 = "3";
			}elseif($row['Q4'] ==9){
				$q4 = "3";
			}elseif($row['Q4'] ==10){
				$q4 = "4";
			}elseif($row['Q4'] ==11){
				$q4 = "5";
			}elseif($row['Q4'] ==12){
				$q4 = "5";
			}elseif($row['Q4'] ==13){
				$q4 = "5";
			}elseif($row['Q4'] ==14){
				$q4 = "5";
			}elseif($row['Q4'] ==15){
				$q4 = "5";												
			}elseif($row['Q4'] ==16){
				$q4 = "5";
			}elseif($row['Q4'] ==1){
				$q4 = "1";
			}
			
			if($row['Q5']== 0){
				$q5 =  "0";
			}elseif($row['Q5'] < 5000){
				$q5 =  "1";
			}elseif($row['Q5'] <=10000 ){
				$q5 =  "2";
			}elseif($row['Q5'] <= 20000){
				$q5 =  "3";
			}elseif($row['Q5'] <= 50000){
				$q5 =  "4";
			}elseif($row['Q5'] > 50000){
				$q5 =  "5";
			}
			if($row['Q6'] < 5000){
				$q6 = "0";
			}elseif($row['Q6'] <=10000 ){
				$q6 = "1";
			}elseif($row['Q6'] <= 15000){
				$q6 = "2";
			}elseif($row['Q6'] <= 20000){
				$q6 = "3";
			}elseif($row['Q6'] <= 25000){
				$q6 = "4";
			}elseif($row['Q6'] >= 25000){
				$q6 = "5";
			}
			if($row['Q7'] < 10000){
				$q7 = "1";
			}elseif($row['Q7'] <=20000 ){
				$q7 = "2";
			}elseif($row['Q7'] <= 33000){
				$q7 = "3";
			}elseif($row['Q7'] <= 50000){
				$q7 = "4";
			}elseif($row['Q7'] >= 50000){
				$q7 = "5";
			}
			if($row['Q8'] >= 50000){
				$q8 = "1";
			}elseif($row['Q8'] < 50000 && $row['Q8'] > 40000  ){
				$q8 = "2";
			}elseif($row['Q8'] < 40000 && $row['Q8'] > 10000){
				$q8 = "3";
			}elseif($row['Q8'] < 10000){
				$q8 = "4";
			}elseif($row['Q8'] = 0){
				$q8 = "5";
			}
			if($row['Q9'] <= 10000){
				$q9 = "0";
			}elseif($row['Q9'] >= 10001 && $row['Q9'] <= 50000){
				$q9 = "1";
			}elseif($row['Q9'] >= 50001 && $row['Q9'] <= 100000){
				$q9 = "2";
			}elseif($row['Q9'] >= 100001 && $row['Q9'] <= 200000){
				$q9 = "3";
			}elseif($row['Q9'] >= 200001 && $row['Q9'] <= 500000){
				$q9 = "4";
			}elseif($row['Q9'] > 500000){
				$q9 = "5";
			}
			$q10 = $row['Q10'];
			$q14 = $row['Q14'];
			$q15 = $row['Q15'];
			$q16 = $row['Q16'];
			$q17 = $row['Q17'];
			$q18 = $row['Q18'];
			$items = explode("~", $row['Q19']);
			
			$item1 = $items[0];
			$item2 = $items[1];												
			
			if($item2 === ''){
				$item2val =0;
			}else{
				$item2val =2.5;
			}															
			$item1val = 2.5;															
			
			$itemres = ((float)$item1val + (float)$item2val);
			$q19 = $itemres;
	
			$q20 = $row['Q20'];
			$totalres  = ($q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q14 + $q15 + $q16 + $q17 + $q18 + $q19 + $q20);
			echo $totalres;
		?>														
		</td>
	</tr>
	
<?php } ?>
	
</table>

</div>