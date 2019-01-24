<?php 
	include("auth.php"); //include auth.php file on all secure pages 
	include("db.php");	

	$yesterday = date('Y-m-d',strtotime("-1 days"));
	$onemonth = date('Y-m-d',strtotime("-31 days")); 
	$threemonth = date('Y-m-d',strtotime("-90 days"));  
	$today = date('Y-m-d');
	
	$SDate = date('Y-m-d',strtotime("-30 days"));
	$EDate = date("Y-m-d");
	
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
		var chart = new CanvasJS.Chart("chartContainerDaily", {
			title:{
			text: "Daily Projection VS Collection",
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
			title: 'Part',
			labelAngle: 0,
			labelFontSize: 12,
			titleFontSize: 14
		  },
		  axisY:{
			includeZero: false,
			title: 'Amount(TK)',
			labelFontSize: 12,
			labelMaxWidth: 120,
			titleFontSize: 14,
			minimum: 0
		  },
		<?php
			$count = 0;
			$string = ''; 
			//New column graph for displaying projection vs collection
			$threedays = date('Y-m-d',strtotime("-4 days"));
			$query = "SELECT T1.PartName, SUM(T2.actualpaidamount) AS CollectionAmt, SUM(T3.ProjectionAmount) AS ProjectionAmt FROM partinformation T1
				INNER JOIN creditrecovery T2 ON T1.CustomerCode = T2.customercode
				INNER JOIN projection T3 ON T2.CustomerCode = T3.CustomerCode
				WHERE T2.visitdate = '2017-02-14'
				GROUP BY T1.PartName";	
			$result = mysqli_query($link, $query);
			//$result = odbc_exec($connection,$query);	
			$x = 1;	
			while($row=mysqli_fetch_array($result)) {
				$count++;
				$string .= " { y: ".$row['ProjectionAmt'].", label: '".$row['PartName']."'}, ";
				
			}
		
			$string1 = ''; 
			$result1 = mysqli_query($link, $query);
			while($row1=mysqli_fetch_array($result1)) {
				$count++;
				$string1 .= " { y: ".$row1['CollectionAmt'].", label: '".$row1['PartName']."'}, ";
				
			}
		
		?>
		data: [{
			type: "column",
			legendText: "ProjectionAmt",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "CollectionAmt",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string1,0,-2); ?>
			]
		}]
			
	});
	chart.render();

	var chart = new CanvasJS.Chart("chartContainer", {
			title:{
			text: "Monthly Projection VS Collection",
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
			title: 'Part',
			labelAngle: 0,
			labelFontSize: 12,
			titleFontSize: 14
		  },
		  axisY:{
			includeZero: false,
			title: 'Amount(TK)',
			labelFontSize: 12,
			labelMaxWidth: 120,
			titleFontSize: 14,
			minimum: 0
		  },
		<?php
			$count = 0;
			$string = ''; 
			$threemonth = date('Y-m-d',strtotime("-90 days"));  //New column graph for displaying projection vs collection
			if(!empty($Date1) && !empty($Date2)){
				//$query = "EXEC sp_RegionWiseOrder_vs_Sales '$Date1', '$Date2'";	
				$query = "SELECT T1.PartName, SUM(T2.actualpaidamount) AS CollectionAmt, SUM(T3.ProjectionAmount) AS ProjectionAmt FROM partinformation T1
							INNER JOIN creditrecovery T2 ON T1.CustomerCode = T2.customercode
							INNER JOIN projection T3 ON T2.CustomerCode = T3.CustomerCode
							WHERE T2.visitdate BETWEEN '$SDate' AND '$EDate'
							GROUP BY T1.PartName";	
			}else{
				//$query = "EXEC sp_RegionWiseOrder_vs_Sales '$threemonth','$yesterday'";
				$query = "SELECT T1.PartName, SUM(T2.actualpaidamount) AS CollectionAmt, SUM(T3.ProjectionAmount) AS ProjectionAmt FROM partinformation T1
							INNER JOIN creditrecovery T2 ON T1.CustomerCode = T2.customercode
							INNER JOIN projection T3 ON T2.CustomerCode = T3.CustomerCode
							WHERE T2.visitdate BETWEEN '$SDate' AND '$EDate'
							GROUP BY T1.PartName";		
			}		
			$result = mysqli_query($link, $query);
			//$result = odbc_exec($connection,$query);				
		
		
			$x = 1;	
			while($row=mysqli_fetch_array($result)) {
				$count++;
				$string .= " { y: ".$row['ProjectionAmt'].", label: '".$row['PartName']."'}, ";
				
			}
		
			$string1 = ''; 
			$result1 = mysqli_query($link, $query);
			while($row1=mysqli_fetch_array($result1)) {
				$count++;
				$string1 .= " { y: ".$row1['CollectionAmt'].", label: '".$row1['PartName']."'}, ";
				
			}
		
		?>
		data: [{
			type: "column",
			legendText: "ProjectionAmt",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "CollectionAmt",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string1,0,-2); ?>
			]
		}]
			
	});
	chart.render();
	//OD comparison
	
	var chart = new CanvasJS.Chart("chartcontainerODComparison", {
			title:{
			text: "OD Comparison",
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
			title: 'Part',
			labelAngle: 0,
			labelFontSize: 12,
			titleFontSize: 14
		  },
		  axisY:{
			includeZero: false,
			title: 'Amount(TK)',
			labelFontSize: 12,
			labelMaxWidth: 120,
			titleFontSize: 14,
			minimum: 0
		  },
		<?php
			$count = 0;
			$string = ''; 
			$threemonth = date('Y-m-d',strtotime("-90 days"));  //New column graph for displaying projection vs collection
			$query = "SELECT SUM(T1.overdueamount) AS OverDue, T2.PartName AS Part 
						FROM creditrecovery T1
						INNER JOIN partinformation T2 ON T1.customercode = T2.CustomerCode
						WHERE T1.visitdate < '$today' AND T1.overdueamount <> '.00'
						GROUP BY T2.PartName";	
			$result = mysqli_query($link, $query);		
			$x = 1;	
			while($row=mysqli_fetch_array($result)) {
				$count++;
				$string .= " { y: ".$row['OverDue'].", label: '".$row['Part']."'}, ";
				
			}
			$string1 = ''; 
			$result1 = mysqli_query($link, $query);
			while($row1=mysqli_fetch_array($result1)) {
				$count++;
				$string1 .= " { y: ".$row1['OverDue'].", label: '".$row1['Part']."'}, ";
				
			}
			
		
		?>
		data: [{
			type: "column",
			legendText: "OverDue",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "OverDue",
			showInLegend: false, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string1,0,-2); ?>
			]
		}]
			
	});
	chart.render();
	
	
	
	
	//Per file OD
	var chart = new CanvasJS.Chart("perfileod", {
			title:{
			text: "Per File OD",
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
			title: 'Part',
			labelAngle: 0,
			labelFontSize: 12,
			titleFontSize: 14
		  },
		  axisY:{
			includeZero: false,
			title: 'Amount(TK)',
			labelFontSize: 12,
			labelMaxWidth: 120,
			titleFontSize: 14,
			minimum: 0
		  },
		<?php
			$count = 0;
			$string = ''; 
			$threemonth = date('Y-m-d',strtotime("-90 days"));  //New column graph for displaying projection vs collection
			$query = "SELECT SUM(T1.overdueamount) AS OverDue, T2.PartName AS Part 
						FROM creditrecovery T1
						INNER JOIN partinformation T2 ON T1.customercode = T2.CustomerCode
						WHERE T1.visitdate < '$today' AND T1.overdueamount <> '.00'
						GROUP BY T2.PartName";	
			$result = mysqli_query($link, $query);		
			$x = 1;	
			while($row=mysqli_fetch_array($result)) {
				$count++;
				$string .= " { y: ".$row['OverDue'].", label: '".$row['Part']."'}, ";
				
			}
		
			
		
		?>
		data: [{
			type: "column",
			legendText: "OverDue",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "OverDue",
			showInLegend: false, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php //echo substr($string1,0,-2); ?>
			]
		}]
			
	});
	chart.render();
	
	
	function onClick(e) {
		//alert( e.dataPoint.label);
		window.open("loadDistributorList.php?Region="+e.dataPoint.label, "", "width=600,height=400");
	}
		
		
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
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
			<!-- BEGIN DASHBOARD GRAPH -->			
			<form action="index.php" method="post">
				<div class="col-md-12">
					<div class="col-md-1"><b>Part</b></div>
					<div class="col-md-2">
						<select class="form-control" name="PartName" id="PartName" required>																								
							<option value="">Select</option>												
							<option value="%">ALL</option>
							<?php
								//include("dbsqlserver.php");	
								$query = "SELECT DISTINCT PartName FROM partinformation";										
								$result = mysqli_query($link, $query);	
								while($row=mysqli_fetch_array($result)) {
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
				
				<div class="col-md-12" style="margin-top: 10px; margin-bottom: 5px;">
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
						<div class="portlet-body" id="chartContainerDaily" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="chartContainer" style="height: 250px; width: 100%">
							
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
						<div class="portlet-body" id="chartcontainerODComparison" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="perfileod" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="piechart1" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="piechart2" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light ">						
						<div class="portlet-body" id="mapinfo" style="height: 500px; width: 100%">
							
						</div>
					</div>
				</div>
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

<script type="text/javascript" src="canvasjs.min.js"></script>

<!-- New js for pie chart  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- End all external js file, upto 21-06-2016 -->
<!-- latitude and longitude  -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHnLHqhuV_Tpskg0TbktzU7wgnfe3-DII"></script>


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
   $('#startdate').datepicker({dateFormat: 'yy-mm-dd'});
   $('#enddate').datepicker({dateFormat: 'yy-mm-dd'});
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

<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Amount', 'Collection'],
          ['South Part',     58],
          ['Central Part',      42],
		  ['North Part',     58],
          ['East Part',      42]          
        ]);

        var options = {
          title: 'Collection'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }

