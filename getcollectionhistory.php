<?php
	//error_reporting(0);
	include("db.php");
	
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	//$ttyname = $_POST['ttyname'];
	if($_POST['ttyname']!= ""){
		$ttyname = $_POST['ttyname'];
	}else{
		$ttyname = "%";
	}
	
	
	$query = "SELECT territoryname, sum(actualpaidamount) AS CollectedAmount FROM creditrecovery 
				Where (VisitDate Between '$startdate' AND '$enddate') and (territoryname LIKE '$ttyname') AND (actualpaidamount <> 0)
				GROUP by territoryname";
	$result = odbc_exec($connection,$query);
	$x=1;
	$total = 0;
	$total1 = 0;
?>


<table class="table table-responsive table-border" border="1">	
	<tr>
		<th style="text-align: center">Sl</th>
		<th style="text-align: center">Territory</th>
		<th style="text-align: center">Projection</th>
		<th style="text-align: center">Collected Amount</th>
	</tr>
	<?php 
		while($row= odbc_fetch_array($result)) { 
		$total += $row['CollectedAmount'];
		$total1 += $row['CollectedAmount'];
		//$total++;
	?>
	<tr>
		<td style="text-align: center"><?php echo $x++; ?></td>		
		<td style="text-align: center"><?php echo $row['territoryname']; ?></td>	
		<td style="text-align: center"><?php echo $row['CollectedAmount']; ?></td>				
		<td style="text-align: center"><?php echo $row['CollectedAmount']; ?></td>				
	</tr>	
	<?php } ?>	
	<tr>
		<td style="text-align: center" colspan="2"><b>Total</b></td>
		<td style="text-align: center"><b><?php echo $total1++; ?></b></td>		
		<td style="text-align: center"><b><?php echo $total++; ?></b></td>	
	</tr>
</table>


							
							