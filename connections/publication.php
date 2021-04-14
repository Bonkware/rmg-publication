<?php
{
	include("connect.php");
}
$pub_year=$_POST["pub_year"];
$publication=$_POST["publication"];
$person=$_POST["person"];
$region=$_POST["region"];
$sc_domain=$_POST["sc_domain"];
$prim_data=$_POST["prim_data"];
$data_owner=$_POST["data_owner"];
$data_verse=$_POST["data_verse"];
$DOI=$_POST["DOI"];
$comments=$_POST["comments"];

if($_FILES['file']){
    $file_name =$_FILES['file']['name'];
}

mysql_query("INSERT INTO publication (pub_year,publication,person,file_name,region,sc_domain,prim_data,data_owner,data_verse,DOI,comments) 
VALUES ('$pub_year','$publication','$person','$file_name','$region','$sc_domain','$prim_data','$data_owner','$data_verse','$DOI','$comments')") or 	die(mysql_error());
{
    move_uploaded_file($_FILES['file']['tmp_name'],"../uploads/$file_name");
       echo "Stored in: " . "../uploads/" . $_FILES["file"]["name"];
}
?>
<script type="text/javascript">
    window.location = "../add_publication.php?submit=yes"; </script><?php
?>
