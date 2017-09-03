<?php
$conn = mysql_connect("localhost","root","");
$dbname = "aj";
mysql_query("SET NAMES UTF8");
if(! $conn)
	die("Error :MySQL");
mysql_select_db("aj", $conn)
	or die("can't connect to database");
?>