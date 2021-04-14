<?php include "header.php"; ?>
<div id="body-width">
		<?php include "reports_menu.php"; ?>
<div>
    <p class="heading" align="center"> Representation of Primary Data Based Report</p></a>
<div class="content">
<div>
		    <?php include "connections/connect.php";
				$query=mysql_query("select pub_year as year, 
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='yes') as p_data_y, 
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='no') as p_data_n,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data!='yes' AND prim_data!='no') as p_data_ne, 
				((COUNT(*)/(SELECT COUNT(*) FROM publication))*100) as percent
				from publication as t group by pub_year;");
			?>
		    <div>
			<table class="ExcelTable2007" cellspacing="0" width="100%" border="0"  >
			<thead><tr>
			<th>Year</th>
			<th>Publication based on primary data</th>
            <th>Publication not based on primary data</th>
			<th>Not Indicated</th>
			<th>Percentage</th>
			</tr></thead>
			<?php
			while($row=mysql_fetch_assoc($query)){
			?>
			<tr>
			<td><?php echo $row['year']; ?></td>
            <td><?php echo $row['p_data_y']; ?></td>
			<td><?php echo $row['p_data_n']; ?></td>
			<td><?php echo $row['p_data_ne']; ?></td>
			<td><?php echo number_format($row['percent'],2).'%'; ?></td>
			</tr>
			<?php } ?>
			</table>
		    </div>
	    </div>
			</div>
		</div>
		<div>
		    <?php 
			include "report_primary_data.php" 
			?>
	    </div>
		<div class="clear"></div>
		</div>
		</div>
</fieldset>
<hr size="4" color="#7c3886">
<?php include "footer.php"; ?>
