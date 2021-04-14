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
				$sql = mysql_query("SELECT * FROM publication WHERE pub_year='2011'");
		?>
		<div>
		<div class="r-float success"
		     style="display:inline;margin-right: 10px; font-style: oblique;">
			<a href="connections/generate_excel.php" id="rp_download" title="Excel Format (.xls)">
					Download as <img src="images/excel.png" alt="Excel_download" style="width: 24px;">
				</a>
		</div>

		<div class="clear"></div>
			<div style="width:auto">
				<?php
				include('connections/connect.php');
				$sql = mysql_query("SELECT * FROM publication WHERE pub_year='2011'");
				if (!mysql_error()) {
					?>
					<table id="dtable" class="display" cellspacing="0" width="100%" >
					<thead>
						<tr style="font-weight: bold">
							<th>#id</th>
							<th>Year</th>
							<th>Publication</th>
							<th>Author</th>
							<th>Region</th>
							<th>Science Domain</th>
							<th>Primary Data</th>
							<th>Data Owner</th>
							<th>Data in Dataverse</th>
							<th>DOI</th>
							<th>Comments</th>
						</tr>
						</thead>

						<tbody ////////////////>
						<?php
						$count=0;
						while ($row = mysql_fetch_array($sql)) {
							$count++;
							// set up a row for each record
							echo "<tr idcountry='" . $row['id'] . "'>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . $row['pub_year'] . "</td>";
							echo "<td style='width: 200em'>" . $row['publication'] . "</td>";
							echo "<td>" . $row['person'] . "</td>";
							//echo "<td><a href='uploads/" . $row['file_name'] . "'>" . $row['file_name'] . "</a></td>";
							echo "<td>" . $row['region'] . "</td>";
							echo "<td>" . $row['sc_domain'] . "</td>";
							echo "<td>" . $row['prim_data'] . "</td>";
							echo "<td>" . $row['data_owner'] . "</td>";
							echo "<td>" . $row['data_verse'] . "</td>";
							echo "<td>" . $row['DOI'] . "</td>";
							echo "<td>" . $row['comments'] . "</td>";
							echo "</tr>";
						} ?>
						</tbody>
					</table>
				<?php
				} else {
					echo "Error: " . mysql_error();
				}
				?>
			</div>
		</div>
	</div>

