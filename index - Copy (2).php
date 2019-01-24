<?php 
	include("auth.php"); //include auth.php file on all secure pages 
	include("dbsqlserver.php");	

	$yesterday = date('Y-m-d',strtotime("-1 days"));
	$onemonth = date('Y-m-d',strtotime("-31 days")); 
	$threemonth = date('Y-m-d',strtotime("-90 days"));  
	
	if(!empty($_POST['startdate'])){
		$Date1 = $_POST['startdate'];
	}else{
		$Date1 = date('Y-m-d',strtotime("-30 days"));
	}
	if(!empty($_POST['enddate'])){
		$Date2 = $_POST['enddate'];
	}else{
		$Date2 = date("Y-m-d");
	}	 
		
	
?>
<script type="text/javascript">
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartcontainer-01",{
		title:{
			text: "Region Wise Order Vs Sales",
			fontSize: 16
		},
		
	  zoomEnabled:true,
	  
	  legend: {
		horizontalAlign: 'center',
		verticalAlign: 'bottom',
		fontSize: 12,
		fontFamily: 'tamoha',
		fontColor: 'Sienna',
		cursor:'pointer'
	  },
	  axisX:{
		title: 'Region',
		labelAngle: -60,
		labelFontSize: 12,
		titleFontSize: 14
	  },
	  axisY:{
		includeZero: false,
		title: 'Number',
		labelFontSize: 12,
		labelMaxWidth: 160,
		titleFontSize: 14,
		minimum: 0
	  },
	  
	  <?php
		$count = 0;
		$string = ''; 
		$threemonth = date('Y-m-d',strtotime("-90 days"));  
		if(!empty($Date1) && !empty($Date2)){
			$query = "EXEC sp_RegionWiseOrder_vs_Sales '$Date1', '$Date2'";	
		}else{
			$query = "EXEC sp_RegionWiseOrder_vs_Sales '$threemonth','$yesterday'";		
		}
		//echo $query; exit();
			
		$result = odbc_exec($connection,$query);				
		//$row = odbc_fetch_array($result);
		
		$x = 1;	
		while($row = odbc_fetch_array($result)) { 
			$count++;
			$string .= " { y: ".$row['OrderQty'].", label: '".$row['Base']."'}, ";
			
		}
		
		$string1 = ''; 
		$result1 = odbc_exec($connection,$query);
		while($row1 = odbc_fetch_array($result1)) { 
			$count++;
			$string1 .= " { y: ".$row1['SalesQty'].", label: '".$row1['Base']."'}, ";
			
		}
		
		?>
		
	  data: [
	  {
		type: "column",
		legendText: "Order",
		showInLegend: true, 
		indexLabelPlacement: "outside",
		click: onClick,
		dataPoints: [
			<?php echo substr($string,0,-2); ?>
		]
	  },
	  {
		type: "column",
		legendText: "Sales",
		showInLegend: true, 
		indexLabelPlacement: "outside",
		click: onClick,
		dataPoints: [
			<?php echo substr($string1,0,-2); ?>
		]
	  }
	  ]
	});

	chart.render();
	}
