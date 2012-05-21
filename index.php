<?php
require_once ('utility/master.php');

?>
</body>
	<p>Please select a building: </p>
	<form>
		<?php getBuildings(); ?>
		<br /><input type="submit" value="Submit" onClick='listRooms()'/>
	</form>
	
</body>
</html>