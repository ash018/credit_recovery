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
	$query = "SELECT territoryname, visitdate, nextphonecalldate,customercode,customername,mobileno,comittedamount 
				FROM creditrecovery Where visitdate Between '$startdate' AND '$enddate' and TTYCode LIKE '$ttyname'
			";	
	$result = odbc_exec($connection,$query);	
	$x=1;
?>


<table class="table table-responsive table-border" border="1">
	
	<tr>
		<th style="text-align: center">Sl</th><th style="text-align: center">Code</th>
		<th style="text-align: center">CustomerName</th><th style="text-align: center">Due Ins</th>
		<th style="text-align: center">Ins Col</th><th style="text-align: center">Overdue</th>
		<th style="text-align: center">Color</th>
	</tr>
		<?php	
			while($row = odbc_fetch_array($result)) {
		?>
	<tr>
		<td style="text-align: center"><?php echo $x++; ?></td>		
		<td style="text-align: center"></td>	
		<td style="text-align: center"> </td>
		<td style="text-align: center"> </td>	
		<td style="text-align: center"> </td>	
		<td style="text-align: center"> </td>	
		<td style="text-align: center"> </td>			
	</tr>	
	<?php } ?>	
</table>


							
							