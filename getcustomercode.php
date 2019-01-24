<?php
	include("db.php");
	$btncustomer = mysqli_real_escape_string($link, $_POST['btncustomer']);			
	$query = "SELECT * FROM creditrecovery WHERE customercode = '$btncustomer'";
	$result = mysqli_query($link, $query);		
	$row=mysqli_fetch_array($result)
?>
<input type="text" value="<?php echo $row['projectionamount']; ?>" name="projectionamount" class="form-control" style="background-color: #ded;" readonly />
	