<?php
$dbname = "activity";
$conn = new mysqli("localhost","root","",$dbname,"3306");
$conn->set_charset('utf8');
if(! $conn)
	die('connect Failed! :'.mysqli_connect_error());
?>
