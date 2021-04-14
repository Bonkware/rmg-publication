<?php include "header.php"; ?>
<div id="body-width">
    <?php include "reports_menu.php"; ?>
        <div>
            <p class="heading" align="center">Representation of Compliance Based Report</p></a>
            <div class="content">
                <div>
                    <?php include "connections/connect.php";
                    $query=mysql_query("select pub_year as year,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='yes') as p_data_y, 
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='no') as p_data_n,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='1st author') as p_data_icraf,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='Awaiting r') as p_data_aresponse,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='Email no l') as p_data_emv,
				(SELECT count(*) from publication AS c WHERE c.pub_year=t.pub_year AND prim_data='No Respons') as p_data_noresp,
				((COUNT(*)/(SELECT COUNT(*) FROM publication))*100) as percent
				from publication as t group by pub_year;");
                    ?>
                    <div>
                        <table class="ExcelTable2007" cellspacing="0" width="100%" border="0"  >
                            <thead><tr>
                                <th>Year</th>
                                <th>Compliance</th>
                                <th>Non-Compliance</th>
                            </tr></thead>
                            <?php
                            while($row=mysql_fetch_assoc($query)){
                                ?>
                                <tr>
                                    <td><?php echo $row['year']; ?></td>
                                    <td><?php echo $row['p_data_y']; ?></td>
                                    <td><?php echo $row['p_data_noresp']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php
            include "compliance_data.php"
            ?>
        </div>
        <div class="clear"></div>
</div>
</div>
<hr size="4" color="#7c3886">
<?php include "footer.php"; ?>