</script>

<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Amount', 'Collection'],
          ['South Part', 58],
          ['Central Part', 34 ],
		  ['North Part', 78],
          ['East Part', 24]          
        ]);

        var options = {
          title: 'Collection'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }

</script>


<script>

var map, infowindow;
var location_data;
var dd1 = document.getElementById('startdate');
var dd2 = document.getElementById('enddate');
var mymarkers = [];
$(document).ready(function(){
    $.ajax({
        async: false,
        type: "POST",
        url: "getLocationdata.php",
        dataType:"json",
        cache: false,
        success: function(data)
        {
            location_data = data;
        }
    });    

    map = new google.maps.Map(document.getElementById('mapinfo'), 
    {
        zoom: 7,
        center: new google.maps.LatLng(23.76364,90.4137),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
		//var mapCanvas = document.getElementById("map");
		//var mapOptions = {center: new google.maps.LatLng(23.76364,90.4137), zoom: 8};
		//var map = new google.maps.Map(map,mapOptions);

    infowindow = new google.maps.InfoWindow;

    

    for (var i = 0; i < location_data.length; i++){          
		placeMarker(location_data[i], i+1);        
    }  
	
    function placeMarker(loc, num)
	{		
        var latLng = new google.maps.LatLng( parseFloat(loc.Latitude), parseFloat(loc.Longitude));	
  
		/*var myCity = new google.maps.Circle({
			center: latLng,
			radius: 9500,//Math.sqrt(citymap[city].population) * 100,
			strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35			
		  });
		  myCity.setMap(map);*/
		  
			var marker = new google.maps.Marker({
            position : latLng,
            map      : map,            
			label: loc.CustomerCode
        });	
		mymarkers.push(marker);
		//console.log(marker.label);
		
        google.maps.event.addListener(marker, 'click', function()
        {
			var myself = loc.CustomerCode;
			var nearest = find_closest_marker(marker);
            var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h6 id="firstHeading" class="firstHeading">'+loc.CustomerName+'('+loc.CustomerCode+')'+'</h6>'+
            '<div id="bodyContent">'+            
			'<div>'+     
				'<table border="1"><tr>'+				
				'<td>'+'Market Size:'+'</td>'+'<td>'+'108'+'</td></tr>'+
				'<tr><td>'+'Total Sale:'+'</td>'+'<td>'+loc.TotalSale+'</td></tr>'+
				'<tr><td>'+'Nearest Dealer:'+'</td>'+'<td>'+nearest+'</td></tr>'+				
				'<tr><td>'+'Distance:'+'</td>'+'<td>'+'<a href="calculate_distance.php?code='+loc.CustomerCode+','+nearest+'">'+'Click'+'</a>'+'</td></tr>'+				
				'<tr><td>'+'Total Mechanics:'+'</td>'+'<td>'+loc.Mechanics+'</td></tr>'+
				'</table>'
            '</div>'+
            
            
            '</div>'+
            '</div>';
						
            infowindow.close(); // Close previously opened infowindow
            infowindow.setContent(contentString);
            infowindow.open(map, marker);
        });
    }
	
	
		function rad(x) {return x*Math.PI/180;}
		function find_closest_marker(marker) 
		{
			var lat = marker.position.lat();
			var lng = marker.position.lng();
			console.log(lat + " , " + lng);
			console.log(mymarkers.length);
			var R = 6371; // radius of earth in km
			var distances = [];
			var closest = -1;
			for( i=0;i<mymarkers.length; i++ ) 
			{
				if(mymarkers[i].label == marker.label)
					continue;
				var mlat = mymarkers[i].position.lat();
				var mlng = mymarkers[i].position.lng();
				var dLat  = rad(mlat - lat);
				var dLong = rad(mlng - lng);
				var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
					Math.cos(rad(lat)) * Math.cos(rad(lat)) * Math.sin(dLong/2) * Math.sin(dLong/2);
				var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
				var d = R * c;
				distances[i] = d;
				if ( closest == -1 || d < distances[closest] ) {
					closest = i;
				}
			}
			console.log(mymarkers[closest].label);
			return mymarkers[closest].label;
		}
	
});
</script>


<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>