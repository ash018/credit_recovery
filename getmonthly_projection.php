<?php
	//error_reporting(0);
	include("db.php");	
	$projectionmonth = $_POST['projectionmonth'];
	$projectionyear = $_POST['projectionyear'];
	$ProjectionFor = $projectionmonth.$projectionyear;
	//$ttyname = $_POST['ttyname'];
	if($_POST['ttyname']!= ""){
		$ttyname = $_POST['ttyname'];
	}else{
		$ttyname = "%";
	}	
	$query = "SELECT CustomerCode, TerritoryCode, ProjectionAmount FROM projection 
				WHERE (ProjectionFor ='$ProjectionFor') AND (TerritoryCode LIKE '$ttyname')";
	$result = odbc_exec($connection,$query);
	$x=1;
	$total = 0;
?>


<table class="table table-responsive table-border" border="1">	
	<tr>
		<th style="text-align: center">Sl</th><th style="text-align: center">Customer</th><th style="text-align: center">TerritoryCode</th><th style="text-align: center">Projection Amount</th>
	</tr>
	<?php 
		while($row= odbc_fetch_array($result)) { 
		$total += $row['ProjectionAmount'];
		
	?>
	<tr>
		<td style="text-align: center"><?php echo $x++; ?></td>		
		<td style="text-align: center"><?php echo $row['CustomerCode']; ?></td>	
		<td style="text-align: center"><?php echo $row['TerritoryCode']; ?></td>	
		<td style="text-align: center"><?php echo $row['ProjectionAmount']; ?></td>				
	</tr>	
	<?php } ?>	
	<tr>
		<td style="text-align: center" colspan="3"><b>Total</b></td>		
		<td style="text-align: center"><b><?php echo $total++; ?></b></td>	
	</tr>
</table>


							
							