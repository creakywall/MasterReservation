<?php
require_once ('utility/master.php');
$building_ID='';

if(isset($_GET['building']))
	{
		$building_ID = $_GET['building'];
	}
?>
<body>

	<p>Please select the number of people in your party: 
		<select>
			<option value='1'>1-4</option>
			<option value='2'>5-8</option>
			<option value='3'>8-10</option>
			<option value='4'>10+</option>
		</select>
	</p>

		<p>Please select a date, time and duration: </p>
<div class="dateTimeSelection">
<p>Date: <input type="text" id="datepicker" size="30"/></p>
</div>

	<p>Please select a building: </p>
	<form method="GET" action="">
		<?php getBuildings(); ?>
		<br /><input type="submit" value="Submit"/>
	</form>
	<?php getRoomsAvailable($building_ID);?>
</body>
</html>