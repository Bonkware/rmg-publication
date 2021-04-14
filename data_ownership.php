<?php
include "connections/connect.php";
$query = mysql_query("select pub_year as year, 
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='YES' AND  (data_owner='ICRAF' OR data_owner='ICRAF and partner')) as icraf,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='YES' AND data_owner!='ICRAF' AND data_owner!='ICRAF and Partner') as other_institutions
				from publication as t group by pub_year;");

$category = array();
$category['name'] = 'Year';

$series1 = array();
$series1['name'] = 'ICRAF';

$series2 = array();
$series2['name'] = 'Other Institutions';


while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['year'];
    $series1['data'][] = $r['icraf'];
    $series2['data'][] = $r['other_institutions'];
}

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
