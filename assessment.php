<?php
include("auth.php"); //include auth.php file on all secure pages 
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>	
        <title>ACI Motors | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN PAGE STYLES -->
        <link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
		<script type="text/javascript">
			/*onload =function(){ 
				var ele = document.querySelectorAll('.number-only')[0];
				ele.onkeypress = function(e) {
					if(isNaN(this.value+""+String.fromCharCode(e.charCode)))
						return false;
					}
				ele.onpaste = function(e){
					e.preventDefault();
				}
			}*/
			var NID = document.getElementById("NIDNumber"); //document.myForm.NIDNumber.value;			
			if( NID.length < 16 ) {
				alert("You Must Input 16 Digit");
				document.myForm.NIDNumber.focus();
				return false;
			}
		</script>
		<script type="text/javascript">
			function validate() {
				if( document.myForm.CustomerName.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.CustomerName.focus() ;
					return false;
				}
				
				if( document.myForm.ContactNo.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.ContactNo.focus() ;
					return false;
				}
				if( document.myForm.Address.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Address.focus() ;
					return false;
				}
				if( document.myForm.NIDNumber.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.NIDNumber.focus();
					return false;
				}else if(document.myForm.NIDNumber.value.length < 16 ){
					alert( "NID Must Be 16 Digits!" );
					document.myForm.NIDNumber.focus();
					return false;
				}
				
				if( document.myForm.TTYCode.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.TTYCode.focus() ;
					return false;
				}
				if( document.myForm.AROCode.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.AROCode.focus() ;
					return false;
				}
				/*if( document.myForm.image.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.image.focus() ;
					return false;
				}
				if( document.myForm.image1.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.image1.focus() ;
					return false;
				}*/
				if( document.myForm.Q1.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q1.focus() ;
					return false;
				}
				if( document.myForm.Q2.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q2.focus() ;
					return false;
				}
				if( document.myForm.Q3.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q3.focus() ;
					return false;
				}
				if( document.myForm.Q4.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q4.focus() ;
					return false;
				}
				if( document.myForm.Q5.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q5.focus() ;
					return false;
				}
				if( document.myForm.Q6.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q6.focus() ;
					return false;
				}
				if( document.myForm.Q7.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q7.focus() ;
					return false;
				}
				if( document.myForm.Q8.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q8.focus() ;
					return false;
				}
				if( document.myForm.Q9.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q9.focus() ;
					return false;
				}
				if( document.myForm.Q10.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q10.focus() ;
					return false;
				}
				if( document.myForm.Q11.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q11.focus() ;
					return false;
				}
				if( document.myForm.Q12.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q12.focus() ;
					return false;
				}
				if( document.myForm.Q13.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q13.focus() ;
					return false;
				}
				if( document.myForm.Q14.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q14.focus() ;
					return false;
				}
				if( document.myForm.Q15.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q15.focus() ;
					return false;
				}
				if( document.myForm.Q16.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q16.focus() ;
					return false;
				}
				if( document.myForm.Q17.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q17.focus() ;
					return false;
				}
				if( document.myForm.Q18.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q18.focus() ;
					return false;
				}
				if( document.myForm.Q19.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q19.focus() ;
					return false;
				}
				/*if( document.myForm.Q19a.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q19a.focus() ;
					return false;
				}
				if( document.myForm.Q19b.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q19b.focus() ;
					return false;
				}
				if( document.myForm.Q19c.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q19c.focus() ;
					return false;
				}*/
				if( document.myForm.Q20.value == "" ){
					alert( "Please Input Data!" );
					document.myForm.Q20.focus() ;
					return false;
				}
				
			}
			
		</script>

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <?php include("header.php"); ?>
        <!-- END HEADER -->

        <div class="clearfix"></div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php include("sidebarmobile.php"); ?>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">			
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                        Customer Assessment
                    </h3>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet box purple">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>New Assessment Form
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config">
                                        </a>
                                        <a href="javascript:;" class="reload">
                                        </a>
                                        <a href="javascript:;" class="remove">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM--> 
									
                                    <form action="insertassessment.php" method="post" class="form-horizontal" accept-charset="utf-8" name="myForm" id="id" onsubmit="return(validate());" enctype="multipart/form-data">							
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button>
                                                You have some form errors. Please check below.
                                            </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button>
                                                Your form validation is successful!
                                            </div>	
												<?php include('dbsqlserver.php'); ?>
											<div class="form-group">
                                                <label class="control-label col-md-3">Assessment Code</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="AssessmentCode" value="<?php echo(rand(10,10000)); ?>" class="form-control" readonly />
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Assessment Date</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="AssessmentDate" value="<?php echo date("Y-m-d"); ?>" class="form-control" readonly />
                                                </div>
                                            </div>  
												<div class="form-group">
                                                <label class="control-label col-md-3">ARO Name<span class="required">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" name="AROCode" value="<?php echo $_SESSION['Notes']; ?>" class="form-control" readonly />														  
                                                </div>
                                            </div>
												
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Customer Name<span class="required">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" name="CustomerName" id="CustomerName" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Contact Number1<span class="required">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" name="ContactNo" class="form-control"/>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Contact Number2</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="ContactNo1" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Full Address<span class="required">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" name="Address" class="form-control"/>
                                                </div>
                                            </div>	
												<div class="form-group">
                                                <label class="control-label col-md-3">NID Number<span class="required">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" name="NIDNumber" id="NIDNumber" class="form-control" />
                                                </div>
                                            </div>	
											
											<div class="form-group">
												<label class="control-label col-md-3">Territory</label>
												<?php 													
													$query = "Select * From MotorBrInvoicePower..Territory Where TTYName <> '' AND TTYName <> '.' Order By TTYName ASC";
													$result = odbc_exec($connection,$query);										
												?>												
												<div class="col-md-4">
													<select class="form-control" name="TTYCode" id="TTYCode">
													<option value="">Select Territory</option>
													<?php	
														while($row = odbc_fetch_array($result)) {
															echo "<option value='".$row['TTYName']."'>".$row['TTYName']."</option>";
														}
													?>									
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Sales Person</label>
												<?php 													
													$query = "Select * From MotorBrInvoicePower..IncentiveLevel1 Where Period = 'July 1 2016' Order By Level1Name ASC";
													$result = odbc_exec($connection,$query);										
												?>
												
												<div class="col-md-4">
													<select class="form-control" name="Level3" id="Level3" >
													<option value="">Select</option>
													<?php	
														while($row = odbc_fetch_array($result)) {
															echo "<option value='".$row['Level2StaffID']."'>".$row['Level1Name']."</option>";															
														}
													?>									
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Area Manager</label>												
												<div class="col-md-4">
													<select class="form-control" name="Level2" id="Level2" >
																					
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Regional Manager</label>												
												<div class="col-md-4">
													<select class="form-control" name="Level1" id="Level1" >
																				
													</select>
												</div>
											</div>
											<div class="form-group">
                                                <label class="control-label col-md-3">New Code After Invoiced</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="InvCustomerCode" class="form-control" readonly />
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Verified By</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="VerifiedBy" class="form-control" readonly />
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Verified Date</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="VerifiedDate" class="form-control" readonly />
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">NID Image1</label>
                                                <div class="col-md-6">
                                                    <input type="file" name="image" accept="image/jpeg" />														 														 
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">NID Image2</label>
                                                <div class="col-md-6">
                                                    <input type="file" name="imagea" accept="image/jpeg" />														 														 
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Passport Photo1</label>
                                                <div class="col-md-6">
                                                    <input type="file" name="image1" accept="image/jpeg" />																												 
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Passport Photo2</label>
                                                <div class="col-md-6">
                                                    <input type="file" name="image1a" accept="image/jpeg" />																												 
                                                </div>
                                            </div>
											<br><hr><hr>
											<div class="form-group">
												<label class="control-label col-md-3">Q-1<span class="required">*</span></label>
												<div class="col-md-6">
													<div class="col-md-9">
														Home address is correct as per NID/Chairman Certificate/Birth Certificate/Passport
													 </div>
													<div class="col-md-3">
														<select class="form-control" name="Q1" id="Q1">
															<option value="">Select</option>
															<option value="5">Yes</option>
															<option value="0">No</option>
														</select>
													</div>
                                                    
												</div>
											</div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-2<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Customer's House construct of
												 </div>
												 <div class="col-md-3">
															<select class="form-control" name="Q2" id="Q2">
																<option value="">Select</option>
																<option value="0">Homeless</option>
																<option value="1">Others</option>
																<option value="2">Made of clay</option>
																<option value="3">Wooden</option>
																<option value="4">Tin shade</option>
																<option value="5">Bricks</option>
															</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-3<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													What is source of fund for down payment of our tractor?
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q3" id="Q3" >
														<option value="">Select</option>
														<option value="1">Others</option>
														<option value="2">Bank loan,Local/Micro loan</option>
														<option value="3">Loan from relatives</option>
														<option value="4">Foreign family member,Business Source</option>
														<option value="5">Own Savings,Pension Amount</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Q-4<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													What is Customer's Category or nature?
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q4" id="Q4" >
														<option value="">Select</option>
														<option value="1">Others</option>
														<option value="2">Force</option>
														<option value="2">Police</option>
														<option value="2">Lawyer</option>
														<option value="2">Politician</option>
														<option value="2">UnEmployed</option>
														<option value="2">HouseWife</option>
														<option value="3">Contractor</option>
														<option value="3">Business Man</option>
														<option value="4">Brick field Owner</option>
														<option value="5">Farmer</option>
														<option value="5">Job Holder</option>
														<option value="5">Agri-Farm</option>
														<option value="5">Co-operative Society</option>
														<option value="5">Driver</option>
														<option value="5">Teacher</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
												<label class="control-label col-md-3">Q-5<span class="required">*</span></label>
												<div class="col-md-6">
														 <div class="col-md-6">
															Monthly Income of customer
														 </div>
														 <div class="col-md-6">
															<input type="text" name="Q5" placeholder="Income" class="form-control"/>
														 </div>
													
												</div>
                                        </div>
											<div class="form-group">
												<label class="control-label col-md-3">Q-6<span class="required">*</span></label>
												<div class="col-md-6">
														 <div class="col-md-6">
															Does customer have family income? if yes, Then how much?
														 </div>
														 <div class="col-md-6">
															<input type="text" name="Q6" placeholder="Family Income" class="form-control"/>
														 </div>
													
												</div>
                                        </div>
											 <div class="form-group">
												<label class="control-label col-md-3">Q-7<span class="required">*</span></label>
												<div class="col-md-6">
														 <div class="col-md-6">
															Customer expected monthly average extra income from tractor?. If, he or she purchase tractor.
														 </div>
														 <div class="col-md-6">
															<input type="text" name="Q7" placeholder="Average income" class="form-control"/>
														 </div>
													
												</div>
                                        </div>
											 <div class="form-group">
												<label class="control-label col-md-3">Q-8<span class="required">*</span></label>
												<div class="col-md-6">
														 <div class="col-md-6">
															Does Customer have any loan? If Yes, Monthly EMI?
														 </div>
														 <div class="col-md-6">
															<input type="text" name="Q8" placeholder="Input amount" class="form-control"/>
														 </div>
													
												</div>
                                        </div>
										
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-9<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Customer's fixed asset values approximately?
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q9" id="Q9">
														<option value="">Select</option>
														<option value="0">0 to 5,00,000</option>
														<option value="1">5,00,001 to 10,00,000</option>
														<option value="2">10,00,001 to 15,00,000</option>
														<option value="3">15,00,001 to 20,00,000</option>,
														<option value="4">20,00,001to 25,00,000</option>
														<option value="5">Over 25,00,000</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-10<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Customer's family fixed asset value approximately?
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q10" id="Q10">
														<option value="">Select</option>
														<option value="0">0 to 5,00,000</option>
														<option value="1">5,00,001 to 10,00,000</option>
														<option value="2">10,00,001 to 15,00,000</option>
														<option value="3">15,00,001 to 20,00,000</option>,
														<option value="4">20,00,001to 25,00,000</option>
														<option value="5">Over 25,00,000</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<!--<div class="form-group">
                                                <label class="control-label col-md-3">Q-11<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Customer Age:
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q11" id="Q11" required >
														<option value="">Select</option>
														<option value="1">Below 18</option>
														<option value="2">Above 60</option>
														<option value="3">Between 45-60</option>,
														<option value="4">Between 19 to 30</option>
														<option value="5">Between 30 to 45</option>
													</select>
												 </div>
                                                    
                                                </div>
                                       </div>-->
											<div class="form-group">
												<label class="control-label col-md-3">Q-11<span class="required">*</span></label>
												<div class="col-md-6">
														 <div class="col-md-6">
															Customer's age?
														 </div>
														 <div class="col-md-6">
															<input type="text" name="Q11" placeholder="Customer Age" class="form-control"/>
														 </div>
													
												</div>
                                        </div>
										
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-12<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													What is customer social position or status?
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q12" id="Q12">
														<option value="">Select</option>
														<option value="1">Notorious </option>
														<option value="2">Others</option>
														<option value="3">Have reasonable Reputation</option>,
														<option value="4">Have Reputation</option>
														<option value="5">Very Respectable</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-13<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													What purpose tractor will be used?
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q13" id="Q13">
														<option value="">Select</option>
														<option value="2">Others</option>
														<option value="3">Cultivation</option>,
														<option value="4">Carrying</option>
														<option value="5">Both</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-14<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Idea/Knowledge about Tractor
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q14" id="Q14">
														<option value="">Select</option>
														<option value="2">NO</option>
														<option value="3">Some</option>,
														<option value="4">Reasonable Knowledge</option>
														<option value="5">Very Good Knowledge</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-15<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Customer's re-payment source will be in non cultivation season:
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q15" id="Q15">
														<option value="">Select</option>
														<option value="2">Borrowing</option>
														<option value="3">Selling Crops</option>,
														<option value="4">Business source</option>
														<option value="5">From Saving</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-16<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Any relation with political figures? If yes? 
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q16" id="Q16">
														<option value="">Select</option>
														<option value="2">National, District, Thana Level</option>
														<option value="3">Union Level</option>,
														<option value="4">Village Level</option>
														<option value="5">NO</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-17<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													By whom tractor will driven or maintenance?
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q17" id="Q17" >
														<option value="">Select</option>
														<option value="0">None</option>
														<option value="3">New Driver</option>,
														<option value="4">Any one Families as a Driver</option>
														<option value="5">Self  as a Driver </option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-18<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													How many topics or word customer understand from the list?<br/>
													A. Hire purchase agreement <br/>
													B. EMI <br/>
													C. warranty policy  <br/>
													D. sales agreement <br/>
													E. Gift

												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q18" id="Q18">
														<option value="">Select</option>
														<option value="0">None</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">All</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-19<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-6">
													Please Mention two close relatives Name, Address, Contact number, who can provide information about customer.
												 </div>
												 <div class="col-md-6">
													<input type="text" name="Q19" placeholder="Name1, Address1, Phone1" class="form-control"/>
													<input type="text" name="Q19a" placeholder="Name2, Address2, Phone2"  class="form-control"/>
													<!--<input type="text" name="Q19b" placeholder="Name, Address, Contract"  class="form-control"/>
													<input type="text" name="Q19c" placeholder="Name, Address, Contract"  class="form-control"/>-->
												 </div>
                                                    
                                                </div>
                                            </div>
											
											<!--<div class="form-group">Q19, Q19a, Q19b, Q19c
                                                <label class="control-label col-md-3">Question-18<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Whether Customer has any loan or not? If yes monthly EMI-
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="q18" id="q18" >
														<option value="Select">Select</option>
														<option value="1">Over 20,000</option>
														<option value="2">15,001-20,000</option>
														<option value="3">10,001-15,000</option>
														<option value="4">Below 10,000</option>
														<option value="5">NO</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>-->
											<!--<div class="form-group">
                                                <label class="control-label col-md-3">Question-19<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													Any other Business  &amp; Maintaining Bank Account, monthly Turnover
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="q19" id="q19" >
														<option value="Select">Select</option>
														<option value="1">NO</option>
														<option value="2">Less than 50,000</option>
														<option value="3">50,001-1,00,000</option>
														<option value="4">1,00,001 to 2,00,000</option>
														<option value="5">Above 2,00,000</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>-->
											
											<div class="form-group">
                                                <label class="control-label col-md-3">Q-20<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													ARO’S Grading After observing customer details
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="Q20" id="Q20">
														<option value="">Select</option>
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="control-label col-md-3">Question-21<span class="required">*</span></label>
                                                <div class="col-md-6">
												 <div class="col-md-9">
													ARO’S -Remarks
												 </div>
												 <div class="col-md-3">
													<select class="form-control" name="q21" id="q21">
														<option value="">Select</option>
														<option value="Black Rose">Black Rose</option>
														<option value="Genda">Genda</option>
														<option value="Jasmine">Jasmine</option>
													</select>
												 </div>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <!--<button type="submit" class="btn green">Submit</button>-->
														  <input type="submit" value="Submit" name="submitassignment" id="submitassignment" />
														  
														  <br>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>


                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner">
                2016 © ACI Ltd.<a href="#" title="ACI Motors" target="_blank">By kallul</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <script src="assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-markdown/lib/markdown.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="assets/admin/pages/scripts/form-validation.js"></script>
        <!-- END PAGE LEVEL STYLES -->

 
<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery("#Level3").on('change', function () {
		Level3 = jQuery(this).val();
		//alert(Level3);
		jQuery.ajax
		({
			type: "POST",
			url: "getlevel2name.php",
			data: {Level3: Level3},
			cache: false,
			success: function (html)
			{
				jQuery("#Level2").html(html);
			}
		});
	});

});
</script>

<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery("#Level2").on('click', function () {
		Level2 = jQuery(this).val();
		//alert(Level2);
		jQuery.ajax
		({
			type: "POST",
			url: "getlevel3name.php",
			data: {Level2: Level2},
			cache: false,
			success: function (html)
			{
				jQuery("#Level1").html(html);
			}
		});
	});
	

});
</script>
<script>	
	jQuery("#submitassignment").submit(function(e){
		jQuery(this).attr('disabled', 'disabled');		
		e.preventDefault(); 
		return false;
	});
	
	
</script>
<script>
	jQuery(document).ready(function () {
		// initiate layout and plugins
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		QuickSidebar.init(); // init quick sidebar
		Demo.init(); // init demo features
		FormValidation.init();
	});
</script>


        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>