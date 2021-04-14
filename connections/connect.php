<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
/************* connection to the database ***************/

	$con = mysql_connect("localhost", "afgreen", "@Rmg2017");
	mysql_select_db("publication_db", $con);

?>
