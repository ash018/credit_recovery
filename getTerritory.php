<?php
	include("db.php");
	
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$areaname = $_POST['areaname'];
	
	$query = "SELECT DISTINCT TerritoryName FROM partinformation WHERE AreaName = '$areaname'";
	$result = odbc_exec($connection,$query);
	echo "<option value=''>Select Territory</option>";	
	while($row=odbc_fetch_array($result)){
		echo "<option value='".$row['TerritoryName']."'>".$row['TerritoryName']."</option>";									
	}

?>