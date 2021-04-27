<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="Ajax.js"></script>
</head>
<body>
	<?php
		include 'connection.php';
	?>

	<div>
		List of wards in which the selected nurse is on duty <br>
 		<form method="get">
			<?php
				echo "<select name='nurse_name' id='nurse_name' style='width:100px;margin-left:10px;margin-top:10px''>";
				$sql = "SELECT nurse.name FROM nurse";
				foreach ($dbh->query($sql) as $row) {
    				echo "<option value=".$row['name'].">".$row['name']."</option>";
				}
				echo "</select>";
			?>
			<input type='button' value='send' style='margin-left:30px' onclick="Get_wards();">
		</form> 
	</div>

	<div class="table-container">
		<table>
			<thead>
				<tr>
                    <th>Wards</th>
				</tr>
			</thead>
			<tbody id="tbody-wards">
			</tbody>
		</table>
	</div>

	<br>

	<div>
		Nurses of the selected department
		<form method="get">
			<?php
				echo "<select name='department_name' id='department_name' style='width:100px;margin-left:1%;margin-top:20px ''>";
				$sql = "SELECT nurse.department FROM nurse";
				foreach ($dbh->query($sql) as $row) {
    				echo "<option value=".$row['department'].">".$row['department']."</option>";
				}
				echo "</select>";
			?>
			<input type='button' value='send' style='margin-left:30px' onclick="Get_Nurses();">
		</form>
	</div>

	<div class="table-container">
		<table>
			<thead>
				<tr>
                    <th>Nurses</th>
				</tr>
			</thead>
			<tbody id="tbody-nurses">
			</tbody>
		</table>
	</div>

	<br>

	<div>
		Duty (in any wards) on the indicated shift
		<form method="get">
			<?php
				echo "<select name='on_shift' id='on_shift' style='width:100px;margin-left:1%;margin-top:10px''>";
				$sql = "SELECT DISTINCT nurse.shift FROM nurse";
				foreach ($dbh->query($sql) as $row) {
    				echo "<option value=".$row['shift'].">".$row['shift']."</option>";
				}
				echo "</select>";
			?>
			<input type='button' value='send' style='margin-left:30px' onclick="Get_Nurses_And_Wards_On_Shift();">
		</form>
	</div>

	<div class="table-container">
		<table border='1' id='tbody-on-shift'>
			<thead>
				<tr>
                    <th>Nurses</th>
					<th>Ward</th>
					<th>Date</th>
				</tr>
			</thead>
		</table>
	</div>
</body>