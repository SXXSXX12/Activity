<?php
$conn = mysql_connect("localhost","root","");
$dbname = "sj";
mysql_query("SET NAMES UTF8");
if(! $conn)
	die("Error :MySQL");
mysql_select_db("sj", $conn)
	or die("can't connect to database");
?>