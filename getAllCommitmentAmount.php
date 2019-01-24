<?php
	include("auth.php");
	include('db.php');
	$username = $_SESSION['username'];
	//$startdate = mysqli_real_escape_string($link, $_POST['startdate']);	
	//$enddate = mysqli_real_escape_string($link, $_POST['enddate']);	
	$startdate = $_POST['startdate'];	
	$enddate = $_POST['enddate'];
	$ttyname = $_POST['ttyname'];
	//2018-03-01
	$formonth1 = substr($startdate,5,2);
	$formonth2 = substr($startdate,0,4);
	$formonth = $formonth1.$formonth2;
	$query = "ups_apps_dashboard_ttywisecommitmentamount '$startdate', '$enddate', '$ttyname'";
	$result = odbc_exec($connection,$query);
	$x=1;
?>

<table class="table table-responsive table-border" border="1">
	
	<tr>
		<th style="text-align: center">Sl</th>
		<th style="text-align: center">Territory</th>		
		<th style="text-align: center">OD Taka</th>
		<th style="text-align: center">Installment</th> 
		<th style="text-align: center">Projection</th>
		<th style="text-align: right">Committed Amount</th>
	</tr>
	<?php while($row = odbc_fetch_array($result)) { ?>
	<tr>
		<td style="text-align: center"><?php echo $x++; ?></td>		
		<td style="text-align: center"><?php echo $row['Territory']; ?></td>
		<td style="text-align: right"><?php echo round($row['OD']); ?></td>
		<td style="text-align: right"><?php echo round($row['Inst']); ?></td>
		<td style="text-align: right"><?php echo round($row['PrjAmt']); ?></td>
		<td style="text-align: right"><?php echo round($row['CommAmt']); ?></td>
	</tr>	
	<?php } ?>	
</table>
