<?php include "header.php"; ?>
<script type="text/javascript">
function SelectRedirect(){
switch(document.getElementById('publication').value)
{
case "publications":
window.location="index.php";
break;

case "projects":
window.location="project_chart.php";
break;

}
}
</script>
<div id="body-width">
		<div>
	  <div style="height: auto;">
		<form name="browser_sort" id="sel-box">
			<table name="browser" border="0" cellspacing="1">
			<tr style="background-color: #7C3886;"><td style="color: ghostwhite;">SELECT:</td>
				<td>
				  <SELECT id="publication" NAME="section" onChange="SelectRedirect();">
                <Option value="">Select Chart</option>
                <Option value="publications">Publications Chart</option>
                <Option value="projects">Projects Chart</option>
                 </SELECT>
              </td>
              </tr>
             </table>
           </form>
		    <?php 
			include "index_report.php" 
			?>
	  </div>
  </div>
		<div class="clear"></div>
		</div>
<hr size="5" color="#7c3886">
<?php include "footer.php"; ?>