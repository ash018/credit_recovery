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
	<title>Assessment | Dashboard</title>
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
		function teacher_del(id){
			if(confirm("Do you want to delete the enrty?")==1)
			document.location="complain_del?code=" + id;
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
	<?php include("sidebar.php"); ?>
	<!-- END SIDEBAR -->
	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Verify Assessment
			</h3>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Verify
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
						<style>
							@media print {
								body * {
									visibility: hidden;
								}
								#productdetail, #productdetail * {
									visibility: visible;
								}
								#productdetail {
									background-color: white;
									height: 100%;
									width: 100%;
									position: absolute;
									top: -40px;
									left: 0;
									margin: 0;
									padding: 15px;
									font-size: 14px;
									line-height: 18px;
								}
							}
							
						</style>
						<script>
							function myFunction() {
								window.print();
							}
						</script>
						

						<p style="text-align:center"><a href="javascript:history.go(-1)">Back</a></p>
						<div class="portlet-body form">
							<button onclick="myFunction()" class="btn btn-default" style="float:right;">Print this page</button>
							<form id="excel" action="itemexcel.php" method="post" onsubmit='$("#datatodisplay").val( $("<div>").append( $("#productdetail").eq(0).clone()).html() )'>
								<input type="hidden" id="datatodisplay" name="datatodisplay"/>
								<input class="bg" type="submit" value="Export To Excel"/>								
							</form>
							
							<!-- BEGIN FORM-->
							<form action="insertverifyresult.php" method="post" class="form-horizontal" accept-charset="utf-8">								
								<div class="form-body" id="productdetail">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>																	
									
									<?php
										include('dbsqlserver.php');									
										$AssessmentAnswerID = "";
										if(isset($_REQUEST['code'])){
											$AssessmentAnswerID = $_REQUEST['code'];
										}
										$query = " Select T1.*, T2.* From TmpAssessmentAnswer T1
													Inner Join AssessCustomer T2 ON T1.AssessmentCode = T2.AssessmentCode										
											Where T1.AssessmentAnswerID ='$AssessmentAnswerID'
											Order By T1.AssessmentAnswerID ASC
										";
										$result = odbc_exec($connection,$query);	
										$row = odbc_fetch_array($result);
										
										$query1 = "Select sum(Q1+Q2+Q3+Q4+Q9+Q10+Q10+Q11+Q12+Q13+Q14+Q15+Q16+Q17+Q18+Q20) AS qTotal From TmpAssessmentAnswer Where AssessmentAnswerID ='$AssessmentAnswerID'";
										$result1 = odbc_exec($connection,$query1);	
										$row1 = odbc_fetch_array($result1);
										
										$x = 1;
									?>
									
									<div id="productdetail" style="margin-top: -2%;">
									
									<input type="hidden" name="AssessmentAnswerID" value="<?php echo $row['AssessmentAnswerID']; ?> ">
								<div id="export-pdf">
									<h4 style="text-align: center;">Customer Assessment</h4>
									<table border=2 style="width: 95%">										
										<tr><td>NID Image:</td>
											<td><image src="../mobile_assessment/<?php echo $row['NIDPhotoLocation']; ?>" height="115" width="205" /></td>
											<td><image src="../mobile_assessment/<?php echo $row['NIDPhotoLocation1']; ?>" height="115" width="205" /></td>
										</tr>
										<tr><td>Passport Image:</td>
											<td><image src="../mobile_assessment/<?php echo $row['PassportImageLocation']; ?>" height="115" width="205" /></td>
											<td><image src="../mobile_assessment/<?php echo $row['PassportImageLocation1']; ?>" height="115" width="205" /></td>
										</tr>
									</table>
									<br>
								</div>
									<table border=2 style="width: 95%">
										<tr>
											<td>
												AssessmentCode:&nbsp; <?php echo $row['AssessmentCode']; ?>
												<input type="hidden" name="assessmentcodevr" value="<?php echo $row['AssessmentCode']; ?>">
											</td>
											<td>ARO Name:&nbsp; <?php echo $row['AROCode'] ?></td>
											<td>Date: <?php echo $row['AssessmentDate'];//echo date("Y-m-d"); ?></td>											
										</tr>
										<tr><td colspan="3">Customer Name: &nbsp;&nbsp;<?php echo $row['CustomerName']; ?></td></tr>
										<tr><td colspan="3">Contact No: &nbsp;&nbsp;<?php echo $row['ContactNo']; ?></td></tr>
										<tr><td colspan="3">Full Address:&nbsp;<?php echo $row['Address']; ?></td></tr>
										<tr><td colspan="3">NID Number:&nbsp;<?php echo $row['NIDNumber']; ?></td></tr>
										<tr><td colspan="3">TractorModel:&nbsp;<?php echo $row['TractorModel']; ?></td></tr>
										<tr><td colspan="3">TractorPrice:&nbsp;<?php echo $row['TractorPrice']; ?></td></tr>
										<tr><td colspan="3">CreditDurration:&nbsp;<?php echo $row['CreditDurration']; ?></td></tr>
										<tr><td colspan="3">Territory:&nbsp;<?php echo $row['TTYCode']; ?></td></tr>										
										<tr><td colspan="3">New Code After Invoiced:&nbsp;<?php echo $row['InvCustomerCode']; ?></td></tr>
									</table>
									<br>
									<br>
									<table border=2 style="width: 95%">
										<tr>
											<th>SL&nbsp;&nbsp;</th><th style="text-align:center">Question</th><th style="text-align:center">Answer</th><th style="text-align:center">Marks</th>
										</tr>
										<!--<tr>
											<td><?php //echo "&nbsp;".$x++; ?></td>
											<td><?php //echo "Home address is correct as per NID/Chairman Certificate/Birth Certificate/Passport"; ?></td>
											<td><?php //if($row['Q1']=="5"){ echo "Yes"; }else{ echo "No"; } ?></td>
											<td id="td1" style="text-align:center"><?php echo $row['Q1']; ?></td>
										</tr>-->
										<!--<tr>
											<td><?php //echo $x++; ?></td>
											<td><?php //echo "Customer's House construct of"; ?></td>
											<td>
											<?php 
												/*if($row['Q2']=="0"){
													echo "Homeless";
												}elseif($row['Q2']=="1"){
													echo "Others";
												}elseif($row['Q2']=="2"){
													echo "Made of clay";
												}elseif($row['Q2']=="3"){
													echo "Wooden";
												}elseif($row['Q2']=="4"){
													echo "Tin shade";
												}elseif($row['Q2']=="5"){
													echo "Bricks";
												}*/
											?>
											</td>
											<td id="td2" style="text-align:center"><?php //echo $row['Q2']; ?></td>
										</tr>-->
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "What is source of fund for down payment of our tractor?"; ?></td>
											<td>
											<?php 
												if($row['Q3']=="1"){
													echo "Others";
												}elseif($row['Q3']=="2"){
													echo "Bank loan,Local/Micro loan";
												}elseif($row['Q3']=="3"){
													echo "Loan from relatives";
												}elseif($row['Q3']=="4"){
													echo "Foreign family member,Business Source";
												}elseif($row['Q3']=="5"){
													//echo "Own Savings,Pension Amount";
													echo "Own Savings";
												}
											?>
											</td>
											<td id="td3" style="text-align:center"><?php echo $row['Q3']; ?></td>
										</tr>
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "What is Customer's Category or nature?"; ?></td>
											<td>
											<?php 
												
												if($row['Q4']=="2"){
													echo "Force";
												}elseif($row['Q4']=="3"){
													echo "Police";
												}elseif($row['Q4']=="4"){
													echo "Lawyer";
												}elseif($row['Q4']=="5"){
													echo "Politician";
												}elseif($row['Q4']=="6"){
													echo "UnEmployed";
												}elseif($row['Q4']=="7"){
													echo "HouseWife";
												}elseif($row['Q4']=="8"){
													echo "Contractor";
												}elseif($row['Q4']=="9"){
													echo "Business Man";	
												}elseif($row['Q4']=="10"){
													echo "Brick field Owner";
												}elseif($row['Q4']=="11"){
													echo "Farmer";
												}elseif($row['Q4']=="12"){
													echo "Job Holder";
												}elseif($row['Q4']=="13"){
													echo "Agri-Farm";
												}elseif($row['Q4']=="14"){
													echo "Co-operative Society";
												}elseif($row['Q4']=="15"){
													echo "Driver";	
												}elseif($row['Q4']=="16"){
													echo "Teacher";	
												}elseif($row['Q4']=="1"){
													echo "Others";
												}
												
											?>
											</td>
											<td id="td4" style="text-align:center">
											<?php 
												if($row['Q4']== 2){
													echo "2";
												}elseif($row['Q4'] ==3){
													echo "2";
												}elseif($row['Q4'] ==4){
													echo "2";
												}elseif($row['Q4'] ==5){
													echo "2";
												}elseif($row['Q4'] ==6){
													echo "2";
												}elseif($row['Q4'] ==7){
													echo "2";
												}elseif($row['Q4'] ==8){
													echo "3";
												}elseif($row['Q4'] ==9){
													echo "3";
												}elseif($row['Q4'] ==10){
													echo "4";
												}elseif($row['Q4'] ==11){
													echo "5";
												}elseif($row['Q4'] ==12){
													echo "5";
												}elseif($row['Q4'] ==13){
													echo "5";
												}elseif($row['Q4'] ==14){
													echo "5";
												}elseif($row['Q4'] ==15){
													echo "5";												
												}elseif($row['Q4'] ==16){
													echo "5";
												}elseif($row['Q4'] ==1){
													echo "1";
												}
											?>
											</td>
										</tr>
										
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Monthly Income of customer"; ?></td>
											<td>
											<?php 
												echo $row['Q5'];
											?>
											</td>
											<td id="td5" style="text-align:center">
											<?php 
												if($row['Q5']== 0){
													echo "0";
												}elseif($row['Q5'] < 5000){
													echo "1";
												}elseif($row['Q5'] <=10000 ){
													echo "2";
												}elseif($row['Q5'] <= 20000){
													echo "3";
												}elseif($row['Q5'] <= 50000){
													echo "4";
												}elseif($row['Q5'] > 50000){
													echo "5";
												}
											?>
											</td>
										</tr>
										
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Does customer have family income? if yes, Then how much?"; ?></td>
											<td>
											<?php 
												echo $row['Q6'];
											?>
											</td>
											<td id="td6" style="text-align:center">
											<?php 
												if($row['Q6'] < 5000){
													echo "0";
												}elseif($row['Q6'] <=10000 ){
													echo "1";
												}elseif($row['Q6'] <= 15000){
													echo "2";
												}elseif($row['Q6'] <= 20000){
													echo "3";
												}elseif($row['Q6'] <= 25000){
													echo "4";
												}elseif($row['Q6'] >= 25000){
													echo "5";
												}
											?>
											</td>
										</tr>
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Customer expected monthly average extra income from tractor?. If, he or she purchase tractor."; ?></td>
											<td>
											<?php 
												echo $row['Q7'];
											?>
											</td>
											<td id="td7" style="text-align:center">
												<?php 
												if($row['Q7'] < 10000){
													echo "1";
												}elseif($row['Q7'] <=20000 ){
													echo "2";
												}elseif($row['Q7'] <= 33000){
													echo "3";
												}elseif($row['Q7'] <= 50000){
													echo "4";
												}elseif($row['Q7'] >= 50000){
													echo "5";
												}
											?>
											</td>
										</tr>
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Does Customer have any loan? If Yes, Monthly EMI?"; ?></td>
											<td>
											<?php 
												echo $row['Q8'];
											?>
											</td>
											<td id="td8" style="text-align:center">
												<?php 
												if($row['Q8'] >= 50000){
													echo "1";
												}elseif($row['Q8'] < 50000 && $row['Q8'] > 40000  ){
													echo "2";
												}elseif($row['Q8'] < 40000 && $row['Q8'] > 10000){
													echo "3";
												}elseif($row['Q8'] < 10000){
													echo "4";
												}elseif($row['Q8'] = 0){
													echo "5";
												}
											?>
											</td>
										</tr>
										
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Customer's Current asset value(Cash or Bank or Equivalent)?"; ?></td>
											<td>
											<?php 												
												echo $row['Q9'];
											?>
											</td>
											<td id="td9" style="text-align:center">
											<?php 
												if($row['Q9'] <= 10000){
													echo "0";
												}elseif($row['Q9'] >= 10001 && $row['Q9'] <= 50000){
													echo "1";
												}elseif($row['Q9'] >= 50001 && $row['Q9'] <= 100000){
													echo "2";
												}elseif($row['Q9'] >= 100001 && $row['Q9'] <= 200000){
													echo "3";
												}elseif($row['Q9'] >= 200001 && $row['Q9'] <= 500000){
													echo "4";
												}elseif($row['Q9'] > 500000){
													echo "5";
												}
												
											
											?>
											</td>
										</tr>
										
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Customer's fixed asset values approximately?"; ?></td>
											<td>
											<?php 
												if($row['Q10'] =="0"){
													echo "0 to 500000";
												}elseif($row['Q10']=="1"){
													echo " 500001 to 1000000";
												}elseif($row['Q10']=="2"){
													echo "1000001 to 1500000";
												}elseif($row['Q10']=="3"){
													echo "1500001 to 2000000";
												}elseif($row['Q10']=="4"){
													echo "2000001to 2500000";
												}elseif($row['Q10']=="5"){
													echo "Over 25,00,000";
												}
												
											?>
											</td>
											<td id="td10" style="text-align:center"><?php echo $row['Q10']; ?></td>
										</tr>
										<!--<tr>
											<td><?php //echo $x++; ?></td>
											<td><?php //echo "Customer's age?"; ?></td>
											<td>
											<?php 
												/*if($row['Q11'] =="1"){
													echo "Below 18";
												}elseif($row['Q11']=="2"){
													echo "Above 60";
												}elseif($row['Q11']=="3"){
													echo "Between 45-60";
												}elseif($row['Q11']=="4"){
													echo "Between 19 to 30";
												}elseif($row['Q11']=="5"){
													echo "Between 30 to 45";
												}*/
												//echo $row['Q11'];
											?>
											</td>
											<td id="td11" style="text-align:center">
											<?php 
												/*if($row['Q11'] < 18){
													echo "1";
												}elseif($row['Q11'] > 60){
													echo "2";
												}elseif($row['Q11'] >=45 && $row['Q11'] <= 60 ){
													echo "3";
												}elseif($row['Q11'] >=18 && $row['Q11'] <= 30 ){
													echo "4";
												}elseif($row['Q11'] >=31 && $row['Q11'] <= 44 ){
													echo "5";
												}*/
												//echo $row['Q11']; 
											?>
											</td>
										</tr>-->
										<!--<tr>
											<td><?php //echo $x++; ?></td>
											<td><?php //echo "What is customer social position or status?"; ?></td>
											<td>
											<?php 
												/*if($row['Q12'] =="1"){
													echo "Notorious";
												}elseif($row['Q12']=="2"){
													echo "Disreputable";
												}elseif($row['Q12']=="3"){
													echo "Have reasonable Reputation";
												}elseif($row['Q12']=="4"){
													echo "Have Reputation ";
												}elseif($row['Q12']=="5"){
													echo "Very Respectable";
												}*/
											?>
											</td>
											<td id="td12" style="text-align:center"><?php //echo $row['Q12']; ?></td>
										</tr>-->
										<!--<tr>
											<td><?php //echo $x++; ?></td>
											<td><?php //echo "What purpose tractor will be used?"; ?></td>
											<td>
											<?php 
												/*if($row['Q13'] =="2"){
													echo "Others";
												}elseif($row['Q13']=="3"){
													echo "Cultivation";
												}elseif($row['Q13']=="4"){
													echo "Carrying";
												}elseif($row['Q13']=="5"){
													echo "Both";
												}*/
											?>
											</td>
											<td id="td13" style="text-align:center"><?php //echo $row['Q13']; ?></td>
										</tr>-->
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Does Customer use Tractor Previously?"; ?></td>
											<td>
											<?php 
												if($row['Q14'] =="2"){
													echo "NO";
												}elseif($row['Q14']=="5"){
													echo "Yes"."->".$row['Q14brand'].",".$row['Q14CCode'].",".$row['Q14OD'].",".$row['Q14TO'];
												}
											?>
											</td>
											<td id="td14" style="text-align:center"><?php echo $row['Q14']; ?></td>
										</tr>
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Customer's re-payment source will be in non cultivation season:"; ?></td>
											<td>
											<?php 
												if($row['Q15'] =="2"){
													echo "Borrowing";
												}elseif($row['Q15']=="3"){
													echo "Selling Corp";
												}elseif($row['Q15']=="4"){
													echo "Business source";
												}elseif($row['Q15']=="5"){
													echo "Form Saving";
												}
											?>
											</td>
											<td id="td15" style="text-align:center"><?php echo $row['Q15']; ?></td>
										</tr>
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Any relation with political figures? If yes? "; ?></td>
											<td>
											<?php 
												if($row['Q16'] =="2"){
													echo "National, District, Thana Level";
												}elseif($row['Q16']=="3"){
													echo "Union Level";
												}elseif($row['Q16']=="4"){
													echo "Village Level";
												}elseif($row['Q16']=="5"){
													echo "NO";
												}
											?>
											</td>
											<td id="td16" style="text-align:center"><?php echo $row['Q16']; ?></td>
										</tr>
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "By whom tractor will driven or maintenance?"; ?></td>
											<td>
											<?php 
												if($row['Q17'] =="0"){
													echo "None";
												}elseif($row['Q17']=="2"){
													echo "New Driver";
												}elseif($row['Q17']=="3"){
													echo "Experience Driver";
												}elseif($row['Q17']=="4"){
													echo "Any one Families as a Driver";
												}elseif($row['Q17']=="5"){
													echo "Self  as a Driver ";
												}
											?>
											</td>
											<td id="td17" style="text-align:center"><?php echo $row['Q17']; ?></td>
										</tr>
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "How many topics or word customer understand from the list? <br> 
													A. Hire purchase agreement &nbsp;
													B. EMI &nbsp;
													C. warranty policy &nbsp;
													D. sales agreement &nbsp;
													E. Gift &nbsp;
													"; ?>
											</td>
											<td>
											<?php 
												if($row['Q18'] =="0"){
													echo "0";
												}elseif($row['Q18']=="1"){
													echo "1";
												}elseif($row['Q18']=="2"){
													echo "2";
												}elseif($row['Q18']=="3"){
													echo "3";
												}elseif($row['Q18']=="4"){
													echo "4";
												}elseif($row['Q18']=="5"){
													echo "ALL";
												}
											?>
											</td>
											<td id="td18" style="text-align:center"><?php echo $row['Q18']; ?></td>
										</tr>
										
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "Please Mention two close relatives Name, Address, Contact number, <br> who can provide information about customer."; ?></td>
											<td>
											<?php 
												echo $row['Q19'];
											?>
											</td>
											<td id="td19" style="text-align:center">
											<?php 
												error_reporting(0);
												$items = explode("~", $row['Q19']);
												$item1 = $items[0];
												$item2 = $items[1];												
												
												if($item2 === ''){
													$item2val =0;
												}else{
													$item2val =2.5;
												}
												
												$item1val = 2.5;
												
												
												$itemres = ((float)$item1val + (float)$item2val);
												echo $itemres;
												
											?>
											</td>
										</tr>
										<tr>
											<td><?php echo $x++; ?></td>
											<td><?php echo "ARO'S Grading After observing customer details"; ?></td>
											<td><?php echo $row['Q20']; ?></td>
											<td id="td20" style="text-align:center"><?php echo $row['Q20']; ?></td>
										</tr>
										<tr>											
											<td colspan="4"><?php echo "Comments"; ?>:&nbsp; &nbsp;<?php echo $row['AroComments']; ?></td>
										</tr>
									</table>
									<br>
									<table border="2" style="width: 95%">
										<tr><td>Total Assessment Marks:</td>											
											<td><input type="hidden" name="totalresult" id="ttmarks" class="form-control" readonly /></td>
											
											<td id="finalresult" style="text-align:center; background-color:#4AB747">&nbsp;&nbsp;&nbsp; 
											
											&nbsp;&nbsp;&nbsp;</td>
										</tr>
										
									</table>
									<br>
									<div id="verifiedres" style="display: none;">
										<?php 
											echo "Verified By:<br>";
											echo $_SESSION['Notes']; 											
										?>
										<input type="hidden" name="WhoVerify" value="<?php echo $_SESSION['Notes']; ?>" class="form-control" />
									</div>
									<script>
										function vResultdata() {											
											var vRes = document.getElementById("verifiedres").innerHTML;
											document.getElementById("verifyedid").innerHTML = vRes;
											//alert(vRes);
										}
									</script>
									<table border="2" style="width: 95%">
										<tr>
											<td colspan="2"><input type="text" name="arocomments"  value="<?php echo $row['AroComments']; ?>" required placeholder="ARO Comments" class="form-control" />	</td>											
										</tr>
										<tr>
											<td><input type="text" name="VerifierComments"  required placeholder="Comments" class="form-control" />	</td>
											<td id="verifyedid">
												<button onclick="vResultdata()">Verify Now!</button>													
											</td>
											
										</tr>										
									</table>
									<br>
									<table border="2" style="width: 95%">
										<tr>
											<td>Credit Team:					
											</td>											
											<td>Business Team:
											</td>
											<td width=30%>DED:
											</td>
										</tr>										
									</table>
									<br><br><br>
									
									</div>								
								</div>
								<script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.debug.js"></script>
								<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
								<script> <!--Content render for pdf file -->
								$(document).ready(function() {
									var doc = new jsPDF();
									$('#cmd').click(function () {
										doc.fromHTML($('#export-pdf').html(), 15, 15, {
											'width': 270,
										}, function () {
											doc.save('assessment.pdf')
										});
									});
								});
								</script>

								
								<div id="editor"></div>
								<button id="cmd">Export PDF</button>
							
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<input type="submit" />
											<!--<button type="submit" class="btn green">Submit</button>-->
											<!--<button type="button" class="btn default">Cancel</button> -->
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
		 2017 © ACI Ltd.<a href="#" title="ACI Motors" target="_blank">By MIS</a>
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
<!-- PDF -->


