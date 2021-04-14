<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>World Agroforestry Centre | Research Methods Group</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/exporting.js"></script>
<script type="text/javascript" src="js/highcharts-3d.js"></script>
  <script src="js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link href="css/jquery.modal.css" rel="stylesheet" type="text/css" media="all"/>

<link href="css/default.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/excel_layout.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/top_menu.css" rel="stylesheet" type="text/css" media="all"/>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="js/DataTables/css/jquery.dataTables.css">
<!-- DataTables -->
<script type="text/javascript" src="js/DataTables/js/jquery.dataTables.js"></script>
<link type="text/css" rel="stylesheet" href="css/3d.css">
    <!-- display image on bar-->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="icon" type="image/gif" href="images/animated_favicon1.gif">
    <!-- end-->
   <!-- select year---->
    <script type="text/javascript">
        function SelectPublications(){
            switch(document.getElementById('publications').value)
            {
                /*** publications ***/
                case "publication2009":
                    window.location="publications2009.php";
                    break;
                case "publication2010":
                    window.location="publications2010.php";
                    break;
                case "publication2011":
                    window.location="publications2011.php";
                    break;
                case "publication2012":
                    window.location="publications2012.php";
                    break;
                case "publication2013":
                    window.location="publications2013.php";
                    break;
                case "publication2014":
                    window.location="publications2014.php";
                    break;
		case "publication2015":
                    window.location="publications2015.php";
                    break;
            }
        }
        /**** projects**/
        function SelectProjects(){
            switch(document.getElementById('projects').value)
            {
            /*** projects ***/
                case "project2009":
                    window.location="projects2009.php";
                    break;
                case "project2010":
                    window.location="projects2010.php";
                    break;
                case "project2011":
                    window.location="projects2011.php";
                    break;
                case "project2012":
                    window.location="projects2012.php";
                    break;
                case "project2013":
                    window.location="projects2013.php";
                    break;
                case "project2014":
                    window.location="projects2014.php";
                    break;
		case "project2015":
                    window.location="projects2015.php";
                    break;
            }
        }
    </script>
    </head>
    <body>
<div id="ex1" style="display:none;">
    <form action="up.php" enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="Import" value="Import">Upload</button>
</form>
  </div>
<div id="ex2" style="display:none;">
    <form action="up_projects.php" enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="Import" value="Import">Upload</button>
</form>
  </div>
<table width="95%" bgcolor="#FFFFFF" align="center">
    <tr>
      <td>
          <div>
           <a href="http://www.worldagroforestry.org"><img src="images/agroforests_logo.jpg" alt="rmg"></a></div></td>
        <td><div class="Three-D" align="center">Data Outputs Monitoring Database
      </div></td>
      <td style="float: right;padding-top: 2.9em;">
          <div class="buttons">
              <a href="compliance_report.php" class="regular"><img src="images/control.png" alt="admin"/>Publication Reports</a>
              <a href="#ex1" rel="modal:open" class="regular"><img src="images/control.png" alt="add file"/>Upload Publication</a>
              <a href="#ex2" rel="modal:open" class="regular"><img src="images/control.png" alt="add file"/>Upload Projects</a> 
              <!--<a href="logout.php" class="negative"><img src="images/logout.jpg" alt="add file"/>Sign Out</a>-->
              </div></td>
	</tr>
</table>
<table width="95%" border="0" align="center">
<tr>
<td><div id='cssmenu'>
<ul>
   <li><table><tr class="buttons"><td><a href='index.php'><span>HOME</span></a></td></tr></table></li>
   <li><a><span>
             <form>
              <table name="browser" border="0" cellspacing="1">
                   <tr id="bar">
                       <td style="color: #FFF;">PUBLICATIONS:</td>
                       <td>
                           <SELECT id="publications" NAME="select" onChange="SelectPublications();" style="border-radius: 10px 0 10px;">
                               <Option value="selected">Select Year</option>
                               <Option value="publication2009">2009</option>
                               <Option value="publication2010">2010</option>
                               <Option value="publication2011">2011</option>
                               <Option value="publication2012">2012</option>
                               <Option value="publication2013">2013</option>
                               <Option value="publication2014">2014</option>
			       <Option value="publication2015">2015</option>
                           </SELECT>
                       </td>
                   </tr>
               </table>
               </form>
           </span></a></li>
    <li><a><span>
                <form>
              <table name="browser" border="0" cellspacing="1">
                  <tr id="bar">
                      <td style="color: #FFF;">PROJECTS:</td>
                      <td>
                          <SELECT id="projects" NAME="select" onChange="SelectProjects();" style="border-radius: 10px 0 10px;">
                              <Option value="">Select Year</option>
                              <Option value="project2009">2009</option>
                              <Option value="project2010">2010</option>
                              <Option value="project2011">2011</option>
                              <Option value="project2012">2012</option>
                              <Option value="project2013">2013</option>
                              <Option value="project2014">2014</option>
			      <Option value="project2015">2015</option>
                          </SELECT>
                      </td>
                  </tr>
              </table>
                </form>
           </span></li>
</ul>
</div></td>
</tr>
</table>  


