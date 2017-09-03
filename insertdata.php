<?php
	include('config/config.php');
	$Name2 = $_POST['name'];
	$student_id2 = $_POST['student_id'];
	$username2 = $_POST['username'];
	$password2 = $_POST['password'];
	$phone2 = $_POST['phone'];
	$strsql = "INSERT INTO std_data(name,student_id,username,password,phone) VALUE('$Name2','$student_id2','$username2','$password2','$phone2')";
	mysql_query($strsql);
	if($strsql){
		exit("<script> window.location='data_student.php';</script>");
	}
?>