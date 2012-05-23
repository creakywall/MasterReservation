SELECT b.*
FROM roomblacklist b 
where b.start_DateTime <> '2012-05-24 07:30:00'
and b.start_DateTime + Timediff(b.end_DateTime,b.start_DateTime) <> '2012-05-24 10:30:00'

$sql = "SELECT r.* from rooms r where r.startOpenTime <= extract(hour_minute from '".$StartTime."') and r.endOpenTime >= extract(hour_minute from '".$endTime."')";