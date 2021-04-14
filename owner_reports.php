<?php include "header.php"; ?>
<div id="body-width">
		<?php include "reports_menu.php"; ?>
<div>
<p class="heading" align="center"> Representation of Ownership Data Based Report</p></a>
<div class="content">
		<div>
		    <?php include "connections/connect.php";
				$query=mysql_query("select pub_year as year, 
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='YES' AND (data_owner='ICRAF' OR data_owner='ICRAF and partner')) as icraf,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='YES' AND data_owner!='ICRAF' AND data_owner!='ICRAF and Partner') as other_institutions
				from publication as t group by pub_year;");
			?>
		    <div>
			<table class="ExcelTable2007"  cellspacing="0" width="100%" >
			<thead><tr>
			<th>Year</th>
			<th>ICRAF</th>
            <th>Other Institutions</th>
			<!--<th>Percentage</th>-->
			</tr></thead>
			<?php
			while($row=mysql_fetch_assoc($query)){
			?>
			<tr>
			<td><?php echo $row['year']; ?></td>
            <td><?php echo $row['icraf']; ?></td>
			<td><?php echo $row['other_institutions']; ?></td>
			<!--<td><?php //echo number_format($row['percent'],2).'%'; ?></td>-->
			</tr>
			<?php } ?>
			</table>
		   	</div>
	    </div>
			</div>
		</div>
		<div>
		
		    <?php 
			include "report_ownership.php" 
			?>
	    </div>
		<div class="clear"></div>
		</div>
		</div>
<hr size="4" color="#7c3886">
<?php include "footer.php"; ?>
