<?php
include "connections/connect.php";
$query = mysql_query("select pub_year as year, 
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='yes') as p_data_y, 
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='no') as p_data_n, 
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data!='yes' AND prim_data!='no') as p_data_ne
				from publication as t group by pub_year;");

$category = array();
$category['name'] = 'Year';

$series1 = array();
$series1['name'] = 'Primary Data Yes';

$series2 = array();
$series2['name'] = 'Primary Data No';

$series3 = array();
$series3['name'] = 'Not Indicated';


while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['year'];
    $series1['data'][] = $r['p_data_y'];
    $series2['data'][] = $r['p_data_n'];
    $series3['data'][] = $r['p_data_ne'];   
}

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
