		
		<script type="text/javascript">
		Highcharts.setOptions({
     colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263',      '#6AF9C4']
    });
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'column',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Publication Based  on ownership',
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
	                    text: 'No. of publications',
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
	                        return '<b>'+ this.series.name +'</b><br/>'+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },
	            series: []
	        }
	        
	        $.getJSON("data_ownership.php", function(json) {
				options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
		        chart = new Highcharts.Chart(options);
	        });
	    });
		</script>
	</head>
	<body>
		<div id="container" style="min-width: auto; height: auto; margin: 0 auto"></div>
	</body>
</html>