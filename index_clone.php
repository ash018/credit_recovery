<?php 
	include("auth.php"); //include auth.php file on all secure pages 
	include("db.php");	

	$yesterday = date('Y-m-d',strtotime("-1 days"));
	$onemonth = date('Y-m-d',strtotime("-31 days")); 
	$threemonth = date('Y-m-d',strtotime("-90 days"));  
	$today = date("Y-m-d");
	
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
	
	if(!empty($_POST['TerritoryName'])){		
		$TerritoryName = $_POST['TerritoryName'];
	}else{
		$TerritoryName = "%";
	}
	
	if(!empty($_POST['areaname'])){		
		$areaname = $_POST['areaname'];
	}else{
		$areaname = "%";
	}	
	/*if(!empty($_POST['regionname'])){		
		$regionname = $_POST['regionname'];
	}else{
		$regionname = "%";
	}	
	if(!empty($_POST['PartName'])){		
		$PartName = $_POST['PartName'];
	}else{
		$PartName = "%";
	}*/
		
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
			title: 'Territory',
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
			$query = "Exec ups_tty_daily_projection_vs_collection '$TerritoryName'";	
			$result = odbc_exec($connection,$query);		
			$x = 1;	
			while($row=odbc_fetch_array($result)) {
				$count++;
				$string .= " { y: ".$row['pAmt'].", label: '".$row['PartName']."'}, ";
				
			}
		
			$string1 = ''; 
			$result1 = odbc_exec($connection,$query);
			while($row1=odbc_fetch_array($result1)) {
				$count++;
				$string1 .= " { y: ".$row1['cAmt'].", label: '".$row1['PartName']."'}, ";
				
			}
		
		?>
		data: [{
			type: "column",
			legendText: "pAmt",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "cAmt",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string1,0,-2); ?>
			]
		}]
			
	});
	chart.render();
	//monthly projection vs collection start 
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
			title: 'Territory',
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
			$query = "Exec ups_tty_monthly_projection_vs_collection '$SDate', '$EDate', '$TerritoryName'";	
			$result = odbc_exec($connection,$query);	
			$x = 1;	
			while($row=odbc_fetch_array($result)) {
				$count++;
				$string .= " { y: ".$row['pAmt'].", label: '".$row['TerritoryName']."'}, ";
				
			}
		
			$string1 = ''; 
			$result1 = odbc_exec($connection,$query);
			while($row1=odbc_fetch_array($result1)) {
				$count++;
				$string1 .= " { y: ".$row1['cAmt'].", label: '".$row1['TerritoryName']."'}, ";
				
			}
		
		?>
		data: [{
			type: "column",
			legendText: "pAmt",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "cAmt",
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
			title: 'Territory',
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
			$query = "SELECT Territory, SUM(CMOD)/1000000 AS OD, SUM(LMOD)/1000000 AS LMOD, SUM(SPLYOD)/1000000 AS SPLYOD
						FROM overdueinformation
						WHERE Territory LIKE '$TerritoryName'
						GROUP BY Territory";	
			$result = odbc_exec($connection,$query);
			$x = 1;	
			while($row=odbc_fetch_array($result)) {
				$count++;
				$string .= " { y: ".$row['LMOD'].", label: '".$row['Territory']."'}, ";
				
			}
			$string1 = ''; 
			$result1 = odbc_exec($connection,$query);
			while($row1=odbc_fetch_array($result1)) {
				$count++;
				$string1 .= " { y: ".$row1['SPLYOD'].", label: '".$row1['Territory']."'}, ";
				
			}
			
			$string2 = ''; 
			$result2 = odbc_exec($connection,$query);
			while($row2=odbc_fetch_array($result2)) {
				$count++;
				$string2 .= " { y: ".$row2['OD'].", label: '".$row2['Territory']."'}, ";
				
			}
			
		
		?>
		data: [{
			type: "column",
			legendText: "LMOD",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "SPLYOD",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string1,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "OD",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string2,0,-2); ?>
			]
		}
		
		]
			
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
			title: 'Territory',
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
			$query = "SELECT Territory , SUM(CMOD)/COUNT(CMNoInstOD) AS tCMOD,SUM(CMNoInstOD) AS tCMNoInstOD
						FROM overduedetail
						WHERE (InstSize<>0 AND CMOD<>0) AND Territory LIKE '$TerritoryName'
						GROUP BY Territory
						";	
			$result = odbc_exec($connection,$query);	
			$x = 1;	
			while($row=odbc_fetch_array($result)) {
				$count++;
				$string .= " { y: ".$row['tCMOD'].", label: '".$row['Territory']."'}, ";
				
			}
		
			
		
		?>
		data: [{
			type: "column",
			legendText: "tCMOD",
			showInLegend: true, 
			indexLabelPlacement: "outside",
			click: onClick,
			dataPoints: [
				<?php echo substr($string,0,-2); ?>
			]
		},
		{
			type: "column",
			legendText: "tCMOD",
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
		alert("ACI MIS");
		//alert( e.dataPoint.label);
		//window.open("loadDistributorList.php?Region="+e.dataPoint.label, "", "width=600,height=400");
	}
		
		
}

