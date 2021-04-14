<?php
{
	include("connect.php");
}
$year=$_POST["year"];
$region=$_POST["region"];
$proj_name=$_POST["proj_name"];
$author=$_POST["author"];
$status=$_POST["status"];
$sc_domain=$_POST["sc_domain"];

mysql_query("INSERT INTO projects (year,region,proj_name,author,status,sc_domain) 
VALUES ('$year','$region','$proj_name','$author','$status','$sc_domain')") or 	die(mysql_error());
?>
<script type="text/javascript">
    window.location = "../add_projects.php?submit=yes"; </script><?php
?>
