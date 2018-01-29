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
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="overpass.css"/>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


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
			<li><a href="index.php" accesskey="1" title="">Home</a></li>
			<li class="current_page_item"><a href="rti.php" accesskey="1" title="">RTI</a></li>
			<li><a href="status.php" accesskey="2" title="">Status</a></li>
			<li><a href="navigate.php" accesskey="3" title="">Navigate</a></li>
			<li><a href="businessStrategy.php" accesskey="4" title="">Business Strategy</a></li>
			<li><a href="openOrganisation.php" accesskey="5" title="">Open Organisation</a></li>
						<li><a href="allocations.php" accesskey="4" title="">Allocations</a></li>
		</ul>
	</div>
	<div id="one-column">
		<span class="icon icon-cogs"></span>
			<div class="title">
				<h2>Ready To Innovate</h2>
			</div>
<p>
<h3>General Statistics</h3>

 			<div id="rti-container" style="min-width: 800px; height: 800px; max-width: 800px; margin: 0 auto"></div>
</p>
</p>

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
        text: 'Results By Country'
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
        data: <?php include 'getLiveRTI.php'; getLiveRTI('country'); ?>
    }]
});
</script>
</body>
</html>
