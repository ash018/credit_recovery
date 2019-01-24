<?php
	error_reporting(0);
	include("db.php");
	
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	//$ttyname = $_POST['ttyname'];
	if($_POST['ttyname']!= ""){
		$ttyname = $_POST['ttyname'];
	}else{
		$ttyname = "%";
	}
	
	
	$query = "usp_TerritoryWiseCollection '$startdate', '$enddate', '$ttyname'";
	$result = odbc_exec($connection,$query);
	$x=1;
	
	$t1 = 0;
	$t2 = 0;
	$t3 = 0;
	$t4 = 0;
?>


<table class="table table-responsive table-border" border="1">	
	<tr>
		<th style="text-align: center">Sl</th>
		<th style="text-align: center">Territory</th>
		<th style="text-align: center">OD Taka</th>
		<th style="text-align: center">Projection Taka</th>
		<th style="text-align: center">Installment Size</th>
		<th style="text-align: center">Collected Taka</th>
		<th style="text-align: center">% OD</th>
		<th style="text-align: center">% Projection.</th>
		<th style="text-align: center">% Ins.</th>
	</tr>
	<?php 
		while($row= odbc_fetch_array($result)) { 			
	?>
	<tr>
		<td style="text-align: center"><?php echo $x++; ?></td>		
		<td style="text-align: center"><?php echo $row['TerritoryName']; ?></td>	
		<td style="text-align: right"><?php echo round($row['Ove']);  ?></td>				
		<td style="text-align: right"><?php echo round($row['ProjectionAmount']); ?></td>
		<td style="text-align: right"><?php //echo round($row['Inst']); ?></td>
		<td style="text-align: right"><?php echo round($row['CollectedTaka']); $t4 += $row['CollectedTaka'];	 ?></td>
		<td style="text-align: center"><?php echo round(($row['CollectedTaka']/$row['Ove'])*100, 2)."&nbsp;"."%"; ?></td>
		<td style="text-align: center"><?php echo round(($row['CollAmt']/$row['ProjectionAmount'])*100,2)."&nbsp;"."%"; ?></td>
		<td style="text-align: center"><?php //echo round(($row['CollAmt']/$row['Inst'])*100,2)."&nbsp;"."%"; ?></td>
	</tr>	
	<?php } ?>	
	<tr>
		<td style="text-align: center" colspan="5"><b>Total</b></td>		
		<td style="text-align: right;"><?php echo $t4."/="; ?></td>
		<td style="text-align: center"></td>
		<td style="text-align: center"></td>
		<td style="text-align: center"></td>
	</tr>
</table>


							
							