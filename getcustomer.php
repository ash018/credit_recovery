<?php
	$q=$_POST["q"];
	if(empty($q)){
		exit();
	}
	include('dbsqlserver.php');
	$query = "SELECT a.*,b.TTYName,c.* FROM Customer a
				INNER JOIN Territory b ON a.TTYCode = b.TTYCode 
				LEFT JOIN PaymentSchedule c ON a.CustomerCode = c.CustomerCode
				WHERE a.CustomerCode = '".$q."'";
	$query2 = "SELECT 
				ISNULL(SUM(Installment - PaidAmount),0) AS OverDue, 
				COUNT(InstallmentNo) AS InstNo 
				FROM [192.168.100.25].MotorBrInvoiceMirror.dbo.PaymentScheduleDetails 
				WHERE CustomerCode = '".$q."'
				AND LastPayDate < GETDATE() AND PAID = 'N'";
			/*	SELECT a.*,b.TTYName,c.* FROM [192.168.100.25].MotorBrInvoiceMirror.dbo.Customer a
				INNER JOIN [192.168.100.25].MotorBrInvoiceMirror.dbo.Territory b ON a.TTYCode = b.TTYCode 
				LEFT JOIN [192.168.100.25].MotorBrInvoiceMirror.dbo.PaymentSchedule c ON a.CustomerCode = c.CustomerCode
				WHERE a.CustomerCode = 'B00906' 
				ScheduleDate                                  
				PrincipalAmount
				TotalAmount
				NofInstallment 
			*/
	$result = odbc_exec($connection,$query);
	$result2 = odbc_exec($connection,$query2);
	$num = odbc_num_rows($result);
	
	if($num > 0){
	
?>
<?php				
	$row = odbc_fetch_array($result);
	$row2 = odbc_fetch_array($result2);
?>
	<div class="form-group">
		<label class="control-label col-md-3">Visit Date</label>
		<div class="col-md-4">
			<input type="text" name="visitdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Customer Code</label>
		<div class="col-md-4">
			<input type="text" name="customercode" required class="form-control" value="<?php echo $row['CustomerCode']; ?>" readonly />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Customer Name<span class="required">*</span></label>
		<div class="col-md-4">
			<input type="text" name="customername" class="form-control" value="<?php echo $row['CustomerName1']; ?>" readonly />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Territory</label>
		<div class="col-md-4">
			<input type="hidden" name="TTYCode" class="form-control" value="<?php echo $row['TTYCode']; ?>"  />
			<input type="text" name="territoryname" class="form-control" value="<?php echo $row['TTYName']; ?>" readonly />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Mobile</label>
		<div class="col-md-4">			
			<input type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo $row['Mobile']; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Installment Size</label>
		<div class="col-md-4">			
			<input type="text" name="installmentsize" class="form-control" value="<?php echo $row['Installment']; ?>" readonly />
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3">Overdue Amount</label>
		<div class="col-md-4">			
			<input type="text" name="overdueamount" class="form-control" value="<?php echo $row2['OverDue']; ?>" readonly />
		</div>
	</div>
		
<?php
	}else{
		echo "<span style='color:#FF0000; text-align:center;'>Wrong Entry</span>";
	}
	odbc_close($connection);

?> 
