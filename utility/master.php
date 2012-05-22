<?php
include_once('db.php');
?>
<meta charset="utf-8">
<html>
<head>
	<title>UReserve</title>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script language='JavaScript' type='text/JavaScript' src='js/jquery-ui-1.8.20.custom.min.js'></script>
	<link type="text/css" href="css/smoothness/jquery-ui-1.8.20.custom.css" rel="Stylesheet" />


    <script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#format" ).change(function() {
			$( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
		});
	});
	</script>
</head>