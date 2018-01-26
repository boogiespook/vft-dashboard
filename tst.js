Highcharts.chart('status-container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'By Status'
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
        data: [{[
{ name: 'In Progress ',
 y: 2 },

{ name: 'Completed',
 y: 3 },

{ name: 'Pre-Sales',
 y: 4 },

{ name: 'Closed Booked - Resource Req.',
 y: 2 },
]]
    }]
});