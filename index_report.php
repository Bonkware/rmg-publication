<script type="text/javascript">
       $(document).ready(function() {
        var options = {
            chart: {
                renderTo: 'container',
                type: 'column',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Publications archived in ICRAF dataverse from 2009 in Year(s)',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: [],
                labels: {
                    style: {
                        fontSize:'15px',
                        fontWeight: 'bold',
                        color: '#000'
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'No. of publications(%)',
                    style: {
                        fontSize:'15px',
                        fontWeight: 'bold',
                        color: '#000'
                    }
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }],
                labels: {
                    style: {
                        fontSize:'12px',
                        fontWeight: 'bold',
                        color: '#000'
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +
                        this.x +': </b>'+ Highcharts.numberFormat(this.y, 1, '.') +' %';//round of figures
                }
            },
            /***set data labels display**/
           plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        formatter: function () {
                            return Highcharts.numberFormat(this.y,1)+' %';
                        }
                    },
                    enableMouseTracking: true,
                    colorByPoint: true
                }
            },
            colors: [
                '#50B432',
                '#ED561B',
                '#DDDF00',
                '#24CBE5',
                '#64E572',
            ],
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                type:'column',
                data:[]
            }]
        }

        $.getJSON("data_report.php", function(json) {
            options.xAxis.categories = json[0]['data'];
            options.series[0] = json[1];
            chart = new Highcharts.Chart(options);
        });
    });
</script>

		<div id="container" style="height: 550px; margin: 0 auto"></div>
