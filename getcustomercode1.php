<?php
	include("db.php");
	$btncustomer = mysqli_real_escape_string($link, $_POST['btncustomer']);			
	$query = "SELECT * FROM creditrecovery WHERE comittedamount != 0 AND customercode = '$btncustomer' Order By creditrecoveryid DESC LIMIT 1";
	$result = mysqli_query($link, $query);		
	$row=mysqli_fetch_array($result)
?>

<div class="form-group">									
	<label class="control-label col-md-3">Projection Amount</label>
	<div class="col-md-4">
		<input type="text" value="<?php echo $row['projectionamount']; ?>" name="projectionamount" class="form-control" style="background-color: #ded;" readonly />
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3">Commitment Amount<span class="required">*</span></label>
	<div class="col-md-4">
		<input type="text" value="<?php echo $row['comittedamount']; ?>" name="comittedamount" class="form-control" style="background-color: #ded;" readonly />
	</div>
</div>

	