<?php
	require_once "connect.php";
	require_once "../lib/php_excel/class-excel-xml.inc.php";
	//require_once("data.php");

	$data = array("fcounty"  => "a.county_id", "fconstituency" => "a.constituency_id",
	              "facttype" => "a.activity_type_id", "factname" => "r.activity_id");
	$list = FALSE;
	foreach ($data as $i => $e) {
		if (isset($_GET[$i]) && !empty($_GET[$i])) {
			$i = $_GET[$i];
			$list .= " AND $e='$i'";
		}
	}

	$txt    = "SELECT year,region,proj_name,author,status,sc_domain FROM projects";
	$sql    = mysql_query($txt);
	echo mysql_error();
	$arr    = array();
	$ar_gen = array();
	$count  = 1;
	$xls    = new Excel_XML;
	$xls->column_titles(array("Year", "Region", "Project Name", "Author",
		 "Science Domain"
	));
	while ($r = mysql_fetch_array($sql)) {
		extract($r);
		$xls->addRow(
			array($year,$region,$proj_name,$author,$status,$sc_domain
			));
	}
	$xls->generateXML("download - ".date('Y-m-d H.i.s'));