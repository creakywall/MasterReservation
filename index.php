<?php
require_once ('utility/master.php');
$building_ID='';

if(isset($_GET['building']))
	{
		$building_ID = $_GET['building'];
	}
?>
<body>
<div class="dateTimeSelection">
	<form method='post' action=''>
	Please select:<br />
	<p>People in your party:
		<select>
			<option value='1'>1-4</option>
			<option value='2'>5-8</option>
			<option value='3'>8-10</option>
			<option value='4'>10+</option>
		</select>
	</p>

		<p>Date: 
			<input type="text" id="datepicker" size="30"/>
		</p>
		
		<p>Time:
		  <input id="onselectExample" type="text" class="time" />
		  <span id="onselectTarget" type="hidden" style="margin-left: 30px;"></span>
		</p>
		
		<p>Duration:
		<input id="durationExample" type="text" class="time" /></p>
		</p>
</div>
</form>
	<p>Please select a building: </p>
	<form method="GET" action="">
		<?php getBuildings(); ?>
		<br /><input type="submit" value="Submit"/>
	</form>
	<?php getRoomsAvailable($building_ID);?>
</body>
</html>