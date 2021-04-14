<?php include('DataTables.php');?>
<script>
    $(document).ready(function() {
        $('#dtable').dataTable( {
            "scrollY": 500,
            "scrollX": true,
            "scrollCollapse": true,
            "jQueryUI":       true
        } );
    } );
</script>
<div>
    <?php
    //session_start();
    if (isset($_SESSION['error'])) {
        $er = urldecode($_SESSION['error']);
        echo "<div class='error'>$er</div>";
        unset($_SESSION['error']);
    } if (isset($_SESSION['success'])) {
        $er = $_SESSION['success'];
        echo "<div class='success'>$er</div>";
        unset($_SESSION['success']);
    }
    include('connections/connect.php');
    $sql = mysql_query("SELECT * FROM projects WHERE year='2010'");
    ?>
    <div>
        <div class="r-float success"
             style="margin-bottom: 0.4em; padding: 0em;display:inline;margin-right: 10px; font-style: oblique;">
            <a href="connections/generate_excel2.php" id="rp_download" title="Excel Format (.xls)">
                Download as <img src="images/excel.png" alt="Excel_download" style="width: 24px;">
            </a>
        </div>
        <div class="r-float success"
             style="margin-bottom: 0.4em;padding: 0.1em;display:inline;margin-right: 10px; font-style: oblique;">
            Total Projects :<?php echo mysql_num_rows($sql);
            ?>
        </div>
        <div class="clear"></div>
        <div style="width:auto">
            <?php
            if (!mysql_error()) {
                ?>
                <table id="dtable" class="display" cellspacing="0" width="100%" >
                    <thead>
                    <tr style="font-weight: bold">
                        <th>#id</th>
                        <th>Year</th>
                        <th>Region</th>
                        <th>Project Name</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Science Domain</th>
                    </tr>
                    </thead>
                    <?php
                    $count=0;
                    while ($row = mysql_fetch_array($sql)) {
                        $count++;
                        // set up a row for each record
                        echo "<tr idcountry='" . $row['id'] . "'>";
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $row['year'] . "</td>";
                        echo "<td>" . $row['region'] . "</td>";
                        echo "<td>" . $row['proj_name'] . "</td>";
                        echo "<td>" . $row['author'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['sc_domain'] . "</td>";
                        echo "</tr>";
                    } ?>
                </table>
            <?php
            } else {
                echo "Error: " . mysql_error();
            }
            ?>
        </div>
    </div>
</div>
	