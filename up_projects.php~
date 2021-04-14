<?php 
if(isset($_POST["Import"]))
{
    //First we need to make a connection with the database
    $host='localhost'; // Host Name.
    $db_user= 'root'; //User Name
    $db_password= 'mysql';
    $db= 'publication_db'; // Database Name.
    $conn=mysql_connect($host,$db_user,$db_password) or die (mysql_error());
    mysql_select_db($db) or die (mysql_error());
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
	$file = fopen($filename, "r");

	$count = 0;                                         // add this line
	while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	{
    	//print_r($emapData);
    	//exit();
    	$count++;                                      // add this line

    	if($count>1){                                  // add this line
      	//$sql = "INSERT into projects(p_bench,p_name,p_price,p_reason) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')";
       $sql = "INSERT into projects(year,region,proj_name,author,status,sc_domain) values ('$emapData[0]','$emapData[1]','$emapData[2]',
'$emapData[3]','$emapData[4]','$emapData[6]')";
     	 mysql_query($sql);
   	 }                                              // add this line
	}
        fclose($file);
        echo 'CSV File has been successfully Imported';
        header('Location: index.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}
?>
