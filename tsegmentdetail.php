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
								<a href="datewise.php"><i class="fa fa-gift"></i>Color Report</a>
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
							<form id="excel" action="itemexcel.php" method="post" onsubmit='$("#datatodisplay").val( $("<div>").append( $("#productdetail").eq(0).clone()).html() )'>
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
									<div style="height: auto;">
										<p>
											T1- Customer
										</p>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>SL</th>
													<th>Part</th>
													<th>Total-OD</th>
													<th>Total-No.Inst.OD</th>
													<th>View</th>	
												</tr>
											</thead>
											<tbody>
												<?php
													include("db.php");
													$query = "SELECT Part, SUM(CMOD) AS tCMOD , COUNT(CMNoInstOD) AS tCMNoInstOD
															FROM overduedetail
															WHERE CMNoInstOD <> 0 AND CMNoInstOD <= 2 AND InstSize <> 0
															GROUP BY Part
															UNION 
															SELECT 'National' AS Part, SUM(CMOD) AS tCMOD , COUNT(CMNoInstOD) AS tCMNoInstOD
															FROM overduedetail
															WHERE CMNoInstOD <> 0 AND CMNoInstOD <= 2 AND InstSize <> 0";
													$result = odbc_exec($connection,$query);
													$x = 1;	
													while($row= odbc_fetch_array($result)) {
												?>
												<tr>
													<td><?php echo $x++; ?></td>
													<td><?php echo $row['Part']; ?></td>
													<td><?php echo $row['tCMOD']; ?></td>
													<td><?php echo $row['tCMNoInstOD']; ?></td>	
													<td>
														<a href="t1-customerlist.php?code=<?php echo $row['Part']; ?>">&nbsp;&nbsp;<img src="images/edit.gif" /></a>												
													</td>													
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									
									<div style="height: auto;">
										<p>
											T2- Customer
										</p>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>SL</th>
													<th>Part</th>
													<th>Total-OD</th>
													<th>Total-No.Inst.OD</th>
													<th>View</th>	
												</tr>
											</thead>
											<tbody>
												<?php													
													$query1 = "SELECT Part, SUM(CMOD) AS tCMOD , COUNT(CMNoInstOD) AS tCMNoInstOD
																FROM overduedetail
																WHERE CMNoInstOD <> 0 AND CMNoInstOD > 2 AND CMNoInstOD<= 4  AND InstSize <> 0
																GROUP BY Part
																	UNION
																SELECT 'National' AS Part, SUM(CMOD) AS tCMOD , COUNT(CMNoInstOD) AS tCMNoInstOD
																FROM overduedetail
																WHERE CMNoInstOD <> 0 AND CMNoInstOD > 2  AND CMNoInstOD<= 4 AND InstSize <> 0";
													$result1 = odbc_exec($connection,$query1);
													$x = 1;	
													while($row1= odbc_fetch_array($result1)) {
												?>
												<tr>
													<td><?php echo $x++; ?></td>
													<td><?php echo $row1['Part']; ?></td>
													<td><?php echo $row1['tCMOD']; ?></td>
													<td><?php echo $row1['tCMNoInstOD']; ?></td>
													<td>
														<a href="t2-customerlist.php?code=<?php echo $row1['Part']; ?>">&nbsp;&nbsp;<img src="images/edit.gif" /></a>												
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									
									<div style="height: auto;">
										<p>
											T3- Customer
										</p>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>SL</th>
													<th>Part</th>
													<th>Total-OD</th>
													<th>Total-No.Inst.OD</th>
													<th>View</th>	
												</tr>
											</thead>
											<tbody>
												<?php													
													$query2 = "SELECT Part, SUM(CMOD) AS tCMOD , COUNT(CMNoInstOD) AS tCMNoInstOD
														FROM overduedetail
														WHERE CMNoInstOD <> 0 AND CMNoInstOD >= 4 AND CMNoInstOD<= 5  AND InstSize <> 0
														GROUP BY Part
															UNION
														SELECT 'National' AS Part, SUM(CMOD) AS tCMOD , COUNT(CMNoInstOD) AS tCMNoInstOD
														FROM overduedetail
														WHERE CMNoInstOD <> 0 AND CMNoInstOD >= 4  AND CMNoInstOD<= 5 AND InstSize <> 0";
													$result2 = odbc_exec($connection,$query2);
													$x = 1;	
													while($row2= odbc_fetch_array($result2)) {
												?>
												<tr>
													<td><?php echo $x++; ?></td>
													<td><?php echo $row2['Part']; ?></td>
													<td><?php echo $row2['tCMOD']; ?></td>
													<td><?php echo $row2['tCMNoInstOD']; ?></td>	
													<td>
														<a href="t3-customerlist.php?code=<?php echo $row2['Part']; ?>">&nbsp;&nbsp;<img src="images/edit.gif" /></a>												
													</td>												
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									
										<div style="height: auto;">
										<p>
											T4- Customer
										</p>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>SL</th>
													<th>Part</th>
													<th>Total-OD</th>
													<th>Total-No.Inst.OD</th>	
													<th>View</th>	
												</tr>
											</thead>
											<tbody>
												<?php													
													$query3 = "SELECT Part, SUM(CMOD) AS tCMOD , COUNT(CMNoInstOD) AS tCMNoInstOD
															FROM overduedetail
															WHERE CMNoInstOD <> 0 AND CMNoInstOD >= 5 AND InstSize <> 0
															GROUP BY Part
																UNION
															SELECT 'National' AS Part, SUM(CMOD) AS tCMOD , COUNT(CMNoInstOD) AS tCMNoInstOD
															FROM overduedetail
															WHERE CMNoInstOD <> 0 AND CMNoInstOD >= 5 AND InstSize <> 0";
													$result3 = odbc_exec($connection,$query3);
													$x = 1;	
													while($row3= odbc_fetch_array($result3)) {
												?>
												<tr>
													<td><?php echo $x++; ?></td>
													<td><?php echo $row3['Part']; ?></td>
													<td><?php echo $row3['tCMOD']; ?></td>
													<td><?php echo $row3['tCMNoInstOD']; ?></td>	
													<td>
														<a href="t4-customerlist.php?code=<?php echo $row3['Part']; ?>">&nbsp;&nbsp;<img src="images/edit.gif" /></a>												
													</td>												
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									
									
								</div>
								<div class="form-actions">
									
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