<?php
	require_once "connect.php";
	require_once "../lib/php_excel/class-excel-xml.inc.php";
	//require_once("data.php");

	$data = array(""  => "", "" => "",
	              "" => "", "" => "");
	$list = FALSE;
	foreach ($data as $i => $e) {
		if (isset($_GET[$i]) && !empty($_GET[$i])) {
			$i = $_GET[$i];
			$list .= " AND $e='$i'";
		}
	}

	$txt    = "SELECT * FROM publication";
	$sql    = mysql_query($txt);
	echo mysql_error();
	$arr    = array();
	$ar_gen = array();
	$count  = 1;
	$xls    = new Excel_XML;
	$xls->column_titles(array("Publication year", "Publication", "Author", "Submission Form",
		"Region", "Science Domain", "Primary Data", "Data owner",
		"Dataverse", "DOI", "Comments"
	));
	while ($r = mysql_fetch_array($sql)) {
		extract($r);
		$xls->addRow(
			array($pub_year,$publication,$person,$region,$sc_domain,$prim_data,$data_owner,$data_verse,$DOI,$comments
			));
	}
	$xls->generateXML("download - ".date('Y-m-d H.i.s'));