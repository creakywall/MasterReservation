<?php
require_once ('utility/master.php');
$building_ID='';

if(isset($_GET['building']))
	{
		$building_ID = $_GET['building'];
	}
?>
</body>
	<p>Please select a building: </p>
	<form method="GET" action="">
		<?php getBuildings(); ?>
		<br /><input type="submit" value="Submit"/>
	</form>
	<?php getRoomsAvailable($building_ID);?>
</body>
</html>