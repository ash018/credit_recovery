<?php
	//error_reporting(0);
	include("db.php");
	/*mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link, "SET SESSION collation_connection ='utf8_general_ci'") or 
	die (mysql_error());*/
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	//$ttyname = $_POST['ttyname'];
	if($_POST['ttyname']!= ""){
		$ttyname = $_POST['ttyname'];
	}else{
		$ttyname = "%";
	}
	
	$_POST['filter'];
	
	if($_POST['filter']== "1"){
		$filter = 'nextphonecalldate';
		$query = "SELECT territoryname, convert(varchar(10),visitdate, 120) AS visitdate, nextphonecalldate,customercode,customername,mobileno,comittedamount FROM creditrecovery Where $filter Between '$startdate' AND '$enddate' and TTYCode LIKE '$ttyname'";	
	}elseif($_POST['filter']== "2"){
		$filter = 'nextvisitdate';	
		$query = "SELECT territoryname, convert(varchar(10),visitdate, 120) AS visitdate, nextvisitdate,customercode,customername,mobileno,comittedamount FROM creditrecovery Where $filter Between '$startdate' AND '$enddate'  and TTYCode LIKE '$ttyname'";	
	}elseif($_POST['filter']== "3"){
		$filter = 'commitmentdate';
		$query = "SELECT territoryname, convert(varchar(10),visitdate, 120) AS visitdate, commitmentdate,customercode,customername,mobileno,comittedamount FROM creditrecovery Where $filter Between '$startdate' AND '$enddate'  and TTYCode LIKE '$ttyname'";	
	}elseif($_POST['filter']== "4"){
		$filter = 'actualpaidamount';
		$query = "SELECT territoryname, convert(varchar(10),visitdate, 120) AS visitdate, actualpaidamount, customercode,customername,mobileno, comittedamount FROM creditrecovery Where visitdate Between '$startdate' AND '$enddate'  and TTYCode LIKE '$ttyname'";
	}else{
		//$query = "SELECT * FROM creditrecovery Where (nextphonecalldate Between '$startdate' AND '$enddate') OR (nextvisitdate Between '$startdate' AND '$enddate')
			//	OR (commitmentdate Between '$startdate' AND '$enddate') AND UserName = '$username' ";
		$filter = 'ALL';
		$query = "SELECT territoryname, convert(varchar(10),visitdate, 120) AS visitdate, nextphonecalldate,customercode,customername,mobileno,comittedamount FROM creditrecovery 
					Where nextphonecalldate Between '$startdate' AND '$enddate' AND TTYCode LIKE '$ttyname'
					UNION 
					SELECT territoryname, convert(varchar(10),visitdate, 120) AS visitdate, nextvisitdate,customercode,customername,mobileno,comittedamount FROM creditrecovery 
					Where nextvisitdate Between '$startdate' AND '$enddate'	 AND TTYCode LIKE '$ttyname'
					UNION 
					SELECT territoryname, convert(varchar(10),visitdate, 120) AS visitdate, commitmentdate,customercode,customername,mobileno,comittedamount FROM creditrecovery 
					Where commitmentdate Between '$startdate' AND '$enddate'  AND TTYCode LIKE '$ttyname'
			";
	}
	//$result = mysqli_query($link, $query);
	$result = odbc_exec($connection,$query);	
	$x=1;
	$totalcollectedamount = 0;
?>

<table class="table table-responsive table-border" border="1">
	
	<tr>
		<th style="text-align: center">Sl</th>
		<th style="text-align: center">Territory</th>
		<th style="text-align: center">Code</th>
		<th style="text-align: center">CustomerName</th> 
		<th style="text-align: center">Phone</th>
		<th style="text-align: center">InputDate</th>
		<th style="text-align: center"><?php echo ucfirst($filter); ?></th>		
		<th style="text-align: center">Comm.Amount</th>
	</tr>
	<?php while($row = odbc_fetch_array($result)) { 
		//print_r($row); //exit();
	?>
	<tr>
		<td style="text-align: center"><?php echo $x++; ?></td>		
		<td style="text-align: center"><?php echo $row['territoryname']; ?></td>	
		<td style="text-align: center"><?php echo $row['customercode']; ?></td>
		<td style="text-align: center"><?php echo $row['customername']; ?></td>
		<td style="text-align: center"><?php echo $row['mobileno']; ?></td>
		<td style="text-align: center"><?php echo $row['visitdate']; ?></td>	
		<td style="text-align: right"><?php 
			if(ucfirst($filter) == "actualpaidamount") {
				round($row['actualpaidamount'],2); 				
			}else {
				echo substr($row[$filter], 0, 11); 
			}
			$totalcollectedamount += $row['actualpaidamount'];
		?></td>			
		<td style="text-align: right"><?php echo round($row['comittedamount']); ?></td>
	</tr>	
	<?php } ?>	
	<tr>
		<td colspan="6">Total: </td>		
		<td style="text-align: right">
			<?php 
				echo $totalcollectedamount;
				/*if(ucfirst($filter) == "actualpaidamount") {
					echo $totalcollectedamount;
				}else{
					echo substr($row[$filter], 0, 11); 
				}*/
			?>
		</td>			
		<td></td>
	</tr>
</table>


							
							