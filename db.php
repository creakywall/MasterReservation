<?php

$dsn = 'mysql:dbname=ureserve;host=127.0.0.1';
$user='root';
$password='';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT room_ID,building_ID,room_name,cast(room_active as unsigned integer) roomActive,startOpenTime,endOpenTime FROM room';

try {
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$stmt->bindColumn('room_ID', $roomID);
	$stmt->bindColumn('building_ID', $building_ID);
	$stmt->bindColumn('room_name', $roomName);
	$stmt->bindColumn('roomActive', $roomActive);
	$stmt->bindColumn('startOpenTime', $startOpenTime);
	$stmt->bindColumn('endOpenTime', $endOpenTime);

	while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
		$data = $roomID . "\t" . $building_ID . "\t" . $roomName . "\t" . $roomActive . "\t" . $startOpenTime . "\t" . $endOpenTime . "<br />";
		print $data;
	}
} catch (PDOException $e) {
    print $e->getMessage();
}
?>
