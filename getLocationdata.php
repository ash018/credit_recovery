<?php
	include("db.php");	
	$query = "SELECT * FROM latlong";
	$result = odbc_exec($connection,$query);
	
	$stores = array();
	while($row=odbc_fetch_array($result)) {
		$temp = array();
		$temp['TerrityName'] = $row['TerrityName'];
		$temp['Latitude'] = $row['Latitude'];
		$temp['Longitude'] = $row['Longitude'];			
		$stores[] = $temp;
	}
	
	echo json_encode($stores);
	
?>