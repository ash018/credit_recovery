<?php
	include("db.php");
	
	// Check connection
	if($link === false){
		die("ERROR: Could not connect.");
	}
	$regionname = $_POST['regionname'];
	
	$query = "SELECT DISTINCT AreaName FROM partinformation WHERE RegionName = '$regionname'";
	$result = odbc_exec($connection,$query);
	echo "<option value=''>Select Area</option>";	
	while($row=odbc_fetch_array($result)) {
		echo "<option value='".$row['AreaName']."'>".$row['AreaName']."</option>";									
	}

?>