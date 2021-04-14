<?php
include "connections/connect.php";
$query = mysql_query("select pub_year as year,
						(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='yes') as p_data_y,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='no') as p_data_n,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='No Respons') as p_data_noresp,
				((COUNT(*)/(SELECT COUNT(*) FROM publication))*100) as percent
				from publication as t group by pub_year;");

$category = array();
$category['name'] = 'Year';

$series1 = array();
$series1['name'] = 'Compliance';

$series2 = array();
$series2['name'] = 'Non-Compliance';

while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['year'];
    $series1['data'][] = $r['p_data_y'];
    $series2['data'][] = $r['p_data_noresp'];
}

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
