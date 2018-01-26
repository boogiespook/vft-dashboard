<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Justifiable 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130801

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VFT Dashboard</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="overpass.css"/>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<?php
include 'googleClient.php';
include 'getVftOverview.php';
include 'getBusinessStrategy.php';
include 'getOpenOrg.php';
include 'getNavigate.php';
include 'getProjectStatus.php';
#include '/vendor/autoload.php';	


?>

</head>
<body>
<div id="logo" class="container">
<div id="shadowman">
	<img src="images/red_hat_logo_small.png">
</div>
	<h1><a href="#">VfT<span>&nbsp Dashboard</span></a></h1>

</div>
<div id="wrapper" class="container">
	<div id="menu" class="container">
		<ul>
			<li class="current_page_item"><a href="index.php" accesskey="1" title="">Home</a></li>
			<li><a href="rti.php" accesskey="1" title="">RTI</a></li>
			<li><a href="status.php" accesskey="2" title="">Status</a></li>
			<li><a href="navigate.php" accesskey="3" title="">Navigate</a></li>
			<li><a href="businessStrategy.php" accesskey="4" title="">Business Strategy</a></li>
			<li><a href="openOrganisation.php" accesskey="5" title="">Open Organisation</a></li>
		</ul>
	</div>
	<div id="three-column" class="container">

		<div id="tbox1"> <span class="icon icon-cogs"></span>
			<div class="title">
				<h2>Ready To Innovate</h2>
			</div>
 			<div id="rti-container" style="min-width: 210px; height: 200px; max-width: 300px; margin: 0 auto"></div>

			<a href="rti.php" class="button">More Info</a> </div>
		<div id="tbox2"> <span class="icon icon-search"></span>
			<div class="title">
				<h2>Project Status</h2>
			</div>
               <div id="status-container" style="min-width: 210px; height: 200px; max-width: 300px; margin: 0 auto"></div>
				<p>Total Revenue: <b><?php getTotalRevenue(); ?> </b></p>	
			<a href="status.php" class="button">More Info</a> </div>
		<div id="tbox3"> <span class="icon icon-map-marker"></span>
			<div class="title">
				<h2>Navigate</h2>
			</div>
			<p><?php getNavigate(); ?></p>
						<a href="navigate.php" class="button">More Info</a> </div>
</div>						
	<div id="three-column" class="container">						
						
		<div id="tbox1"> <span class="icon icon-legal"></span>
			<div class="title">
				<h2>Business Strategy</h2><br>
			</div>
			<p><?php getBusinessStrategy(); ?></p>
			<a href="businessStrategy.php" class="button">More Info</a> 
			</div>
		<div id="tbox2"> <span class="icon icon-globe"></span>
			<div class="title">
				<h2>Open Organisation</h2>
			</div>
			<p><?php getOpenOrg(); ?></p>
			<a href="openOrganisation.php" class="button">More Info</a> 
			</div>
		<div id="tbox3"> <span class="icon icon-building"></span>
			<div class="title">
				<h2>Allocations (In Progress)</h2><br>
			</div>
			<p><?php getVftAllocations(); ?></p>
<!-- 			<a href="https://docs.google.com/spreadsheets/d/1UUmhWQVOjy3lpWlOgTBfdShnA1TgQWarQWOoYW1I0yk/edit#gid=0" class="button">More Info</a> </div> -->
			<a href="allocations.php" class="button">More Info</a> 
			</div>
	</div>



<script type="text/javascript" >
Highcharts.chart('rti-container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'By Line of Business'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'LoB',
        colorByPoint: true,
        data: [{
            name: 'Finance',
            y: 45
        }, {
            name: 'IT',
            y: 26,
        }, {
            name: 'Government',
            y: 10.38
        }, {
            name: 'Telco',
            y: 4.77
        }, {
            name: 'Retail',
            y: 0.91
        }, {
            name: 'Manufacturing',
            y: 0.2
        }]
    }]
});
</script>

<script type="text/javascript" >
Highcharts.chart('status-container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Status'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Status',
        colorByPoint: true,
        data: <?php getProjectStatusOverview(); ?>
    }]
});
</script>

</body>
</html>
