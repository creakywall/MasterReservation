<?php
require_once ('utility/master.php');
$building_ID='';
$participants = '';
$date = '';
$btime = '';
$etime = '';

		//$building_ID = '1';
	

if(isset($_POST['date']) && isset($_POST['btime']) && isset($_POST['etime']) && isset($_POST['participants']))
	{
		$participants = $_POST['participants'];
		$date = $_POST['date'];
		$btime = $date.' '.$_POST['btime'];
		$etime = $date.' '.$_POST['etime'];
	}
?>
<body>
<div class="dateTimeSelection">
	<form method='post' action=''>
	Please select:<br />
	<p>People in your party:
		<select name="participants">
			<option value='1'>1-4</option>
			<option value='2'>5-8</option>
			<option value='3'>8-10</option>
			<option value='4'>10+</option>
		</select>
	</p>

		<p>Date: 
			<input type="text" id="datepicker" name="date" size="30"/>
		</p>
		
		<p>Start Time:
		  <input id="onselectExample" type="text" class="time" name="btime"/>
		  <span id="onselectTarget" type="hidden" style="margin-left: 30px;"></span>
		</p>
		
		<p>Duration:
		<input id="durationExample" type="text" class="time" name="etime"/></p>
		</p>

		<?//php getBuildings(); ?>
		<br /><input type="submit" value="Submit"/>
	</form>
</div>
	<?php 
	$sql = "SELECT r.room_ID,r.building_ID,r.room_name,r.startOpenTime,r.endOpenTime FROM ROOM r where r.room_active = '1' and r.startOpenTime <= substr('".$btime."',5) and r.endOpenTime >= substr('".$etime."',5)";
	echo $sql;
	getRoomsAvailable($btime,$etime);

	echo $participants."<br />".$date."<br />".$btime."<br />".$etime;
	?>
</body>
</html>