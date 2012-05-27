<?php

//This fucntion will provide database access
function initializeDBcall() {
	$dsn = 'mysql:dbname=ureserve;host=127.0.0.1';
	$user='root';
	$password='';
	$dbh='';

	try {
    	$dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
    	echo 'Connection failed: ' . $e->getMessage();
	}

	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

//This function is designed to produce radio button output for the initial selection process.
function getBuildings()
{
	$dbh = initializeDBcall();

	try {
		$stmt = $dbh->prepare('select building_ID,building_name from buildings');
		$stmt->execute();

		$stmt->bindColumn('building_ID', $building_ID);
		$stmt->bindColumn('building_name', $building_name);

		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
			echo '<input type='radio" name="building" value="', $building_ID, '">', $building_name, '</input>';
		}	
	} catch (PDOException $e) {
    	print $e->getMessage();
	}
}

function getRoomsAvailable($btime,$etime)
{
	$dbh = initializeDBcall();
	//$sql = "SELECT r.room_ID,b.building_name,r.room_name,r.startOpenTime,r.endOpenTime FROM room r join buildings b on r.building_ID = b.building_ID where r.building_ID = '".$building_ID."'";
	$sql = 'SELECT r.room_ID,r.building_ID,r.room_name,r.startOpenTime,r.endOpenTime FROM ROOM r where r.room_active = '1' and r.startOpenTime <= EXTRACT(hour_minute from :btime) and r.endOpenTime >= EXTRACT(hour_minute from :etime)';

	try {
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$stmt->bindColumn('room_ID', $room_ID);
		$stmt->bindColumn('building_ID', $building_ID);
		$stmt->bindColumn('room_name', $room_name);
		$stmt->bindColumn('startOpenTime', $startOpenTime);
		$stmt->bindColumn('endOpenTime', $endOpenTime);

		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
			print $room_ID." ".$building_ID." ".$room_name." ".$startOpenTime." ".$endOpenTime."<br />";
		}	
	} catch (PDOException $e) {
    	print $e->getMessage();
	}
}

?>
