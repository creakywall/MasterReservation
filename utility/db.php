<?php

//This fucntion will provide database access
function initializeDBcall(){
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
	$sql = 'select building_ID,building_name from buildings';

	try {
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$stmt->bindColumn('building_ID', $building_ID);
	$stmt->bindColumn('building_name', $building_name);

	while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
		$data = "<input type='radio' name='building' value='".$building_ID."'>".$building_name."</input>";
		print $data;
		}	
	}catch (PDOException $e) {
    print $e->getMessage();
		}
}

function getRoomsAvailable($building_ID)
{
	$dbh = initializeDBcall();
	$sql = "SELECT r.room_ID,b.building_name,r.room_name,r.startOpenTime,r.endOpenTime FROM room r join buildings b on r.building_ID = b.building_ID where r.building_ID = '".$building_ID."'";

	try {
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$stmt->bindColumn('room_ID', $room_ID);
	$stmt->bindColumn('building_name', $building_name);
	$stmt->bindColumn('room_name', $room_name);
	$stmt->bindColumn('startOpenTime', $startOpenTime);
	$stmt->bindColumn('endOpenTime', $endOpenTime);

	while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
		$data = $room_ID." ".$building_name." ".$room_name." ".$startOpenTime." ".$endOpenTime."<br />";
		print $data;
		}	
	}catch (PDOException $e) {
    print $e->getMessage();
		}
}

?>
