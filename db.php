<?php

$dsn = 'mysql:dbname=ureserve;host=127.0.0.1';
$user='root';
$password='';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$sql = 'SELECT room_ID,building_ID,room_name,cast(room_active as unsigned integer) roomActive,startOpenTime,endOpenTime FROM room';

try{
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$stmt->bindColumn(1, $roomID);
	$stmt->bindColumn(2, $building_ID);
	$stmt->bindColumn(3, $roomName);
	$stmt->bindColumn(4, $roomActive);
	$stmt->bindColumn(5, $startOpenTime);
	$stmt->bindColumn(6, $endOpenTime);

	while ($row = $stmt->fetch(PDO::FETCH_BOUND)){
		$data = $roomID . "\t" . $building_ID . "\t" . $roomName . "\t" . $roomActive . "\t" . $startOpenTime . "\t" . $endOpenTime . "<br />";
	print $data;
	}
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
?>
<html>
<head></head>
<title></title>
<body>
</body
</html>