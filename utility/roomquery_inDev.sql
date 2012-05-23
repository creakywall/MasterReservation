SELECT *,Timediff(end_DateTime,start_DateTime)
FROM roomblacklist r 
where r.start_DateTime <> '2012-05-24 07:30:00'
and r.start_DateTime + Timediff(end_DateTime,start_DateTime) <> '2012-05-24 10:30:00'