</script>

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
</head>
<!-- END HEAD -->
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
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
				
			</div>
			<h3 class="page-title">
			Executive <small>Summary</small>
			</h3>
			<!-- END PAGE HEADER-->
			
			<!-- BEGIN DASHBOARD GRAPH -->
			
			<form action="index.php" method="post">
				<div class="col-md-12" style="margin-top: 30px; margin-bottom: 30px;">
					<div class="col-md-1"><b>Part</b></div>
					<div class="col-md-2">
						<select class="form-control" name="PartName" id="PartName" required>																								
							<option value="">Select</option>												
							<option value="%">ALL</option>
							<?php
								$query = "SELECT DISTINCT PartName FROM tmpTestTable";										
								$result = odbc_exec($connection,$query);		
								while($row = odbc_fetch_array($result)) { 
									echo "<option value='".$row['PartName']."'>".$row['PartName']."</option>";									
								}
							?>								
						</select>
						
					</div>
					<div class="col-md-1"><b>Region</b></div>
					<div class="col-md-2">
						<select class="form-control" name="regionname" id="regionname" required>																								
													
						</select>
					</div>
					<div class="col-md-1"><b>Area</b></div>
					<div class="col-md-2">
						<select class="form-control" name="areaname" id="areaname" required>																								
													
						</select>
					</div>
					<div class="col-md-1"><b>Territory</b></div>
					<div class="col-md-2">
						<select class="form-control" name="territoryname" id="territoryname" required>																								
													
						</select>
					</div>
					
					
				</div>
				<div class="col-md-12" style="margin-top: 30px; margin-bottom: 30px;">
					<div class="col-md-1" style="width: 100px;"><b>Date From</b></div>
					<div class="col-md-2">
						<input type="text" value='<?php print $Date1; ?>' class="form-control" readonly="" name="startdate" id="startdate">
					</div>
					<div class="col-md-1"><b>Date To</b></div>
					<div class="col-md-2">
						<input type="text" value='<?php print $Date2; ?>'  class="form-control" readonly="" name="enddate" id="enddate">
					</div>
					<div class="col-md-2">
						<input type="submit" value="Go" name="Submit" class="btn blue">
					</div>
				</div>
			</form>
			
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-cursor font-purple-intense hide"></i>
								<span class="caption-subject font-purple-intense bold uppercase">Projection VS Collection(Daily)</span>
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload">
								<i class="fa fa-repeat"></i> Reload </a>
							</div>
						</div>
						<div class="portlet-body">
							chart
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-cursor font-purple-intense hide"></i>
								<span class="caption-subject font-purple-intense bold uppercase">Projection VS Collection(Monthly)</span>
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload">
								<i class="fa fa-repeat"></i> Reload </a>
							</div>
						</div>
						<div class="portlet-body">
							chart
						</div>
					</div>
				</div>
				
			</div>
			<!-- END first part -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-cursor font-purple-intense hide"></i>
								<span class="caption-subject font-purple-intense bold uppercase">OD Comparison</span>
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload">
								<i class="fa fa-repeat"></i> Reload </a>
							</div>
						</div>
						<div class="portlet-body">
							chart
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-cursor font-purple-intense hide"></i>
								<span class="caption-subject font-purple-intense bold uppercase">Per File OD</span>
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload">
								<i class="fa fa-repeat"></i> Reload </a>
							</div>
						</div>
						<div class="portlet-body">
							chart
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="clearfix">
			</div>
			
			
		</div>
	</div>
	<!-- END CONTENT -->
	
	
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2016 © ACI Ltd.<a href="#" title="ACI Ltd" target="_blank">Developed By kallul</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
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
<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
	Metronic.init(); // init metronic core componets
	Layout.init(); // init layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	Index.init();   
	Index.initDashboardDaterange();
	Index.initJQVMAP(); // init index page's custom scripts
	Index.initCalendar(); // init index page's custom scripts
	Index.initCharts(); // init index page's custom scripts
	Index.initChat();
	Index.initMiniCharts();
	Tasks.initDashboardWidget();
});
</script>

<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery("#PartName").on('change', function () {
		PartName = jQuery(this).val();
		//alert(PartName);
		jQuery.ajax
		({
			type: "POST",
			url: "getRegion.php",
			data: {PartName: PartName},
			cache: false,
			success: function (html)
			{
				jQuery("#regionname").html(html);
			}
		});
	});

});
</script>
<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery("#regionname").on('change', function () {
		regionname = jQuery(this).val();
		//alert(PartName);
		jQuery.ajax
		({
			type: "POST",
			url: "getArea.php",
			data: {regionname: regionname},
			cache: false,
			success: function (html)
			{
				jQuery("#areaname").html(html);
			}
		});
	});

});
</script>
<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery("#areaname").on('change', function () {
		areaname = jQuery(this).val();
		//alert(PartName);
		jQuery.ajax
		({
			type: "POST",
			url: "getTerritory.php",
			data: {areaname: areaname},
			cache: false,
			success: function (html)
			{
				jQuery("#territoryname").html(html);
			}
		});
	});

});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>