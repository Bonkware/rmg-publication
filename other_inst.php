<?php include "header.php"; ?>
<div id="body-width">
    <?php include "reports_menu.php"; ?>
    <div id="vertical-menu" style="width: 80%;margin:0 auto;">
        <div class="content">
            <div>
                <?php include "connections/connect.php";

                $query=mysql_query("SELECT DISTINCT data_owner as yr2014 FROM publication where pub_year='2014'
               AND prim_data='YES' AND data_owner!='ICRAF' AND data_owner!='ICRAF and Partner'");
                ?>
                <?php include "connections/connect.php";

                $query=mysql_query("SELECT DISTINCT data_owner as yr2014 FROM publication where pub_year='2014'
               AND prim_data='YES' AND data_owner!='ICRAF' AND data_owner!='ICRAF and Partner'");
                ?>
                <div>
                    <ul>
                        <li class="active">
                            <h3><span class="plus">+</span>List of Other Institutions 2014</h3>
                            <ul>
                    <table class="ExcelTable2007" cellspacing="0" width="100%" border="0" style=" text-align: justify; font-weight: normal"  >
                        <thead><tr>
                            <th></th>
                            <th>Year 2014</th>
                        </tr></thead>
                        <?php
                        while($row=mysql_fetch_assoc($query)){
                            ?>
                            <tr>
                                <td><img id="img" src="images/arrow.gif"></td>
                                <td><?php echo $row['yr2014']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                            </ul>
                        </li>
                </div>
            </div>
        </div>

        <div class="content">
            <div>
                <?php include "connections/connect.php";
                $query=mysql_query("SELECT DISTINCT data_owner as yr2013 FROM publication where pub_year='2013'
                AND prim_data='YES' AND data_owner!='ICRAF' AND data_owner!='ICRAF and Partner'");
                ?>
                <div>
                    <ul>
                        <li>
                            <h3><span class="plus">+</span>List of Other Institutions 2013</h3>
                            <ul>
                    <table class="ExcelTable2007" cellspacing="0" width="100%" border="0" style=" text-align: justify; font-weight: normal"  >
                        <thead><tr>
                            <th></th>
                            <th>Year 2013</th>
                        </tr></thead>
                        <?php
                        while($row=mysql_fetch_assoc($query)){
                            ?>
                            <tr>
                               <td><img id="img" src="images/arrow.gif"></td>
                                <td><?php echo $row['yr2013']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                            </ul>
                        </li>
                </div>
            </div>
        </div>

        <div class="content">
            <div>
                <?php include "connections/connect.php";
                $query=mysql_query("SELECT DISTINCT data_owner as yr2012 FROM publication where pub_year='2012'
                AND prim_data='YES' AND data_owner!='ICRAF' AND data_owner!='ICRAF and Partner' AND data_owner!='N/A'");
                ?>
                <div>
                    <ul>
                        <li>
                            <h3><span class="plus">+</span>List of Other Institutions 2012</h3>
                            <ul>
                    <table class="ExcelTable2007" cellspacing="0" width="100%" border="0" style=" text-align: justify; font-weight: normal"  >
                        <thead><tr>
                            <th></th>
                            <th>Year 2012</th>
                        </tr></thead>
                        <?php
                        while($row=mysql_fetch_assoc($query)){
                            ?>
                            <tr>
                                <td><img id="img" src="images/arrow.gif"></td>
                                <td><?php echo $row['yr2012']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                            </ul>
                        </li>
                </div>
            </div>
        </div>

        <div class="content">
            <div>
                <?php include "connections/connect.php";
                $query=mysql_query("SELECT DISTINCT data_owner as yr2011 FROM publication where pub_year='2011'
                AND prim_data='YES' AND data_owner!='ICRAF' AND data_owner!='ICRAF and Partner'AND data_owner!='N/A'");
                ?>
                <div>
                    <ul>
                        <li>
                            <h3><span class="plus">+</span>List of Other Institutions 2011</h3>
                            <ul>
                    <table class="ExcelTable2007" cellspacing="0" width="100%" border="0" style=" text-align: justify; font-weight: normal"  >
                        <thead><tr>
                            <th></th>
                            <th>Year 2011</th>
                        </tr></thead>
                        <?php
                        while($row=mysql_fetch_assoc($query)){
                            ?>
                            <tr>
                                <td><img id="img" src="images/arrow.gif"></td>
                                <td><?php echo $row['yr2011']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                            </ul>
                        </li>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<hr size="4" color="#7c3886">
<?php include "footer.php"; ?>
<script>
    /****** script for read more or less **************************/
    $("#vertical-menu h3").click(function () {
        //slide up all the link lists
        $("#vertical-menu ul ul").slideUp();
        $('.plus', this).html('+');
        //slide down the link list below the h3 clicked - only if its closed
        if (!$(this).next().is(":visible")) {
            $(this).next().slideDown();
            //$(this).remove("span").append('<span class="minus">-</span>');
            $('.plus').html('+');
            $('.plus', this).html('-');
        }
    })
</script>