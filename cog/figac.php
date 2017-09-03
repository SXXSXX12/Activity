<?php
$conn = mysql_connect("localhost","root","");
$dbname = "active";
mysql_query("SET NAMES UTF8");
if(! $conn)
	die("Error :MySQL");
mysql_select_db("active", $conn)
	or die("can't connect to database");
?>