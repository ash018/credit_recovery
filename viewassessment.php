<?php 
	include("auth.php"); //include auth.php file on all secure pages
	include('dbsqlserver.php');
?>
<?php
///Function name: calculate total score

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
	<title>DMS | Dashboard</title>
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
	
	<!-- Date picker fix  -->
	<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
	<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>	
	<!-- End date picker issue  -->
	
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="shortcut icon" href="favicon.ico"/>
	<style>
		td{
			
			vertical-align:middle;
		}
	</style>
	
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
			Assessment Report
			</h3>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<a href="datewise.php"><i class="fa fa-gift"></i>Assessment</a>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" id="click4show"><!--expand-->
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
							<form id="excel" action="itemexcel.php" method="post" onsubmit='$("#datatodisplay").val( $("<div>").append( $("#exportexceldiv").eq(0).clone()).html() )'>
								<input type="hidden" id="datatodisplay" name="datatodisplay"/>
								<input class="bg" type="submit" value="Export To Excel"/>
							</form>
							<!-- BEGIN FORM-->
							<form action="#" id="form_sample_3" method="post" class="form-horizontal" accept-charset="utf-8">							
								<div class="form-body" id="productdetail">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div id="showdiv">
										<div class="form-group">
											<label class="control-label col-md-3">Start Date</label>
											<div class="col-md-4">
												<div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
													<input type="text" class="form-control" readonly name="startdate" id="startdate" >
													<span class="input-group-btn">
													<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
												</div>											
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">End Date</label>
											<div class="col-md-4">
												<div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
													<input type="text" class="form-control" readonly name="enddate" id="enddate" >
													<span class="input-group-btn">
													<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
												</div>											
											</div>
										</div>
										
										<hr>
										<div class="form-group">
											<label class="control-label col-md-3">Search</label>
											<div class="col-md-4">											
												<span class="input-group-btn">
												<button class="btn blue" type="button" id="btnproduct">Go!</button>
												</span>	
											</div>
										</div>
										<div id="exportexceldiv">
											<div id="productdetail1" style="height: auto;">
											
											</div>
											<div id="currdiv">
												<?php
													$sdate = date('Y-m-01');
													$edate = date('Y-m-d');
													$query = "Select T1.*, T2.* From AssessCustomer T1
																Inner Join TmpAssessmentAnswer T2 ON T1.AssessmentCode = T2.AssessmentCode
																Where AssessmentDate Between '$sdate' AND '$edate'
																Order By T2.AssessmentAnswerID ASC";
													$result = odbc_exec($connection,$query);												
													$x=1;
													$totalres = 0;
												?>
												<table class="table table-responsive table-border" border="1">
													<tr>
														<th style="text-align: center">Sl</th>
														<th style="text-align: center">Code</th>
														<th style="text-align: center">CustomerName</th> 
														<th style="text-align: center">Territory Name</th>
														<th style="text-align: center">Score</th>
													</tr>
												<?php
													$sumres = 0;
													while($row = odbc_fetch_array($result)) {
												?>
													<tr>
														<td style="text-align: center"><?php echo $x++; ?></td>		
														<td style="text-align: center"><a href="verifyassessment.php?AssessmentCode=<?php echo $row['AssessmentCode'];  ?>"><?php echo $row['AssessmentCode']; ?></a></td>
														<td style="text-align: center"><?php echo $row['CustomerName']; ?></td>
														<td style="text-align: center"><?php echo $row['AROCode']; ?></td>
														<td style="text-align: center">														
														<?php //echo $totalScore; 
															$q3 = $row['Q3'];
															if($row['Q4']== 2){
																$q4 =  "2";
															}elseif($row['Q4'] ==3){
																$q4 =  "2";
															}elseif($row['Q4'] ==4){
																$q4 =  "2";
															}elseif($row['Q4'] ==5){
																$q4 = "2";
															}elseif($row['Q4'] ==6){
																$q4 = "2";
															}elseif($row['Q4'] ==7){
																$q4 = "2";
															}elseif($row['Q4'] ==8){
																$q4 = "3";
															}elseif($row['Q4'] ==9){
																$q4 = "3";
															}elseif($row['Q4'] ==10){
																$q4 = "4";
															}elseif($row['Q4'] ==11){
																$q4 = "5";
															}elseif($row['Q4'] ==12){
																$q4 = "5";
															}elseif($row['Q4'] ==13){
																$q4 = "5";
															}elseif($row['Q4'] ==14){
																$q4 = "5";
															}elseif($row['Q4'] ==15){
																$q4 = "5";												
															}elseif($row['Q4'] ==16){
																$q4 = "5";
															}elseif($row['Q4'] ==1){
																$q4 = "1";
															}
															
															if($row['Q5']== 0){
																$q5 =  "0";
															}elseif($row['Q5'] < 5000){
																$q5 =  "1";
															}elseif($row['Q5'] <=10000 ){
																$q5 =  "2";
															}elseif($row['Q5'] <= 20000){
																$q5 =  "3";
															}elseif($row['Q5'] <= 50000){
																$q5 =  "4";
															}elseif($row['Q5'] > 50000){
																$q5 =  "5";
															}
															if($row['Q6'] < 5000){
																$q6 = "0";
															}elseif($row['Q6'] <=10000 ){
																$q6 = "1";
															}elseif($row['Q6'] <= 15000){
																$q6 = "2";
															}elseif($row['Q6'] <= 20000){
																$q6 = "3";
															}elseif($row['Q6'] <= 25000){
																$q6 = "4";
															}elseif($row['Q6'] >= 25000){
																$q6 = "5";
															}
															if($row['Q7'] < 10000){
																$q7 = "1";
															}elseif($row['Q7'] <=20000 ){
																$q7 = "2";
															}elseif($row['Q7'] <= 33000){
																$q7 = "3";
															}elseif($row['Q7'] <= 50000){
																$q7 = "4";
															}elseif($row['Q7'] >= 50000){
																$q7 = "5";
															}
															if($row['Q8'] >= 50000){
																$q8 = "1";
															}elseif($row['Q8'] < 50000 && $row['Q8'] > 40000  ){
																$q8 = "2";
															}elseif($row['Q8'] < 40000 && $row['Q8'] > 10000){
																$q8 = "3";
															}elseif($row['Q8'] < 10000){
																$q8 = "4";
															}elseif($row['Q8'] = 0){
																$q8 = "5";
															}
															if($row['Q9'] <= 10000){
																$q9 = "0";
															}elseif($row['Q9'] >= 10001 && $row['Q9'] <= 50000){
																$q9 = "1";
															}elseif($row['Q9'] >= 50001 && $row['Q9'] <= 100000){
																$q9 = "2";
															}elseif($row['Q9'] >= 100001 && $row['Q9'] <= 200000){
																$q9 = "3";
															}elseif($row['Q9'] >= 200001 && $row['Q9'] <= 500000){
																$q9 = "4";
															}elseif($row['Q9'] > 500000){
																$q9 = "5";
															}
															$q10 = $row['Q10'];
															$q14 = $row['Q14'];
															$q15 = $row['Q15'];
															$q16 = $row['Q16'];
															$q17 = $row['Q17'];
															$q18 = $row['Q18'];
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
															$q19 = $itemres;
													
															$q20 = $row['Q20'];
															$totalres  = ($q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q14 + $q15 + $q16 + $q17 + $q18 + $q19 + $q20);
															echo $totalres;
														?>														
														</td>
													</tr>
													
												<?php } ?>
													
												</table>
											</div>
											
										</div>
									</div>
									
									
								</div>
								<div class="form-actions">
									<!--<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div> -->
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
		 2018 © ACI Ltd.<a href="#" title="ACI Motors" target="_blank">By MIS</a>
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
	jQuery("#btnproduct").on('click', function () {
		btnproduct = jQuery(this).val();
		startdate = jQuery('#startdate').val();
		enddate = jQuery('#enddate').val();		
		jQuery.ajax
		({
			type: "POST",
			url: "getassessmenthistory.php",
			data: {startdate: startdate, enddate:enddate},
			cache: false,
			
			success: function (html)
			{			
				jQuery("#currdiv").hide();
				jQuery("#productdetail1").html(html);
			}
		});
	});
	
//jQuery( "#startdate" ).datepicker({ dateFormat: 'dd/mm/yy' });
//$( "#enddate" ).datepicker({ dateFormat: 'dd/mm/yy' });
$('#startdate').datepicker({dateFormat: 'yy-mm-dd'});
$('#enddate').datepicker({dateFormat: 'yy-mm-dd'});
});
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
<script>
	var td1val = parseInt(document.getElementById("qtyid").innerHTML);
	var td2val = parseInt(document.getElementById("tprice").innerHTML);
	var totalprice = td1val + td2val
	document.getElementById("totalprice").innerHTML = totalprice;

</script>
<script>
	/*
	$('#showdiv').hide();
	jQuery("#click4show").on('click', function () {
		$('#showdiv').show();
		$('#defaultdata').hide();
		
	});
	*/
</script>
<script type="text/javascript">
    document.getElementById("areawisesuccess").onclick = function () {
        location.href = "getareawisesuccess.php";
    };
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>