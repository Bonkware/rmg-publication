<?php include "header.php"; ?>
<script type="text/javascript">
    function SelectRedirect(){
        switch(document.getElementById('project').value)
        {
            case "publications":
                window.location="index.php";
                break;

            case "projects":
                window.location="project_chart.php";
                break;

        }
    }
</script>
<div id="body-width">
    <div>
        <div style="height:auto;">
            <form name="browser_sort" id="sel-box">
                <table name="browser" border="0" cellspacing="1">
                    <tr style="background-color: #7C3886;"><td style="color: ghostwhite;">SELECT:</td>
                        <td>
                            <SELECT id="project" NAME="section" onChange="SelectRedirect();">
                                <Option value="">Select Chart</option>
                                <Option value="publications">Publications Chart</option>
                                <Option value="projects">Projects Chart</option>
                            </SELECT>
                        </td>
                    </tr>
                </table>
            </form>
            <script type="text/javascript">
                Highcharts.setOptions({
                    colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263','#6AF9C4']
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
                        series: []
                    }

                    $.getJSON("project_data.php", function(json) {
                        options.xAxis.categories = json[0]['data'];
                        options.series[0] = json[1];
                        chart = new Highcharts.Chart(options);
                    });
                });
            </script>
            <div id="container" style="height: 550px; margin: 0 auto"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<hr size="5" color="#7c3886">
<?php include "footer.php"; ?>