<script>
	//var td1val = parseInt(document.getElementById("td1").innerHTML);
	//var td2val = parseInt(document.getElementById("td2").innerHTML);
	var td3val = parseInt(document.getElementById("td3").innerHTML);
	var td4val = parseInt(document.getElementById("td4").innerHTML);
	var td5val = parseInt(document.getElementById("td5").innerHTML);
	var td6val = parseInt(document.getElementById("td6").innerHTML);
	var td7val = parseInt(document.getElementById("td7").innerHTML);
	var td8val = parseInt(document.getElementById("td8").innerHTML);
	var td9val = parseInt(document.getElementById("td9").innerHTML);
	var td10val = parseInt(document.getElementById("td10").innerHTML);	
	//var td11val = parseInt(document.getElementById("td11").innerHTML);
	//var td12val = parseInt(document.getElementById("td12").innerHTML);
	//var td13val = parseInt(document.getElementById("td13").innerHTML);
	var td14val = parseInt(document.getElementById("td14").innerHTML);
	var td15val = parseInt(document.getElementById("td15").innerHTML);
	var td16val = parseInt(document.getElementById("td16").innerHTML);
	var td17val = parseInt(document.getElementById("td17").innerHTML);
	var td18val = parseInt(document.getElementById("td18").innerHTML);
	var td19val = parseFloat(document.getElementById("td19").innerHTML);
	var td20val = parseInt(document.getElementById("td20").innerHTML);
	
	//var result = (td1val + td2val + td3val + td4val + td5val + td6val + td7val + td8val + td9val + td10val + td11val + td12val + td13val + td14val + td15val + td16val + td17val + td18val + td19val + td20val );
	var result = (td3val + td4val + td5val + td6val + td7val + td8val + td9val + td10val + td14val + td15val + td16val + td17val + td18val + td19val + td20val );
	document.getElementById("finalresult").innerHTML = result;
	document.getElementById("ttmarks").value = result;
	
	
</script>

<script>
/*
document.getElementById("frmverifyresult").onsubmit = function() {   
	this.disabled = true;
	return true; // prevent form from actually posting (only for demo purposes)
}
*/
jQuery('input[type="submit"]').click(function() {
    this.disabled = true;
};
</script>

<script>
jQuery(document).ready(function() {   
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