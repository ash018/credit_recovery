<?php
	include("db.php");
	
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. ");
	}
	$PartName = $_POST['PartName'];
	
	$query = "SELECT DISTINCT RegionName FROM partinformation WHERE PartName = '$PartName'";
	$result = odbc_exec($connection,$query);
	echo "<option value=''>Select Region</option>";	
	while($row=odbc_fetch_array($result)) {
		echo "<option value='".$row['RegionName']."'>".$row['RegionName']."</option>";									
	}

?>