</script>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif] -->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif] -->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>ACI Motors | Dashboard</title>
	<meta http-equiv="refresh" content="60; url=index.php" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
	<style>
		#circle_red {
			background: #f00;
			width: 100px;
			height: 100px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;
		}
		#circle_lgreen {
			background: #ceea66;
			width: 100px;
			height: 100px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;
		}
		#circle_dgreen {
			background: #6ab22d;
			width: 100px;
			height: 100px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;
		}
		#circle_yellow {
			background: yellow;
			width: 100px;
			height: 100px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;
		}
	</style>
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
				<div style="margin-top: 1px;">
					<div class="col-md-12" style="position: fixed; bottom: 0; z-index:999999; padding: 10px; background: black; color: white;"><b>
						<marquee>Today's Collection:&nbsp;<?php
							$mq_query = "SELECT territoryname,SUM(actualpaidamount) AS collectionamount FROM creditrecovery GROUP BY territoryname";
							$mq_result = odbc_exec($connection,$mq_query);							
							while($mq_row=odbc_fetch_array($mq_result)) {
								echo $mq_row['territoryname']."-".floor($mq_row['collectionamount']).";";								
							}
						?>
						</marquee></b>
					</div>
				</div><br>
			<form action="index_clone.php" method="post">
				
				<div class="col-md-12" style="margin-top: -2px;">	
					<div class="col-md-1"><b>Part</b></div>
					<div class="col-md-2">
						<select class="form-control" name="PartName" id="PartName" required>																								
							<option value="">Select</option>												
							<option value="%">ALL</option>
							<?php
								//include("dbsqlserver.php");	
								$query = "SELECT DISTINCT PartName FROM partinformation";										
								$result = odbc_exec($connection,$query);
								while($row=odbc_fetch_array($result)) {
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
						<select class="form-control" name="TerritoryName" id="TerritoryName" required>																								
												
						</select>
					</div>
				</div>
				
				<div class="col-md-12" style="margin-top: 10px; margin-bottom: 5px;">
					<div class="col-md-1" style="width: 100px;"><b>Date From</b></div>
					<div class="col-md-2">
						<input type="text" value='<?php print $Date1; ?>' class="form-control" name="startdate" id="startdate">
					</div>
					<div class="col-md-1"><b>Date To</b></div>
					<div class="col-md-2">
						<input type="text" value='<?php print $Date2; ?>'  class="form-control" name="enddate" id="enddate">
					</div>
					<div class="col-md-2">
						<input type="submit" value="Go" name="Submit" class="btn blue">
					</div>
				</div>
			</form>
			
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="chartContainerDaily" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="chartContainer" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="chartcontainerODComparison" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>				
			</div>
			<!-- END first part -->
			<div class="clearfix">
			</div>
			
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="perfileod" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="piechart1" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="piechart2" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
			
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="piechart3" style="height: 250px; width: 100%">
							
						</div>
					</div>
				</div>
				<!-- all direction 6th march 2016  -->
				<?php
					$query_1 = "SELECT COUNT(CMNoInstOD) AS T1 FROM overduedetail
											where Territory='$TerritoryName' AND (CMNoInstOD>0.0 AND CMNoInstOD<=2)";
					$result_1 = odbc_exec($connection,$query_1);
					$row_1= odbc_fetch_array($result_1);
					
					$query_2 = "SELECT COUNT(CMNoInstOD) AS T2 FROM overduedetail
								where Territory='$TerritoryName' AND (CMNoInstOD>=2 AND CMNoInstOD<=4)";
					$result_2 = odbc_exec($connection,$query_2);
					$row_2= odbc_fetch_array($result_2);
					
					$query_3 = "SELECT COUNT(CMNoInstOD) AS T3 FROM overduedetail
								where Territory='$TerritoryName' AND (CMNoInstOD>=4 AND CMNoInstOD<=5)";
					$result_3 = odbc_exec($connection,$query_3);
					$row_3= odbc_fetch_array($result_3);
					
					$query_4 = "SELECT COUNT(CMNoInstOD) AS T4 FROM overduedetail
							where Territory='$TerritoryName' AND (CMNoInstOD>5)";
					$result_4 = odbc_exec($connection,$query_4);
					$row_4= odbc_fetch_array($result_4);
					
					
				?>
				<div class="col-md-4 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="mapindicator" style="height: 250px; width: 100%">							
							<a href="tsegmentdetail.php">
							<table style="width:100%; height: 100%; text-align: center">
								<tr>
									<td bgcolor="#76A52E"> <?php echo substr((($row_1['T1']/2488)*100),0,5); ?></td> 
									<td bgcolor="#9ACD4C"> <?php echo substr((($row_2['T2']/2488)*100),0,5); ?></td>
								</tr>
								<tr>
									<td bgcolor="#FFFF00"> <?php echo substr((($row_3['T3']/2488)*100),0,5); ?></td> <!--Red-->
									<td bgcolor="#FF0000"> <?php echo substr((($row_4['T4']/2488)*100),0,5); ?></td> <!--Red-->
								</tr>
							</table></a>							
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 col-sm-6">
					<div class="portlet light ">						
						<div class="portlet-body" id="mapinfo" style="height: 250px; width: 100%">
							
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
				jQuery("#TerritoryName").html(html);
			}
		});
	});

});
</script>
<?php
	$query_chart0_green = "SELECT COUNT(CMNoInstOD) AS T1 FROM overduedetail
							where Territory='$TerritoryName' AND (CMNoInstOD>=0 AND CMNoInstOD<=2)";
	$result_chart0_green = odbc_exec($connection,$query_chart0_green);
	$row_chart0_green = odbc_fetch_array($result_chart0_green);
	
	$query_chart0_red = "SELECT COUNT(CMNoInstOD) AS T2 FROM overduedetail
							where Territory='$TerritoryName' AND (CMNoInstOD>=2 AND CMNoInstOD<=4)";
	$result_chart0_red = odbc_exec($connection,$query_chart0_red);
	$row_chart0_red = odbc_fetch_array($result_chart0_red);
	
	$query_chart0_yellow = "SELECT COUNT(CMNoInstOD) AS T3 FROM overduedetail
						where Territory='$TerritoryName' AND (CMNoInstOD>=4 AND CMNoInstOD<=5)";
	$result_chart0_yellow = odbc_exec($connection,$query_chart0_yellow);
	$row_chart0_yellow = odbc_fetch_array($result_chart0_yellow);
	
