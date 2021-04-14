<?php
include "connections/connect.php";
/*publications*/
$query = mysql_query("select year as year,
				(SELECT count(*) from projects AS c WHERE c.year=t.year) as publication,
				((COUNT(*)/(SELECT COUNT(*) FROM projects))*100) as percent
				from projects as t group by year; ");

$category = array();
$category['name'] = 'Year';

$series1 = array();
$series1['name'] = 'Year ';


while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['year'];
    $series1['data'][] = $r['percent'];
}

$result = array();
array_push($result,$category);
array_push($result,$series1);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
