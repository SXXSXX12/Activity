<?php
include_once 'config/config.php';
echo $std_code = $_POST['std_code'];
 
$sql=mysqli_query($conn,"insert into history_act SET
	std_code ='$std_code',status_regis=1");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:regis_table.php"); 
	}