?>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {		
        var data = google.visualization.arrayToDataTable([
          ['Amount', 'Collection'],
          ['Green', <?php echo $row_chart0_green['T1']; ?>],
          ['Red', <?php echo $row_chart0_red['T2']; ?>],		 
          ['Yellow', <?php echo $row_chart0_yellow['T3']; ?>]         
        ]);

        var options = {
          title: 'Collection',
		  colors: ['#29ad2d', '#f7190a', '#f5ce07']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }

</script>
 <?php
	$query_chart_green = "SELECT COUNT(customerBehavior) as green FROM projection 
					WHERE (customerBehavior<>'' AND ServiceSatisfaction<>'') AND
					customerBehavior = 'Green' AND TerritoryCode = '$TerritoryName'";
	$result_chart_green = odbc_exec($connection,$query_chart_green);
	$row_chart_green = odbc_fetch_array($result_chart_green);
	
	$query_chart_red = "SELECT COUNT(customerBehavior) as red FROM projection 
					WHERE (customerBehavior<>'' AND ServiceSatisfaction<>'') AND
					customerBehavior = 'Red' AND TerritoryCode = '$TerritoryName'";
	$result_chart_red = odbc_exec($connection,$query_chart_red);
	$row_chart_red = odbc_fetch_array($result_chart_red);
	
	$query_chart_yellow = "SELECT COUNT(customerBehavior) as yellow FROM projection 
					WHERE (customerBehavior<>'' AND ServiceSatisfaction<>'') AND
					customerBehavior = 'Yellow' AND TerritoryCode = '$TerritoryName'";
	$result_chart_yellow = odbc_exec($connection,$query_chart_yellow);
	$row_chart_yellow = odbc_fetch_array($result_chart_yellow);

?>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {		 
        var data = google.visualization.arrayToDataTable([
          ['Amount', 'Behaviour'],
           ['Green',     <?php echo $row_chart_green['green']; ?> ],
          ['Red',      <?php echo $row_chart_red['red']; ?>],		 
          ['Yellow',      <?php echo $row_chart_yellow['yellow']; ?>]             
        ]);

        var options = {
          title: 'Behaviour',
		  colors: ['#29ad2d', '#f7190a', '#f5ce07']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }

</script>

<?php
	$query_chart1_green = "SELECT COUNT(ServiceSatisfaction) as green FROM projection 
							WHERE (customerBehavior<>'' AND ServiceSatisfaction<>'') AND
							ServiceSatisfaction = 'Green' AND TerritoryCode = '$TerritoryName'";
	$result_chart1_green = odbc_exec($connection,$query_chart1_green);
	$row_chart1_green = odbc_fetch_array($result_chart1_green);
	
	$query_chart1_red = "SELECT COUNT(ServiceSatisfaction) as red FROM projection 
							WHERE (customerBehavior<>'' AND ServiceSatisfaction<>'') AND
							ServiceSatisfaction = 'Red' AND TerritoryCode = '$TerritoryName'";
	$result_chart1_red = odbc_exec($connection,$query_chart1_red);
	$row_chart1_red = odbc_fetch_array($result_chart1_red);
	
	$query_chart1_yellow = "SELECT COUNT(ServiceSatisfaction) as yellow FROM projection 
							WHERE (customerBehavior<>'' AND ServiceSatisfaction<>'') AND
							ServiceSatisfaction = 'Yellow' AND TerritoryCode = '$TerritoryName'";
	$result_chart1_yellow = odbc_exec($connection,$query_chart1_yellow);
	$row_chart1_yellow = odbc_fetch_array($result_chart1_yellow);

?>

<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Amount', 'Service'],
           ['Green',     <?php echo $row_chart1_green['green']; ?>],
          ['Red',      <?php echo $row_chart1_red['red']; ?>],		 
          ['Yellow',      <?php echo $row_chart1_yellow['yellow']; ?>]             
        ]);

        var options = {
          title: 'Service',
		  colors: ['#29ad2d', '#f7190a', '#f5ce07']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }

</script>


<script>

var map, infowindow;
var location_data;
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
        zoom: 6,
        center: new google.maps.LatLng(23.76364,90.4137),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    infowindow = new google.maps.InfoWindow;

    var marker, i;

    for (i = 0; i < location_data.length; i++){          
		placeMarker(location_data[i], i+1);        
    }
  
    
    function placeMarker(loc, num){
        var latLng = new google.maps.LatLng( parseFloat(loc.Latitude), parseFloat(loc.Longitude));
		
		var myCity = new google.maps.Circle({
			center: latLng,
			radius: 9500,//Math.sqrt(citymap[city].population) * 100,
			strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35			
		  });
		  myCity.setMap(map);
		  
        var marker = new google.maps.Marker({
            position : latLng,
            map      : map,
            //label: num.toString()
			label: loc.TerrityName
        });
        google.maps.event.addListener(marker, 'click', function()
        {
            var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h6 id="firstHeading" class="firstHeading">'+loc.TerrityName+'</h6>'+
            '<div id="bodyContent">'+            
			'<div>'+            
            '</div>'+
            '</div>'+
            '</div>';
            infowindow.close(); // Close previously opened infowindow
            infowindow.setContent(contentString);
            infowindow.open(map, marker);
        });
    }   
  
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>